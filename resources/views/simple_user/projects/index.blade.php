@php
    $user = auth()->user();
@endphp
@extends('layouts.layout')
@section('sidebar')
    @include('simple_user.sidebar')
@endsection
@section('content')
    @if($projects->isEmpty())
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
    @else
        <div class="container-lg mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                        <span class="fs-4">
                            Projects
                        </span>
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
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($projects as $project)
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
                                <td class="d-flex align-items-center">
                                    <a href="{{ route('user.project.status.work', [$user, $project]) }}" class="btn btn-warning text-white d-inline-block me-2">Working on it</a>
                                    <a href="{{ route('user.project.status.stuck', [$user, $project]) }}" class="btn btn-danger text-white d-inline-block me-2">Stuck</a>
                                    <a href="{{ route('user.project.status.done', [$user, $project]) }}" class="btn btn-success text-white d-inline-block me-2">Done</a>
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
