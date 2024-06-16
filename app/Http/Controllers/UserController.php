<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request, User $user)
    {
        $user = User::with('summarize')->find($user->id);

        return view('users.index', ['user' => $user]);
    }
}
