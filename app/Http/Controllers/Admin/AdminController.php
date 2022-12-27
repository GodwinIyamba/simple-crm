<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::whereHas('roles', function (Builder $query) {
            $query->where('name', 'user');
        })->latest()->get();


        return view('admin.users.index', compact('users'));
    }

    public function dashboard()
    {
        $users = User::whereHas('roles', function (Builder $query) {
            $query->where('name', 'user');
        })->latest()->get();

        $clients = Client::latest()->get();
        $projects = Project::with('client', 'user');
        $tasks = Task::with('user');

        return view('admin.dashboard', compact('users', 'clients', 'projects', 'tasks'));
    }
}
