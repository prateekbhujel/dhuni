<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    
    public function edit()
    {
        $user = Auth::guard('admin')->user();

        return view('admin.profile.edit', compact('user'));

    }//End Method


    public function update(Request $req)
    {
        Auth::guard('admin')->user()->update($req->validate([
            'name'    => 'required|string|min:5',
            'phone'   => 'required|max:30',
            'address' => 'required|string',
        ]));

        return redirect()->back()->with('success','Profile Updated.');

    }//End Method
}
