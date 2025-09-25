<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-3">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title text-white fw-bold" id="loginModalLabel">Welcome Back</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form id="loginForm" action="{{ route('login') }}" method="POST">
                    <!-- CSRF Token (Laravel) -->
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger py-2">
                            {{ $errors->first() }}
                        </div>
                    @endif
                    <div id="loginError" class="alert alert-danger d-none"></div>
                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email / Mobile Number</label>
                        <input type="text" class="form-control" id="email" name="email"
                            placeholder="Enter your registered email or mobile" required>
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Enter your password" required>
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>
                        <a href="/forgot-password" class="small text-decoration-none">Forgot Password?</a>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold">
                        Login
                    </button>
                </form>
                <div class="divider">
                    <span>or</span>
                </div>
                <div class="g_id_signin" data-type="standard" data-shape="rectangular" data-theme="outline"
                    data-text="signin_with" data-size="large" data-logo_alignment="left">
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <p class="mb-0 small">
                    New to our community?
                    <a href="/register" class="fw-semibold text-primary text-decoration-none">Create an account</a>
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
                        window.location.href = '/';
                    } else {
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
