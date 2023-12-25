<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\UploadLeadsImport;
use App\Imports\UploadLeadTrackingImport;
use App\Models\Brokerage;
use App\Models\Campaign;
use App\Models\LeadConversion;
use App\Models\Slugs;
use App\Models\UploadLeads;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class LeadsController extends Controller
{
    public function upload_leads_csv(Request $request)
    {
        $request->validate([
            'brand_id' => 'required|integer',
            'csv_file' => 'required|file|mimes:csv,txt',
        ]);

        if ($request->hasFile('csv_file')) {

            $brand_id = $request->brand_id;

            $file = $request->file('csv_file')->store('leads');

            $upload = Excel::import(new UploadLeadsImport($brand_id), $file);

            //dd($upload);

            return response()->json(['status' => true, 'message' => 'Leads Uploaded Successfully']);
        } else {
            return response()->json(['message' => 'Please Upload Valid CSV File', 'errors'], 422);
        }
    }

    public function lead_data(Request $request)
    {
        $response = array();

        $status = 200;

        $getresult = UploadLeads::where('is_active', '=', '1')->limit(1000)->get();

        // Default Values for Calculations
        $paidbrokerageamt = 0;
        $getLead = array();
        $influencer_paid_share_amt = 0;
        $brand_paid_share_amt = 0;

        if (!empty($getresult)) {
            foreach ($getresult as $key => $rowlead) {
                $getcamp = Campaign::where('campaign_name', '=', $rowlead->campaign_name)->get();

                if (!empty($getcamp)) {
                    $getSlug = Slugs::where('slug', '=', $rowlead->slug)->get();

                    if (!empty($getSlug)) {
                        $lead_status = $rowlead->acquisition_status;

                        /*
                        * Check For Acquisition Status is equal to 1 Then
                        * Brand Share Amount = Lead Commission Value (Brand) + Lead Acquisition Value (Brand)
                        * Influencer Share Amount = Lead Commission Value (Influencer) + Lead Acquisition Value (Influencer)
                        * Change Status to Converted Lead
                        *
                        * Else Then
                        * Brand Share Amount = Lead Commission Value (Brand)
                        * Influencer Share Amount = Lead Commission Value (Influencer)
                        */

                        if ($lead_status == 1) {
                            $brand_paid_share_amt = $getcamp[0]->lead_commission_value_brand + $getcamp[0]->lead_acquisition_value_brand;
                            $influencer_paid_share_amt = $getcamp[0]->lead_commission_value_influencer + $getcamp[0]->lead_acquisition_value_influencer;
                            $lead_status = 'Converted';
                        } else {
                            $brand_paid_share_amt = $getcamp[0]->lead_commission_value_brand;
                            $influencer_paid_share_amt = $getcamp[0]->lead_commission_value_influencer;
                        }

                        $whereLeadClause = array('lead_code' => $rowlead->lead_code, 'brand_id' => $rowlead->brand_id);

                        $getLead = LeadConversion::where($whereLeadClause)->get();

                        $acquisition_timestamp = '';
                        if (strlen($rowlead->acquisition_timestamp) > 0) {
                            $acquisition_timestamp = date('Y-m-d H:i:s', strtotime($rowlead->acquisition_timestamp));
                        }

                        $lead_timestamp = date('Y-m-d H:i:s');
                        if (strlen($rowlead->lead_timestamp) > 0) {
                            $lead_timestamp = date('Y-m-d H:i:s', strtotime($rowlead->lead_timestamp));
                        }

                        $insertdata = array(
                            'mobile_no' => $rowlead->mobile_no,
                            'lead_code' => $rowlead->lead_code,
                            'campaign_id' => $getcamp[0]->campaign_id,
                            'slug_id' => $getSlug[0]->slug_id,
                            'influencer_id' => $getSlug[0]->influencer_id,
                            'lead_name' => $rowlead->lead_name,
                            'brand_id' => $rowlead->brand_id,
                            'lead_status' => $lead_status,
                            'updated_at' => $acquisition_timestamp,
                            'influencer_paid_share_amt' => $influencer_paid_share_amt,
                            'brand_paid_share_amt' => $brand_paid_share_amt,
                            'updated_by' => $getSlug[0]->updated_by,
                            'created_at' => $lead_timestamp
                        );

                        // Check If Lead Data Exists Then Update Else Insert a New Lead Data
                        if (!empty($getLead)) {
                            if ($getLead[0]->leadstatus != 'Converted') {
                                $update_leads = LeadConversion::where($whereLeadClause)->update($insertdata);
                            }
                        } else {
                            $insert_leads = LeadConversion::insert($insertdata);
                        }

                        $transaction_date = array();
                        $transaction_value = array();

                        $influencer_total_brokerage_amt = array();
                        $brand_total_brokerage_amt = array();
                        $total_brokerage_amt = array();

                        // Check For Acquisition Status
                        if ($rowlead->acquisition_status == '1') {
                            if (strlen($rowlead->transaction_dates_minus_first) > 0 || strlen($rowlead->transaction_date) > 0) {

                                // Check For First Transaction Date
                                if (strlen($rowlead->transaction_date) > 0) {

                                    // First Transaction Date
                                    $transaction_date1 = array('0' => $rowlead->transaction_date);

                                    // First Transaction Value
                                    $transaction_value1 = array('0' => $rowlead->transaction_value);

                                    // Other Transaction Dates
                                    $transaction_date2 = explode(",", $rowlead->transaction_dates_minus_first);

                                    // Other Transaction Values
                                    $transaction_value2 = explode(",", $rowlead->transaction_values_minus_first);

                                    // Merge Transaction Dates
                                    $transaction_date = array_merge($transaction_date1, $transaction_date2);

                                    // Merge Transaction Values
                                    $transaction_value = array_merge($transaction_value1, $transaction_value2);
                                } else {

                                    // Other Transaction Dates
                                    $transaction_date = explode(",", $rowlead->transaction_dates_minus_first);

                                    // Other Transaction Values
                                    $transaction_value = explode(",", $rowlead->transaction_values_minus_first);
                                }
                                $total_brokerage_amt[$rowlead->lead_code] = array();
                                $i = 0;
                                $transaction_date = array_filter($transaction_date);
                                foreach ($transaction_date as $key => $rowtransdate) {
                                    if (strlen($rowtransdate) > 0) {
                                        $rowtransdate = date('Y-m-d', strtotime($rowtransdate));
                                        $influencer_paid_share_amt = 0;

                                        $transactionvalue = $transaction_value[$i];
                                        $brand_transaction_value = $transaction_value[$i];
                                        $influencer_transaction_value = $transaction_value[$i];

                                        /*
                                        * For First Transaction (Brand)
                                        * Commission on First Transaction(Brand) > 0 and Not Empty
                                        * For Other Transaction (Brand)
                                        * Commission on Other Transaction(Brand) > 0 and Not Empty
                                        */

                                        if ($i == 0 && strlen($rowlead->transaction_date) > 0 && strlen($getcamp[0]->commission_on_first_transaction_brand) > 0 && $getcamp[0]->commission_on_first_transaction_brand > 0) {

                                            /*
                                            * Commission Type for First Transaction == 1 Then
                                            * Brand Transaction Value = First Transaction Value * Commission on First Transaction / 100
                                            * Commission Type for First Transaction != 1 Then
                                            * Brand Transaction Value = Commission on First Transaction
                                            */

                                            if ($getcamp[0]->commission_type_on_first_transaction == 1) {
                                                $brand_transaction_value = round(($transaction_value[$i] * $getcamp[0]->commission_on_first_transaction_brand) / 100, 2);
                                            } else {
                                                $brand_transaction_value = round($getcamp[0]->commission_on_first_transaction_brand, 2);
                                            }
                                        } else if (strlen($getcamp[0]->commission_on_other_transaction_brand) > 0 && $getcamp[0]->commission_on_other_transaction_brand > 0) {

                                            /*
                                            * Commission Type for Other Transaction == 1 Then
                                            * Brand Transaction Value = Other Transaction Value * Commission on Other Transaction / 100
                                            * Commission Type for Other Transaction != 1 Then
                                            * Brand Transaction Value = Commission on Other Transaction
                                            */

                                            if ($getcamp[0]->commission_type_on_other_transaction == 1) {
                                                $brand_transaction_value = round(($transaction_value[$i] * $getcamp[0]->commission_on_other_transaction_brand) / 100, 2);
                                            } else {
                                                $brand_transaction_value = round($getcamp[0]->commission_on_other_transaction_brand, 2);
                                            }
                                        }

                                        /*
                                        * For First Transaction (Influencer)
                                        * Commission on First Transaction(Influencer) > 0 and Not Empty
                                        * For Other Transaction (Influencer)
                                        * Commission on Other Transaction(Influencer) > 0 and Not Empty
                                        */

                                        if ($i == 0 && strlen($rowlead->transaction_date) > 0 && strlen($getcamp[0]->commission_on_first_transaction_influencer) > 0 && $getcamp[0]->commission_on_first_transaction_influencer > 0) {

                                            /*
                                            * Commission Type for First Transaction == 1 Then
                                            * Influencer Transaction Value = First Transaction Value * Commission on First Transaction / 100
                                            * Commission Type for First Transaction != 1 Then
                                            * Influencer Transaction Value = Commission on First Transaction
                                            */

                                            if ($getcamp[0]->commission_type_on_first_transaction == 1) {
                                                $influencer_transaction_value = round(($transaction_value[$i] * $getcamp[0]->commission_on_first_transaction_influencer) / 100, 2);
                                            } else {
                                                $influencer_transaction_value = round($getcamp[0]->commission_on_first_transaction_influencer, 2);
                                            }
                                        } else if (strlen($getcamp[0]->commission_on_other_transaction_influencer) > 0 && $getcamp[0]->commission_on_other_transaction_influencer > 0) {

                                            /*
                                            * Commission Type for Other Transaction == 1 Then
                                            * Influencer Transaction Value = First Transaction Value * Commission on Other Transaction / 100
                                            * Commission Type for Other Transaction != 1 Then
                                            * Influencer Transaction Value = Commission on Other Transaction
                                            */

                                            if ($getcamp[0]->commission_type_on_other_transaction == 1) {
                                                $influencer_transaction_value = round(($transaction_value[$i] * $getcamp[0]->commission_on_other_transaction_influencer) / 100, 2);
                                            } else {
                                                $influencer_transaction_value = round($getcamp[0]->commission_on_other_transaction_influencer, 2);
                                            }
                                        }

                                        // Influencer Total Brokerage Amount
                                        $influencer_total_brokerage_amt[$rowlead->lead_code][] = $influencer_transaction_value;

                                        // Brand Total Brokerage Amount
                                        $brand_total_brokerage_amt[$rowlead->lead_code][] = $brand_transaction_value;

                                        $total_brokerage_amt[$rowlead->lead_code][] = $transaction_value[$i];

                                        // Check For Transaction Value is not empty and not equal to 0
                                        if (strlen($transactionvalue) > 0 && $transactionvalue > 0) {
                                            $brokeragedata = array(
                                                'lead_code' => $rowlead->lead_code,
                                                'influencer_brokerage_amt' => $influencer_transaction_value,
                                                'brand_brokerage_amt' => $brand_transaction_value,
                                                'influencer_share_amt' => $influencer_paid_share_amt,
                                                'influencer_id' => $getSlug[0]->influencer_id,
                                                'slug_id' => $getSlug[0]->slug_id,
                                                'campaign_id' => $getcamp[0]->campaign_id,
                                                'brand_id' => $rowlead->brand_id,
                                                'updated_by' => $getSlug[0]->updated_by,
                                                'transaction_date' => date('Y-m-d', strtotime($rowtransdate)),
                                                'created_at' => date('Y-m-d H:i:s', strtotime($lead_timestamp)),
                                            );

                                            // Insert Data into Brokerage Table
                                            $insert_data = Brokerage::insert($brokeragedata);
                                        }
                                    }
                                    $i++;
                                }
                            }

                            // Check For Converted Lead
                            if (count($getLead) > 0 && $getLead[0]->lead_status == 'Converted') {

                                // Influencer Brokerage Amount
                                $influencer_paid_brokerage_amt = $getLead[0]->influencer_paid_brokerage_amt;

                                // Brand Brokerage Amount
                                $brand_paid_brokerage_amt = $getLead[0]->brand_paid_brokerage_amt;
                            }

                            // Total Brokerage Amount (Influencer)
                            $paidbrokerageamt = $influencer_paid_brokerage_amt + array_sum($influencer_total_brokerage_amt[$rowlead->lead_code]);

                            // Total Brokerage Amount (Brand)
                            $comppaidbrokerageamt = $brand_paid_brokerage_amt + array_sum($brand_total_brokerage_amt[$rowlead->lead_code]);

                            $updatedata = array('influencer_paid_brokerage_amt' => $paidbrokerageamt, 'brand_paid_brokerage_amt' => $comppaidbrokerageamt);

                            $whereclause = array('lead_code' => $rowlead->lead_code);

                            // Update Brokerage Amount in Lead Conversion Table
                            $update_lead_conversion = LeadConversion::where($whereclause)->update($updatedata);

                            $response['code'] = 1;
                            $response['message'] = 'Lead Conversion Updated Success';
                            $status = 200;
                        }

                        $wheretempclause = array('id' => $rowlead->id);

                        DB::enableQueryLog();

                        $delete_uploaded_lead = uploadleads::where($wheretempclause)->delete();
                    } else {
                        $updatedata = array('is_active' => 2, 'reason' => 'Slug not available </br>');

                        $update_lead = UploadLeads::where('id', '=', $rowlead->id)->update($updatedata);
                    }
                } else {
                    $updatedata = array('is_active' => 2, 'reason' => 'campaign name not available </br>');
                    $update_lead = UploadLeads::where('id', '=', $rowlead->id)->update($updatedata);

                    $response['status'] = false;
                    $response['message'] = 'Invalid Campaign Name';
                    $status = 404;
                }
            }
        } else {
            $response['status'] = false;
            $response['message'] = 'Empty Leads';
            $status = 404;
        }

        return response()->json($response, $status);
    }

    public function onboarding_lead(Request $request)
    {
        $response = array();

        $status = 200;

        if ($request->hasFile('onbaordlead_file')) {
            $file = $request->file('onbaordlead_file')->store('onboardleads');

            $upload = Excel::import(new UploadLeadTrackingImport(), $file);

            $response = [
                'status' => true,
                'message' => 'Onboard Leads Uploaded Successfully'
            ];
        } else {
            $status = 422;
            $response = [
                'status' => false,
                'message' => 'Please Upload File'
            ];
        }

        return response()->json($response, $status);
    }
}
