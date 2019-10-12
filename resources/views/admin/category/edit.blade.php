@extends('layouts.admin.master')

@section('title','category edit')

@section('content')
    <div class="row">
        <div class="col-md-4 my-3">
            <a class="btn btn-primary" href="{{ route('category.index') }}">Category list</a>
        </div>

        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <strong>Post edit</strong>
                </div>
                <div class="card-body card-block">
                    <form action="{{ route('category.update',$category->id) }}" method="post">

                        @csrf
                        @method('put')
                        @include('admin.category._form')

                        <button class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
