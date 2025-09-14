@include('include.header')

<body class="about-page">
    @include('include.nav-header')

    <main class="main">

        <!-- Page Title -->
        <div class="page-title light-background">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h1 class="mb-2 mb-lg-0">About</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="current">About</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <!-- About Section -->
        <section id="about" class="about section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row justify-content-center">
                    <div class="col-lg-10">

                        <div class="hero-content text-center" data-aos="zoom-in" data-aos-delay="200">
                            <h2>Premium Matrimony Excellence Since 2008</h2>
                            <p class="hero-description">Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                                posuere cubilia curae; Mauris viverra veniam ut aliquam lorem dapibus gravida. Sed
                                efficitur
                                mauris vel magna consectetur tempor.</p>
                        </div>

                        <div class="dual-image-layout" data-aos="fade-up" data-aos-delay="300">
                            <div class="row g-4 align-items-center">
                                <div class="col-lg-6">
                                    <div class="primary-image-wrap">
                                        <img src="assets/img/real-estate/property-exterior-4.webp" alt="Luxury Partner"
                                            class="img-fluid">
                                        <div class="floating-badge" data-aos="zoom-in" data-aos-delay="400">
                                            <div class="badge-content">
                                                <i class="bi bi-award"></i>
                                                <span>Top Rated Agency</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="secondary-image-wrap">
                                        <img src="assets/img/real-estate/agent-3.webp" alt="Professional Agent"
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="features-showcase" data-aos="fade-up" data-aos-delay="350">
                    <div class="row gy-4">
                        <div class="col-lg-3 col-md-6">
                            <div class="feature-box" data-aos="flip-up" data-aos-delay="400">
                                <div class="feature-icon">
                                    <i class="bi bi-person-badge"></i>
                                </div>
                                <div class="feature-content">
                                    <h4>Understanding Your Preferences</h4>
                                    <p>We start by learning about you — your values, lifestyle, and what you’re looking
                                        for in a life partner. This helps us create a profile that truly reflects who
                                        you are.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="feature-box" data-aos="flip-up" data-aos-delay="450">
                                <div class="feature-icon">
                                    <i class="bi bi-shield-lock"></i>
                                </div>
                                <div class="feature-content">
                                    <h4>Smart & Secure Matchmaking</h4>
                                    <p>Our intelligent matching system connects you with verified profiles that align
                                        with your preferences, ensuring safety, privacy, and cultural compatibility.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="feature-box" data-aos="flip-up" data-aos-delay="500">
                                <div class="feature-icon">
                                    <i class="bi bi-person-lines-fill"></i>
                                </div>
                                <div class="feature-content">
                                    <h4>Guided Introductions</h4>
                                    <p>Once there’s mutual interest, we help you take the next step with respectful,
                                        well‑timed introductions — whether that’s through messages, calls, or
                                        family‑to‑family meetings.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="feature-box" data-aos="flip-up" data-aos-delay="550">
                                <div class="feature-icon">
                                    <i class="bi bi-headset"></i>
                                </div>
                                <div class="feature-content">
                                    <h4>Ongoing Support</h4>
                                    <p>From your first match to your wedding day, our dedicated team is here to guide
                                        you, answer questions, and ensure your journey is smooth and joyful.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Features Showcase -->

                <div class="metrics-section" data-aos="fade-up" data-aos-delay="400">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="metrics-wrapper">
                                <div class="row text-center">
                                    <div class="col-lg-3 col-6">
                                        <div class="metric-item" data-aos="zoom-in" data-aos-delay="450">
                                            <div class="metric-icon">
                                                <i class="bi bi-trophy"></i>
                                            </div>
                                            <div class="metric-value">
                                                <span data-purecounter-start="0" data-purecounter-end="1250"
                                                    data-purecounter-duration="2" class="purecounter"></span>+
                                            </div>
                                            <div class="metric-label">Successful Sales</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <div class="metric-item" data-aos="zoom-in" data-aos-delay="500">
                                            <div class="metric-icon">
                                                <i class="bi bi-people"></i>
                                            </div>
                                            <div class="metric-value">
                                                <span data-purecounter-start="0" data-purecounter-end="950"
                                                    data-purecounter-duration="2" class="purecounter"></span>+
                                            </div>
                                            <div class="metric-label">Happy Clients</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <div class="metric-item" data-aos="zoom-in" data-aos-delay="550">
                                            <div class="metric-icon">
                                                <i class="bi bi-calendar-check"></i>
                                            </div>
                                            <div class="metric-value">
                                                <span data-purecounter-start="0" data-purecounter-end="16"
                                                    data-purecounter-duration="2" class="purecounter"></span>
                                            </div>
                                            <div class="metric-label">Years in Business</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <div class="metric-item" data-aos="zoom-in" data-aos-delay="600">
                                            <div class="metric-icon">
                                                <i class="bi bi-star-fill"></i>
                                            </div>
                                            <div class="metric-value">4.9</div>
                                            <div class="metric-label">Average Rating</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Metrics Section -->

                <div class="testimonial-highlight" data-aos="fade-up" data-aos-delay="450">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="testimonial-card">
                                <div class="quote-icon">
                                    <i class="bi bi-chat-quote"></i>
                                </div>
                                <blockquote>
                                    "Neque porro quisquam est qui dolorem ipsum quia dolor sit amet consectetur adipisci
                                    velit sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam
                                    aliquam
                                    quaerat voluptatem."
                                </blockquote>
                                <div class="testimonial-author">
                                    <div class="author-image">
                                        <img src="assets/img/person/person-f-8.webp" alt="Client"
                                            class="img-fluid">
                                    </div>
                                    <div class="author-info">
                                        <h5>Jennifer Rodriguez</h5>
                                        <span>Partner Investor</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Testimonial Highlight -->

                <div class="cta-section" data-aos="fade-up" data-aos-delay="500">
                    <div class="row justify-content-center text-center">
                        <div class="col-lg-8">
                            <h3>Ready to Find Your Dream Partner?</h3>
                            <p>Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae
                                consequatur vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.</p>
                            <div class="action-buttons">
                                <a href="contact.html" class="btn btn-primary">Get Started Today</a>
                                <a href="properties.html" class="btn btn-secondary">Browse Properties</a>
                            </div>
                        </div>
                    </div>
                </div><!-- End CTA Section -->

            </div>

        </section><!-- /About Section -->

    </main>
    @include('include.login')
    @include('include.footer')
    @include('include.script')
</body>
