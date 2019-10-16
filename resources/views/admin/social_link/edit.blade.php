@extends('layouts.admin.master')

@section('title','Social link Edit')

@section('content')
    <div class="row">
        <div class="col-md-4 my-3">
            <a class="btn btn-primary" href="{{ route('sociallink.index') }}">Social Link list</a>
        </div>

        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <strong>Social Link edit</strong>
                </div>
                <div class="card-body card-block">
                    <form action="{{ route('sociallink.update',$sociallink->id) }}" method="post" enctype="multipart/form-data">

                        @csrf
                        @method('put')
                        @include('admin.social_link._form')

                        <button class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
