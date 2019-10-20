@extends('layouts.admin.master')

@section('title','About Create')

@section('content')
    <div class="row">
        <div class="col-md-4 my-3">
            <a class="btn btn-primary" href="{{ route('about.index') }}">About list</a>
        </div>
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <strong>About Create</strong>
                </div>
                <div class="card-body card-block">
                    <form action="{{ route('about.store') }}" method="post" enctype="multipart/form-data">

                        @csrf
                        @include('admin.about._form')
                        <button class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
