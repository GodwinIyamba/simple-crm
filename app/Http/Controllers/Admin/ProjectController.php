<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\projects\ProjectStoreRequest;
use App\Http\Requests\projects\ProjectUpdateRequest;
use App\Models\Client;
use App\Models\Project;
use App\Models\User;
use App\Events\ProjectAssignedEvent;
use App\Notifications\ProjectAssigned;
use Illuminate\Database\Eloquent\Builder;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();

        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $users = User::whereHas('roles', function (Builder $query) {
            $query->where('name', 'user');
        })->get();

        $clients = Client::all();
        return view('admin.projects.create', compact('users', 'clients'));
    }

    public function store(ProjectStoreRequest $request)
    {
        $project = Project::create($request->validated());
        $client = Client::findOrFail($project->client_id);
        $user = User::findOrFail($request->user_id);

        ProjectAssignedEvent::dispatch($project, $client, $user);

        return redirect()->route('admin.projects.index');
    }

    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $users = User::whereHas('roles', function (Builder $query) {
            $query->where('name', 'user');
        })->get();
        $clients = Client::all();
        return view('admin.projects.edit', compact('project', 'users', 'clients'));
    }

    public function update(ProjectUpdateRequest $request, Project $project)
    {
        $project->update($request->validated());

        return redirect()->route('admin.projects.index');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return back();
    }
}
