<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStaffRequest;
use App\Models\User;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager as Image;

class UserController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::whereStatus('Active')->paginate(10);
        return view('admin.users.index', compact('users'));

    }//End Method.

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');

    }//End Method.

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStaffRequest $request)
    {
       
        User::create($request->validated());

        return to_route('admin.users.index');

    }//End Method.


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
        

    }//End Method.

    /**
     * Update the specified resource in storage.
     */
    public function update(UserStaffRequest $request, User $user)
    {
        $user->update($request->validated());

        return redirect()->back()->withInfo('User Details Updated.');

    }//End Method.

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
       $user->delete(); 
        
       return redirect()->back()->withSuccess('User Deleted.');
        
    }//End Method.
}
