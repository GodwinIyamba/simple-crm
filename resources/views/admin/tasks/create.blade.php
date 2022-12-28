@extends('layouts.layout')
@section('sidebar')
    @include('admin.body.sidebar')
@endsection
@section('content')
    <div class="container">
        <div class="card mt-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span class="fs-4">
                    Create Task
                </span>
                <a href="{{ route('admin.tasks.index') }}" class="btn btn-link">All Tasks</a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.tasks.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" :value="{{ old('title') }}" class="form-control" placeholder="">
                        @error('title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">File<small>(if any)</small></label>
                        <input name="file" class="form-control" type="file">
                        @error('file')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Assigned User</label>
                        <select class="form-select" name="user_id" aria-label="Default select example">
                            <option selected disabled>Select User</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        @error('user_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deadline</label>
                        <input type="date" name="deadline" :value="{{ old('deadline') }}"
                               min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" class="form-control" placeholder="">
                        @error('deadline')
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
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-select" name="priority" aria-label="Default select example">
                            <option selected disabled>Select Priority</option>
                            <option value="1">Low</option>
                            <option value="2">Medium</option>
                            <option value="3">High</option>
                            <option value="4">Critical</option>
                        </select>
                        @error('priority')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Create Task
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
