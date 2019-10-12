@extends('layouts.admin.master')

@section('title','category list')

@section('content')
    <div class="row">
        <div class="col-md-4 my-3">
            <a class="btn btn-primary" href="{{ route('category.create') }}">Add Category</a>
        </div>
        <div class="col-md-12">
            <!-- DATA TABLE-->



            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Category Name</th>
                        <th>Category description</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->details }}</td>
                            <td>
                                <a class="btn btn-success btn-sm" href="{{ route('category.edit',$category->id) }}">Edit</a>

                                <form class="d-inline" action="{{ route('category.destroy',$category->id) }}" method="post">
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
