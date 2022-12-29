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
                            Tasks
                        </span>
                <a href="{{ route('admin.tasks.create') }}" class="btn btn-success text-white">Create Tasks</a>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Task</th>
                        <th scope="col">User</th>
                        <th scope="col">Deadline</th>
                        <th scope="col">Status</th>
                        <th scope="col">Priority</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tasks as $task)
                        <tr class="align-middle">
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td class="col-4">{{ $task->title }}</td>
                            <td>{{ $task->user->name }}</td>
                            <td>{{ $task->deadline }}</td>
                            <td>
                                @switch($task->status)
                                    @case(1)
                                        <span class="badge text-bg-info">Open</span>
                                        @break
                                    @case(2)
                                        <span class="badge text-bg-warning">Working on it</span>
                                        @break
                                    @case(3)
                                        <span class="badge text-bg-danger">Stuck</span>
                                        @break
                                    @case(4)
                                        <span class="badge text-bg-success">Done</span>
                                        @break
                                @endswitch
                            </td>
                            <td>
                                @switch($task->priority)
                                    @case(1)
                                        <span class="badge text-bg-info">Low</span>
                                        @break
                                    @case(2)
                                        <span class="badge text-bg-secondary">Medium</span>
                                        @break
                                    @case(3)
                                        <span class="badge text-bg-primary">High</span>
                                        @break
                                    @case(4)
                                        <span class="badge text-bg-dark">Critical</span>
                                        @break
                                @endswitch
                            </td>
                            <td class="d-flex align-items-center">
                                <a href="{{ route('admin.tasks.edit', $task) }}"
                                   class="btn btn-info text-white d-inline-block me-2">Edit</a>
                                <form action="{{ route('admin.tasks.destroy', $task) }}" method="post">
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
