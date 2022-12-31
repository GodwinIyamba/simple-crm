<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{

    public function toResponse($request)
    {
        $user = Auth::user();
        $roles = $user->getRoleNames();
        foreach ($roles as $role) {
            switch ($role ) {
                case 'user':
                    return redirect()->route('user.dashboard');
                case 'admin':
                    return redirect()->route('admin.dashboard');
                default:
                    return redirect('/');
            }
        }
    }

}
