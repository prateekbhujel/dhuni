<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStaffRequest;
use Illuminate\Http\Request;
use App\Models\Admin;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staffs = Admin::whereType('Staff')->whereStatus('Active')->paginate(10);
        return view('admin.staffs.index', compact('staffs'));

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
    public function store(UserStaffRequest $request)
    {
        Admin::create($request->validated());

        return to_route('admin.staffs.index')->withSuccess('Staff Added.');

    }//End Method



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $staff)
    {
        return view('admin.staffs.edit', compact('staff'));

    }//End Method

    /**
     * Update the specified resource in storage.
     */
    public function update(UserStaffRequest $request, Admin $Staff)
    {
        $Staff->update($request->validated());

        return redirect()->back()->withSuccess('Staff Updated.');

    }//End Method

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $staff)
    {
        $staff->delete();

        return to_route('admin.staffs.index')->with('success', 'Staff Record Deleted.');

    }//End Method
}
