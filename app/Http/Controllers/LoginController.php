<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() 
    {
        $users = User::query()
            // ->with('logins')
            ->addSelect(['last_login_at' => \App\Models\Login::query()
                ->select('created_at')
                ->whereColumn('user_id', 'users.id')
                ->latest()
                ->take(1)
            ])
            ->withCasts(['last_login_at' => 'datetime'])
            ->orderBy('name')
            ->paginate();

        return view('login', compact('users'));
    }
}
