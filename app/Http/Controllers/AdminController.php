<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\API\AuthController;
use App\Models\Campaign;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // Login Handler
    public function login_handler(Request $request)
    {

        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:5',
            ],
            [
                'email.required' => "Please enter email.",
                'password.required' => "Please enter password.",
            ]
        );

        $response = (new AuthController)->login($request);

        //dd($response);

        $data = json_decode($response->getContent(), true);

        if ($data['status']) {
            $role = session()->get('role');
            if ($role == 'admin') {
                if (request()->returnUrl != null) {
                    return redirect()->to(request()->returnUrl);
                } else {
                    return redirect()->route('admin.dashboard');
                }
            } else if ($role == 'brand') {
                if (request()->returnUrl != null) {
                    return redirect()->to(request()->returnUrl);
                } else {
                    return redirect()->route('brand.dashboard');
                }
            } else if ($role == 'influencer') {
                if (request()->returnUrl != null) {
                    return redirect()->to(request()->returnUrl);
                } else {
                    return redirect()->route('influencer.dashboard');
                }
            }
        } else {
            session()->flash('fail', $data['error']);
            return redirect()->route('admin.login');
        }
    }

    // Logout
    public function logout(Request $request)
    {
        $logout = (new AuthController)->logout($request);

        $data = json_decode($logout->getContent(), true);

        if ($data['status']) {
            $role = $data['role'];
            session()->flash('success', 'You have been logged out.');
            if ($role == 'admin') {
                return redirect()->route('admin.login');
            } else if ($role == 'brand') {
                return redirect()->route('brand.login');
            } else if ($role == 'influencer') {
                return redirect()->route('influencer.login');
            }
        }
    }

    // Add Performance Campaign
    public function add_performance_campaign(Request $request)
    {
        $data = [
            'pageTitle' => 'Add New Performance Campaign',
        ];

        return view('admin.pages.add-performance-campaign', $data);
    }

    // Add Barter Campaign
    public function add_barter_campaign(Request $request)
    {
        $data = [
            'pageTitle' => 'Add New Barter Campaign',
        ];

        return view('admin.pages.add-barter-campaign', $data);
    }

    // Add Branding Campaign
    public function add_branding_campaign(Request $request)
    {
        $data = [
            'pageTitle' => 'Add New Branding Campaign',
        ];

        return view('admin.pages.add-branding-campaign', $data);
    }

    // Edit Campaign (Performance, Barter, Branding Campaign)
    public function edit_campaign(Request $request)
    {
        if (!$request->campaign_id) {
            abort('404');
        }

        $campaign = Campaign::find($request->campaign_id);

        $data = [
            'pageTitle' => 'Edit Campaign',
            'campaign' => $campaign,
        ];

        switch ($campaign->campaign_type) {
            case 1:
                $view = 'admin.pages.add-performance-campaign';
                break;
            case 2:
                $view = 'admin.pages.add-barter-campaign';
                break;
            case 3:
                $view = 'admin.pages.add-branding-campaign';
                break;

            default:
                abort(404);
                break;
        }

        return view($view, $data);
    }

    // Get Tag Data in Datatable
    public function getTags(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('tags')
                ->orderByDesc('id')
                ->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<div class="dropdown"><a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="javascript:void(0);" role="button" data-toggle="dropdown"><i class="dw dw-more"></i></a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"><a class="dropdown-item" onclick="return editTag(' . $row->id . ');" href="javascript:void(0);"><i class="dw dw-edit2"></i> Edit</a>';
                    if ($row->status == 1) {
                        $actionBtn .= '<a class="dropdown-item" onclick="return changeStatus(' . $row->id . ',0);" href="javascript:void(0);"><i class="ti ti-na"></i> Deactivate</a>';
                    } else {
                        $actionBtn .= '<a class="dropdown-item" onclick="return changeStatus(' . $row->id . ',1);" href="javascript:void(0);"><i class="ti ti-check-box"></i> Activate</a>';
                    }
                    $actionBtn .= '</div></div>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    // Get Bank Details Data in Datatable
    public function getBankDetailsList(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('bank_details')
                ->orderByDesc('id');

            if ($request->filled('date_range')) {

                $date_range = $request->date_range;

                $dates = explode(' - ', $date_range);

                $start_date = $dates[0];
                $end_date = $dates[1];


                $data = $data->whereDate('bank_details.created_at', '>=', $start_date)->whereDate('bank_details.created_at', '<=', $end_date);
            }

            if ($request->filled('status')) {
                $data = $data->where('status', '=', (int)$request->status);
            }

            $data = $data->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<div class="dropdown">
                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="javascript:void(0);" role="button" data-toggle="dropdown">
                        <i class="dw dw-more"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">';

                    if ($row->status == 0) {
                        $actionBtn .= '<a class="dropdown-item" href="javascript:void(0);" onclick="return changeStatus(' . $row->id . ',1);"><i class="dw dw-checked"></i> Approve</a>
                        <a class="dropdown-item" href="javascript:void(0);"  onclick="return changeStatus(' . $row->id . ',2);"><i class="fa fa-minus-circle"></i> Decline</a>
                        ';
                    } else if ($row->status == 1) {
                        $actionBtn .= '
                        <a class="dropdown-item" href="javascript:void(0);"  onclick="return changeStatus(' . $row->id . ',2);"><i class="fa fa-minus-circle"></i> Decline</a>';
                    } else if ($row->status == 2) {
                        $actionBtn .= '<a class="dropdown-item" href="javascript:void(0);" onclick="return changeStatus(' . $row->id . ',1);"><i class="dw dw-checked"></i> Approve</a>';
                    }

                    $actionBtn .= '<a class="dropdown-item" href="javascript:void(0);"  onclick="return deleteBankDetails(' . $row->id . ');"><i class="dw dw-delete-3"></i> Delete</a>';

                    $actionBtn .= '</div>
                </div>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    // Get Slugs Data in Datatable
    public function getSlugsList(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('slugs')
                ->selectRaw("slugs.*,campaigns.campaign_name,brands.company_name,influencers.first_name || ' ' || influencers.last_name AS influencer_name, admins.first_name || ' ' || admins.last_name AS lead_owner, TO_CHAR(slugs.created_at, 'FMMonth DD, YYYY') AS created_at")
                ->leftJoin('campaigns', 'slugs.campaign_id', '=', 'campaigns.id')
                ->leftJoin('brands', 'slugs.brand_id', '=', 'brands.id')
                ->leftJoin('influencers', 'slugs.influencer_id', '=', 'influencers.id')
                ->leftJoin('admins', 'slugs.updated_by', '=', 'admins.id')
                ->orderByDesc('id');

            if ($request->filled('date_range')) {

                $date_range = $request->date_range;

                $dates = explode(' - ', $date_range);

                $start_date = $dates[0];
                $end_date = $dates[1];


                $data = $data->whereDate('slugs.created_at', '>=', $start_date)->whereDate('slugs.created_at', '<=', $end_date);
            }

            $data = $data->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
    }

    // Get Enquiry Data in Datatable
    public function getEnquiryList(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('enquiries')->selectRaw("*,TO_CHAR(enquiries.created_at, 'FMMonth DD, YYYY') AS created_at")->orderByDesc('id')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
    }

    // Get Brands Data in Datatable
    public function getBrandsList(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('brands')
                ->selectRaw("*,TO_CHAR(brands.created_at, 'FMMonth DD, YYYY') AS created_at")
                ->whereNull('brands.deleted_at')
                ->orderByDesc('brands.id')
                ->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<div class="dropdown">
                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="javascript:void(0);" role="button" data-toggle="dropdown">
                        <i class="dw dw-more"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">';

                    if ($row->status == 0) {
                        $actionBtn .= '<a class="dropdown-item" href="javascript:void(0);" onclick="return changeStatus(' . $row->id . ',1);"><i class="dw dw-checked"></i> Approve</a>
                        <a class="dropdown-item" href="javascript:void(0);"  onclick="return changeStatus(' . $row->id . ',2);"><i class="fa fa-minus-circle"></i> Decline</a>
                        <a class="dropdown-item" href="javascript:void(0);"><i class="dw dw-tag"></i> Tag</a>
                        ';
                    } else if ($row->status == 1) {
                        $actionBtn .= '
                        <a class="dropdown-item" href="javascript:void(0);"  onclick="return changeStatus(' . $row->id . ',2);"><i class="fa fa-minus-circle"></i> Decline</a>
                        <a class="dropdown-item" href="javascript:void(0);"><i class="dw dw-tag"></i> Tag</a>';
                    } else if ($row->status == 2) {
                        $actionBtn .= '<a class="dropdown-item" href="javascript:void(0);" onclick="return changeStatus(' . $row->id . ',1);"><i class="dw dw-checked"></i> Approve</a>';
                    }

                    $actionBtn .= '<a class="dropdown-item" href="javascript:void(0);"><i class="dw dw-user"></i> Profile</a><a class="dropdown-item" href="javascript:void(0);"  onclick="return deleteBrand(' . $row->id . ');"><i class="dw dw-delete-3"></i> Delete</a>';
                    $actionBtn .= '</div>
                </div>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    // Get Campaigns Data in Datatable
    public function getCampaignsList(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('campaigns')
                ->selectRaw("id,campaign_name,campaign_type,offer_type,status,TO_CHAR(created_at, 'FMMonth DD, YYYY') AS created_at,TO_CHAR(end_date, 'FMMonth DD, YYYY') AS end_date")
                ->whereNull('deleted_at')
                ->orderByDesc('id');

            if ($request->filled('brand_id')) {
                $data = $data->where('brand_id', '=', (int)$request->brand_id);
            }

            $data = $data->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<div class="dropdown">
                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="javascript:void(0);" role="button" data-toggle="dropdown">
                    <i class="dw dw-more"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">';

                    if ($row->status == 2 || $row->status == 3) {
                        $actionBtn .= '
                        <a class="dropdown-item" href="javascript:void(0);" onclick="return changeStatus(' . $row->id . ',1);"><i class="dw dw-checked"></i> Approve</a>
                        <a class="dropdown-item" href="javascript:void(0);"  onclick="return changeStatus(' . $row->id . ',4);"><i class="fa fa-minus-circle"></i> Decline</a>
                    ';
                    } else if ($row->status == 1) {
                        $actionBtn .= '
                        <a class="dropdown-item" href="javascript:void(0);"  onclick="return changeStatus(' . $row->id . ',4);"><i class="fa fa-minus-circle"></i> Decline</a>
                        <a class="dropdown-item" href="javascript:void(0);" onclick="return changeStatus(' . $row->id . ',3);"><i class="dw dw-stop"></i></i> Stop</a>';
                    } else if ($row->status == 4) {
                        $actionBtn .= '
                        <a class="dropdown-item" href="javascript:void(0);" onclick="return changeStatus(' . $row->id . ',1);"><i class="dw dw-checked"></i> Approve</a>';
                    }

                    $actionBtn .= '
                    <a class="dropdown-item" href="' . route('admin.edit-campaign', ['campaign_id' => $row->id]) . '"><i class="dw dw-pencil"></i> Edit Campaign</a>
                    <a class="dropdown-item" href="javascript:void(0);" ><i class="dw dw-image"></i> Asset Management</a>';
                    $actionBtn .= '</div>
            </div>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    // Get Members Data in Datatable
    public function getMemberList(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('admins')
                ->selectRaw("admins.id,admins.first_name || ' ' || admins.last_name AS admin_name,username,status,email,mobile_no,roles.name AS role_name")
                ->leftJoin('roles', 'admins.role', '=', 'roles.id')
                ->where('role', '!=', 0)
                ->whereNull('deleted_at');


            if ($request->filled('created_by')) {
                $data = $data->where('created_by', '=', $request->created_by);
            }

            if ($request->filled('status')) {
                $data = $data->where('status', '=', $request->status);
            }

            $data = $data->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '
                    <div class="dropdown">
                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="javascript:void(0);" role="button" data-toggle="dropdown">
                            <i class="dw dw-more"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">';

                    if ($row->status == 1) {
                        $actionBtn .= '
                            <a class="dropdown-item" href="javascript:void(0);"  onclick="return changeStatus(' . $row->id . ',0);"><i class="fa fa-minus-circle"></i> Deactivate</a>';
                    } else if ($row->status == 0) {
                        $actionBtn .= '
                            <a class="dropdown-item" href="javascript:void(0);" onclick="return changeStatus(' . $row->id . ',1);"><i class="dw dw-checked"></i> Activate</a>';
                    }

                    $actionBtn .= '
                            <a class="dropdown-item" href="#"><i class="dw dw-pencil"></i> Edit Details</a>
                            <a class="dropdown-item" href="javascript:void(0);" ><i class="dw dw-image"></i> Transfer Influencers</a>';

                    $actionBtn .= '
                        </div>
                    </div>';

                    return $actionBtn;
                })
                ->make(true);
        }
    }

    // Get Influencers Data in Datatable
    public function getInfluencerList(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('influencers')
                ->selectRaw("influencers.*,influencers.first_name || ' ' || influencers.last_name AS influencer_name,tags.name AS tag_name,TO_CHAR(influencers.created_at, 'FMMonth DD, YYYY') AS created_at")
                ->leftJoin('tags', 'influencers.tag', '=', 'tags.id')
                ->whereNull('influencers.deleted_at')
                ->orderByDesc('influencers.id');

            // Date Range Filter
            if ($request->filled('date_range')) {

                $date_range = $request->date_range;

                $dates = explode(' - ', $date_range);

                $start_date = $dates[0];
                $end_date = $dates[1];

                $data = $data->whereDate('influencers.created_at', '>=', $start_date)->whereDate('influencers.created_at', '<=', $end_date);
            }

            // Campaign Filter
            if ($request->filled('campaign_id')) {
                $data = $data->where('campaign_id', '=', $request->campaign_id);
            }

            // Status Filter
            if ($request->filled('status')) {
                $data = $data->where('status', '=', $request->status);
            }

            // Tag Filter
            if ($request->filled('category')) {
                $data = $data->where('category', '=', $request->category);
            }

            // Referred By Filter
            if ($request->filled('referred')) {
                $data = $data->where('referred', '=', $request->referred);
            }

            // Lead Owner Filter
            if ($request->filled('lead_owner')) {
                $data = $data->where('lead_owner', '=', $request->lead_owner);
            }

            // Primary Channel Filter
            if ($request->filled('primary_channel')) {
                $data = $data->where('primary_channel', '=', $request->primary_channel);
            }

            // Tier Filter
            if ($request->filled('tier')) {
                $data = $data->where('tier', '=', $request->tier);
            }

            $data = $data->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('social_links', function ($row) {
                    $social_links = '';
                    if (!empty($row->instagram_url)) {
                        $social_links .= '<a href="' . $row->instagram_url . '" target="_blank"><img src="' . asset("adminassets/src/img/platform/instagram.svg") . '" class="mr-2" width="25" height="25" alt=""></a>';
                    }
                    if (!empty($row->youtube_url)) {
                        $social_links .= '<a href="' . $row->youtube_url . '" target="_blank"><img src="' . asset("adminassets/src/img/platform/youtube.svg") . '" class="mr-2" width="25" height="25" alt=""></a>';
                    }
                    if (!empty($row->facebook_url)) {
                        $social_links .= '<a href="' . $row->facebook_url . '" target="_blank"><img src="' . asset("adminassets/src/img/platform/facebook.svg") . '" class="mr-2" width="25" height="25" alt=""></a>';
                    }
                    if (!empty($row->twitter_url)) {
                        $social_links .= '<a href="' . $row->twitter_url . '" target="_blank"><img src="' . asset("adminassets/src/img/platform/twitter.svg") . '" class="mr-2" width="25" height="25" alt=""></a>';
                    }
                    if (!empty($row->quora_url)) {
                        $social_links .= '<a href="' . $row->quora_url . '" target="_blank"><img src="' . asset("adminassets/src/img/platform/quora.svg") . '" class="mr-2" width="25" height="25" alt=""></a>';
                    }
                    if (!empty($row->telegram_url)) {
                        $social_links .= '<a href="' . $row->telegram_url . '" target="_blank"><img src="' . asset("adminassets/src/img/platform/telegram.svg") . '" class="mr-2" width="25" height="25" alt=""></a>';
                    }
                    if (!empty($row->other_url)) {
                        $social_links .= '<a href="' . $row->other_url . '" target="_blank"><img src="' . asset("adminassets/src/img/platform/other.svg") . '" class="mr-2" width="25" height="25" alt=""></a>';
                    }
                    return $social_links;
                })
                ->addColumn('primary_channel', function ($row) {
                    $primary_channel = '';
                    if (!empty($row->primary_channel)) {

                        if ($row->primary_channel = 'instagram' && !empty($row->instagram_url)) {
                            $primary_channel = '<a href="' . $row->instagram_url . '" target="_blank"><img src="' . asset("adminassets/src/img/platform/instagram.svg") . '" class="mr-2" width="25" height="25" alt=""></a>';
                        }
                        if ($row->primary_channel = 'youtube' && !empty($row->youtube_url)) {
                            $primary_channel = '<a href="' . $row->youtube_url . '" target="_blank"><img src="' . asset("adminassets/src/img/platform/youtube.svg") . '" class="mr-2" width="25" height="25" alt=""></a>';
                        }
                        if ($row->primary_channel = 'facebook' && !empty($row->facebook_url)) {
                            $primary_channel = '<a href="' . $row->facebook_url . '" target="_blank"><img src="' . asset("adminassets/src/img/platform/facebook.svg") . '" class="mr-2" width="25" height="25" alt=""></a>';
                        }
                        if ($row->primary_channel = 'twitter' && !empty($row->twitter_url)) {
                            $primary_channel = '<a href="' . $row->twitter_url . '" target="_blank"><img src="' . asset("adminassets/src/img/platform/twitter.svg") . '" class="mr-2" width="25" height="25" alt=""></a>';
                        }
                        if ($row->primary_channel = 'quora' && !empty($row->quora_url)) {
                            $primary_channel = '<a href="' . $row->quora_url . '" target="_blank"><img src="' . asset("adminassets/src/img/platform/quora.svg") . '" class="mr-2" width="25" height="25" alt=""></a>';
                        }
                        if ($row->primary_channel = 'telegram' && !empty($row->telegram_url)) {
                            $primary_channel = '<a href="' . $row->telegram_url . '" target="_blank"><img src="' . asset("adminassets/src/img/platform/telegram.svg") . '" class="mr-2" width="25" height="25" alt=""></a>';
                        }
                        if ($row->primary_channel = 'other' && !empty($row->other_url)) {
                            $primary_channel = '<a href="' . $row->other_url . '" target="_blank"><img src="' . asset("adminassets/src/img/platform/other.svg") . ' class="mr-2" width="25" height="25" alt=""></a>';
                        }
                    }
                    return $primary_channel;
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '
                    <div class="dropdown">
                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="javascript:void(0);" role="button" data-toggle="dropdown">
                            <i class="dw dw-more"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">';

                    if ($row->status == 1) {
                        $actionBtn .= '
                            <a class="dropdown-item" href="javascript:void(0);"  onclick="return changeStatus(' . $row->id . ',0);"><i class="fa fa-minus-circle"></i> Deactivate</a>';
                    } else if ($row->status == 0) {
                        $actionBtn .= '
                            <a class="dropdown-item" href="javascript:void(0);" onclick="return changeStatus(' . $row->id . ',1);"><i class="dw dw-checked"></i> Activate</a>';
                    }

                    $actionBtn .= '
                            <a class="dropdown-item" href="#"><i class="dw dw-pencil"></i> Edit Details</a>
                            <a class="dropdown-item" href="javascript:void(0);" ><i class="dw dw-image"></i> Transfer Influencers</a>';

                    $actionBtn .= '
                        </div>
                    </div>';

                    return $actionBtn;
                })->rawColumns(['action', 'social_links', 'primary_channel'])
                ->make(true);
        }
    }
}
