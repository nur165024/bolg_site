@extends('layouts.admin.master')

@section('title','User Create')

@section('content')
    <div class="row">
        <div class="col-md-4 my-3">
            <a class="btn btn-primary" href="{{ route('user.index') }}">User List</a>
        </div>
    </div>
    <div class="login-wrap">
        <div class="login-content">
            <div class="login-logo">
                <a href="#">
                    <img src="{{ asset('assets/admin/images/icon/logo.png') }}" alt="CoolAdmin">
                </a>
            </div>
            <div class="login-form">
                <form action="{{ route('user.update',$user->id) }}" method="post" enctype="multipart/form-data">

                    @csrf

                    @method('put')

                    @include('admin.user._form')

                    <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
