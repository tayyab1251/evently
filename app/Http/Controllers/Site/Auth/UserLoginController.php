<?php

namespace App\Http\Controllers\Site\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserLoginController extends Controller
{
    public function showUserLoginForm()
    {
        // logout if user is logged in
        // if (Auth::check()) {
        //     Auth::logout();
        //     request()->session()->regenerate();
        // }
        
        return view('site.auth.login');
    }

    // method to process login
    public function userLogin(LoginRequest $request)
    {
        // Check user credentials
        $credentials = $request->validated();

        $credentials['role'] = 'user';

        // dd($credentials);


        if (! Auth::attempt($credentials)) {

            return back()->withErrors([
                'login_error' => 'Email or password is incorrect.'
            ])->withInput();
        }

        $request->session()->regenerate();

        return redirect()
            ->intended(route('user.dashboard'))
            ->with('success', 'You are logged in successfully.');
    }
}
