<!-- Forgot Password Modal -->
<div class="modal fade" id="forgotPasswordModal" tabindex="-1" aria-labelledby="forgotPasswordModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-white">
                <h5 class="modal-title text-white" id="forgotPasswordModalLabel">Forgot Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Email Form -->
                <div id="emailForm">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="forgot-password-email"
                            id="forgot-password-email" required="" autocomplete="email"
                            placeholder="Enter your email">
                    </div>
                    <div class="mb-4">
                        <x-recaptcha />
                    </div>
                    <button type="button" class="btn btn-primary" onclick="sendOTP()">Send OTP</button>
                </div>

                <!-- OTP Verification Form (Initially Hidden) -->
                <div id="otpForm" style="display: none;">
                    <div class="mb-3">
                        <label for="otp" class="form-label">Enter OTP</label>
                        <input type="text" class="form-control" id="otp"
                            placeholder="Enter OTP sent to your email">
                    </div>
                    <div class="mb-3">
                        <label for="newPassword" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="forgot-password-newPassword"
                            name="forgot-password-newPassword" placeholder="Enter new password">
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="forgot-password-confirmPassword"
                            name="forgot-password-confirmPassword" placeholder="Confirm new password">
                    </div>
                    <button type="button" class="btn btn-primary" onclick="verifyOTP()">Reset Password</button>
                </div>

                <!-- Success Message (Initially Hidden) -->
                <div id="successMessage" class="alert alert-success" style="display: none;">
                    Password reset successful! You can now login with your new password.
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    function sendOTP() {
        const email = document.getElementById('forgot-password-email').value.trim();
        const recaptchaResponse = document.querySelector('[name="g-recaptcha-response"]')?.value;

        // Basic email regex
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!email || !emailRegex.test(email)) {
            showToast('Please enter a valid email address.', "error");
            return;
        }

        if (!recaptchaResponse) {
            showToast('Please complete the reCAPTCHA.', "error");
            return;
        }

        fetch('/send-otp', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    email: email,
                    'g-recaptcha-response': recaptchaResponse
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showToast('OTP sent successfully!', "success");
                    document.getElementById('emailForm').style.display = 'none';
                    document.getElementById('otpForm').style.display = 'block';
                    grecaptcha.reset(); // reset captcha for next use
                } else {
                    showToast(data.message || 'Failed to send OTP. Please try again.', "error");
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('An error occurred. Please try again.', "error");
            });
    }


    function verifyOTP() {
        const otp = document.getElementById('otp').value.trim();
        const newPassword = document.getElementById('forgot-password-newPassword').value;
        const confirmPassword = document.getElementById('forgot-password-confirmPassword').value;

        if (!otp) {
            showToast('Please enter the OTP sent to your email.', "error");
            return;
        }

        if (!newPassword || !confirmPassword) {
            showToast('Please enter and confirm your new password.', "error");
            return;
        }

        if (newPassword.length < 8) {
            showToast('Password must be at least 8 characters.', "error");
            return;
        }
        const passwordRegex =
            /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&^#()[\]{}<>~+=._-])[A-Za-z\d@$!%*?&^#()[\]{}<>~+=._-]{8,}$/;

        if (!passwordRegex.test(password)) {
            showToast(
                "Password must be at least 8 characters and include uppercase, lowercase, number, and special character.",
                "error");
            return;
        }

        if (newPassword !== confirmPassword) {
            showToast('Passwords do not match!', "error");
            return;
        }

        fetch('/verify-otp', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    email: document.getElementById('forgot-password-email').value,
                    otp: otp,
                    newPassword: newPassword
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showToast('Password reset successful!', "success");
                    document.getElementById('otpForm').style.display = 'none';
                    document.getElementById('successMessage').style.display = 'block';

                    // Redirect to login after 3s
                    setTimeout(() => {
                        window.location.href = "{{ route('login') }}";
                    }, 3000);
                } else {
                    showToast(data.message || 'OTP verification failed. Please try again.', "error");
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('An error occurred. Please try again.', "error");
            });
    }
</script>
