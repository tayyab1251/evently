@include('dashboard/includes/dashboard-css')

<!-- ==========================================
START: Authentication Container & Registration Card
========================================== -->

<div class="login-wrapper">

    <!-- Glowing background shapes for modern visual appearance -->
    <div class="login-bg-shape login-bg-shape-1"></div>
    <div class="login-bg-shape login-bg-shape-2"></div>

    <!-- Main centered registration card -->
    <div class="login-card">
        <!-- Brand Identity -->
        <a href="{{ route('user.register.store') }}" class="login-brand text-decoration-none">
            <i class="bi bi-asterisk"></i>
            <span>{{ config('app.name') }}</span>
        </a>
        <p class="login-subtitle">Create your account to access your dashboard</p>
        <!-- Registration Form -->
        <form action="{{ route('user.register.store') }}" method="POST" id="registerForm" class="needs-validation"
            novalidate>
            @csrf
            <!-- Name Input Group -->
            <div class="login-form-group">
                <label for="name" class="login-form-label">Full Name</label>
                <div class="login-input-group">
                    <i class="bi bi-person input-icon"></i>
                    <input type="text" id="name" name="name" class="login-input" placeholder="John Doe"
                        value="{{ old('name') }}" required>
                </div>
                @error('name')
                <div class="form-feedback-custom invalid-custom">
                    <i class="bi bi-exclamation-circle-fill"></i>
                    {{ $message }}
                </div>
                @enderror
            </div>
            <!-- Email Input Group -->
            <div class="login-form-group">
                <label for="email" class="login-form-label">Email Address</label>
                <div class="login-input-group">
                    <i class="bi bi-envelope input-icon"></i>
                    <input type="email" id="email" name="email" class="login-input" placeholder="name@company.com"
                        value="{{ old('email') }}" required>
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
                <label for="password" class="login-form-label">
                    Password
                </label>
                <div class="login-input-group">
                    <i class="bi bi-shield-lock input-icon"></i>
                    <input type="password" id="password" name="password" class="login-input login-input-password"
                        placeholder="••••••••" required>
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
            <!-- Confirm Password Input Group -->
            <div class="login-form-group">
                <label for="password_confirmation" class="login-form-label">
                    Confirm Password
                </label>
                <div class="login-input-group">
                    <i class="bi bi-shield-check input-icon"></i>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="login-input login-input-password" placeholder="••••••••" required>
                    <button type="button" class="password-toggle-btn" id="toggle-password-confirmation"
                        aria-label="Show password">
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
            <!-- Terms & Conditions -->
            <div class="login-options">
                <label class="custom-control-label">
                    <input type="checkbox" class="custom-checkbox-input" id="terms" name="terms" required>
                    <span>I agree to the Terms & Conditions</span>
                </label>
                @error('terms')
                <div class="form-feedback-custom invalid-custom">
                    <i class="bi bi-exclamation-circle-fill"></i>
                    {{ $message }}
                </div>
                @enderror
            </div>
            <!-- Submit Button -->
            <button type="submit" class="btn-login" id="btn-submit">
                <span>Create Account</span>
                <i class="bi bi-arrow-right"></i>
            </button>
        </form>

        <!-- Divider -->
        {{--
        <div class="login-divider">Or sign up with</div>
        <!-- Social Registration -->
        <div class="social-login-grid">
            <button class="btn-social" type="button" id="btn-google">
                <i class="bi bi-google text-danger"></i>
                <span>Google</span>
            </button>
            <button class="btn-social" type="button" id="btn-github">
                <i class="bi bi-github"></i>
                <span>GitHub</span>
            </button>
        </div>
        --}}

        <!-- Footer Link -->
        <p class="login-footer-text">
            Already have an account?
            <a href="{{ route('user.login') }}" id="link-login">
                Sign In
            </a>
        </p>
    </div>
</div>

<!-- END: Authentication Container -->

@include('dashboard/includes/dashboard-js')

<!-- Custom Authentication interactions script -->
@vite('resources/assets/js/auth.js')