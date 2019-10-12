@extends('layouts.admin.master')

@section('title','Post List')

@section('content')
    <div class="row">
        <div class="col-md-4 my-3">
            <a class="btn btn-primary" href="{{ route('post.create') }}">Add Post</a>
        </div>
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Post Title</th>
                            <th>Post description</th>
                            <th>Post Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->details }}</td>
                                <td><img src="{{ asset($post->image) }}" width="60" alt=""></td>
                                <td>$999.00</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE-->
        </div>
    </div>
@endsection
