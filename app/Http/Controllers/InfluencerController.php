<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\API\AuthController;
use App\Models\Influencer;

class InfluencerController extends Controller
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
    * Influencers API Methods
    * get, store, change_status, delete
    *
    */
    public function influencers(Request $request)
    {
        $response = array();

        if ($request->action) {
            switch ($request->action) {
                case 'get':
                    if ($request->filled('influencer_id')) {
                        $request->validate([
                            'influencer_id' => 'exists:influencers,id'
                        ]);

                    } else {
                        $influencers = Influencer::all();

                        if (!empty($influencers)) {
                            $response = [
                                'status' => true,
                                'message' => 'Influencers Found',
                                'data' => $influencers->toArray(),
                            ];
                        } else {
                            $response = [
                                'status' => false,
                                'message' => 'Influencers Found',
                                'data' => $influencers->toArray(),
                            ];
                        }
                    }
                    break;
                case 'store':
                    # code...
                    break;
                case 'change_status':
                    # code...
                    break;
                case 'delete':
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
}
