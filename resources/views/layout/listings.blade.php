@include('include.header')

<body class="properties-page">
    @include('include.nav-header')

    <main class="main">

        <!-- Page Title -->
        <div class="page-title light-background">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h1 class="mb-2 mb-lg-0">Properties</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="index.html">Home</a></li>
                        <li class="current">Properties</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <!-- Properties Section -->
        <section id="properties" class="properties section" style="padding: 60px 0px 0px 0px;">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="search-bar mb-5" data-aos="fade-up" data-aos-delay="150">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="search-wrapper">
                                <div class="row g-3">
                                    <div class="col-lg-3 col-md-6">
                                        <div class="search-field">
                                            <label>Location</label>
                                            <input type="text" class="form-control" placeholder="Enter city or zip">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-6">
                                        <div class="search-field">
                                            <label>Type</label>
                                            <select class="form-select">
                                                <option>Any Type</option>
                                                <option>House</option>
                                                <option>Apartment</option>
                                                <option>Condo</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-6">
                                        <div class="search-field">
                                            <label>Price</label>
                                            <select class="form-select">
                                                <option>Any Price</option>
                                                <option>$0 - $500k</option>
                                                <option>$500k - $1M</option>
                                                <option>$1M+</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="search-field">
                                            <label>Bedrooms</label>
                                            <div class="bedroom-quick">
                                                <button class="bed-btn" data-beds="any">Any</button>
                                                <button class="bed-btn" data-beds="1">1+</button>
                                                <button class="bed-btn" data-beds="2">2+</button>
                                                <button class="bed-btn" data-beds="3">3+</button>
                                                <button class="bed-btn" data-beds="4">4+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-12">
                                        <div class="search-field">
                                            <label>&nbsp;</label>
                                            <button class="btn btn-primary w-100 search-btn">
                                                <i class="bi bi-search"></i> Search
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="results-header mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="results-info">
                                <h5>124 Properties Found</h5>
                                <p class="text-muted">Showing properties in Beverly Hills, CA</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="results-controls">
                                <div class="d-flex gap-3 align-items-center justify-content-lg-end">
                                    <div class="sort-dropdown">
                                        <select class="form-select form-select-sm">
                                            <option>Price: Low to High</option>
                                            <option>Price: High to Low</option>
                                            <option>Newest First</option>
                                            <option>Largest Size</option>
                                        </select>
                                    </div>
                                    <div class="view-toggle">
                                        <button class="view-btn active" data-view="masonry">
                                            <i class="bi bi-grid"></i>
                                        </button>
                                        <button class="view-btn" data-view="rows">
                                            <i class="bi bi-view-stacked"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section><!-- /Properties Section -->

        <section id="agents" class="properties agents section" style="padding: 0px;">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="agent-card">
                            <div class="agent-image">
                                <img src="assets/img/real-estate/agent-1.webp" alt="Agent" class="img-fluid">
                                <div class="badge-overlay">
                                    <span class="top-seller-badge">Top Seller</span>
                                </div>
                            </div>
                            <div class="agent-info">
                                <h4>Sarah Martinez</h4>
                                <span class="role">Senior Property Advisor</span>
                                <p class="location"><i class="bi bi-geo-alt"></i>vDowntown Miami</p>
                                <div class="specialties">
                                    <span class="specialty-tag">Luxury Homes</span>
                                    <span class="specialty-tag">Condos</span>
                                </div>
                                <div class="contact-links">
                                    <a href="tel:+15551234567"><i class="bi bi-telephone"></i></a>
                                    <a href="mailto:sarah@example.com"><i class="bi bi-envelope"></i></a>
                                    <a href="#"><i class="bi bi-whatsapp"></i></a>
                                    <a href="#"><i class="bi bi-linkedin"></i></a>
                                </div>
                                <a href="#" class="view-listings-btn">View Listings</a>
                            </div>
                        </div>
                    </div><!-- End Agent Card -->

                    <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="agent-card">
                            <div class="agent-image">
                                <img src="assets/img/real-estate/agent-2.webp" alt="Agent" class="img-fluid">
                                <div class="badge-overlay">
                                    <span class="verified-badge">Verified</span>
                                </div>
                            </div>
                            <div class="agent-info">
                                <h4>Michael Thompson</h4>
                                <span class="role">Commercial Specialist</span>
                                <p class="location"><i class="bi bi-geo-alt"></i>vBrickell Avenue</p>
                                <div class="specialties">
                                    <span class="specialty-tag">Commercial</span>
                                    <span class="specialty-tag">Investment</span>
                                </div>
                                <div class="contact-links">
                                    <a href="tel:+15551234568"><i class="bi bi-telephone"></i></a>
                                    <a href="mailto:michael@example.com"><i class="bi bi-envelope"></i></a>
                                    <a href="#"><i class="bi bi-whatsapp"></i></a>
                                    <a href="#"><i class="bi bi-instagram"></i></a>
                                </div>
                                <a href="#" class="view-listings-btn">View Listings</a>
                            </div>
                        </div>
                    </div><!-- End Agent Card -->

                    <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="agent-card">
                            <div class="agent-image">
                                <img src="assets/img/real-estate/agent-3.webp" alt="Agent" class="img-fluid">
                                <div class="badge-overlay">
                                    <span class="new-agent-badge">New Agent</span>
                                </div>
                            </div>
                            <div class="agent-info">
                                <h4>Emma Rodriguez</h4>
                                <span class="role">Residential Expert</span>
                                <p class="location"><i class="bi bi-geo-alt"></i>vCoral Gables</p>
                                <div class="specialties">
                                    <span class="specialty-tag">First-Time Buyers</span>
                                    <span class="specialty-tag">Families</span>
                                </div>
                                <div class="contact-links">
                                    <a href="tel:+15551234569"><i class="bi bi-telephone"></i></a>
                                    <a href="mailto:emma@example.com"><i class="bi bi-envelope"></i></a>
                                    <a href="#"><i class="bi bi-whatsapp"></i></a>
                                    <a href="#"><i class="bi bi-facebook"></i></a>
                                </div>
                                <a href="#" class="view-listings-btn">View Listings</a>
                            </div>
                        </div>
                    </div><!-- End Agent Card -->

                    <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="agent-card">
                            <div class="agent-image">
                                <img src="assets/img/real-estate/agent-4.webp" alt="Agent" class="img-fluid">
                                <div class="badge-overlay">
                                    <span class="awarded-badge">Award Winner</span>
                                </div>
                            </div>
                            <div class="agent-info">
                                <h4>James Wilson</h4>
                                <span class="role">Luxury Property Consultant</span>
                                <p class="location"><i class="bi bi-geo-alt"></i>vSouth Beach</p>
                                <div class="specialties">
                                    <span class="specialty-tag">Waterfront</span>
                                    <span class="specialty-tag">Penthouses</span>
                                </div>
                                <div class="contact-links">
                                    <a href="tel:+15551234570"><i class="bi bi-telephone"></i></a>
                                    <a href="mailto:james@example.com"><i class="bi bi-envelope"></i></a>
                                    <a href="#"><i class="bi bi-whatsapp"></i></a>
                                    <a href="#"><i class="bi bi-twitter"></i></a>
                                </div>
                                <a href="#" class="view-listings-btn">View Listings</a>
                            </div>
                        </div>
                    </div><!-- End Agent Card -->

                    <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="agent-card">
                            <div class="agent-image">
                                <img src="assets/img/real-estate/agent-5.webp" alt="Agent" class="img-fluid">
                                <div class="badge-overlay">
                                    <span class="top-seller-badge">Top Seller</span>
                                </div>
                            </div>
                            <div class="agent-info">
                                <h4>Lisa Chen</h4>
                                <span class="role">International Sales Manager</span>
                                <p class="location"><i class="bi bi-geo-alt"></i>vDesign District</p>
                                <div class="specialties">
                                    <span class="specialty-tag">International</span>
                                    <span class="specialty-tag">Mandarin</span>
                                </div>
                                <div class="contact-links">
                                    <a href="tel:+15551234571"><i class="bi bi-telephone"></i></a>
                                    <a href="mailto:lisa@example.com"><i class="bi bi-envelope"></i></a>
                                    <a href="#"><i class="bi bi-whatsapp"></i></a>
                                    <a href="#"><i class="bi bi-wechat"></i></a>
                                </div>
                                <a href="#" class="view-listings-btn">View Listings</a>
                            </div>
                        </div>
                    </div><!-- End Agent Card -->

                    <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="agent-card">
                            <div class="agent-image">
                                <img src="assets/img/real-estate/agent-6.webp" alt="Agent" class="img-fluid">
                                <div class="badge-overlay">
                                    <span class="verified-badge">Verified</span>
                                </div>
                            </div>
                            <div class="agent-info">
                                <h4>David Garcia</h4>
                                <span class="role">Property Investment Advisor</span>
                                <p class="location"><i class="bi bi-geo-alt"></i>vAventura</p>
                                <div class="specialties">
                                    <span class="specialty-tag">Investment</span>
                                    <span class="specialty-tag">Spanish</span>
                                </div>
                                <div class="contact-links">
                                    <a href="tel:+15551234572"><i class="bi bi-telephone"></i></a>
                                    <a href="mailto:david@example.com"><i class="bi bi-envelope"></i></a>
                                    <a href="#"><i class="bi bi-whatsapp"></i></a>
                                    <a href="#"><i class="bi bi-linkedin"></i></a>
                                </div>
                                <a href="#" class="view-listings-btn">View Listings</a>
                            </div>
                        </div>
                    </div><!-- End Agent Card -->

                    <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="agent-card">
                            <div class="agent-image">
                                <img src="assets/img/real-estate/agent-7.webp" alt="Agent" class="img-fluid">
                                <div class="badge-overlay">
                                    <span class="awarded-badge">Award Winner</span>
                                </div>
                            </div>
                            <div class="agent-info">
                                <h4>Rachel Porter</h4>
                                <span class="role">Rental Specialist</span>
                                <p class="location"><i class="bi bi-geo-alt"></i>vMidtown Miami</p>
                                <div class="specialties">
                                    <span class="specialty-tag">Rentals</span>
                                    <span class="specialty-tag">Young Professionals</span>
                                </div>
                                <div class="contact-links">
                                    <a href="tel:+15551234573"><i class="bi bi-telephone"></i></a>
                                    <a href="mailto:rachel@example.com"><i class="bi bi-envelope"></i></a>
                                    <a href="#"><i class="bi bi-whatsapp"></i></a>
                                    <a href="#"><i class="bi bi-instagram"></i></a>
                                </div>
                                <a href="#" class="view-listings-btn">View Listings</a>
                            </div>
                        </div>
                    </div><!-- End Agent Card -->

                    <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="agent-card">
                            <div class="agent-image">
                                <img src="assets/img/real-estate/agent-8.webp" alt="Agent" class="img-fluid">
                                <div class="badge-overlay">
                                    <span class="new-agent-badge">New Agent</span>
                                </div>
                            </div>
                            <div class="agent-info">
                                <h4>Alexa Johnson</h4>
                                <span class="role">New Construction Specialist</span>
                                <p class="location"><i class="bi bi-geo-alt"></i>vWynwood</p>
                                <div class="specialties">
                                    <span class="specialty-tag">New Construction</span>
                                    <span class="specialty-tag">Modern Homes</span>
                                </div>
                                <div class="contact-links">
                                    <a href="tel:+15551234574"><i class="bi bi-telephone"></i></a>
                                    <a href="mailto:alex@example.com"><i class="bi bi-envelope"></i></a>
                                    <a href="#"><i class="bi bi-whatsapp"></i></a>
                                    <a href="#"><i class="bi bi-twitter"></i></a>
                                </div>
                                <a href="#" class="view-listings-btn">View Listings</a>
                            </div>
                        </div>
                    </div><!-- End Agent Card -->

                    <nav class="pagination-wrapper mt-5" data-aos="fade-up" data-aos-delay="350">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-lg-6">
                                <div class="pagination-info">
                                    <p>Showing <strong>1-6</strong> of <strong>124</strong> properties</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <ul class="pagination justify-content-lg-end">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#">
                                            <i class="bi bi-chevron-left"></i>
                                        </a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                                    <li class="page-item"><a class="page-link" href="#">21</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">
                                            <i class="bi bi-chevron-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>

            </div>

        </section><!-- /Agents Section -->

    </main>

    @include('include.login')
    @include('include.footer')
    @include('include.script')
</body>
