@extends('layouts.layout')
@section('sidebar')
    @include('admin.sidebar')
@endsection
@section('content')
    <div class="container">
        <div class="card mt-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                    <span class="fs-2">
                        Clients
                    </span>
                    <a href="{{ route('admin.clients.create') }}" class="btn btn-success text-white">Create Client</a>
            </div>
            <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Company Name</th>
                            <th scope="col">VAT</th>
                            <th scope="col">Address</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($clients as $client)
                            <tr class="align-middle">
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $client->name }}</td>
                                <td>{{ $client->vat }}</td>
                                <td>{{ $client->address }}</td>
                                <td>
                                    @switch($client->status)
                                        @case(1)
                                            <span class="badge text-bg-success text-white">Active</span>
                                            @break
                                        @case(0)
                                            <span class="badge text-bg-warning text-white">Inactive</span>
                                            @break
                                    @endswitch
                                </td>
                                <td class="d-flex align-items-center">
                                    @switch($client->status)
                                        @case(1)
                                            <a href="{{ route('admin.clients.status', $client) }}" class="btn btn-warning text-white d-inline-block me-2">Inactive</a>
                                            @break
                                        @case(0)
                                            <a href="{{ route('admin.clients.status', $client) }}" class="btn btn-success text-white d-inline-block me-2">Active</a>
                                            @break
                                    @endswitch
                                    <a href="{{ route('admin.clients.edit', $client) }}" class="btn btn-info text-white d-inline-block me-2">Edit</a>
                                    <form action="{{ route('admin.clients.destroy', $client) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger text-white">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
        </div>
    </div>
@endsection
