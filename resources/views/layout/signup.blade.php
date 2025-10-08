@extends('include.header')
@section('title', 'Sign-up | Vazhithunai Matrimony')
@section('content')

    <body class="index-page">
        @include('include.nav-header')

        <main class="main">

            <!-- Page Title -->
            <div class="page-title light-background">
                <div class="container d-lg-flex justify-content-between align-items-center">
                    <h1 class="mb-2 mb-lg-0">Register</h1>
                    <nav class="breadcrumbs">
                        <ol>
                            <li><a href="/">Home</a></li>
                            <li class="current">Register</li>
                        </ol>
                    </nav>
                </div>
            </div><!-- End Page Title -->

            <!-- Register Section -->
            <section id="register" class="register section" style="padding: 0px;">

                <div class="container" data-aos="fade-up" data-aos-delay="100">

                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="registration-form-wrapper">
                                <div class="form-header text-center">
                                    <h2>Create Your Account</h2>
                                    <p>Create your account and start your journey with us</p>
                                    <p id="responseMessage"></p>
                                </div>

                                <div class="row">
                                    <div class="col-lg-8 mx-auto">

                                        <form id="preRegisterForm">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="Full Name" required="" autocomplete="name">
                                                <label for="name">Full Name</label>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="number" class="form-control" id="mobile"
                                                            name="mobile" placeholder="Mobile Number" required=""
                                                            autocomplete="mobile">
                                                        <label for="mobile">Mobile Number</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="email" class="form-control" id="email"
                                                            name="email" placeholder="Email Address" required=""
                                                            autocomplete="email">
                                                        <label for="email">Email Address</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input type="password" class="form-control" id="password"
                                                            name="password" placeholder="Password" required=""
                                                            minlength="8" autocomplete="new-password">
                                                        <label for="password">Password</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input type="password" class="form-control" id="confirmPassword"
                                                            name="confirmPassword" placeholder="Confirm Password"
                                                            required="" minlength="8" autocomplete="new-password">
                                                        <label for="confirmPassword">Confirm Password</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="referralCode"
                                                            name="referralCode" placeholder="Referral Code" value="">
                                                        <label for="referralCode">Referral Code / Referrer Mobile
                                                            (Optional)</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-check mb-4">
                                                <input class="form-check-input" type="checkbox" id="termsCheck"
                                                    name="termsCheck" required="">
                                                <label class="form-check-label" for="termsCheck">
                                                    I agree to the <a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#termsModal" aria-haspopup="dialog"
                                                        aria-expanded="false" aria-controls="termsModal">Terms of
                                                        Service</a> and <a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#privacyModal" aria-haspopup="dialog"
                                                        aria-expanded="false" aria-controls="privacyModal">Privacy
                                                        Policy</a>
                                                </label>
                                            </div>
                                            <div class="form-check mb-4">
                                                <x-recaptcha />
                                            </div>
                                            @error('g-recaptcha-response')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            {{-- <div class="form-check mb-4">
                                                <input class="form-check-input" type="checkbox" id="marketingCheck"
                                                    name="marketingCheck">
                                                <label class="form-check-label" for="marketingCheck">
                                                    I would like to receive marketing communications about products,
                                                    services, and promotions
                                                </label>
                                            </div> --}}

                                            <div class="d-grid mb-4">
                                                <button type="submit" class="btn btn-register-1">Create Account</button>
                                            </div>

                                            <div class="login-link text-center">
                                                <p>Already have an account? <a href="/login">Sign in</a></p>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="social-login">
                                    <div class="row">
                                        <div class="col-lg-8 mx-auto" style="text-align: center;">
                                            <div class="divider">
                                                <span>or sign up with</span>
                                            </div>

                                            <div class="g_id_signin" data-type="standard" data-shape="square"
                                                data-theme="filled_blue" data-text="signup_with" data-size="large"
                                                data-context="signup" data-itp_support="true" data-auto_prompt="true"
                                                data-logo_alignment="left" style="justify-items: center;">
                                            </div>

                                            <div class="social-buttons">

                                                {{-- <a href="/auth/google" class="btn btn-social">
                                                    <i class="bi bi-google"></i>
                                                    <span>Google</span>
                                                </a>
                                                <a href="#" class="btn btn-social">
                                                <i class="bi bi-facebook"></i>
                                                <span>Facebook</span>
                                            </a>
                                            <a href="#" class="btn btn-social">
                                                <i class="bi bi-apple"></i>
                                                <span>Apple</span>
                                            </a> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="decorative-elements">
                                    <div class="circle circle-1"></div>
                                    <div class="circle circle-2"></div>
                                    <div class="circle circle-3"></div>
                                    <div class="square square-1"></div>
                                    <div class="square square-2"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </section><!-- /Register Section -->

        </main>
        @include('include.login-modal')
        @include('include.footer')
        @include('include.script')
        @include('include.terms-modal')
        @include('include.privacy-modal')
    </body>
@endsection
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.getElementById('preRegisterForm');

        form.addEventListener('submit', async function(e) {
            e.preventDefault();

            // Clear previous messages
            document.getElementById('responseMessage')?.remove();

            // Collect values
            const name = document.getElementById('name').value.trim();
            const mobile = document.getElementById('mobile').value.trim();
            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            const termsCheck = document.getElementById('termsCheck').checked;
            const recaptchaResponse = document.querySelector('[name="g-recaptcha-response"]')
                ?.value;
            const passwordRegex =
                /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&^#()[\]{}<>~+=._-])[A-Za-z\d@$!%*?&^#()[\]{}<>~+=._-]{8,}$/;

            // Client-side validation
            let errors = [];

            if (name.length < 3) errors.push("Full Name must be at least 3 characters.");
            if (!/^\d{10}$/.test(mobile)) errors.push("Mobile number must be 10 digits.");
            if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) errors.push("Invalid email format.");
            if (password.length < 8) errors.push("Password must be at least 8 characters.");
            if (!passwordRegex.test(password)) errors.push(
                "Password must be at least 8 characters and include uppercase, lowercase, number, and special character."
            );
            if (password !== confirmPassword) errors.push("Passwords do not match.");
            if (!termsCheck) errors.push("You must agree to the Terms and Privacy Policy.");
            if (!recaptchaResponse) errors.push("Please complete the reCAPTCHA.");

            if (errors.length > 0) {
                showMessage(errors.join("<br>"), "danger");
                return;
            }

            // If validation passes, submit via fetch
            const formData = new FormData(form);

            try {
                const response = await fetch("{{ route('pre.register') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Accept": "application/json"
                    },
                    body: formData
                });

                const result = await response.json();
                if (result.status === "success") {
                    showMessage(result.message, "success");
                    form.reset();
                    grecaptcha.reset(); // reset captcha if v2

                    // Redirect after 3 seconds
                    setTimeout(function() {
                        window.location.href =
                            "/login"; // or use route('login') if you render it in Blade
                    }, 3000);
                } else {
                    showMessage(result.message, "danger");
                }
            } catch (error) {
                showMessage("Something went wrong: " + error, "danger");
            }
        });

        function showMessage(msg, type) {
            let container = document.getElementById('responseMessage');
            if (!container) {
                container = document.createElement('div');
                container.id = 'responseMessage';
                form.prepend(container);
            }
            container.innerHTML = `<div class="alert alert-${type}">${msg}</div>`;
        }

        const urlParams = new URLSearchParams(window.location.search);
        const referralCode = urlParams.get('referral-code');
        if (referralCode) {
            document.getElementById('referralCode').value = referralCode;
        }
    });
</script>
