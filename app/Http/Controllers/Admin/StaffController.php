<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.staffs.index');

    }//End Method

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.staffs.create');

    }//End Method

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

    }//End Method



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.staff.edit');

    }//End Method

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

    }//End Method

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

    }//End Method
}
