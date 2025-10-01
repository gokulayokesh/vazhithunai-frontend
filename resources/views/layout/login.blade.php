@extends('include.header')
@section('title', 'Login | Vazhithunai Matrimony')
@section('content')

    <body class="index-page">
        @include('include.nav-header')

        <main class="main">

            <!-- Page Title -->
            <div class="page-title light-background">
                <div class="container d-lg-flex justify-content-between align-items-center">
                    <h1 class="mb-2 mb-lg-0">Login</h1>
                    <nav class="breadcrumbs">
                        <ol>
                            <li><a href="/">Home</a></li>
                            <li class="current">Login</li>
                        </ol>
                    </nav>
                </div>
            </div><!-- End Page Title -->

            <!-- Login Section -->
            <section id="login" class="login section">

                <div class="container" data-aos="fade-up" data-aos-delay="100">

                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-md-10">
                            <div class="auth-container" data-aos="fade-in" data-aos-delay="200">

                                <!-- Login Form -->
                                <div class="auth-form login-form active">
                                    <div class="form-header">
                                        <h3>Welcome Back</h3>
                                        <p>Sign in to your account</p>
                                    </div>
                                    @if ($errors->any())
                                        <div class="alert alert-danger py-2 alert-dismissible fade show">
                                            {{ $errors->first() }}
                                        </div>
                                    @endif
                                    @if (session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('success') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif
                                    <form class="auth-form-content" action="{{ route('login') }}" method="POST">
                                        <div class="input-group mb-3">
                                            <span class="input-icon">
                                                <i class="bi bi-envelope"></i>
                                            </span>
                                            <input type="text" name="login" class="form-control"
                                                placeholder="Email address / Mobile Number" required=""
                                                autocomplete="email">
                                        </div>

                                        <div class="input-group mb-3">
                                            <span class="input-icon">
                                                <i class="bi bi-lock"></i>
                                            </span>
                                            <input type="password" name="password" class="form-control"
                                                placeholder="Password" required="" autocomplete="current-password">
                                            <span class="password-toggle">
                                                <i class="bi bi-eye"></i>
                                            </span>
                                        </div>
                                        <input type="hidden" name="from_form" value="1">
                                        <div class="form-options mb-4">
                                            <div class="remember-me">
                                                <input type="checkbox" id="rememberLogin">
                                                <label for="rememberLogin">Remember me</label>
                                            </div>
                                            <a href="#" class="forgot-password" data-bs-toggle="modal"
                                                data-bs-target="#forgotPasswordModal" aria-haspopup="dialog"
                                                aria-expanded="false" aria-controls="forgotPasswordModal">Forgot
                                                password?</a>
                                        </div>

                                        <button type="submit" class="auth-btn primary-btn mb-3">
                                            Sign In
                                            <i class="bi bi-arrow-right"></i>
                                        </button>

                                        <div class="divider">
                                            <span>or</span>
                                        </div>

                                        <div class="g_id_signin" data-type="standard" data-shape="square"
                                            data-theme="filled_blue" data-text="signin_with" data-size="large"
                                            data-context="signin" data-itp_support="true" data-auto_prompt="true"
                                            data-logo_alignment="left">
                                        </div>

                                        <div class="switch-form">
                                            <span>Don't have an account?</span>
                                            <a href="/sign-up" class="switch-btn" data-target="register">Create
                                                account</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </section><!-- /Login Section -->

        </main>
        @include('include.login-modal')
        @include('include.forgot-password')
        @include('include.footer')
        @include('include.script')
    </body>
@endsection
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.querySelector(".auth-form-content");

        form.addEventListener("submit", function(e) {
            const loginInput = form.querySelector("input[name='login']");
            const passwordInput = form.querySelector("input[name='password']");

            const loginValue = loginInput.value.trim();
            const passwordValue = passwordInput.value;

            // Regex patterns
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const mobileRegex = /^\d{10}$/;
            const passwordRegex =
                /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&^#()[\]{}<>~+=._-]).{8,}$/;

            let errors = [];

            // Validate login (email or mobile)
            if (!(emailRegex.test(loginValue) || mobileRegex.test(loginValue))) {
                errors.push("Enter a valid email address or 10‑digit mobile number.");
            }

            // Validate password
            if (!passwordRegex.test(passwordValue)) {
                errors.push(
                    "Password must be at least 8 characters and include uppercase, lowercase, number, and special character."
                );
            }

            if (errors.length > 0) {
                e.preventDefault(); // stop form submission
                errors.forEach(err => {
                    showToast(err, "error", 'bottom');
                });
                return;
            }
        });
    });
</script>
