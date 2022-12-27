@extends('layouts.layout')
@section('sidebar')
    @include('admin.sidebar')
@endsection
@section('content')
    <div class="container">
        <div class="card mt-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span class="fs-4">
                    Edit Client
                </span>
                <a href="{{ route('admin.clients.index') }}" class="btn btn-link">All Clients</a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.clients.update', $client) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" value="{{ $client->name }}" class="form-control" placeholder="">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">VAT</label>
                        <input type="text" name="vat" value="{{ $client->vat }}" class="form-control">
                        @error('vat')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" name="address" value="{{ $client->address }}" class="form-control" placeholder="">
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Update Client
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
