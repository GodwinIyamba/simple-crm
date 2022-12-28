<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard()
    {
        $clients = Client::with('projects')->whereHas('projects', function (Builder $query) {
            $query->where('user_id', Auth::id());
        })->get();

        $projects = Project::with('client')->where('user_id', Auth::id())->where('status', '!=', '4')->get();
        $tasks = Task::where('user_id', Auth::id())->where('status', '!=', '4')->get();

        return view('simple_user.dashboard', compact( 'clients','projects', 'tasks'));
    }

    public function client()
    {
        $clients = Client::with('projects')->whereHas('projects', function (Builder $query) {
            $query->where('user_id', Auth::id());
        })->get();
        return view('simple_user.clients.index', compact('clients'));
    }

    public function project()
    {
        $projects = Project::with('client')->where('user_id', Auth::id())->where('status', '!=', '4')->get();
        return view('simple_user.projects.index', compact('projects'));
    }

    public function task()
    {
        $tasks = Task::where('user_id', Auth::id())->where('status', '!=', '4')->get();
        return view('simple_user.tasks.index', compact('tasks'));
    }

    public function projectWork(User $user, Project $project)
    {
        $project->update([
            'status' => 2
        ]);

        return back();

    }

    public function projectStuck(User $user, Project $project)
    {
        $project->update([
            'status' => 3
        ]);

        return back();
    }

    public function projectDone(User $user, Project $project)
    {
        $project->update([
            'status' => 4
        ]);

        return back();
    }

    public function taskWork(User $user, Task $task)
    {
        $task->update([
            'status' => 2
        ]);

        return back();

    }

    public function taskStuck(User $user, Task $task)
    {
        $task->update([
            'status' => 3
        ]);

        return back();
    }

    public function taskDone(User $user, Task $task)
    {
        $task->update([
            'status' => 4
        ]);

        return back();
    }
}
