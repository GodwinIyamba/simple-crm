<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\tasks\TaskStoreRequest;
use App\Http\Requests\tasks\TaskUpdateRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::latest()->get();

        return view('admin.tasks.index', compact('tasks'));
    }

    public function create()
    {
        $users = User::whereHas('roles', function (Builder $query) {
            $query->where('name', 'user');
        })->get();

        return view('admin.tasks.create', compact('users'));
    }

    public function store(TaskStoreRequest $request)
    {
        Task::create($request->validated());

        return redirect()->route('admin.tasks.index');
    }

    public function edit(Task $task)
    {
        $users = User::whereHas('roles', function (Builder $query) {
            $query->where('name', 'user');
        })->get();
        return view('admin.tasks.edit', compact('task', 'users'));
    }

    public function update(TaskUpdateRequest $request, Task $task)
    {
        $task->update($request->validated());

        return redirect()->route('admin.tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return back();
    }
}
