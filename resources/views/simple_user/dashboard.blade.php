@php
    $user = auth()->user();
@endphp
@extends('layouts.layout')
@section('sidebar')
    @include('simple_user.sidebar')
@endsection
@section('content')
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="card mb-4 text-white bg-info">
                        <div class="card-body">
                            <div class="fs-3 fw-semibold mt-4">{{ $clients->count() }}</div><span class=" text-uppercase text-white fw-semibold">Clients</span>
                        </div>
                    </div>
                </div>
                <!-- /.col-->
                <div class="col-sm-6 col-lg-3">
                    <div class="card mb-4 text-white bg-warning">
                        <div class="card-body">
                            <div class="fs-3 fw-semibold mt-4">{{ $projects->count() }}</div><span class=" text-uppercase text-white fw-semibold">Projects</span>
                        </div>
                    </div>
                </div>
                <!-- /.col-->
                <div class="col-sm-6 col-lg-3">
                    <div class="card mb-4 text-white bg-danger">
                        <div class="card-body">
                            <div class="fs-3 fw-semibold mt-4">{{ $tasks->count() }}</div><span class=" text-uppercase text-white fw-semibold">Tasks</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @unless($clients->isEmpty())
            <div class="container-lg mb-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span class="fs-4">
                            Clients
                        </span>
                        <a href="{{ route('user.clients', $user) }}" class="btn btn-dark">View all</a>
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
                            @foreach($clients->take(4) as $client)
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
        @endunless

        @unless($projects->isEmpty())
            <div class="container-lg mb-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span class="fs-4">
                            Projects
                        </span>
                        <a href="{{ route('user.projects', $user) }}" class="btn btn-dark">View all</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Client</th>
                                <th scope="col">Deadline</th>
                                <th scope="col">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($projects->take(4) as $project)
                                <tr class="align-middle">
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td class="col-3">{{ $project->title }}</td>
                                    <td>{{ $project->client->name }}</td>
                                    <td>{{ $project->deadline }}</td>
                                    <td>
                                        @switch($project->status)
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
                                                <span class="badge text-bg-isuccessnfo">Done</span>
                                                @break
                                        @endswitch
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        @endunless

        @unless($tasks->isEmpty())
            <div class="container-lg mb-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span class="fs-4">
                            Tasks
                        </span>
                        <a href="{{ route('user.tasks', $user) }}" class="btn btn-dark">View all</a>
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
                            @foreach($tasks->take(4) as $task)
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
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        @endunless
        </div>
@endsection
