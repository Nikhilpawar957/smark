<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\URL;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            //return route('login');
            if ($request->routeIs('admin.*')) {
                session()->flash('fail', 'You must login first');
                return route('admin.login',['fail' => true, 'returnUrl' => URL::current()]);
            }
            if ($request->routeIs('brand.*')) {
                session()->flash('fail', 'You must login first');
                return route('brand.login',['fail' => true, 'returnUrl' => URL::current()]);
            }
            if ($request->routeIs('influencer.*')) {
                session()->flash('fail', 'You must login first');
                return route('influencer.login',['fail' => true, 'returnUrl' => URL::current()]);
            }
        }
    }
}
