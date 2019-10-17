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
                            <th>Category Name</th>
                            <th>Author Name</th>
                            <th>Post Title</th>
                            <th>Post Status</th>
                            <th>Post Featured</th>
                            <th>Post description</th>
                            <th>Post Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $serial++ }}</td>
                                <td>{{ $post->category->name }}</td>
                                <td>{{ $post->author->name }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->status }}</td>
                                <td>{{ $post->is_featured }}</td>
                                <td>{{ $post->details }}</td>
                                <td><img src="{{ asset($post->image) }}" width="60" alt=""></td>
                                <td>
                                    <a class="btn btn-success btn-sm" href="{{ route('post.edit',$post->id) }}">Edit</a>

                                    <form class="d-inline" action="{{ route('post.destroy',$post->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button onclick="return confirm('post delete you are sure');" class="btn btn-sm btn-danger">Delete</button>
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
