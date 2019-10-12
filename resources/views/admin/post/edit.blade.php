@extends('layouts.admin.master')

@section('title','edit post')

@section('content')
    <div class="row">
        <div class="col-md-4 my-3">
            <a class="btn btn-primary" href="{{ route('post.index') }}">Post list</a>
        </div>

        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <strong>Post edit</strong>
                </div>
                <div class="card-body card-block">
                    <form action="{{ route('post.update',$post->id) }}" method="post" enctype="multipart/form-data">

                        @csrf
                        @method('put')
                        @include('admin.post._form')

                        <button class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
