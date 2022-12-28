<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\User\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/login');

//EMAIL VERIFICATION

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    $roles = Auth::user()->getRoleNames();
    foreach ($roles as $role) {
        switch ($role) {
            case 'user':
                return redirect()->route('user.dashboard');
            case 'admin':
                return redirect()->route('admin.dashboard');
            default:
                return redirect('/');
        }
    }
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

//END EMAIL VERIFICATION


//DASHBOARDS

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::middleware('role:user')->prefix('user')->as('user.')->group(function(){
        Route::get('/{user}/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
        Route::get('/{user}/clients', [UserController::class, 'client'])->name('clients');
        Route::get('/{user}/projects', [UserController::class, 'project'])->name('projects');
        Route::get('{user}/tasks', [UserController::class, 'task'])->name('tasks');
    });

    Route::middleware('role:admin')->prefix('admin')->as('admin.')->group(function(){
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/users', [AdminController::class, 'index'])->name('users.index');
        Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

        Route::get('/clients/{client}/status', [ClientController::class, 'status'])->name('clients.status');
        Route::resource('clients', ClientController::class)->except('show');

        Route::resource('projects', ProjectController::class);

        Route::resource('tasks', TaskController::class)->except('show');
    });
});
