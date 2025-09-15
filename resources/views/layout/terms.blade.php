@include('include.header')

<body class="terms-page">
    @include('include.nav-header')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title light-background">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h1 class="mb-2 mb-lg-0">Terms</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="current">Terms</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <!-- Terms Of Service Section -->
        <section id="terms-of-service" class="terms-of-service section">

            <div class="container" data-aos="fade-up">
                <!-- Page Header -->
                <div class="tos-header text-center" data-aos="fade-up">
                    <span class="last-updated">Last Updated: August 27, 2025</span>
                    <h2>Terms & Conditions</h2>
                    <p>Please read these Terms & Conditions carefully before using our matrimonial services.</p>
                </div>

                <!-- Content -->
                <div class="tos-content" data-aos="fade-up" data-aos-delay="200">

                    <!-- Agreement Section -->
                    <div id="agreement" class="content-section">
                        <h3>1. Acceptance of Terms</h3>
                        <p>By registering on our website or using our services, you agree to comply with these Terms &
                            Conditions. If you do not agree, please do not use our platform.</p>
                        <div class="info-box">
                            <i class="bi bi-info-circle"></i>
                            <p>These terms apply to all members, visitors, and anyone accessing our services.</p>
                        </div>
                    </div>

                    <!-- Eligibility -->
                    <div id="eligibility" class="content-section">
                        <h3>2. Eligibility</h3>
                        <p>You must be at least 18 years old (or the legal marriageable age in your jurisdiction) to
                            register. By creating an account, you confirm that you are legally eligible to marry as per
                            the laws of your country and community.</p>
                    </div>

                    <!-- User Accounts -->
                    <div id="user-accounts" class="content-section">
                        <h3>3. Member Responsibilities</h3>
                        <p>You agree to provide accurate, truthful, and up-to-date information in your profile.
                            Misrepresentation may lead to suspension or termination of your account.</p>
                        <div class="alert-box">
                            <i class="bi bi-exclamation-triangle"></i>
                            <div class="alert-content">
                                <h5>Important Notice</h5>
                                <p>You are responsible for safeguarding your login credentials and for all activities
                                    under your account.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Prohibited Activities -->
                    <div id="prohibited" class="content-section">
                        <h3>4. Prohibited Activities</h3>
                        <p>Members must use the platform only for genuine matrimonial purposes. The following activities
                            are strictly prohibited:</p>
                        <div class="prohibited-list">
                            <div class="prohibited-item">
                                <i class="bi bi-x-circle"></i>
                                <span>Creating fake profiles or impersonating others</span>
                            </div>
                            <div class="prohibited-item">
                                <i class="bi bi-x-circle"></i>
                                <span>Using the platform for dating, casual relationships, or commercial
                                    solicitation</span>
                            </div>
                            <div class="prohibited-item">
                                <i class="bi bi-x-circle"></i>
                                <span>Sharing obscene, offensive, or unlawful content</span>
                            </div>
                            <div class="prohibited-item">
                                <i class="bi bi-x-circle"></i>
                                <span>Attempting to hack, disrupt, or misuse the service</span>
                            </div>
                        </div>
                    </div>

                    <!-- Privacy -->
                    <div id="privacy" class="content-section">
                        <h3>5. Privacy & Data Use</h3>
                        <p>We respect your privacy. Personal information will be handled in accordance with our Privacy
                            Policy. You control what information is visible to other members.</p>
                    </div>

                    <!-- Disclaimers -->
                    <div id="disclaimer" class="content-section">
                        <h3>6. Disclaimers</h3>
                        <p>We do not guarantee that you will find a suitable match. The platform is a facilitator and is
                            not responsible for the actions or conduct of members.</p>
                        <div class="disclaimer-box">
                            <p>We do not warrant that:</p>
                            <ul>
                                <li>All member information is 100% verified</li>
                                <li>The service will be uninterrupted or error-free</li>
                                <li>Matches will meet your expectations</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Limitation of Liability -->
                    <div id="limitation" class="content-section">
                        <h3>7. Limitation of Liability</h3>
                        <p>We are not liable for any direct, indirect, or consequential damages arising from your use of
                            the platform, including but not limited to emotional distress, financial loss, or disputes
                            between members.</p>
                    </div>

                    <!-- Indemnification -->
                    <div id="indemnification" class="content-section">
                        <h3>8. Indemnification</h3>
                        <p>You agree to indemnify and hold us harmless from any claims, damages, or expenses resulting
                            from your misuse of the platform or violation of these Terms.</p>
                    </div>

                    <!-- Termination -->
                    <div id="termination" class="content-section">
                        <h3>9. Termination</h3>
                        <p>We reserve the right to suspend or terminate your account without prior notice if you breach
                            these Terms or engage in inappropriate conduct.</p>
                    </div>

                    <!-- Governing Law -->
                    <div id="governing-law" class="content-section">
                        <h3>10. Governing Law</h3>
                        <p>These Terms are governed by the laws of India, and any disputes will be subject to the
                            jurisdiction of courts in Tamil Nadu.</p>
                    </div>

                    <!-- Changes -->
                    <div id="changes" class="content-section">
                        <h3>11. Changes to Terms</h3>
                        <p>We may update these Terms from time to time. Continued use of the platform after changes are
                            posted constitutes your acceptance of the revised Terms.</p>
                        <div class="notice-box">
                            <i class="bi bi-bell"></i>
                            <p>We encourage you to review this page periodically for updates.</p>
                        </div>
                    </div>
                </div>

                <!-- Contact Section -->
                <div class="tos-contact" data-aos="fade-up" data-aos-delay="300">
                    <div class="contact-box">
                        <div class="contact-icon">
                            <i class="bi bi-envelope"></i>
                        </div>
                        <div class="contact-content">
                            <h4>Questions About These Terms?</h4>
                            <p>If you have any questions or concerns, please contact our support team.</p>
                            <a href="#" class="contact-link">Contact Support</a>
                        </div>
                    </div>
                </div>
            </div>

        </section>


        <!-- /Terms Of Service Section -->

    </main>

    @include('include.login')
    @include('include.footer')
    @include('include.script')
</body>
