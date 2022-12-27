<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isEmpty;

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
        $projects = Project::with('client', 'user')->latest()->get();
        $tasks = Task::with('user')->latest()->get();

        return view('admin.dashboard', compact('users', 'clients', 'projects', 'tasks'));
    }

    public function logout()
    {
        Auth::guard('web')->logout();

        return redirect('/');
    }
}
