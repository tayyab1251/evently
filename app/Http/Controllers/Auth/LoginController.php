<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // method to display login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // method to process login
    public function login(LoginRequest $request)
    {
        // Check user credentials
        $credentials = $request->validated();
        $credentials['role'] = 'admin';

        if (! Auth::attempt($credentials)) {
            return back()->withErrors([
                'login_error' => 'Email or password is incorrect.'
            ])->withInput();
        }

        $request->session()->regenerate();

        return redirect()
            ->intended(route('admin.dashboard'))
            ->with('success', 'You are logged in successfully.');
    }
}
