@extends('layouts.admin.master')

@section('title','Post Create')

@section('content')
    <div class="row">
        <div class="col-md-4 my-3">
            <a class="btn btn-primary" href="{{ route('post.index') }}">Post list</a>
        </div>
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <strong>Post Create</strong>
                </div>
                <div class="card-body card-block">
                    <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group">
                            <label for="title">Post Title</label>
                            <input type="text" name="title" id="title" placeholder="Enter your Post Title" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="details" class="form-control-label">Post details</label>
                            <textarea name="details" id="title" placeholder="Enter your Post Details" class="form-control" rows="10"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="image">File Upload</label><br>
                            <input type="file" name="image" onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])">

                            <img id="image" src="{{ asset('') }}" width="100" height="100" />
                        </div>

                        <button class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
