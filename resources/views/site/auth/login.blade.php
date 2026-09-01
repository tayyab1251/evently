@include('dashboard/includes/dashboard-css')

<!-- ==========================================
START: Authentication Container & Login Card
========================================== -->
<div class="login-wrapper">
    <!-- Glowing background shapes for modern visual appearance -->
    <div class="login-bg-shape login-bg-shape-1"></div>
    <div class="login-bg-shape login-bg-shape-2"></div>

    <!-- Main centered login card -->
    <div class="login-card">

        <!-- Brand Identity -->
        <a href="{{route('home')}}" class="login-brand text-decoration-none">
            <i class="bi bi-asterisk"></i>
            <span>{{config('app.name')}}</span>
        </a>

        <p class="login-subtitle">Please sign in to access your dashboard</p>
        @if (session('success'))
        <div class="alert alert-success flex items-center gap-2 text-start">
            <i class="bi bi-check-circle-fill"></i> &nbsp;
            {{ session('success') }}
        </div>
        @endif

         @error('login_error')
        <div class="alert alert-danger flex items-center gap-2 text-start">
            <i class="bi bi-exclamation-circle-fill"></i> &nbsp;
            {{ $message }}
        </div>
        @enderror

        <!-- Login Form -->
        <form action="{{ route('user.login') }}" method="POST" id="loginForm" class="needs-validation" novalidate>

            <!-- Email Input Group -->
            <div class="login-form-group">
                <label for="email" class="login-form-label">Email Address</label>
                <div class="login-input-group">
                    <i class="bi bi-envelope input-icon"></i>
                    <input type="email" id="email" name="email" class="login-input" required placeholder="name@company.com"
                        value="{{old('email')}}">
                </div>
                @error('email')
                <div class="form-feedback-custom invalid-custom">
                    <i class="bi bi-exclamation-circle-fill"></i>
                    {{ $message }}
                </div>
                @enderror
            </div>

            <!-- Password Input Group -->
            <div class="login-form-group">
                <label for="password" class="login-form-label">Password</label>
                <div class="login-input-group">
                    <i class="bi bi-shield-lock input-icon"></i>
                    <input type="password" required id="password" name="password" class="login-input login-input-password"
                        placeholder="••••••••">
                    <button type="button" class="password-toggle-btn" id="toggle-password" aria-label="Show password">
                        <i class="bi bi-eye"></i>
                    </button>
                </div>
                @error('password')
                <div class="form-feedback-custom invalid-custom">
                    <i class="bi bi-exclamation-circle-fill"></i>
                    {{ $message }}
                </div>
                @enderror
            </div>

            <!-- Options (Remember me & Forgot Password) -->
            <div class="login-options">
                <label class="custom-control-label">
                    <input type="checkbox" class="custom-checkbox-input" name="remember_me" id="rememberMe" required>
                    <span>Remember Me</span>
                </label>
                <a href="#" class="forgot-password-link">Forgot Password?</a>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn-login" id="btn-submit">
                <span>Sign In to Dashboard</span>
                <i class="bi bi-arrow-right"></i>
            </button>

        </form>

        {{--
        <!-- Divider -->
        <div class="login-divider">Or sign in with</div>

        <!-- Social Logins -->
        <div class="social-login-grid">
            <button class="btn-social" type="button" id="btn-google">
                <i class="bi bi-google text-danger"></i>
                <span>Google</span>
            </button>
            <button class="btn-social" type="button" id="btn-github">
                <i class="bi bi-github"></i>
                <span>GitHub</span>
            </button>
        </div> --}}

        <!-- Footer Link -->
        <p class="login-footer-text">
            Don't have an account? <a href="{{route('user.register')}}" id="link-register">Register Now</a>
        </p>

    </div>
</div>

<!-- END: Authentication Container -->

@include('dashboard/includes/dashboard-js')

<!-- Custom Authentication interactions script -->
@vite('resources/assets/js/auth.js')