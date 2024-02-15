<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStaffRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
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
        $image = $request->image;
    
        $filename = "img" . date('YmdHis') . rand(1000, 9999) . "." . $image->extension();
    
        $img = (new Image(new Driver))->read($image);
    
        $img->scaleDown(1280, 720)->save(storage_path("app/public/images/users/$filename"));
    
        $user_image = $filename;

        $validated = $request->validated();
        $validated['image'] = $user_image;

        User::create($validated);
    
        return redirect()->route('admin.users.index');
    }
    


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
        if($request->hasFile('image'))
        {
            
            $image = $request->image;
            
            $filename = "img" . date('YmdHis') . rand(1000, 9999) . "." . $image->extension();
        
            $img = (new Image(new Driver))->read($image);
        
            $img->scaleDown(1280, 720)->save(storage_path("app/public/images/users/$filename"));
        
            $user_image = $filename;
    
            $validated = $request->validated();
            $validated['image'] = $user_image;
    
        }
        $validated = $request->validated();
        $user->update($validated);
        
        return redirect()->back()->withInfo('User Details Updated.');

    }//End Method

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // Delete the user's image
        if ($user->image) {
            Storage::disk('public')->delete("images/users/{$user->image}");
        }
        
        // Delete the user
        $user->delete();

        return redirect()->back()->withSuccess('User Deleted.');
    }

}
