@extends('layouts.admin.master')

@section('title','About List')

@section('content')
    <div class="row">
        <div class="col-md-4 my-3">
            <a class="btn btn-primary" href="{{ route('about.create') }}">Add About</a>
        </div>
        <div class="col-md-12">
            <!-- DATA TABLE-->

            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>About Title</th>
                        <th>About description</th>
                        <th>About Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($abouts as $about)
                        <tr>
                            <td>{{ $about->id }}</td>
                            <td>{{ $about->title }}</td>
                            <td>{{ $about->details }}</td>
                            <td><img src="{{ asset($about->image) }}" width="60" alt=""></td>
                            <td>
                                <a class="btn btn-success btn-sm" href="{{ route('about.edit',$about->id) }}">Edit</a>

                                <form class="d-inline" action="{{ route('about.destroy',$about->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button onclick="return confirm('about delete you are sure');" class="btn btn-sm btn-danger">Delete</button>
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
