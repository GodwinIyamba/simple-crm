<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
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
        return view('admin.tasks.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function edit(Task $task)
    {
        return view('admin.tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        //
    }

    public function destroy(Task $task)
    {
        //
    }
}
