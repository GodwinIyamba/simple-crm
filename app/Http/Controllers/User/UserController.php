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
        $projects = Auth::user()->projects;
        $clients = $projects->map(function($project) {
            if($project->user_id == Auth::id()) {
                return $project->client;
            }
        })->groupBy('name');

        return view('simple_user.clients.index', compact('clients'));
    }

    public function project()
    {
        $projects = Project::with('client')->where('user_id', Auth::id())->where('status', '!=', '4')->get();
        return view('simple_user.projects.index', compact('projects'));
    }

    public function singleProject($user_id, $project_id)
    {
        $project = Project::findOrFail($project_id);
        return view('simple_user.projects.show', compact('project'));

    }

    public function task()
    {
        $tasks = Task::where('user_id', Auth::id())->where('status', '!=', '4')->get();
        return view('simple_user.tasks.index', compact('tasks'));
    }

    public function singleTask($user_id, $task_id)
    {
        $task = Task::findOrFail($task_id);
        return view('simple_user.tasks.show', compact('task'));
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

    public function notifications(User $user)
    {
       $user_notifications = $user->notifications;

       return view('simple_user.notifications.notification', compact('user_notifications'));
    }
    public function unreadNotifications(User $user)
    {
       $user_notifications = $user->unreadNotifications;

       return view('simple_user.notifications.unread_notification', compact('user_notifications'));
    }

    public function readNotifications(User $user)
    {
        foreach ($user->notifications as $notification) {
            $notification->MarkAsRead();
        }

        $user_notifications = $user->notifications;

        return view('simple_user.notifications.notification', compact('user_notifications'));
    }

    public function userLogout()
    {
        Auth::guard('web')->logout();

        return redirect('/');

    }
}
