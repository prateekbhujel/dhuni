<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /** Using an variable to assign value(of AuthenticatesUsers Traits)**/
    protected $redirectTo;

    /** 
     * Overwriting an exisiting variable name and middleware.
    */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');

        $this->redirectTo = route('admin.dashboard.index');

    }//End Method

    /**
     * Overwriting the default function here.
     */
    public function showLoginForm()
    {
        return view('admin.login.show');

    }//End Method


    protected function guard()
    {
        return Auth::guard('admin');
        
    }//End Method

    protected function loggedOut(Request $request)
    {
        
        return to_route('admin.login.show')->with('info', 'User Logged Out Successfully.');

    }
}
