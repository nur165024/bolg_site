@extends('layouts.admin.master')

@section('title','Author List')

@section('content')
    <div class="row">
        <div class="col-md-4 my-3">
            <a class="btn btn-primary" href="{{ route('author.create') }}">Add Author</a>
        </div>
        <div class="col-md-12">
            <!-- DATA TABLE-->

            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Author Name</th>
                            <th>Author description</th>
                            <th>Author Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach($authors as $author)
                        <tr>
                            <td>{{ $author->id }}</td>
                            <td>{{ $author->name }}</td>
                            <td>{{ $author->details }}</td>
                            <td><img src="{{ asset($author->image) }}" width="60" alt=""></td>
                            <td>
                                <a class="btn btn-success btn-sm" href="{{ route('author.edit',$author->id) }}">Edit</a>

                                <form class="d-inline" action="{{ route('author.destroy',$author->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button onclick="return confirm('author delete you are sure');" class="btn btn-sm btn-danger">Delete</button>
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
