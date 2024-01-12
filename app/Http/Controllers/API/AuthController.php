<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Brand;
use App\Models\Influencer;
use App\Models\Role;

class AuthController extends Controller
{
    // Login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);

        $response = array();

        $creds = array('email' => $request->email, 'password' => $request->password);

        // Check if the user is registered as Admin or Manager or Viewer
        if (Auth::guard('admin')->attempt($creds)) {
            $user = Admin::where('email', $request['email'])->firstOrFail();

            $response['token'] =  $user->createToken('admin')->plainTextToken;
            $response['name'] =  $user->first_name . ' ' . $user->last_name;

            $roles = Role::all();

            foreach ($roles as $key => $role) {
                if ($role->id == $user->role) {
                    $role_name = strtolower($role->name);
                } else {
                    $role_name = 'super_admin';
                }
            }

            $response['role'] = $role_name;

            session()->put('role', $role_name);
            session()->put('apitoken', $response['token']);

            $response['status'] = true;
            $response['message'] = 'Logged in successfully';
        }
        // Check if the user is registered as brand
        else if (Auth::guard('brand')->attempt($creds)) {
            $user = Brand::where('email', $request['email'])->firstOrFail();
            $response['token'] =  $user->createToken('brand')->plainTextToken;
            $response['name'] =  $user->company_name;
            $response['role'] = 'brand';
            session()->put('role', 'brand');
            session()->put('apitoken', $response['token']);
            $response['status'] = true;
            $response['message'] = 'Logged in successfully';
        }
        // Check if the user is registered as influencer
        else if (Auth::guard('influencer')->attempt($creds)) {
            $user = Influencer::where('email', $request['email'])->firstOrFail();
            $response['token'] =  $user->createToken('influencer')->plainTextToken;
            $response['name'] =  $user->first_name . ' ' . $user->last_name;
            $response['role'] = 'influencer';
            session()->put('role', 'influencer');
            session()->put('apitoken', $response['token']);
            $response['status'] = true;
            $response['message'] = 'Logged in successfully';
        } else {
            $response = [
                'status' => false,
                'error' => 'Invalid credentials'
            ];
        }

        return response()->json($response);
    }

    // Logout
    public function logout(Request $request)
    {
        $role = @session()->get('role');
        if ($role) {
            Auth::guard($role)->logout();
        } else {
            Auth::guard('web')->logout();
        }

        session()->flush();
        return response()->json(['status' => true, 'message' => 'Logged out','role'=>$role]);
    }
}
