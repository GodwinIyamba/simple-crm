@php
    $user = auth()->user();
@endphp
@extends('layouts.layout')
@section('sidebar')
    @include('simple_user.body.sidebar')
@endsection
@section('header')
    @include('simple_user.body.header')
@endsection
@section('content')
    <div class="container-lg mb-4">
        <div class="card col-6 p-0 m-auto">
            <div class="card-header d-flex justify-content-between align-items-center w-100">
                <span class="fs-4">
                    Task Details
                </span>
                <a href="{{ route('user.tasks', $user) }}" class="btn btn-link">All Tasks</a>
            </div>
            <div class="card-body d-flex justify-content-center">
                <ul class="list-group rounded-0">
                    <li class="list-group-item list-group-item-secondary border-right-0">Task</li>
                    <li class="list-group-item list-group-item-secondary border-right-0">Deadline</li>
                    <li class="list-group-item list-group-item-secondary border-right-0">Status</li>
                    <li class="list-group-item list-group-item-secondary border-right-0">Priority</li>
                </ul>
                <ul class="list-group rounded-0 border-left-0">
                    <li class="list-group-item border-left-0">{{ $task->title }}</li>
                    <li class="list-group-item border-left-0">{{ $task->deadline }}</li>
                    <li class="list-group-item border-left-0">
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
                    </li>
                    <li class="list-group-item border-left-0">
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
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
