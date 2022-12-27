@extends('layouts.layout')
@section('sidebar')
    @include('admin.sidebar')
@endsection
@section('content')
    <div class="container">
        <div class="card mt-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                        <span class="fs-4">
                            Projects
                        </span>
                        <a href="{{ route('admin.projects.create') }}" class="btn btn-success text-white">Create Project</a>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Client</th>
                        <th scope="col">Assigned User</th>
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
                            <td>{{ $project->user->name }}</td>
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
                                <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-info text-white d-inline-block me-2">Edit</a>
                                <form action="{{ route('admin.projects.destroy', $project) }}" method="post">
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
