<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
}
