<?php

namespace App\Imports;

use App\Models\UploadLeads;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Facades\Auth;

class UploadLeadsImport implements ToCollection, WithHeadingRow, WithValidation
{
    protected $brand_id;

    public function __construct($brand_id)
    {
        $this->brand_id = $brand_id;
    }

    private $rows = 0;

    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        //dd($this->agentId);
        $canImport = true;

        if ($canImport) {
            foreach ($rows as $row) {

                $reason = '';
                $statusCode = 1;

                if (strlen($row['lead_identifier']) == 0) {
                    $reason .= 'Lead Code is Empty';
                    $statusCode = 2;
                }

                if (strlen($row['timestamp']) == 0) {
                    $statusCode = 2;
                    $reason .= 'Timestamp Empty </br>';
                }else{
                    if (strtotime($row['timestamp']) == false) {
                        $statusCode = 2;
                        $reason .= 'Invalid Timestamp </br>';
                    }
                }

                if (strlen($row['lead_status']) == 0) {
                    $statusCode = 2;
                    $reason .= 'Lead Status Empty </br>';
                } else {
                    if ($row['lead_status'] != 'New' && $row['lead_status'] != 'Duplicate') {
                        $statusCode = 2;
                        $reason .= 'Lead Status is Incorrect </br>';
                    }
                }

                if (strlen($row['acquisition_status']) == 0) {
					$statusCode = 2;
					$reason .= 'Acquisition Status Empty </br>';
				} else {
					if ($row['acquisition_status'] != '1' && $row['acquisition_status'] != '0') {
						$statusCode = 2;
						$reason .= 'Acquisition Status Invalid </br>';
					}
				}

                if (strlen($row['smarkerz_id']) == 0) {
					$statusCode = 2;
					$reason .= 'Smarkerz Id Empty </br>';
				}
				if (strlen($row['campaign_name']) == 0) {
					$statusCode = 2;
					$reason .= 'Campaign Name Empty </br>';
				}

				if (strlen($row['brand_name']) == 0) {
					$statusCode = 2;
					$reason .= 'Brand Name Empty </br>';
				}

                UploadLeads::create([
                    "lead_code" => @$row['lead_identifier'],
                    "lead_name" => @$row['lead_name'],
                    "mobile_no" => @$row['mobile_number'],
                    "email" => @$row['email'],
                    "lead_timestamp" => date('Y-m-d H:i:s', strtotime(@$row['timestamp'])),
                    "city" => @$row['city'],
                    "lead_status" => @$row['lead_status'],
                    "lead_commission" => @$row['lead_commission_value'],
                    "acquisition_status" => @$row['acquisition_status'],
                    "acquisition_timestamp" => date('Y-m-d H:i:s', strtotime(@$row['acquisition_timestamp'])),
                    "acquisition_commission_value" => @$row['acquisition_commission_value'],
                    "customer_code" => @$row['customer_code'],
                    "transaction_status" => @$row['first_transaction_status'],
                    "transaction_date" => date('Y-m-d H:i:s', strtotime(@$row['first_transaction_date'])),
                    "transaction_value" => @$row['first_transaction_value'],
                    "transaction_count_minus_first" => @$row['transaction_counts_minus_first'],
                    "transaction_dates_minus_first" => @$row['transaction_dates_minus_first'],
                    "transaction_values_minus_first" => @$row['transaction_values_minus_first'],
                    "slug" => @$row['smarkerz_id'],
                    "utm_source" => @$row['utm_source'],
                    "utm_medium" => @$row['utm_medium'],
                    "utm_campaign" => @$row['utm_campaign'],
                    "utm_term" => @$row['utm_term'],
                    "utm_content" => @$row['utm_content'],
                    "utm" => @$row['utm'],
                    "utm_id" => @$row['utm_id'],
                    "campaign_name" => @$row['campaign_name'],
                    "brand_name" => @$row['brand_name'],
                    "brand_id" => $this->brand_id,
                    "is_active" => $statusCode,
                    "reason" => $reason,
                    "updated_by" => Auth::guard('admin')->user()->id,
                ]);
            }
        }
    }

    public function rules(): array
    {
        return array(
            '*.lead_identifier' => ['required'],
            '*.timestamp' => ['required', 'date'],
            '*.lead_status' => ['required'],
            '*.acquisition_status' => ['required'],
            '*.smarkerz_id' => ['required'],
            '*.campaign_name' => ['required'],
            '*.brand_name' => ['required'],
        );
    }
}
