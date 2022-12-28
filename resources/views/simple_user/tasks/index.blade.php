@php
    $user = auth()->user();
@endphp
@extends('layouts.layout')
@section('sidebar')
    @include('simple_user.sidebar')
@endsection
@section('content')
    @if($tasks->isEmpty())
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="clearfix">
                        <h1 class="float-start display-3 me-4">Hey!</h1>
                        <h4 class="pt-3">You don't have any projects to work on!</h4>
                    <p class="text-medium-emphasis">A mail will be sent to you once you've been assigned a project.</p>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="container-lg mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span class="fs-4">
                    Tasks
                </span>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Task</th>
                        <th scope="col">Deadline</th>
                        <th scope="col">Status</th>
                        <th scope="col">Priority</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tasks as $task)
                        <tr class="align-middle">
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td class="col-4">{{ $task->title }}</td>
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
                                <a href="{{ route('user.task.status.work', [$user, $task]) }}" class="btn btn-warning text-white d-inline-block me-2">Working on it</a>
                                <a href="{{ route('user.task.status.stuck', [$user, $task]) }}" class="btn btn-danger text-white d-inline-block me-2">Stuck</a>
                                <a href="{{ route('user.task.status.done', [$user, $task]) }}" class="btn btn-success text-white d-inline-block me-2">Done</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    @endif
@endsection
