@extends('layouts.layout')
@section('sidebar')
    @include('admin.body.sidebar')
@endsection
@section('content')
    <div class="container">
        <div class="card mt-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span class="fs-4">
                    Edit Project
                </span>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-link">All Projects</a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.projects.update', $project) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" value="{{ $project->title }}" class="form-control"
                               placeholder="">
                        @error('title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control"
                                  rows="10">{{ $project->description }}</textarea>
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deadline</label>
                        <input type="date" name="deadline"
                               value="{{ \Carbon\Carbon::parse($project->deadline)->format('Y-m-d') }}"
                               min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" class="form-control" placeholder="">
                        @error('deadline')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Assigned User</label>
                        <select class="form-select" name="user_id" aria-label="Default select example">
                            <option disabled>Select User</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}"
                                        @if($project->user->name == $user->name) selected @endif>{{ $user->name }}</option>
                            @endforeach
                        </select>
                        @error('user_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Assigned Client</label>
                        <select class="form-select" name="client_id" aria-label="Default select example">
                            <option disabled>Select Client</option>
                            @foreach($clients as $client)
                                <option value="{{ $client->id }}"
                                        @if($project->client->name == $client->name) selected @endif>{{ $client->name }}</option>
                            @endforeach
                        </select>
                        @error('client_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-select" name="status" aria-label="Default select example">
                            <option selected disabled>Select Status</option>
                            <option value="1">Open</option>
                            <option value="2">Working on it</option>
                            <option value="3">Stuck</option>
                            <option value="4">Done</option>
                        </select>
                        @error('status')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Update Project
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
