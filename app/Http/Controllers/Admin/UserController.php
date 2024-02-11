<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStaffRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.users.index');

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


    }//End Method.


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.users.edit');
        

    }//End Method.

    /**
     * Update the specified resource in storage.
     */
    public function update(UserStaffRequest $request, string $id)
    {
        //

    }//End Method.

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

    }//End Method.
}
