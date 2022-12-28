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
        
    }

    public function project()
    {
        
    }

    public function task()
    {
        
    }
}
