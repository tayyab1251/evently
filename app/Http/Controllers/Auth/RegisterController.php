<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    // function to display register form
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // function to handle user registeration data
    public function store(RegisterRequest $request)
    {
        User::create($request->validated());
        return redirect()->route('login')->with('success', 'User account has been created');
    }
}
