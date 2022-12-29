@extends('layouts.layout')
@section('sidebar')
    @include('admin.body.sidebar')
@endsection
@section('header')
    @include('admin.body.header')
@endsection
@section('content')
    <div class="container">
        <div class="card mt-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span class="fs-4">
                    Edit Task
                </span>
                <a href="{{ route('admin.tasks.index') }}" class="btn btn-link">All Tasks</a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.tasks.update', $task) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" value="{{ $task->title }}" class="form-control" placeholder="">
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
                            <option disabled>Select User</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ $task->user->name == $user->name ? 'selected' : '' }}>{{ $user->name }}</option>
                            @endforeach
                        </select>
                        @error('user_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deadline</label>
                        <input type="date" name="deadline"
                               value="{{ \Carbon\Carbon::parse($task->deadline)->format('Y-m-d') }}"
                               min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" class="form-control" placeholder="">
                        @error('deadline')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-select" name="status" aria-label="Default select example">
                            <option disabled>Select Status</option>
                            <option value="1" {{ $task->status == 1 ? 'selected' : '' }}>Open</option>
                            <option value="2" {{ $task->status == 2 ? 'selected' : '' }}>Working on it</option>
                            <option value="3" {{ $task->status == 3 ? 'selected' : '' }}>Stuck</option>
                            <option value="4" {{ $task->status == 4 ? 'selected' : '' }}>Done</option>
                        </select>
                        @error('status')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-select" name="priority" aria-label="Default select example">
                            <option disabled>Select Priority</option>
                            <option value="1" {{ $task->priority == 1 ? 'selected' : '' }}>Low</option>
                            <option value="2" {{ $task->priority == 2 ? 'selected' : '' }}>Medium</option>
                            <option value="3" {{ $task->priority == 3 ? 'selected' : '' }}>High</option>
                            <option value="4" {{ $task->priority == 4 ? 'selected' : '' }}>Critical</option>
                        </select>
                        @error('priority')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Update Task
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
