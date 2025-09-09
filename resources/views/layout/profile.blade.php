@include('include.header')

<body class="agent-profile-page">
    @include('include.nav-header')

    <main class="main">

        <!-- Page Title -->
        <div class="page-title light-background">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h1 class="mb-2 mb-lg-0">Profile</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="index.html">Home</a></li>
                        <li class="current">Profile</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <!-- Agent Profile Section -->
        <section id="agent-profile" class="agent-profile section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row align-items-center mb-5">
                    <div class="col-lg-4" data-aos="fade-right" data-aos-delay="150">
                        <div class="agent-photo-wrapper">
                            <img src="{{ $profile->userImages->first()->image_path ?? asset('assets/img/person/person-f-5.webp') }}"
                                alt="{{ $profile->user->name }}" class="img-fluid agent-photo">
                            <div class="agent-badge">
                                <i class="bi bi-star-fill"></i>
                                <span>Featured Profile</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8" data-aos="fade-left" data-aos-delay="200">
                        <div class="agent-info">
                            <h1 class="agent-name">{{ $profile->user->name }}</h1>
                            <p class="agent-title">{{ \Carbon\Carbon::parse($profile->dob)->age }} yrs •
                                {{ ucfirst($profile->gender) }}</p>
                            <p class="agent-tagline">
                                "{{ $profile->expectations ?? 'Looking for a compatible life partner who shares similar values.' }}"
                            </p>

                            <div class="contact-info-hero">
                                <div class="contact-item">
                                    <i class="bi bi-telephone-fill"></i>
                                    <span>{{ $profile->parent_mobile }}</span>
                                </div>
                                <div class="contact-item">
                                    <i class="bi bi-envelope-fill"></i>
                                    <span>{{ $profile->user->email }}</span>
                                </div>
                                <div class="contact-item">
                                    <i class="bi bi-geo-alt-fill"></i>
                                    <span>{{ $profile->city }}, {{ $profile->state }}</span>
                                </div>
                            </div>

                            <div class="hero-actions">
                                <a href="#contact" class="btn btn-primary">Contact Family</a>
                                <a href="#details" class="btn btn-outline">View Full Profile</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Profile Stats -->
                <div class="stats-section" data-aos="fade-up" data-aos-delay="100">
                    <div class="row text-center">
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="stat-item">
                                <div class="stat-icon">
                                    <i class="bi bi-rulers"></i>
                                </div>
                                <div class="stat-number">{{ $profile->height }}</div>
                                <div class="stat-label">Height</div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="stat-item">
                                <div class="stat-icon">
                                    <i class="bi bi-mortarboard-fill"></i>
                                </div>
                                <div class="stat-number">{{ $profile->highest_education }}</div>
                                <div class="stat-label">Education</div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="stat-item">
                                <div class="stat-icon">
                                    <i class="bi bi-briefcase-fill"></i>
                                </div>
                                <div class="stat-number">{{ $profile->occupation_category }}</div>
                                <div class="stat-label">Occupation</div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="stat-item">
                                <div class="stat-icon">
                                    <i class="bi bi-people-fill"></i>
                                </div>
                                <div class="stat-number">{{ $profile->marital_status }}</div>
                                <div class="stat-label">Marital Status</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Profile Bio & Details -->
                <div class="row mb-5" data-aos="fade-up" data-aos-delay="150">
                    <div class="col-lg-4 mb-4">
                        <div class="sidebar-info">
                            <div class="contact-card">
                                <h4>Get In Touch</h4>
                                <div class="contact-details">
                                    <div class="contact-detail">
                                        <i class="bi bi-telephone"></i>
                                        <div>
                                            <strong>Phone</strong>
                                            <p>{{ $profile->parent_mobile }}</p>
                                        </div>
                                    </div>
                                    <div class="contact-detail">
                                        <i class="bi bi-envelope"></i>
                                        <div>
                                            <strong>Email</strong>
                                            <p>{{ $profile->user->email }}</p>
                                        </div>
                                    </div>
                                    <div class="contact-detail">
                                        <i class="bi bi-geo-alt"></i>
                                        <div>
                                            <strong>Location</strong>
                                            <p>{{ $profile->city }}, {{ $profile->state }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="social-links">
                                    <a href="#"><i class="bi bi-linkedin"></i></a>
                                    <a href="#"><i class="bi bi-facebook"></i></a>
                                    <a href="#"><i class="bi bi-instagram"></i></a>
                                    <a href="#"><i class="bi bi-whatsapp"></i></a>
                                </div>
                            </div>

                            <div class="specialties-card">
                                <h4>Interests</h4>
                                <div class="specialty-tags">
                                    @foreach ($profile->interests ?? [] as $interest)
                                        <span class="specialty-tag">{{ $interest }}</span>
                                    @endforeach
                                </div>
                            </div>

                            <div class="certifications-card">
                                <h4>Languages</h4>
                                @foreach ($profile->languages ?? [] as $lang)
                                    <div class="cert-item">
                                        <i class="bi bi-translate"></i>
                                        <span>{{ $lang }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="bio-content">
                            <h3>About {{ $profile->user->name }}</h3>
                            <p>{{ $profile->about ?? 'Profile description not provided.' }}</p>

                            <h4>Family Details</h4>
                            <p>Father: {{ $profile->father_work ?? 'N/A' }} | Mother:
                                {{ $profile->mother_work ?? 'N/A' }}</p>
                            <p>Siblings: {{ $profile->brothers_count }} Brothers ({{ $profile->married_brothers }}
                                Married), {{ $profile->sisters_count }} Sisters ({{ $profile->married_sisters }}
                                Married)</p>

                            <div class="achievements">
                                <h4>Horoscope Details</h4>
                                <ul>
                                    <li>Birth Star: {{ $profile->birth_star }}</li>
                                    <li>Zodiac Sign: {{ $profile->zodiac_sign }}</li>
                                    <li>Rahu/Ketu: {{ $profile->rahu_ketu }}</li>
                                    <li>Chevvai Dosham: {{ $profile->chevvai }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Contact Form -->
                <div class="contact-form-section" id="contact" data-aos="fade-up" data-aos-delay="100">
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <div class="contact-form-wrapper">
                                <h3 class="text-center mb-4">Schedule a Consultation</h3>
                                <p class="text-center mb-4">Ready to buy, sell, or invest? Let's discuss your real
                                    estate goals and find the perfect solution for you.</p>

                                <form action="forms/contact.php" method="post" class="php-email-form">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="name" class="form-label">Full Name</label>
                                            <input type="text" name="name" class="form-control" id="name"
                                                required="">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="email" class="form-label">Email Address</label>
                                            <input type="email" name="email" class="form-control" id="email"
                                                required="">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="phone" class="form-label">Phone Number</label>
                                            <input type="tel" name="phone" class="form-control"
                                                id="phone">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="service" class="form-label">I'm Interested In</label>
                                            <select name="subject" class="form-control" id="service"
                                                required="">
                                                <option value="">Select Service</option>
                                                <option value="buying">Buying a Home</option>
                                                <option value="selling">Selling a Home</option>
                                                <option value="investment">Investment Partner</option>
                                                <option value="consultation">Market Consultation</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="message" class="form-label">Message</label>
                                        <textarea name="message" class="form-control" id="message" rows="5"
                                            placeholder="Tell me about your real estate needs and preferences..."></textarea>
                                    </div>

                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-lg">Send Message</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section><!-- /Agent Profile Section -->

    </main>

    @include('include.login')
    @include('include.footer')
    @include('include.script')
</body>
