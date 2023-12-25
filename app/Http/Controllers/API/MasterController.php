<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MasterController extends Controller
{
    /*
    *
    * Tags API methods
    *   get, store, delete, change_status
    *
    */
    public function tags(Request $request)
    {
        $response = array();
        if ($request->action) {
            switch ($request->action) {
                case 'get':
                    if ($request->tag_id) {

                        $tag = Tag::find($request->tag_id);

                        //dd($tag);

                        if (!empty($tag)) {

                            if (!filter_var($tag->image, FILTER_VALIDATE_URL)) {
                                $tag->image = url('/storage') . '/' . $tag->image;
                            }

                            if ($tag->status) {
                                $tag->status = 'Inactive';
                            } else {
                                $tag->status = 'Active';
                            }


                            $response = [
                                'status' => true,
                                'message' => 'Tag Found',
                                'data' => $tag->toArray(),
                            ];
                        } else {
                            $response = [
                                'status' => false,
                                'message' => 'Tag Not Found',
                                'data' => [],
                            ];
                        }
                    } else {
                        $tags = Tag::all();

                        if (!empty($tags)) {
                            foreach ($tags as $tag) {
                                if (!filter_var($tag->image, FILTER_VALIDATE_URL)) {
                                    $tag->image = url('/storage') . '/' . $tag->image;
                                }

                                if ($tag->status) {
                                    $tag->status = 'Inactive';
                                } else {
                                    $tag->status = 'Active';
                                }
                            }
                            $response = [
                                'status' => true,
                                'message' => 'Tags Found',
                                'data' => $tags->toArray(),
                            ];
                        } else {
                            $response = [
                                'status' => false,
                                'message' => 'Tags Not Found',
                                'data' => [],
                            ];
                        }
                    }
                    break;
                case 'store':

                    // Destination Path for images
                    $destinationPath = 'tags/';

                    if ($request->tag_id) {

                        if ($request->hasFile('image')) {
                            $request->validate([
                                'name' => 'required|string|min:3|unique:tags,name',
                                'image' => 'mimes:jpeg,jpg,png|max:1024|dimensions:max_width=100,max_height=100',
                            ], [
                                'image.dimensions' => 'image dimensions should be 100 X 100 pixels',
                            ]);
                        } else {
                            $request->validate([
                                'tag_id' => 'required|exists:tags,id',
                                'name' => 'required|string|min:3|unique:tags,name,' . $request->tag_id,
                            ]);
                        }

                        $tag = Tag::find($request->tag_id);

                        $tag->name = $request->name;

                        if ($request->hasFile('image')) {
                            if (Storage::disk('public')->exists($tag->image)) {
                                Storage::disk('public')->delete($tag->image);
                            }
                            $file = $request->file('image');
                            $imageName = time() . '.' . $request->image->extension();

                            $upload = Storage::disk('public')->put($destinationPath . $imageName, (string) file_get_contents($file));

                            if ($upload) {
                                $tag->image = $destinationPath . $imageName;
                            }
                        }

                        $tag->updated_by = Auth::guard('admin')->user()->id;

                        $save_tag = $tag->save();

                        if ($save_tag) {
                            $response = [
                                'status' => true,
                                'message' => 'Tag Saved'
                            ];
                        } else {
                            $response = [
                                'status' => false,
                                'message' => 'Tag Not Saved'
                            ];
                        }
                    } else {
                        $request->validate([
                            'name' => 'required|string|min:3|unique:tags,name',
                            'image' => 'required|mimes:jpeg,jpg,png|max:1024|dimensions:max_width=100,max_height=100',
                        ], [
                            'image.dimensions' => 'image dimensions should be 100 X 100 pixels',
                        ]);

                        $tag = new Tag();
                        $tag->name = $request->name;
                        if ($request->hasFile('image')) {
                            $file = $request->file('image');
                            $filename = str_replace(' ', '_', $file->getClientOriginalName());
                            $new_filename = time() . '_' . $filename;
                            $upload = Storage::disk('public')->put($destinationPath . $new_filename, (string) file_get_contents($file));
                            if ($upload) {
                                $tag->image = $destinationPath . $new_filename;
                            }
                        }
                        $tag->updated_by = Auth::guard('admin')->user()->id;
                        $save_tag = $tag->save();

                        if ($save_tag) {
                            $response = [
                                'status' => true,
                                'message' => 'Tag Updated'
                            ];
                        } else {
                            $response = [
                                'status' => false,
                                'message' => 'Tag Not Saved'
                            ];
                        }
                    }

                    break;
                case 'delete':

                    DB::enableQueryLog();

                    $request->validate([
                        'tag_id' => 'required|exists:tags,id',
                    ]);

                    $tag = Tag::find($request->tag_id);

                    if (Storage::disk('public')->exists($tag->image)) {
                        Storage::disk('public')->delete($tag->image);
                    }

                    $delete_tag = $tag->delete();

                    if ($delete_tag) {
                        $response = [
                            'status' => true,
                            'message' => 'Tag Deleted'
                        ];
                    } else {
                        $response = [
                            'status' => false,
                            'message' => 'Tag Not Deleted'
                        ];
                    }

                    break;
                case 'change_status':

                    $request->validate([
                        'tag_id' => 'required|exists:tags,id',
                        'status' => 'required'
                    ]);

                    $tag = Tag::find($request->tag_id);

                    $tag->status = $request->status;
                    $tag->updated_by = Auth::guard('admin')->user()->id;

                    $change_status = $tag->save();

                    if ($change_status) {
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
                        'message' => 'Invalid Action',
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

    /*
    *
    *Enquiry API Methods
    * get, store
    *
    */
    public function enquiries(Request $request)
    {
        $response = array();
        if ($request->action) {
            switch ($request->action) {
                case 'get':
                    $enquiries = DB::table('enquiries')->select('*')->get();
                    if ($enquiries->isNotEmpty()) {
                        $response = [
                            'status' => true,
                            'message' => 'Enquiries Found',
                            'data' => $enquiries->toArray(),
                        ];
                    } else {
                        $response = [
                            'status' => false,
                            'message' => 'Enquiries Not Found',
                            'data' => [],
                        ];
                    }

                    break;

                case 'store':

                    $request->validate([
                        'full_name' => 'required',
                        'email' => 'required|email',
                        'mobile_no' => 'required|numeric',
                        'query' => 'required',
                    ]);

                    $insert_data = [
                        'full_name' => $request->full_name,
                        'email' => $request->email,
                        'mobile_no' => $request->mobile_no,
                        'query' => $request->query,
                        'organization' => $request->organization,
                    ];

                    $save_data = DB::table('enquiries')->insert($insert_data);

                    if ($save_data) {
                        $response = [
                            'status' => true,
                            'message' => 'Enquiry Received',
                        ];
                    } else {
                        $response = [
                            'status' => false,
                            'message' => 'Enquiry Failed',
                        ];
                    }

                    break;

                default:
                    $response = [
                        'status' => false,
                        'message' => 'Invalid Action',
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

    /*
    *
    * Brands API Methods
    * get, store, change_status, delete
    *
    */
    public function brands(Request $request)
    {
        $response = array();

        if ($request->action) {
            switch ($request->action) {
                case 'get':
                    if ($request->brand_id) {
                        $request->validate([
                            'brand_id' => 'required|exists:brands,id',
                        ]);

                        $brand = Brand::find($request->brand_id);

                        if ($brand->isNotEmpty()) {
                            $response = [
                                'status' => true,
                                'message' => 'Brand Found',
                                'data' => $brand->toArray(),
                            ];
                        } else {
                            $response = [
                                'status' => false,
                                'message' => 'Brand Not Found',
                                'data' => [],
                            ];
                        }
                    } else {
                        $brands = Brand::all();

                        if ($brands->isNotEmpty()) {
                            $response = [
                                'status' => true,
                                'message' => 'Brands Found',
                                'data' => $brands->toArray(),
                            ];
                        } else {
                            $response = [
                                'status' => false,
                                'message' => 'Brands Not Found',
                                'data' => [],
                            ];
                        }
                    }
                    break;
                case 'store':
                    if ($request->brand_id) {
                        $request->validate([
                            'brand_id' => 'required|exists:brands,id',
                            'company_name' => 'required|max:255',
                            'email' => 'required|email',
                            'mobile_no' => 'required|numeric',
                        ]);

                        $update_data = [
                            'company_name' => $request->company_name,
                            'email' => $request->email,
                            'mobile_no' => $request->mobile_no,
                            'director_name' => $request->director_name,
                            'password' => Hash::make($request->password),
                            'address' => $request->address,
                            'pincode' => $request->pincode,
                            'city' => $request->city,
                            'state' => $request->state,
                            'country' => $request->country,
                        ];

                        $save_data = Brand::where('id', '=', $request->brand_id)->update($update_data);

                        if ($save_data) {
                            $response = [
                                'status' => true,
                                'message' => 'Brand Updated',
                            ];
                        } else {
                            $response = [
                                'status' => false,
                                'message' => 'Brand Not Updated',
                            ];
                        }
                    } else {
                        $request->validate([
                            'company_name' => 'required|max:255',
                            'email' => 'required|email',
                            'mobile_no' => 'required|numeric',
                        ]);

                        $insert_data = [
                            'company_name' => $request->company_name,
                            'email' => $request->email,
                            'mobile_no' => $request->mobile_no
                        ];

                        $save_data = Brand::insert($insert_data);

                        if ($save_data) {
                            $response = [
                                'status' => true,
                                'message' => 'Brand Added',
                            ];
                        } else {
                            $response = [
                                'status' => false,
                                'message' => 'Brand Not Added',
                            ];
                        }
                    }

                    break;
                case 'change_status':
                    $request->validate([
                        'brand_id' => 'required|exists:brands,id',
                        'status' => 'required',
                    ]);

                    $update_data = [
                        'status' => $request->status,
                        'updated_by' => Auth::guard('admin')->user()->id,
                    ];

                    $change_status = DB::table('brands')->where('id', '=', $request->brand_id)->update($update_data);

                    if ($change_status) {
                        $response = [
                            'status' => true,
                            'message' => 'Status Updated',
                        ];
                    } else {
                        $response = [
                            'status' => false,
                            'message' => 'Status Not Updated',
                        ];
                    }

                    break;
                case 'delete':
                    $request->validate([
                        'brand_id' => 'required|exists:brands,id',
                    ]);

                    $brand = Brand::find($request->brand_id);

                    $delete_brand = $brand->delete();

                    if ($delete_brand) {
                        $response = [
                            'status' => true,
                            'message' => 'Brand Deleted',
                        ];
                    } else {
                        $response = [
                            'status' => false,
                            'message' => 'Brand Not Deleted',
                        ];
                    }

                    break;

                default:
                    $response = [
                        'status' => false,
                        'message' => 'Invalid Action',
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

    /*
    *
    * Bank Detail Methods
    * get, store, delete, change_status
    *
    */
    public function bank_details(Request $request)
    {
        $response = array();

        if ($request->action) {
            switch ($request->action) {
                case 'get':
                    if ($request->bank_id) {
                        $request->validate([
                            'bank_id' => 'required|exists:bank_details,id',
                        ]);

                        $bank_detail = DB::table('bank_details')->where('id', '=', $request->bank_id)->get();

                        if (!empty($bank_detail)) {
                            $response = [
                                'status' => true,
                                'message' => 'Bank Detail Found',
                                'data' => $bank_detail->toArray()
                            ];
                        } else {
                            $response = [
                                'status' => false,
                                'message' => 'Bank Detail Not Found',
                                'data' => [],
                            ];
                        }
                    } else {
                        $bank_details = DB::table('bank_details')->get();

                        if (!empty($bank_details)) {
                            $response = [
                                'status' => true,
                                'message' => 'Bank Details Found',
                                'data' => $bank_details->toArray()
                            ];
                        } else {
                            $response = [
                                'status' => false,
                                'message' => 'Bank Details Not Found',
                                'data' => [],
                            ];
                        }
                    }

                    break;
                case 'store':
                    if ($request->bank_id) {
                        $request->validate([
                            'bank_id' => 'required|exists:bank_details,id',
                            'influencer_id' => 'required|exists:influencers,id',
                            'bank_name' => 'required|string|min:3',
                            'account_no' => 'required|numeric|unique:bank_details,account_no,' . $request->bank_id,
                            'account_name' => 'required|string|min:3',
                            'branch_name' => 'required|string|min:3',
                            'account_type' => 'required',
                            'ifsc_code' => 'required|min:7',
                            'pan_number' => 'required|min:7',
                            'pan_card_file' => 'required|image|mimes:jpg,png',
                            'aadhar_number' => 'required|max:16',
                            'bank_address' => 'required|min:3',
                        ]);

                        $update_data = [
                            'influencer_id' => $request->influencer_id,
                            'bank_name' => $request->bank_name,
                            'account_no' => $request->account_no,
                            'account_name' => $request->account_name,
                            'branch_name' => $request->branch_name,
                            'account_type' => $request->account_type,
                            'ifsc_code' => $request->ifsc_code,
                            'pan_number' => $request->pan_number,
                            'aadhar_number' => $request->aadhar_number,
                            'bank_address' => $request->bank_address,
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ];

                        $save_data = DB::table('bank_details')->where('id', '=', $request->bank_id)->update($update_data);

                        if ($save_data) {
                            $response = [
                                'status' => true,
                                'message' => 'Bank Details Updated',
                            ];
                        } else {
                            $response = [
                                'status' => false,
                                'message' => 'Bank Details Not Updated',
                            ];
                        }
                    } else {
                        $request->validate([
                            'influencer_id' => 'required|exists:influencers,id',
                            'bank_name' => 'required|string|min:3',
                            'account_no' => 'required|numeric|unique:bank_details,account_no',
                            'account_name' => 'required|string|min:3',
                            'branch_name' => 'required|string|min:3',
                            'account_type' => 'required',
                            'ifsc_code' => 'required|min:7',
                            'pan_number' => 'required|min:7',
                            'pan_card_file' => 'required|image|mimes:jpg,png',
                            'aadhar_number' => 'required|max:16',
                            'bank_address' => 'required|min:3',
                        ]);

                        $insert_data = [
                            'influencer_id' => $request->influencer_id,
                            'bank_name' => $request->bank_name,
                            'account_no' => $request->account_no,
                            'account_name' => $request->account_name,
                            'branch_name' => $request->branch_name,
                            'account_type' => $request->account_type,
                            'ifsc_code' => $request->ifsc_code,
                            'pan_number' => $request->pan_number,
                            'aadhar_number' => $request->aadhar_number,
                            'bank_address' => $request->bank_address,
                            'updated_at' => Carbon::now(),
                        ];

                        $save_data = DB::table('bank_details')->insert($insert_data);

                        if ($save_data) {
                            $response = [
                                'status' => true,
                                'message' => 'Bank Details Added',
                            ];
                        } else {
                            $response = [
                                'status' => false,
                                'message' => 'Bank Details Not Added',
                            ];
                        }
                    }

                    break;
                case 'change_status':
                    $request->validate([
                        'bank_id' => 'required|exists:bank_details,id',
                        'status' => 'required',
                    ]);

                    $update_data = [
                        'status' => $request->status,
                        'updated_by' => Auth::guard('admin')->user()->id,
                    ];

                    $change_status = DB::table('bank_details')->where('id', '=', $request->bank_id)->update($update_data);

                    if ($change_status) {
                        $response = [
                            'status' => true,
                            'message' => 'Status Updated',
                        ];
                    } else {
                        $response = [
                            'status' => false,
                            'message' => 'Status Not Updated',
                        ];
                    }

                    break;
                case 'delete':
                    $request->validate([
                        'bank_id' => 'required|exists:bank_details,id',
                    ]);

                    $delete_data = DB::table('bank_details')->delete($request->bank_id);

                    if ($delete_data) {
                        $response = [
                            'status' => true,
                            'message' => 'Bank Details Deleted',
                        ];
                    } else {
                        $response = [
                            'status' => false,
                            'message' => 'Bank Details Not Deleted',
                        ];
                    }
                    break;

                default:
                    $response = [
                        'status' => false,
                        'message' => 'Invalid Action',
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

    /*
    *
    * Admin Member Methods
    * get, store, delete, change_status
    *
    */
    public function member(Request $request)
    {
        $response = array();

        if ($request->action) {
            switch ($request->action) {
                case 'get':
                    if ($request->admin_id) {
                        # code...
                    } else {
                        # code...
                    }

                    break;
                case 'store':
                    $request->validate([
                        'username' => 'required|unique:admins,username',
                        'email' => 'required|email|unique:admins.email',
                        'password' => 'required|min:5|max:16',
                        'first_name' => 'required|string',
                        'last_name' => 'required|string',
                        'mobile_no' => 'required|numeric', 
                        'role' => 'required|exists:roles,id',
                        ''                       
                    ]);
                    break;
                case 'delete':
                    # code...
                    break;
                case 'change_status':
                    # code...
                    break;
                default:
                    $response = [
                        'status' => false,
                        'message' => 'Invalid Action',
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

    /*  
    *
    * Country Data
    */
    public function get_countries(Request $request) {
        $response = array();

        $countries = DB::table('country')->select('id', 'name')->orderBy('name')->get()->toArray();

        if (!empty($countries)) {
            $response = [
                'status' => true,
                'message' => 'Countries found',
                'data' => $countries,
            ];
        } else {
            $response = [
                'status' => false,
                'message' => 'Countries not found',
                'data' => [],
            ];
        }

        return response()->json($response);
    }

    /*
    *
    * State Data
    */
    public function get_states(Request $request)
    {

        $response = array();

        $request->validate([
            'country_id' => 'required|exists:country,id'
        ]);

        $states = DB::table('states')->select('id', 'name')->where('country_id', '=', $request->country_id)->orderBy('name')->get()->toArray();

        if (!empty($states)) {
            $response = [
                'status' => true,
                'message' => 'States found',
                'data' => $states,
            ];
        } else {
            $response = [
                'status' => false,
                'message' => 'States not found',
                'data' => [],
            ];
        }

        return response()->json($response);
    }

    /*  
    *
    * City Data
    */
    public function get_cities(Request $request)
    {
        $response = array();

        $request->validate([
            'state_id' => 'required|exists:states,id'
        ]);

        $cities = DB::table('cities')->select('id', 'name')->where('state_id', '=', $request->state_id)->orderBy('name')->get()->toArray();

        if (!empty($cities)) {
            $response = [
                'status' => true,
                'message' => 'Cities found',
                'data' => $cities,
            ];
        } else {
            $response = [
                'status' => false,
                'message' => 'Cities not found',
                'data' => [],
            ];
        }

        return response()->json($response);
    }
}
