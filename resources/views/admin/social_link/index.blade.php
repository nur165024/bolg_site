@extends('layouts.admin.master')

@section('title','Social Link List')

@section('content')
    <div class="row">
        <div class="col-md-4 my-3">
            <a class="btn btn-primary" href="{{ route('sociallink.create') }}">Add Social link</a>
        </div>
        <div class="col-md-12">
            <!-- DATA TABLE-->

            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Socail link</th>
                        <th>Social Font</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($sociallinks as $sociallink)
                        <tr>
                            <td>{{ $sociallink->id }}</td>
                            <td>{{ $sociallink->social_link }}</td>
                            <td>{{ $sociallink->social_font }}</td>
                            <td>
                                <a class="btn btn-success btn-sm" href="{{ route('sociallink.edit',$sociallink->id) }}">Edit</a>

                                <form class="d-inline" action="{{ route('sociallink.destroy',$sociallink->id) }}" method="post">
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
