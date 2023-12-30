<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CampaignController extends Controller
{
    public function campaigns(Request $request)
    {
        $response = array();
        if ($request->action) {
            switch ($request->action) {
                case 'get':
                    if ($request->campaign_id) {
                        $request->validate([
                            'campaign_id' => "exists:campaigns,id",
                        ], [
                            'campaign_id.required' => "Please enter valid campaign id",
                        ]);

                        $campaign = Campaign::find($request->campaign_id);

                        $campaign_assets = DB::table('campaign_assets')->select('*')
                            ->where('campaign_id', '=', $request->campaigns_id)
                            ->whereNull('deleted_at')
                            ->get();

                        $campaign_kpi = DB::table('campaign_kpis')->select('*')->where('campaign_id', '=', $request->campaigns_id)->whereNull('deleted_at')
                            ->get();

                        $images = [];
                        $videos = [];

                        foreach ($campaign_assets as $asset) {
                            $arr = [];
                            if ($asset->asset_type == 0) {
                                $arr['id'] = $asset->id;
                                $arr['path'] = url('storage/' . $asset->path);
                                $data['logo'] = $arr;
                            } else if ($asset->asset_type == 1) {
                                $arr['id'] = $asset->id;
                                $arr['path'] = url('storage/' . $asset->path);
                                array_push($images, $arr);
                            } else if ($asset->asset_type == 2) {
                                array_push($videos, $asset->path);
                            }
                        }

                        $data = array();

                        if (!empty($campaign)) {
                            $data['campaign'] = $campaign;

                            if (!empty($images)) {
                                $data['images'] = $images;
                            }
                            if (!empty($videos)) {
                                $data['videos'] = $videos;
                            }
                            if (!empty($campaign_kpi)) {
                                $data['campaign_kpi'] = $campaign_kpi;
                            }

                            $response = [
                                'status' => true,
                                'message' => 'Campaign Found',
                                'data' => $data
                            ];
                        } else {
                            $response = [
                                'status' => true,
                                'message' => 'Campaign Not Found',
                                'data' => []
                            ];
                        }
                    } else {
                        $recordsperpage = 5;
                        $start_limit = 0;

                        if ($request->pageno) {
                            if ($request->recordsperpage)
                                $recordsperpage = $request->recordsperpage;
                            $start_limit = ($request->pageno - 1) * $recordsperpage;
                        }

                        $campaigns = Campaign::join('campaign_types', 'campaign_types.id', '=', 'campaigns.campaign_type')
                            ->selectRaw('campaigns.status,campaigns.campaign_name,campaigns.id,campaigns.campaign_type,campaigns.offer_type,campaign_types.type,campaigns.created_at,campaigns.end_date')
                            ->orderBY('campaigns.created_at')->offset($start_limit)->limit($recordsperpage)
                            ->get();

                        foreach ($campaigns as $campaign) {
                            $logo = DB::table('campaign_assets')->select('path')->where('campaign_id', '=', $campaign->id)->where('asset_type', '=', '0')->whereNull('deleted_at')
                                ->get();

                            if (count($logo) > 0) {
                                $url = asset($logo[0]->path);
                                $campaign['logo'] = $url;
                            } else {
                                $campaign['logo'] = null;
                            }
                        }

                        $response = [
                            'status' => true,
                            'message' => 'Campaigns Found',
                            'data' => $campaigns
                        ];
                    }

                    break;
                case 'store':
                    switch ($request->step) {
                        case 0:
                            $request->validate([
                                'campaign_name' => 'required|min:3',
                                'campaign_type' => 'required|exists:campaign_types,id',
                                'brand_id' => 'required|exists:brands,id',
                                'tag_id' => 'required|exists:tags,id',
                                'end_date' => 'required|date',
                                'channels' => 'required',
                            ]);

                            if ($request->filled('campaign_id')) {
                                $request->validate([
                                    'campaign_id' => 'exists:campaigns,id',
                                ]);

                                $campaign = Campaign::find($request->campaign_id);

                                $result = "Updated";
                            } else {
                                $campaign = new Campaign();
                                $result = "Added";
                            }

                            // Default Data
                            $campaign->campaign_name = $request->campaign_name;
                            $campaign->campaign_type = $request->campaign_type;
                            $campaign->brand_id = $request->brand_id;
                            $campaign->tag_id = $request->tag_id;
                            $campaign->end_date = date('Y-m-d', strtotime($request->end_date));
                            $campaign->offer_type = $request->offer_type;
                            $campaign->brand_tags = $request->brand_tags;
                            $campaign->hash_tags = $request->hash_tags;
                            $campaign->influencer_campaign_brief = $request->influencer_campaign_brief;
                            $campaign->influencer_campaign_kpi = $request->influencer_campaign_kpi;
                            $campaign->influencer_campaign_tc = $request->influencer_campaign_tc;
                            $campaign->brand_campaign_brief = $request->brand_campaign_brief;
                            $campaign->brand_campaign_kpi = $request->brand_campaign_kpi;
                            $campaign->brand_campaign_tc = $request->brand_campaign_tc;
                            $campaign->updated_by = Auth::guard('admin')->user()->id;

                            // Peformance Campaign Data
                            if ($request->campaign_type == 1) {
                                $campaign->channels = $request->channels;
                                $campaign->influencer_payout_option = $request->influencer_payout_option;
                                $campaign->influencer_payout_value = $request->influencer_payout_value;
                                $campaign->influencer_commission_per_transaction = $request->influencer_commission_per_transaction;
                                $campaign->brand_payout_option = $request->brand_payout_option;
                                $campaign->brand_payout_value = $request->brand_payout_value;
                                $campaign->brand_commission_per_transaction = $request->brand_commission_per_transaction;
                            }

                            // Barter Campaign Data
                            if ($request->campaign_type == 2) {
                                $campaign->channels = implode(",", $request->channels);
                                $campaign->platform_mandatory = $request->platform_mandatory;
                                $campaign->media_approval = $request->media_approval;
                                $campaign->deliverable_notification = (($request->deliverable_notification == 'on') ? '1' : '0');
                                $campaign->send_notification_on = $request->send_notification_on;
                                $campaign->brand_maximum_payout = $request->brand_maximum_payout;
                                $campaign->influencer_maximum_payout = $request->influencer_maximum_payout;
                            }

                            // Branding Campaign Data
                            if ($request->campaign_type == 3) {
                                $campaign->channels = implode(',', $request->channels);
                                $campaign->platform_mandatory = $request->platform_mandatory;
                                $campaign->media_approval = $request->media_approval;
                                $campaign->deliverable_notification = (($request->deliverable_notification == 'on') ? '1' : '0');
                                $campaign->send_notification_on = $request->send_notification_on;
                                $campaign->brand_product_cost = $request->brand_product_cost;
                                $campaign->brand_commission_per_sale = $request->brand_commission_per_sale;
                                if (isset($request->brand_campaign_payout))
                                    $campaign->brand_campaign_payout = implode(',', $request->brand_campaign_payout);
                                $campaign->influencer_product_cost = $request->influencer_product_cost;
                                $campaign->influencer_commission_per_sale = $request->influencer_commission_per_sale;
                                if (isset($request->influencer_campaign_payout))
                                    $campaign->influencer_campaign_payout = implode(',', $request->influencer_campaign_payout);
                            }

                            $save_campaign = $campaign->save();

                            if ($request->hasFile('offercard')) {
                                $file = $request->file('offercard');
                                $fileName = time() . '_' . $file->getClientOriginalName();
                                $destination_path = 'campaigns/offercard/';
                                Storage::disk('public')->put($destination_path . $fileName, (string) file_get_contents($file));

                                $campaign_offer_cards = DB::table('campaign_assets')->where('campaign_id', '=', $campaign->id)->where('asset_type', '=', '3')->get();

                                if (!empty($campaign_offer_cards) && count($campaign_offer_cards) > 0) {

                                    $path = $campaign_offer_cards[0]->path;

                                    if (Storage::disk('public')->exists($path))
                                        Storage::disk('public')->delete($path);

                                    DB::table('campaign_assets')->where('campaign_id', '=', $campaign->id)->where('asset_type', '=', '3')->update([
                                        'path' => $destination_path . $fileName,
                                        'updated_by' => Auth::guard('admin')->user()->id,
                                        'updated_at' => Carbon::now(),
                                    ]);
                                } else {
                                    DB::table('campaign_assets')->insert(
                                        [
                                            'campaign_id' => $campaign->id,
                                            'path' => $destination_path . $fileName,
                                            'asset_type' => '3',
                                            'updated_by' => Auth::guard('admin')->user()->id,
                                            'created_at' => Carbon::now(),
                                            'updated_at' => Carbon::now(),
                                        ]
                                    );
                                }
                            }

                            if ($save_campaign) {
                                $response = [
                                    'status' => true,
                                    'message' => 'Campaign ' . $result,
                                    'data' => $campaign->id
                                ];
                            } else {
                                $response = [
                                    'status' => false,
                                    'message' => 'Campaign Not ' . $result
                                ];
                            }

                            break;
                        case 1:
                            $request->validate([
                                'campaign_id' => 'exists:campaigns,id',
                                'logofile' => "mimes:jpeg,jpg,png|max:1000",
                                'campaignimages.*' => "mimes:jpeg,jpg,png|max:1000",
                                'campaigndocuments.*' => "mimes:pdf,docs,docx,doc|max:1000",
                            ]);

                            $campaign = Campaign::find($request->campaign_id);

                            // Logo
                            if ($request->hasFile('logofile')) {
                                $file = $request->file('logofile');
                                $fileName = time() . '_' . $file->getClientOriginalName();
                                $destination_path = 'campaigns/logo/';
                                Storage::disk('public')->put($destination_path . $fileName, (string) file_get_contents($file));

                                $campaign_logo = DB::table('campaign_assets')->where('campaign_id', '=', $campaign->id)->where('asset_type', '=', '0')->get();

                                if (!empty($campaign_logo) && count($campaign_logo) > 0) {

                                    $path = $campaign_logo[0]->path;

                                    if (Storage::disk('public')->exists($path))
                                        Storage::disk('public')->delete($path);

                                    DB::table('campaign_assets')->where('campaign_id', '=', $campaign->id)->where('asset_type', '=', '0')->update([
                                        'path' => $destination_path . $fileName,
                                        'updated_by' => Auth::guard('admin')->user()->id,
                                        'updated_at' => Carbon::now(),
                                    ]);
                                } else {
                                    DB::table('campaign_assets')->insert(
                                        [
                                            'campaign_id' => $campaign->id,
                                            'path' => $destination_path . $fileName,
                                            'asset_type' => '0',
                                            'updated_by' => Auth::guard('admin')->user()->id,
                                            'created_at' => Carbon::now(),
                                            'updated_at' => Carbon::now(),
                                        ]
                                    );
                                }
                            }

                            // Images
                            if ($request->hasFile('campaignimages')) {
                                foreach ($request->file('campaignimages') as $file) {
                                    $fileName = time() . '_' . $file->getClientOriginalName();
                                    $destination_path = 'campaigns/images/';
                                    Storage::disk('public')->put($destination_path . $fileName, (string) file_get_contents($file));

                                    DB::table('campaign_assets')->insert(
                                        [
                                            'campaign_id' => $campaign->id,
                                            'path' => $destination_path . $fileName,
                                            'asset_type' => '1',
                                            'updated_by' => Auth::guard('admin')->user()->id,
                                            'created_at' => Carbon::now(),
                                            'updated_at' => Carbon::now(),
                                        ]
                                    );
                                }
                            }

                            // Documents
                            if ($request->hasFile('campaigndocuments')) {
                                foreach ($request->file('campaigndocuments') as $file) {
                                    $fileName = time() . '_' . $file->getClientOriginalName();
                                    $destination_path = 'campaigns/documents/';
                                    Storage::disk('public')->put($destination_path . $fileName, (string) file_get_contents($file));

                                    DB::table('campaign_assets')->insert(
                                        [
                                            'campaign_id' => $campaign->id,
                                            'path' => $destination_path . $fileName,
                                            'asset_type' => '4',
                                            'updated_by' => Auth::guard('admin')->user()->id,
                                            'created_at' => Carbon::now(),
                                            'updated_at' => Carbon::now(),
                                        ]
                                    );
                                }
                            }

                            DB::table('campaign_assets')->where('campaign_id', '=', $campaign->id)->where('asset_type', '=', '2')->delete();

                            // Videos
                            if ($request->filled('campaignvideos')) {
                                $videos = explode(';', $request->campaignvideos);

                                foreach ($videos as $url) {
                                    DB::table('campaign_assets')->insert([
                                        'campaign_id' => $campaign->id,
                                        'path' => $url,
                                        'asset_type' => '2',
                                        'updated_by' => Auth::guard('admin')->user()->id,
                                        'created_at' => Carbon::now(),
                                        'updated_at' => Carbon::now(),
                                    ]);
                                }
                            }

                            $response = [
                                'status' => true,
                                'message' => 'Campaign Assets Added',
                                'data' => $campaign->id
                            ];

                            break;
                        case 2:

                            $request->validate([
                                'campaign_id' => 'exists:campaigns,id',
                                'landing_page_url' => "required",
                            ]);

                            $campaign = Campaign::find($request->campaign_id);

                            $campaign->landing_page_url = $request->landing_page_url;
                            $campaign->utm = $request->utm;
                            $campaign->utm_tag = $request->utm_tag;
                            $campaign->utm_id = $request->utm_id;
                            $campaign->utm_source = $request->utm_source;
                            $campaign->utm_content = $request->utm_content;
                            $campaign->utm_medium = $request->utm_medium;
                            $campaign->utm_campaign = $request->utm_campaign;
                            $campaign->utm_term = $request->utm_term;

                            $save_campaign = $campaign->save();

                            if ($save_campaign) {
                                $response = [
                                    'status' => true,
                                    'message' => 'Campaign Updated',
                                    'data' => $campaign->id
                                ];
                            } else {
                                $response = [
                                    'status' => false,
                                    'message' => 'Campaign Not Updated'
                                ];
                            }

                            break;
                        case 3:

                            $request->validate([
                                'campaign_id' => 'exists:campaigns,id',
                            ]);

                            $campaign = Campaign::find($request->campaign_id);

                            $campaign->campaign_visibility = $request->campaign_visibility;

                            $save_campaign = $campaign->save();

                            if ($save_campaign) {
                                $response = [
                                    'status' => true,
                                    'message' => 'Campaign Updated',
                                    'data' => $campaign->id
                                ];
                            } else {
                                $response = [
                                    'status' => false,
                                    'message' => 'Campaign Not Updated'
                                ];
                            }

                            break;
                        case 4:

                            $request->validate([
                                'campaign_id' => 'exists:campaigns,id',
                            ]);

                            $campaign = Campaign::find($request->campaign_id);



                            $save_campaign = $campaign->save();

                            if ($save_campaign) {
                                $response = [
                                    'status' => true,
                                    'message' => 'Campaign Updated',
                                    'data' => $campaign->id
                                ];
                            } else {
                                $response = [
                                    'status' => false,
                                    'message' => 'Campaign Not Updated'
                                ];
                            }

                            break;

                        default:
                            $response = [
                                'status' => false,
                                'message' => 'Invalid Step Request'
                            ];
                            break;
                    }
                    break;
                case 'delete':
                    switch ($request->type) {
                        case 'delete_campaign':

                            $request->validate([
                                'campaign_id' => "exists:campaigns,id",
                            ], [
                                'campaign_id.required' => "Please enter valid campaign id",
                            ]);

                            $campaign = Campaign::find($request->campaign_id);

                            // Get Campaign Assets
                            $campaign_assets = DB::table('campaign_assets')->select('path')->where('campaign_id', '=', $campaign->id)->get()->toArray();

                            // Delete Assets
                            if (!empty($campaign_assets)) {
                                foreach ($campaign_assets as $key => $asset) {
                                    if ($asset['path'] != null && Storage::disk('public')->exists($asset['path'])) {
                                        Storage::disk('public')->delete($asset['path']);
                                    }
                                }
                            }

                            // Delete Asset Records from DB
                            $campaign_assets = DB::table('campaign_assets')->where('campaign_id', '=', $campaign->id)->delete();

                            // Remove Campaign KPI's
                            $campaign_kpis = DB::table('campaign_kpis')->where('campaign_id', '=', $campaign->id)->delete();

                            // Delete Campaign
                            $delete_campaign = $campaign->delete();

                            if ($delete_campaign) {
                                $response = [
                                    'status' => true,
                                    'message' => 'Campaign Deleted'
                                ];
                            } else {
                                $response = [
                                    'status' => false,
                                    'message' => 'Campaign Not Deleted'
                                ];
                            }

                            break;
                        case 'delete_campaign_asset':
                            $request->validate([
                                'asset_id' => 'required|exists:campaign_assets,id',
                            ]);

                            // Get Campaign Asset
                            $campaign_asset = DB::table('campaign_assets')->find($request->asset_id);

                            // Delete Campaign Asset
                            if (!empty($campaign_asset) && Storage::disk('public')->exists($campaign_asset->path)) {
                                Storage::disk('public')->delete($campaign_asset->path);
                            }

                            // Delete Campaign Asset Record from DB
                            $delete_asset_record = DB::table('campaign_assets')->delete($request->asset_id);

                            if ($delete_asset_record) {
                                $response = [
                                    'status' => true,
                                    'message' => 'Campaign Asset Deleted'
                                ];
                            } else {
                                $response = [
                                    'status' => false,
                                    'message' => 'Campaign Asset Not Deleted'
                                ];
                            }


                            break;
                        case 'delete_campaign_kpi':
                            $request->validate([
                                'kpi_id' => 'required|exists:campaign_kpis,id'
                            ]);

                            $delete_kpi = DB::table('campaign_kpis')->delete($request->kpi_id);

                            if ($delete_kpi) {
                                $response = [
                                    'status' => true,
                                    'message' => 'KPI Deleted'
                                ];
                            } else {
                                $response = [
                                    'status' => false,
                                    'message' => 'KPI Not Deleted'
                                ];
                            }

                            break;

                        default:
                            $response = [
                                'status' => false,
                                'message' => 'Invalid Type Request'
                            ];
                            break;
                    }

                    break;
                case 'change_status':
                    $request->validate([
                        'campaign_id' => "exists:campaigns,id",
                        'status' => "required",
                    ], [
                        'campaign_id.required' => "Please enter valid campaign id",
                    ]);

                    $campaign = Campaign::find($request->campaign_id);

                    $campaign->status = $request->status;
                    $campaign->updated_by = Auth::guard('admin')->user()->id;
                    $update_status = $campaign->save();

                    if ($update_status) {
                        $response = [
                            'status' => true,
                            'message' => 'Status Updated'
                        ];
                    } else {
                        $response = [
                            'status' => false,
                            'message' => 'Status Not Updated'
                        ];
                    }

                    break;

                default:
                    $response = [
                        'status' => false,
                        'message' => 'Invalid Action'
                    ];
                    break;
            }
        } else {
            $response = [
                'status' => false,
                'message' => 'Please Specify Action to Perform',
            ];
        }
        return response()->json($response);
    }
}
