@extends('layouts.admin')

@section('title', 'Users')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 bg-white py-3 rounded-3 shadow-sm my-3">
            <div class="row">
                <div class="col">
                    <h1>
                        Users
                    </h1>
                </div>
                <div class="col-auto">
                    <a href="{{ route('admin.users.create') }}" class="btn btn-dark">
                        <i class="fa-solid fa-plus me-2"></i>Add Users
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @if (!empty($users))
                        <table class="table table-striped table-hover table-sm table-responsive">
                            <thead class="table-dark">
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th style="width: 149px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            <img src="{{ url("public/storage/images/users/{$user->image}") }}" class="img-thumbnail rounded-circle" 
                                                style="max-width: 100px; max-height: 100px;">
                                        </td>                                                                             
                                        <td>{{ $user->name }}</td>
                                        <td>{!! "<a class='fst-italic text-info text-decoration-none' href=".route('admin.users.edit',[$user->id]).">@" . $user->username . "</a>" !!}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->address }}</td>
                                        <td>{{ $user->status }}</td>
                                        <td>{{ $user->created_at->toDayDateTimeString() }}</td>
                                        <td>{{ $user->updated_at->toDayDateTimeString() }}</td>
                                        <td>
                                            <form action="{{ route('admin.users.destroy', [$user->id]) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('admin.users.edit', [$user->id]) }}" class="btn btn-dark btn-sm">
                                                    <i class="fa-solid fa-edit me-2"></i>Edit
                                                </a>
                                                <button type="submit" class="btn btn-danger btn-sm delete">
                                                    <i class="fa-solid fa-times me-2"></i>Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $users->links() }}
                    @else
                        <h4 class="text-muted fst-italic">No data added.</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection