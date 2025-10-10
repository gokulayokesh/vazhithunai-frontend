<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-3">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title text-white fw-bold" id="loginModalLabel">Welcome Back</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 login">
                <form id="loginForm" action="{{ route('login') }}" method="POST">
                    <!-- CSRF Token (Laravel) -->
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger py-2 alert-dismissible fade show">
                            {{ $errors->first() }}
                        </div>
                    @endif
                    <div id="loginError" class="alert alert-danger d-none"></div>
                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email / Mobile Number</label>
                        <input type="text" class="form-control" id="login" name="login"
                            placeholder="Enter your registered email or mobile" required>
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Enter your password" required>
                    </div>
                    <input type="hidden" name="from_form" value="0">
                    <!-- Remember Me & Forgot Password -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>
                        <a href="#" class="small text-decoration-none" data-bs-toggle="modal"
                            data-bs-target="#forgotPasswordModal" aria-haspopup="dialog" aria-expanded="false"
                            aria-controls="forgotPasswordModal">Forgot Password?</a>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold">
                        Login
                    </button>

                    <div class="divider">
                        <span>or</span>
                    </div>
                    <div class="g_id_signin" data-type="standard" data-shape="square" data-theme="filled_blue"
                        data-text="signin_with" data-size="large" data-context="signin" data-itp_support="true"
                        data-auto_prompt="true" data-logo_alignment="left" style="justify-items: center;">
                    </div>
                </form>

            </div>
            <div class="modal-footer justify-content-center">
                <p class="mb-0 small">
                    New to our community?
                    <a href="/sign-up" class="fw-semibold text-primary text-decoration-none">Create an account</a>
                </p>
            </div>
        </div>
    </div>
</div>

@section('script')
    @if ($errors->any())
        <script>
            var loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
            loginModal.show();
        </script>
    @endif
    <script>
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();

            let form = this;
            let formData = new FormData(form);
            const token = document.querySelector('input[name="_token"]').value

            fetch('/login', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': token,
                        'Accept': 'application/json'
                    },
                    body: formData,
                    redirect: 'manual'
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        location.reload(true);
                    } else {
                        if (data.verify) {
                            let errorBox = document.getElementById('loginError');
                            errorBox.innerHTML =
                                `Please verify your email address before logging in. <a href="/resend-verification?email=${encodeURIComponent(document.getElementById('login').value)}" class="btn btn-link p-0 m-0 align-baseline text-decoration-none">Resend Verification Email</a>`;
                            errorBox.classList.remove('d-none');
                            return;
                        }
                        let errorBox = document.getElementById('loginError');
                        errorBox.textContent = data.message || 'Login failed';
                        errorBox.classList.remove('d-none');
                    }
                })
                .catch(() => {
                    let errorBox = document.getElementById('loginError');
                    errorBox.textContent = 'Something went wrong';
                    errorBox.classList.remove('d-none');
                });
        });
    </script>
@endsection
@include('include.forgot-password')
