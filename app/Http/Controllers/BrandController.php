<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\API\AuthController;

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
}