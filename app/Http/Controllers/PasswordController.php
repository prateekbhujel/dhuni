<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{
    public function edit()
    {
        return view('admin.password.edit');

    }//End Method
    
    /**
     * Checks if the validaion fails and update accordingly.
    */
    public function update(Request $request)
    {

        Auth::guard('admin')->user()->update($request->validate([
            'old_password'  => 'required|current_password:admin',
            'password'      => 'required|confirmed|min:6',
            [
                'old_password.current_password' => 'The Old Password is incorrect.',
            ]
            ])
        );
        
        return redirect()->back()->withInfo('Password Changed.');

    }//End Method
}
