@extends('layouts.dashboard')

@section('title', 'Login')

@section('content')

    <div class="container">

        <h1>Login</h1>

        <form method="POST" action="#">

            @csrf

            <div>
                <label>Email</label>
                <input type="email" name="email">
            </div>

            <div>
                <label>Password</label>
                <input type="password" name="password">
            </div>

            <button type="submit">
                Login
            </button>

        </form>

    </div>

@endsection