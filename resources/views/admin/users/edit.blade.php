@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 bg-white py-3 rounded-3 shadow-sm my-3">
            <div class="row">
                <div class="col-5 mx-auto">
                    <h1>
                        Edit User
                    </h1>
                </div>
            </div>
            <div class="row">
                <form action="{{ route('admin.users.update', [$user->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <input type="hidden" value="{{ $user->created_at }}">
                    <input type="hidden" value="{{ $user->updated_at }}">

                    <div class="col-5 mx-auto">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Username</label>
                            <input type="text" name="username" id="Username" class="form-control" value="{{ old('username', $user->username) }}" placeholder="jhon.doe123" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control-plaintext" value="{{ $user->email }}" readonly style="background-color: #eeeeeecb">
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $user->phone) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="addresss" class="form-label">Address</label>
                            <textarea name="address" id="address" class="form-control">{{ old('address', $user->address) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="avatar" class="form-label">Avatar</label>
                            <div id="avatarPreview" class="avatar-preview">
                                @if ($user->image)
                                    <img src="{{ url("public/storage/images/users/$user->image") }}" class="img-fluid" alt="Avatar">
                                @else
                                    <p>No avatar available</p>
                                @endif
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="image" class="form-label">Upload Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-select" required>
                                <option value="Active" @selected($user->status == 'Active')>Active</option>
                                <option value="Inactive" @selected($user->status == 'Inactive')>Inactive</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-dark btn-sm">
                                <i class="fa-solid fa-save me-2"></i>Save
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection