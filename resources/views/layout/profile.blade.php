@include('include.header')

<body class="agent-profile-page">
    @include('include.nav-header')

    <main class="main">

        <!-- Page Title -->
        <div class="page-title light-background">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h1 class="mb-2 mb-lg-0">Agent Profile</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="index.html">Home</a></li>
                        <li class="current">Agent Profile</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <!-- Agent Profile Section -->
        <section id="agent-profile" class="agent-profile section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <!-- Hero Profile Header -->
                <div class="row align-items-center mb-5">
                    <div class="col-lg-4" data-aos="fade-right" data-aos-delay="150">
                        <div class="agent-photo-wrapper">
                            <img src="assets/img/real-estate/agent-3.webp" alt="Agent Profile"
                                class="img-fluid agent-photo">
                            <div class="agent-badge">
                                <i class="bi bi-star-fill"></i>
                                <span>Top Agent</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8" data-aos="fade-left" data-aos-delay="200">
                        <div class="agent-info">
                            <h1 class="agent-name">Sarah Martinez</h1>
                            <p class="agent-title">Senior Real Estate Advisor</p>
                            <p class="agent-tagline">"Helping you find not just a house, but your perfect home in the
                                heart of the city."</p>

                            <div class="contact-info-hero">
                                <div class="contact-item">
                                    <i class="bi bi-telephone-fill"></i>
                                    <span>+1 (555) 234-5678</span>
                                </div>
                                <div class="contact-item">
                                    <i class="bi bi-envelope-fill"></i>
                                    <span>sarah.martinez@example.com</span>
                                </div>
                                <div class="contact-item">
                                    <i class="bi bi-geo-alt-fill"></i>
                                    <span>Downtown &amp; Suburbs Specialist</span>
                                </div>
                            </div>

                            <div class="hero-actions">
                                <a href="#contact" class="btn btn-primary">Contact Me Now</a>
                                <a href="#listings" class="btn btn-outline">View My Listings</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Agent Stats -->
                <div class="stats-section" data-aos="fade-up" data-aos-delay="100">
                    <div class="row text-center">
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="stat-item">
                                <div class="stat-icon">
                                    <i class="bi bi-house-door-fill"></i>
                                </div>
                                <div class="stat-number">180+</div>
                                <div class="stat-label">Homes Sold</div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="stat-item">
                                <div class="stat-icon">
                                    <i class="bi bi-calendar-check-fill"></i>
                                </div>
                                <div class="stat-number">8</div>
                                <div class="stat-label">Years Experience</div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="stat-item">
                                <div class="stat-icon">
                                    <i class="bi bi-people-fill"></i>
                                </div>
                                <div class="stat-number">200+</div>
                                <div class="stat-label">Happy Clients</div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="stat-item">
                                <div class="stat-icon">
                                    <i class="bi bi-trophy-fill"></i>
                                </div>
                                <div class="stat-number">Top 5%</div>
                                <div class="stat-label">Nationwide</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Agent Bio & Specialties -->
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
                                            <p>+1 (555) 234-5678</p>
                                        </div>
                                    </div>
                                    <div class="contact-detail">
                                        <i class="bi bi-envelope"></i>
                                        <div>
                                            <strong>Email</strong>
                                            <p>sarah.martinez@example.com</p>
                                        </div>
                                    </div>
                                    <div class="contact-detail">
                                        <i class="bi bi-geo-alt"></i>
                                        <div>
                                            <strong>Office</strong>
                                            <p>1234 Main Street<br>Austin, TX 78701</p>
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
                                <h4>Specialties</h4>
                                <div class="specialty-tags">
                                    <span class="specialty-tag">Luxury Homes</span>
                                    <span class="specialty-tag">First-Time Buyers</span>
                                    <span class="specialty-tag">Investment Properties</span>
                                    <span class="specialty-tag">Relocation</span>
                                    <span class="specialty-tag">Bilingual Support</span>
                                </div>
                            </div>

                            <div class="certifications-card">
                                <h4>Certifications</h4>
                                <div class="cert-item">
                                    <i class="bi bi-award-fill"></i>
                                    <span>Certified Residential Specialist (CRS)</span>
                                </div>
                                <div class="cert-item">
                                    <i class="bi bi-shield-check"></i>
                                    <span>Graduate REALTOR Institute (GRI)</span>
                                </div>
                                <div class="cert-item">
                                    <i class="bi bi-house-fill"></i>
                                    <span>Luxury Home Marketing Specialist</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="bio-content">
                            <h3>About Sarah</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>

                            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                                anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore
                                veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>

                            <h4>My Approach</h4>
                            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                                consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro
                                quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed
                                quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat
                                voluptatem.</p>

                            <div class="achievements">
                                <h4>Recent Achievements</h4>
                                <ul>
                                    <li>Top 5% of agents nationwide in 2023</li>
                                    <li>Closed over $25M in sales last year</li>
                                    <li>Winner of "Client Choice Award" 2023</li>
                                    <li>Featured in Austin Real Estate Magazine</li>
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
                                                <option value="investment">Investment Property</option>
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
