<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\API\AuthController;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
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
                        'updated_at' => Carbon::now(),
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
}
