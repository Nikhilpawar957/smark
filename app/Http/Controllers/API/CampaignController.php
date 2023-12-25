<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

                        $campaign_kpi = DB::table('campaign_kpi')->select('*')->where('campaign_id', '=', $request->campaigns_id)->whereNull('deleted_at')
                            ->get();

                        $images = [];
                        $videos = [];

                        foreach ($campaign_assets as $asset) {
                            $arr = [];
                            if ($asset->asset_type == 0) {
                                $arr['id'] = $asset->id;
                                $arr['path'] = url($asset->path);
                                $data['logo'] = $arr;
                            } else if ($asset->asset_type == 1) {
                                $arr['id'] = $asset->id;
                                $arr['path'] = url($asset->path);
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

                    break;
                case 'delete':
                    $request->validate([
                        'campaign_id' => "exists:campaigns,id",
                    ], [
                        'campaign_id.required' => "Please enter valid campaign id",
                    ]);



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
