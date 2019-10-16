@extends('layouts.admin.master')

@section('title','Social Link Create')

@section('content')
    <div class="row">
        <div class="col-md-4 my-3">
            <a class="btn btn-primary" href="{{ route('sociallink.index') }}">Social Link list</a>
        </div>
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <strong>Author Name</strong>
                </div>
                <div class="card-body card-block">
                    <form action="{{ route('sociallink.store') }}" method="post" enctype="multipart/form-data">

                        @csrf

                        @include('admin.social_link._form')

                        <button class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
