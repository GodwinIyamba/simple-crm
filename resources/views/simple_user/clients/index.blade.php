@extends('layouts.layout')
@section('sidebar')
    @include('simple_user.body.sidebar')
@endsection
@section('header')
    @include('simple_user.body.header')
@endsection
@section('content')

    @if($clients->isEmpty())
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="clearfix">
                        <h1 class="float-start display-3 me-4">Hey!</h1>
                        <h4 class="pt-3">You don't have any clients at the moment!</h4>
                        <p class="text-medium-emphasis">Once assigned a project, your client will appear here.</p>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="container-lg mb-4">
        <div class="card">
            <div class="card-header d-flex flex-column">
                        <span class="fs-4">
                            Clients
                        </span>
                <small>All clients you are working and have worked with.</small>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Company Name</th>
                        <th scope="col">Total Projects</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clients as $client)
                        <tr class="align-middle">
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $client->name }}</td>
                            <td>{{ $client->projects->count() }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
@endsection
