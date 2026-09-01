<?php

namespace App\Http\Controllers\Site\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserRegisterController extends Controller
{
    // function to display register form
    public function showUserRegisterForm()
    {
        return view('site.auth.register');
    }

    // function to handle user registeration data
    public function store(RegisterRequest $request)
    {
        User::create($request->validated());
        return redirect()->route('user.login')->with('success', 'User account has been created');
    }
}
