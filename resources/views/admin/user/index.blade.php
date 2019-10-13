@extends('layouts.admin.master')

@section('title','User List')

@section('content')
    <div class="row">
        <div class="col-md-4 my-3">
            <a class="btn btn-primary" href="{{ route('user.create') }}">Add User</a>
        </div>
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>User Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <img src="{{ asset($user->user_image) }}" width="60" alt="">
                            </td>
                            <td>
                                <a class="btn btn-success btn-sm" href="{{ route('user.edit',$user->id) }}">Edit</a>

                                <form class="d-inline" action="{{ route('user.destroy',$user->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button onclick="return confirm('user delete you are sure');" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE-->
        </div>
    </div>
@endsection
