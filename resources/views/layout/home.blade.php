@include('include.header')

<body class="index-page">
    @include('include.nav-header')

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="hero-wrapper">
                    <div class="row g-4">

                        <div class="col-lg-7">
                            <div class="hero-content" data-aos="zoom-in" data-aos-delay="200">
                                <div class="content-header">
                                    <span class="hero-label">
                                        <i class="bi bi-house-heart"></i>
                                        Dream Life Await
                                    </span>
                                    <h1>Find Your Ideal Partner with Expert Guidance</h1>
                                    <p>Welcome to Vazhithunai<br>
                                        Thousands of Tamils found their perfect match at Vazhithunai Matrimony.</p>
                                </div>

                                <div class="search-container" data-aos="fade-up" data-aos-delay="300">
                                    <div class="search-header">
                                        <h3>Start Your Perfect Match Search</h3>
                                        <p>Discover thousands of verified listings</p>
                                    </div>

                                    <form action="" class="property-search-form">
                                        <div class="search-grid">
                                            <div class="search-field">
                                                <label for="search-location" class="field-label">Location</label>
                                                <input type="text" id="search-location" name="location"
                                                    placeholder="Enter city or neighborhood" required="">
                                                <i class="bi bi-geo-alt field-icon"></i>
                                            </div>

                                            <div class="search-field">
                                                <label for="search-type" class="field-label">Looking for</label>
                                                <select id="search-type" name="gender" required="">
                                                    <option value="">Select</option>
                                                    <option>ஆண் / Male</option>
                                                    <option>பெண் / Female</option>
                                                    <option>மற்றவை / Other</option>
                                                </select>
                                                <i class="bi bi-gender-ambiguous field-icon"></i>
                                            </div>

                                            <div class="search-field">
                                                <label for="search-budget" class="field-label">Budget Range</label>
                                                <select id="search-budget" name="price_range" required="">
                                                    <option value="">Any Price</option>
                                                    <option value="0-300000">Under $300K</option>
                                                    <option value="300000-600000">$300K - $600K</option>
                                                    <option value="600000-900000">$600K - $900K</option>
                                                    <option value="900000-1500000">$900K - $1.5M</option>
                                                    <option value="1500000+">Above $1.5M</option>
                                                </select>
                                                <i class="bi bi-currency-dollar field-icon"></i>
                                            </div>

                                            <div class="search-field">
                                                <label for="search-rooms" class="field-label">Bedrooms</label>
                                                <select id="search-rooms" name="bedrooms">
                                                    <option value="">Any</option>
                                                    <option value="1">1 Room</option>
                                                    <option value="2">2 Rooms</option>
                                                    <option value="3">3 Rooms</option>
                                                    <option value="4">4 Rooms</option>
                                                    <option value="5+">5+ Rooms</option>
                                                </select>
                                                <i class="bi bi-door-open field-icon"></i>
                                            </div>
                                        </div>

                                        <a href="{{ route('listings.search') }}" class="search-btn">
                                            <i class="bi bi-search-heart-fill"></i>
                                            <span>Find Partner</span>
                                        </a>
                                    </form>
                                </div>

                                <div class="achievement-grid" data-aos="fade-up" data-aos-delay="400">
                                    <div class="achievement-item">
                                        <div class="achievement-number">
                                            <span data-purecounter-start="0" data-purecounter-end="1250"
                                                data-purecounter-duration="1" class="purecounter"></span>+
                                        </div>
                                        <span class="achievement-text">Active Listings</span>
                                    </div>
                                    <div class="achievement-item">
                                        <div class="achievement-number">
                                            <span data-purecounter-start="0" data-purecounter-end="89"
                                                data-purecounter-duration="1" class="purecounter"></span>+
                                        </div>
                                        <span class="achievement-text">Expert Agents</span>
                                    </div>
                                    <div class="achievement-item">
                                        <div class="achievement-number">
                                            <span data-purecounter-start="0" data-purecounter-end="96"
                                                data-purecounter-duration="1" class="purecounter"></span>%
                                        </div>
                                        <span class="achievement-text">Success Rate</span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Hero Content -->

                        <div class="col-lg-5">
                            <div class="hero-visual" data-aos="fade-left" data-aos-delay="400">
                                <div class="visual-container">
                                    <div class="featured-property">
                                        <img src="assets/img/bg/about-1.jpeg" alt="Featured Partner" class="img-fluid">
                                        <div class="property-info">
                                            {{-- <div class="property-price">$925,000</div>
                                            <div class="property-details">
                                                <span><i class="bi bi-geo-alt"></i> Downtown District</span>
                                                <span><i class="bi bi-house"></i> 4 Bed, 3 Bath</span>
                                            </div> --}}
                                        </div>
                                    </div>

                                    <div class="overlay-images">
                                        <div class="overlay-img overlay-1">
                                            <img src="assets/img/bg/about-2.jpeg" alt="Interior View"
                                                class="img-fluid">
                                        </div>
                                        <div class="overlay-img overlay-2">
                                            <img src="assets/img/bg/about-3.jpeg" alt="Exterior View"
                                                class="img-fluid">
                                        </div>
                                    </div>

                                    {{-- <div class="agent-card">
                                        <div class="agent-profile">
                                            <img src="assets/img/bg/about-3.jpeg" alt="Agent Profile"
                                                class="agent-photo">
                                            <div class="agent-info">
                                                <h4>Michael Chen</h4>
                                                <p>Senior Partner Advisor</p>
                                                <div class="agent-rating">
                                                    <div class="stars">
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i>
                                                    </div>
                                                    <span class="rating-text">5.0 (94 reviews)</span>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="contact-agent-btn">
                                            <i class="bi bi-chat-dots"></i>
                                        </button>
                                    </div> --}}
                                </div>
                            </div>
                        </div><!-- End Hero Visual -->

                    </div>
                </div>

            </div>

        </section><!-- /Hero Section -->

        <!-- Home About Section -->
        <section id="home-about" class="home-about section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-5">

                    <div class="col-lg-5" data-aos="zoom-in" data-aos-delay="200">
                        <div class="image-gallery">
                            <div class="primary-image">
                                <img src="assets/img/real-estate/property-exterior-1.webp" alt="Modern Partner"
                                    class="img-fluid">
                                <div class="experience-badge">
                                    <div class="badge-content">
                                        <div class="number"><span data-purecounter-start="0"
                                                data-purecounter-end="15" data-purecounter-duration="1"
                                                class="purecounter"></span>+</div>
                                        <div class="text">Years<br>Experience</div>
                                    </div>
                                </div>
                            </div>
                            <div class="secondary-image">
                                <img src="assets/img/real-estate/property-interior-4.webp" alt="Luxury Interior"
                                    class="img-fluid">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7" data-aos="fade-left" data-aos-delay="300">
                        <div class="content">
                            <div class="section-header">
                                <span class="section-label">About Our Company</span>
                                <h2>Building Dreams, Creating Homes Since 2008</h2>
                            </div>

                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                                architecto beatae vitae dicta sunt explicabo.</p>

                            <div class="achievements-list">
                                <div class="achievement-item">
                                    <div class="achievement-icon">
                                        <i class="bi bi-house-door"></i>
                                    </div>
                                    <div class="achievement-content">
                                        <h4><span data-purecounter-start="0" data-purecounter-end="3200"
                                                data-purecounter-duration="2" class="purecounter"></span>+ Partner
                                            Sold</h4>
                                        <p>Successfully completed transactions</p>
                                    </div>
                                </div>
                                <div class="achievement-item">
                                    <div class="achievement-icon">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="achievement-content">
                                        <h4><span data-purecounter-start="0" data-purecounter-end="98"
                                                data-purecounter-duration="1" class="purecounter"></span>% Client
                                            Satisfaction</h4>
                                        <p>Happy customers recommend us</p>
                                    </div>
                                </div>
                            </div>

                            <div class="action-section">
                                <a href="about.html" class="btn-cta">
                                    <span>Discover Our Story</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                                <div class="contact-info">
                                    <div class="contact-icon">
                                        <i class="bi bi-telephone"></i>
                                    </div>
                                    <div class="contact-details">
                                        <span>Call us today</span>
                                        <strong>+1 (555) 123-4567</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </section><!-- /Home About Section -->

        @if (0)
            <!-- Featured Partner Section -->
            <section id="featured-properties" class="featured-properties section">

                <!-- Section Title -->
                <div class="container section-title" data-aos="fade-up">
                    <h2>Featured Partner</h2>
                    <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
                </div><!-- End Section Title -->

                <div class="container" data-aos="fade-up" data-aos-delay="100">

                    <div class="row gy-5">

                        <div class="col-lg-8">

                            <div class="featured-property-main" data-aos="zoom-in" data-aos-delay="200">
                                <div class="property-hero">
                                    <img src="assets/img/real-estate/property-exterior-4.webp" alt="Luxury Estate"
                                        class="img-fluid">
                                    <div class="property-overlay">
                                        <div class="property-badge-main premium">Premium</div>
                                        <div class="property-stats">
                                            <div class="stat-item">
                                                <i class="bi bi-house-door"></i>
                                                <span>6 Bedrooms</span>
                                            </div>
                                            <div class="stat-item">
                                                <i class="bi bi-droplet-fill"></i>
                                                <span>5 Bathrooms</span>
                                            </div>
                                            <div class="stat-item">
                                                <i class="bi bi-arrows-move"></i>
                                                <span>5,500 sq ft</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="property-hero-content">
                                    <div class="property-header">
                                        <div class="property-info">
                                            <h2><a href="property-details.html">Magnificent Estate with Garden
                                                    Views</a>
                                            </h2>
                                            <div class="property-address">
                                                <i class="bi bi-geo-alt-fill"></i>
                                                <span>Malibu, CA 90265</span>
                                            </div>
                                        </div>
                                        <div class="property-price-main">$4,850,000</div>
                                    </div>
                                    <p class="property-description">Luxurious estate nestled in exclusive Malibu hills
                                        featuring panoramic ocean views, infinity pool, wine cellar, and private tennis
                                        court. Architectural masterpiece with premium finishes throughout.</p>
                                    <div class="property-actions-main">
                                        <a href="property-details.html" class="btn-primary-custom">Schedule Tour</a>
                                        <a href="property-details.html" class="btn-outline-custom">View Gallery</a>
                                        <div class="property-listing-info">
                                            <span class="listing-status for-sale">For Sale</span>
                                            <span class="listing-date">Listed today</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-4">

                            <div class="properties-sidebar">

                                <div class="sidebar-property-card" data-aos="fade-left" data-aos-delay="300">
                                    <div class="sidebar-property-image">
                                        <img src="assets/img/real-estate/property-exterior-1.webp" alt="Modern Condo"
                                            class="img-fluid">
                                        <div class="sidebar-property-badge hot">Hot Deal</div>
                                    </div>
                                    <div class="sidebar-property-content">
                                        <h4><a href="property-details.html">Contemporary Downtown Condo</a></h4>
                                        <div class="sidebar-location">
                                            <i class="bi bi-pin-map"></i>
                                            <span>Seattle, WA 98101</span>
                                        </div>
                                        <div class="sidebar-specs">
                                            <span><i class="bi bi-house"></i> 3 BR</span>
                                            <span><i class="bi bi-droplet"></i> 2 BA</span>
                                            <span><i class="bi bi-rulers"></i> 2,100 sq ft</span>
                                        </div>
                                        <div class="sidebar-price-row">
                                            <div class="sidebar-price">$1,595,000</div>
                                            <a href="property-details.html" class="sidebar-btn">View</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="sidebar-property-card" data-aos="fade-left" data-aos-delay="400">
                                    <div class="sidebar-property-image">
                                        <img src="assets/img/real-estate/property-exterior-9.webp" alt="Family Home"
                                            class="img-fluid">
                                        <div class="sidebar-property-badge new">New Listing</div>
                                    </div>
                                    <div class="sidebar-property-content">
                                        <h4><a href="property-details.html">Elegant Family Residence</a></h4>
                                        <div class="sidebar-location">
                                            <i class="bi bi-pin-map"></i>
                                            <span>Portland, OR 97201</span>
                                        </div>
                                        <div class="sidebar-specs">
                                            <span><i class="bi bi-house"></i> 4 BR</span>
                                            <span><i class="bi bi-droplet"></i> 3 BA</span>
                                            <span><i class="bi bi-rulers"></i> 3,100 sq ft</span>
                                        </div>
                                        <div class="sidebar-price-row">
                                            <div class="sidebar-price">$925,000</div>
                                            <a href="property-details.html" class="sidebar-btn">View</a>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="row gy-4 mt-4">

                        <div class="col-xl-6" data-aos="fade-up" data-aos-delay="600">
                            <div class="property-card-horizontal">
                                <div class="property-image-horizontal">
                                    <img src="assets/img/real-estate/property-interior-5.webp" alt="Penthouse"
                                        class="img-fluid">
                                    <div class="property-badge-horizontal exclusive">Exclusive</div>
                                </div>
                                <div class="property-content-horizontal">
                                    <h3><a href="property-details.html">Luxury Penthouse Suite</a></h3>
                                    <div class="property-location-horizontal">
                                        <i class="bi bi-geo-alt"></i>
                                        <span>Las Vegas, NV 89102</span>
                                    </div>
                                    <div class="property-features">
                                        <span class="feature"><i class="bi bi-house"></i> 3 Bedrooms</span>
                                        <span class="feature"><i class="bi bi-droplet"></i> 3 Bathrooms</span>
                                        <span class="feature"><i class="bi bi-rulers"></i> 2,850 sq ft</span>
                                    </div>
                                    <p>Spectacular penthouse with floor-to-ceiling windows and private rooftop terrace
                                        overlooking the city skyline.</p>
                                    <div class="property-footer-horizontal">
                                        <div class="property-price-horizontal">$2,195,000</div>
                                        <a href="property-details.html" class="btn-view-horizontal">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6" data-aos="fade-up" data-aos-delay="700">
                            <div class="property-card-horizontal">
                                <div class="property-image-horizontal">
                                    <img src="assets/img/real-estate/property-interior-8.webp" alt="Modern Home"
                                        class="img-fluid">
                                    <div class="property-badge-horizontal new">New</div>
                                </div>
                                <div class="property-content-horizontal">
                                    <h3><a href="property-details.html">Modern Architectural Gem</a></h3>
                                    <div class="property-location-horizontal">
                                        <i class="bi bi-geo-alt"></i>
                                        <span>Phoenix, AZ 85001</span>
                                    </div>
                                    <div class="property-features">
                                        <span class="feature"><i class="bi bi-house"></i> 4 Bedrooms</span>
                                        <span class="feature"><i class="bi bi-droplet"></i> 3 Bathrooms</span>
                                        <span class="feature"><i class="bi bi-rulers"></i> 3,450 sq ft</span>
                                    </div>
                                    <p>Award-winning contemporary design with sustainable features, smart home
                                        technology,
                                        and resort-style backyard.</p>
                                    <div class="property-footer-horizontal">
                                        <div class="property-price-horizontal">$1,375,000</div>
                                        <a href="property-details.html" class="btn-view-horizontal">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </section><!-- /Featured Partner Section -->
        @endif

        <!-- Featured Services Section -->
        <section id="featured-services" class="featured-services section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Featured Services</h2>
                <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row g-4">

                    <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
                        <div class="service-card">
                            <div class="service-icon">
                                <i class="bi bi-search"></i>
                            </div>
                            <div class="service-info">
                                <h3><a href="service-details.html">Personalized Matches</a></h3>
                                <p>We understand that every individual is unique, and so are their preferences. Our intelligent matchmaking algorithms take into account your interests, values, and aspirations to deliver personalized match suggestions, increasing your chances of finding someone who truly resonates with you.</p>
                                <!-- <ul class="service-highlights">
                                    <li><i class="bi bi-check-circle-fill"></i> Comprehensive Listings</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Advanced Filtering</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Virtual Tours</li>
                                </ul> -->
                                <a href="service-details.html" class="service-link">
                                    <span>Explore Now</span>
                                    <i class="bi bi-arrow-up-right"></i>
                                </a>
                            </div>
                            <div class="service-visual">
                                <img src="assets/img/real-estate/property-interior-2.webp" class="img-fluid"
                                    alt="Partner Search" loading="lazy">
                            </div>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
                        <div class="service-card">
                            <div class="service-icon">
                                <i class="bi bi-calculator"></i>
                            </div>
                            <div class="service-info">
                                <h3><a href="service-details.html">Safe and Secure</a></h3>
                                <p>Your privacy and security are our top priorities. Our robust verification processes and advanced privacy settings ensure that your journey on LGM Matrimony is both safe and confidential.</p>
                                <!-- <ul class="service-highlights">
                                    <li><i class="bi bi-check-circle-fill"></i> Market Analysis</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Comparative Reports</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Investment Insights</li>
                                </ul> -->
                                <a href="service-details.html" class="service-link">
                                    <span>Get Valuation</span>
                                    <i class="bi bi-arrow-up-right"></i>
                                </a>
                            </div>
                            <div class="service-visual">
                                <img src="assets/img/real-estate/property-exterior-1.webp" class="img-fluid"
                                    alt="Partner Valuation" loading="lazy">
                            </div>
                        </div>
                    </div><!-- End Service Item -->

                </div>

                <div class="row g-4 mt-4">

                    <div class="col-lg-6" data-aos="fade-right" data-aos-delay="400">
                        <div class="service-card">
                            <div class="service-icon">
                                <i class="bi bi-key"></i>
                            </div>
                            <div class="service-info">
                                <h3><a href="service-details.html">User-Friendly Interface</a></h3>
                                <p>Navigating through LGM Matrimony is a breeze. Our intuitive user interface makes it easy for you to create a profile, explore potential matches, and engage in meaningful conversations.</p>
                                <!-- <ul class="service-highlights">
                                    <li><i class="bi bi-check-circle-fill"></i> Tenant Matching</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Lease Management</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Partner Maintenance</li>
                                </ul> -->
                                <a href="service-details.html" class="service-link">
                                    <span>Start Renting</span>
                                    <i class="bi bi-arrow-up-right"></i>
                                </a>
                            </div>
                            <div class="service-visual">
                                <img src="assets/img/real-estate/property-interior-8.webp" class="img-fluid"
                                    alt="Partner Rental" loading="lazy">
                            </div>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-6" data-aos="fade-right" data-aos-delay="400">
                        <div class="service-card">
                            <div class="service-icon">
                                <i class="bi bi-key"></i>
                            </div>
                            <div class="service-info">
                                <h3><a href="service-details.html">Diverse Community</a></h3>
                                <p>Love knows no boundaries, and neither do we. Our platform welcomes individuals from all walks of life, cultures, and backgrounds, fostering an inclusive and diverse community.</p>
                                <!-- <ul class="service-highlights">
                                    <li><i class="bi bi-check-circle-fill"></i> Tenant Matching</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Lease Management</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Partner Maintenance</li>
                                </ul> -->
                                <a href="service-details.html" class="service-link">
                                    <span>Start Renting</span>
                                    <i class="bi bi-arrow-up-right"></i>
                                </a>
                            </div>
                            <div class="service-visual">
                                <img src="assets/img/real-estate/property-interior-8.webp" class="img-fluid"
                                    alt="Partner Rental" loading="lazy">
                            </div>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-6" data-aos="fade-left" data-aos-delay="500">
                        <div class="service-card">
                            <div class="service-icon">
                                <i class="bi bi-shield-check"></i>
                            </div>
                            <div class="service-info">
                                <h3><a href="service-details.html">Expert Advice</a></h3>
                                <p>We understand that the path to love can be filled with questions and uncertainties. Our team of relationship experts and counselors are here to provide guidance, support, and advice, ensuring you have a fulfilling and enriching experience.</p>
                                <!-- <ul class="service-highlights">
                                    <li><i class="bi bi-check-circle-fill"></i> Portfolio Planning</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Risk Assessment</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Market Forecasting</li>
                                </ul> -->
                                <a href="service-details.html" class="service-link">
                                    <span>Learn More</span>
                                    <i class="bi bi-arrow-up-right"></i>
                                </a>
                            </div>
                            <div class="service-visual">
                                <img src="assets/img/real-estate/property-exterior-4.webp" class="img-fluid"
                                    alt="Investment Advisory" loading="lazy">
                            </div>
                        </div>
                    </div><!-- End Service Item -->
                    <div class="col-lg-6" data-aos="fade-left" data-aos-delay="500">
                        <div class="service-card">
                            <div class="service-icon">
                                <i class="bi bi-shield-check"></i>
                            </div>
                            <div class="service-info">
                                <h3><a href="service-details.html">Success Stories</a></h3>
                                <p>Our success is measured by the smiles on the faces of those who have found love through LGM Matrimony. We take immense pride in being a part of your journey and celebrating the success stories that emanate from our platform.</p>
                                <!-- <ul class="service-highlights">
                                    <li><i class="bi bi-check-circle-fill"></i> Portfolio Planning</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Risk Assessment</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Market Forecasting</li>
                                </ul> -->
                                <a href="service-details.html" class="service-link">
                                    <span>Learn More</span>
                                    <i class="bi bi-arrow-up-right"></i>
                                </a>
                            </div>
                            <div class="service-visual">
                                <img src="assets/img/real-estate/property-exterior-4.webp" class="img-fluid"
                                    alt="Investment Advisory" loading="lazy">
                            </div>
                        </div>
                    </div><!-- End Service Item -->

                </div>

                <div class="text-center" data-aos="zoom-in" data-aos-delay="600">
                    <a href="services.html" class="btn-view-all">
                        <span>View All Services</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>

            </div>

        </section><!-- /Featured Services Section -->

        <!-- Featured Agents Section -->
        <section id="featured-agents" class="featured-agents section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Featured Agents</h2>
                <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4 justify-content-center">

                    <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                        <div class="featured-agent">
                            <div class="agent-wrapper">
                                <div class="agent-photo">
                                    <img src="assets/img/real-estate/agent-3.webp" alt="Featured Agent"
                                        class="img-fluid">
                                    <div class="overlay-info">
                                        <div class="contact-actions">
                                            <a href="tel:+14155678901" class="contact-btn phone" title="Call Now">
                                                <i class="bi bi-telephone-fill"></i>
                                            </a>
                                            <a href="mailto:jennifer.adams@example.com" class="contact-btn email"
                                                title="Send Email">
                                                <i class="bi bi-envelope-fill"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <span class="achievement-badge">Star Agent</span>
                                </div>
                                <div class="agent-details">
                                    <h4>Jennifer Adams</h4>
                                    <span class="position">Premium Partner Consultant</span>
                                    <div class="location-info">
                                        <i class="bi bi-geo-alt-fill"></i>
                                        <span>Beverly Hills</span>
                                    </div>
                                    <div class="expertise-tags">
                                        <span class="tag">Luxury Estates</span>
                                        <span class="tag">Celebrity Homes</span>
                                    </div>
                                    <a href="agent-profile.html" class="view-profile">View Profile</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Featured Agent -->

                    <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                        <div class="featured-agent">
                            <div class="agent-wrapper">
                                <div class="agent-photo">
                                    <img src="assets/img/real-estate/agent-7.webp" alt="Featured Agent"
                                        class="img-fluid">
                                    <div class="overlay-info">
                                        <div class="contact-actions">
                                            <a href="tel:+14155678902" class="contact-btn phone" title="Call Now">
                                                <i class="bi bi-telephone-fill"></i>
                                            </a>
                                            <a href="mailto:marcus.hayes@example.com" class="contact-btn email"
                                                title="Send Email">
                                                <i class="bi bi-envelope-fill"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <span class="achievement-badge expert">Expert</span>
                                </div>
                                <div class="agent-details">
                                    <h4>Marcus Hayes</h4>
                                    <span class="position">Commercial Real Estate Lead</span>
                                    <div class="location-info">
                                        <i class="bi bi-geo-alt-fill"></i>
                                        <span>Manhattan</span>
                                    </div>
                                    <div class="expertise-tags">
                                        <span class="tag">Office Buildings</span>
                                        <span class="tag">Retail Spaces</span>
                                    </div>
                                    <a href="agent-profile.html" class="view-profile">View Profile</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Featured Agent -->

                    <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                        <div class="featured-agent">
                            <div class="agent-wrapper">
                                <div class="agent-photo">
                                    <img src="assets/img/real-estate/agent-5.webp" alt="Featured Agent"
                                        class="img-fluid">
                                    <div class="overlay-info">
                                        <div class="contact-actions">
                                            <a href="tel:+14155678903" class="contact-btn phone" title="Call Now">
                                                <i class="bi bi-telephone-fill"></i>
                                            </a>
                                            <a href="mailto:sophia.rivera@example.com" class="contact-btn email"
                                                title="Send Email">
                                                <i class="bi bi-envelope-fill"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <span class="achievement-badge rising">Rising Star</span>
                                </div>
                                <div class="agent-details">
                                    <h4>Sophia Rivera</h4>
                                    <span class="position">First-Time Buyer Specialist</span>
                                    <div class="location-info">
                                        <i class="bi bi-geo-alt-fill"></i>
                                        <span>San Francisco</span>
                                    </div>
                                    <div class="expertise-tags">
                                        <span class="tag">Condominiums</span>
                                        <span class="tag">Young Buyers</span>
                                    </div>
                                    <a href="agent-profile.html" class="view-profile">View Profile</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Featured Agent -->

                    <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="400">
                        <div class="featured-agent">
                            <div class="agent-wrapper">
                                <div class="agent-photo">
                                    <img src="assets/img/real-estate/agent-9.webp" alt="Featured Agent"
                                        class="img-fluid">
                                    <div class="overlay-info">
                                        <div class="contact-actions">
                                            <a href="tel:+14155678904" class="contact-btn phone" title="Call Now">
                                                <i class="bi bi-telephone-fill"></i>
                                            </a>
                                            <a href="mailto:daniel.morrison@example.com" class="contact-btn email"
                                                title="Send Email">
                                                <i class="bi bi-envelope-fill"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <span class="achievement-badge veteran">Veteran</span>
                                </div>
                                <div class="agent-details">
                                    <h4>Daniel Morrison</h4>
                                    <span class="position">Investment Partner Advisor</span>
                                    <div class="location-info">
                                        <i class="bi bi-geo-alt-fill"></i>
                                        <span>Austin</span>
                                    </div>
                                    <div class="expertise-tags">
                                        <span class="tag">Multi-Family</span>
                                        <span class="tag">ROI Analysis</span>
                                    </div>
                                    <a href="agent-profile.html" class="view-profile">View Profile</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Featured Agent -->

                </div>

                <div class="text-center mt-5" data-aos="fade-up" data-aos-delay="500">
                    <a href="agents.html" class="discover-all-agents">
                        <span>Discover All Agents</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>

            </div>

        </section><!-- /Featured Agents Section -->

        <!-- Testimonials Section -->
        <section id="testimonials" class="testimonials section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Testimonials</h2>
                <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="testimonial-grid">

                    <div class="testimonial-item" data-aos="zoom-in" data-aos-delay="100">
                        <div class="testimonial-card">
                            <div class="testimonial-header">
                                <div class="testimonial-image">
                                    <img src="assets/img/person/person-f-5.webp" class="img-fluid"
                                        alt="Testimonial 1">
                                </div>
                                <div class="testimonial-meta">
                                    <h3>Sophia Martinez</h3>
                                    <h4>Creative Director</h4>
                                    <div class="company-logo">
                                        <i class="bi bi-building"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-body">
                                <i class="bi bi-chat-quote-fill quote-icon"></i>
                                <p>Leveraging cutting-edge design principles to create immersive brand experiences that
                                    resonate with modern audiences.</p>
                            </div>
                        </div>
                    </div>

                    <div class="testimonial-item featured" data-aos="zoom-in" data-aos-delay="200">
                        <div class="testimonial-card">
                            <div class="testimonial-header">
                                <div class="testimonial-image">
                                    <img src="assets/img/person/person-m-5.webp" class="img-fluid"
                                        alt="Testimonial 2">
                                </div>
                                <div class="testimonial-meta">
                                    <h3>Alexander Wright</h3>
                                    <h4>CEO &amp; Founder</h4>
                                    <div class="company-logo">
                                        <i class="bi bi-buildings"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-body">
                                <i class="bi bi-chat-quote-fill quote-icon"></i>
                                <p>Revolutionary solutions have transformed our business landscape, driving
                                    unprecedented growth and market leadership position.</p>
                            </div>
                        </div>
                    </div>

                    <div class="testimonial-item" data-aos="zoom-in" data-aos-delay="300">
                        <div class="testimonial-card">
                            <div class="testimonial-header">
                                <div class="testimonial-image">
                                    <img src="assets/img/person/person-f-6.webp" class="img-fluid"
                                        alt="Testimonial 3">
                                </div>
                                <div class="testimonial-meta">
                                    <h3>Isabella Kim</h3>
                                    <h4>Product Strategist</h4>
                                    <div class="company-logo">
                                        <i class="bi bi-building-check"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-body">
                                <i class="bi bi-chat-quote-fill quote-icon"></i>
                                <p>Strategic implementation of innovative technologies has elevated our product
                                    development and market penetration.</p>
                            </div>
                        </div>
                    </div>

                    <div class="testimonial-item" data-aos="zoom-in" data-aos-delay="400">
                        <div class="testimonial-card">
                            <div class="testimonial-header">
                                <div class="testimonial-image">
                                    <img src="assets/img/person/person-m-6.webp" class="img-fluid"
                                        alt="Testimonial 4">
                                </div>
                                <div class="testimonial-meta">
                                    <h3>James Cooper</h3>
                                    <h4>Tech Lead</h4>
                                    <div class="company-logo">
                                        <i class="bi bi-building-gear"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-body">
                                <i class="bi bi-chat-quote-fill quote-icon"></i>
                                <p>Exceptional technical expertise and innovative solutions have streamlined our
                                    development processes significantly.</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </section><!-- /Testimonials Section -->



        <!-- Why Us Section -->
        <section id="why-us" class="why-us section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Why Us</h2>
                <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
                        <div class="content">
                            <h3>Why Choose Premier Real Estate Partners?</h3>
                            <p>With over two decades of experience in the real estate market, we've built our reputation
                                on trust, expertise, and exceptional results. Our dedicated team of local experts
                                understands the nuances of every neighborhood and market trend.</p>

                            <div class="features-list">
                                <div class="feature-item d-flex align-items-center mb-3">
                                    <div class="icon-wrapper me-3">
                                        <i class="bi bi-check-circle-fill"></i>
                                    </div>
                                    <div>
                                        <h5>Local Market Expertise</h5>
                                        <p>Deep knowledge of neighborhoods, pricing trends, and market conditions in
                                            your area.</p>
                                    </div>
                                </div>

                                <div class="feature-item d-flex align-items-center mb-3">
                                    <div class="icon-wrapper me-3">
                                        <i class="bi bi-shield-check"></i>
                                    </div>
                                    <div>
                                        <h5>Verified Listings Only</h5>
                                        <p>Every property is thoroughly vetted and verified before listing to ensure
                                            accuracy and quality.</p>
                                    </div>
                                </div>

                                <div class="feature-item d-flex align-items-center mb-3">
                                    <div class="icon-wrapper me-3">
                                        <i class="bi bi-headset"></i>
                                    </div>
                                    <div>
                                        <h5>24/7 Client Support</h5>
                                        <p>Our dedicated support team is available around the clock to assist with your
                                            real estate needs.</p>
                                    </div>
                                </div>

                                <div class="feature-item d-flex align-items-center mb-3">
                                    <div class="icon-wrapper me-3">
                                        <i class="bi bi-graph-up-arrow"></i>
                                    </div>
                                    <div>
                                        <h5>Proven Track Record</h5>
                                        <p>Consistently delivering results with over 2,500 successful transactions and
                                            98% client satisfaction.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="cta-buttons mt-4">
                                <a href="#" class="btn btn-primary me-3">Learn More About Us</a>
                                <a href="#" class="btn btn-outline-primary">Contact Our Team</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
                        <div class="stats-section">
                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <div class="stat-card text-center">
                                        <div class="stat-icon mb-3">
                                            <i class="bi bi-house-door"></i>
                                        </div>
                                        <div class="stat-number">
                                            <span data-purecounter-start="0" data-purecounter-end="2500"
                                                data-purecounter-duration="2" class="purecounter"></span>+
                                        </div>
                                        <div class="stat-label">Homes Sold</div>
                                        <p>Successfully closed transactions across all property types and price ranges.
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="stat-card text-center">
                                        <div class="stat-icon mb-3">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="stat-number">
                                            <span data-purecounter-start="0" data-purecounter-end="98"
                                                data-purecounter-duration="2" class="purecounter"></span>%
                                        </div>
                                        <div class="stat-label">Client Satisfaction</div>
                                        <p>Exceptional service quality rated by our satisfied homeowners and investors.
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="stat-card text-center">
                                        <div class="stat-icon mb-3">
                                            <i class="bi bi-clock-history"></i>
                                        </div>
                                        <div class="stat-number">
                                            <span data-purecounter-start="0" data-purecounter-end="20"
                                                data-purecounter-duration="2" class="purecounter"></span>+
                                        </div>
                                        <div class="stat-label">Years Experience</div>
                                        <p>Two decades of expertise navigating changing market conditions successfully.
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="stat-card text-center">
                                        <div class="stat-icon mb-3">
                                            <i class="bi bi-award"></i>
                                        </div>
                                        <div class="stat-number">
                                            <span data-purecounter-start="0" data-purecounter-end="45"
                                                data-purecounter-duration="2" class="purecounter"></span>+
                                        </div>
                                        <div class="stat-label">Industry Awards</div>
                                        <p>Recognition for excellence in real estate service and client satisfaction.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="testimonial-preview mt-5">
                                <div class="testimonial-card">
                                    <div class="quote-icon mb-2">
                                        <i class="bi bi-quote"></i>
                                    </div>
                                    <p>"Working with this team made buying our first home a seamless experience. Their
                                        knowledge of the local market and dedication to finding the perfect property
                                        exceeded our expectations."</p>
                                    <div class="testimonial-author d-flex align-items-center mt-3">
                                        <img src="assets/img/person/person-f-3.webp" alt="Client"
                                            class="author-image me-3">
                                        <div>
                                            <h6>Sarah Martinez</h6>
                                            <span>First-time Homebuyer</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </section><!-- /Why Us Section -->

        <!-- Pricing Section -->
        <section id="pricing" class="pricing section light-background">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Pricing</h2>
                <p>
                    <!-- Necessitatibus eius consequatur ex aliquid fuga eum quidem sint
            consectetur velit -->
                </p>
            </div>
            <!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row g-4 justify-content-center">
                    <!-- Basic Plan -->
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="pricing-card">
                            <h3>Silver Plan</h3>
                            <div class="price">
                                <span class="currency">₹</span>
                                <span class="amount">499</span>
                                <span class="period">/ 3 months</span>
                            </div>
                            <p class="description">Find your perfect match!</p>

                            <h4>Featured Included:</h4>
                            <ul class="features-list">
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    Profile visibility.
                                </li>
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    Send up to 15 interests.
                                </li>
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    View up to 30 profiles.
                                </li>
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    Basic search functionality.
                                </li>
                            </ul>

                            <a href="#" class="btn btn-primary">
                                Buy Now
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Standard Plan -->
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="pricing-card popular">
                            <div class="popular-badge">Most Popular</div>
                            <h3>Gold Plan</h3>
                            <div class="price">
                                <span class="currency">₹</span>
                                <span class="amount">999</span>
                                <!-- <span class="period">/ month</span> -->
                            </div>
                            <p class="description">Find your perfect match!</p>

                            <h4>Featured Included:</h4>
                            <ul class="features-list">
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    All features of the Silver Plan.
                                </li>
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    Increased visibility.
                                </li>
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    Unlimited interests.
                                </li>
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    View up to 60 profiles.
                                </li>
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    Access to advanced search filters.
                                </li>
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    Direct chat/messaging feature.
                                </li>
                            </ul>

                            <a href="#" class="btn btn-light">
                                Buy Now
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Premium Plan -->
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="pricing-card">
                            <h3>Premium Plan</h3>
                            <div class="price">
                                <span class="currency">₹</span>
                                <span class="amount">1499</span>
                                <span class="period">/ 1 year</span>
                            </div>
                            <p class="description">Find your perfect match!</p>

                            <h4>Featured Included:</h4>
                            <ul class="features-list">
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    All features of the Gold Plan.
                                </li>
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    Priority listing on the homepage.
                                </li>
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    "Premium" badge for increased trust.
                                </li>
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    View unlimited profiles.
                                </li>
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    Horoscope matching feature.
                                </li>
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    Personalized email alerts for new matches.
                                </li>
                            </ul>

                            <a href="#" class="btn btn-primary">
                                Buy Now
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Pricing Section -->

        <!-- Call To Action Section -->
        <section class="call-to-action-1 call-to-action section" id="call-to-action">
            <div class="cta-bg" style="background-image: url('assets/img/real-estate/showcase-3.webp');"></div>
            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">

                        <div class="cta-content text-center">
                            <h2>Need Help Finding Your Dream Partner?</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.
                            </p>

                            <div class="cta-buttons">
                                <a href="#" class="btn btn-primary">Contact Us Today</a>
                                <a href="#" class="btn btn-outline">Schedule a Call</a>
                            </div>

                            <div class="cta-features">
                                <div class="feature-item" data-aos="fade-up" data-aos-delay="200">
                                    <i class="bi bi-telephone-fill"></i>
                                    <span>Free Consultation</span>
                                </div>
                                <div class="feature-item" data-aos="fade-up" data-aos-delay="250">
                                    <i class="bi bi-clock-fill"></i>
                                    <span>24/7 Support</span>
                                </div>
                                <div class="feature-item" data-aos="fade-up" data-aos-delay="300">
                                    <i class="bi bi-shield-check-fill"></i>
                                    <span>Trusted Experts</span>
                                </div>
                            </div>

                        </div><!-- End CTA Content -->

                    </div>
                </div>

            </div>
        </section><!-- /Call To Action Section -->

        @if (0)
            <!-- Recent Blog Posts Section -->
            <section id="recent-blog-posts" class="recent-blog-posts section">

                <!-- Section Title -->
                <div class="container section-title" data-aos="fade-up">
                    <h2>Recent Blog Posts</h2>
                    <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
                </div><!-- End Section Title -->

                <div class="container" data-aos="fade-up" data-aos-delay="100">

                    <div class="row">

                        <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
                            <article class="featured-post">
                                <div class="featured-img">
                                    <img src="assets/img/blog/blog-post-7.webp" alt="" class="img-fluid"
                                        loading="lazy">
                                    <div class="featured-badge">Featured</div>
                                </div>

                                <div class="featured-content">
                                    <div class="post-header">
                                        <a href="#" class="category">Technology</a>
                                        <span class="post-date">Dec 18, 2024</span>
                                    </div>

                                    <h2 class="post-title">
                                        <a href="#">Lorem ipsum dolor sit amet consectetur adipiscing elit
                                            mauris</a>
                                    </h2>

                                    <p class="post-excerpt">
                                        Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                        minim
                                        veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat. Duis aute irure dolor in reprehenderit.
                                    </p>

                                    <div class="post-footer">
                                        <div class="author-info">
                                            <img src="assets/img/person/person-m-8.webp" alt=""
                                                class="author-avatar">
                                            <div class="author-details">
                                                <span class="author-name">Marcus Johnson</span>
                                                <span class="read-time">5 min read</span>
                                            </div>
                                        </div>
                                        <a href="#" class="read-more">Read More</a>
                                    </div>
                                </div>
                            </article>

                            <article class="featured-post" data-aos="fade-up" data-aos-delay="400">
                                <div class="featured-img">
                                    <img src="assets/img/blog/blog-post-3.webp" alt="" class="img-fluid"
                                        loading="lazy">
                                    <div class="featured-badge">Featured</div>
                                </div>

                                <div class="featured-content">
                                    <div class="post-header">
                                        <a href="#" class="category">Innovation</a>
                                        <span class="post-date">Dec 16, 2024</span>
                                    </div>

                                    <h2 class="post-title">
                                        <a href="#">Quis autem vel eum iure reprehenderit qui in ea voluptate
                                            velit
                                            esse</a>
                                    </h2>

                                    <p class="post-excerpt">
                                        At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
                                        praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias
                                        excepturi sint occaecati cupiditate non provident.
                                    </p>

                                    <div class="post-footer">
                                        <div class="author-info">
                                            <img src="assets/img/person/person-f-7.webp" alt=""
                                                class="author-avatar">
                                            <div class="author-details">
                                                <span class="author-name">Emma Rodriguez</span>
                                                <span class="read-time">7 min read</span>
                                            </div>
                                        </div>
                                        <a href="#" class="read-more">Read More</a>
                                    </div>
                                </div>
                            </article>
                        </div><!-- End featured post -->

                        <div class="col-lg-4">

                            <article class="recent-post" data-aos="fade-up" data-aos-delay="200">
                                <div class="recent-img">
                                    <img src="assets/img/blog/blog-post-5.webp" alt="" class="img-fluid"
                                        loading="lazy">
                                </div>
                                <div class="recent-content">
                                    <a href="#" class="category">Business</a>
                                    <h3 class="recent-title">
                                        <a href="#">Excepteur sint occaecat cupidatat non proident sunt</a>
                                    </h3>
                                    <div class="recent-meta">
                                        <span class="author">By Jessica Kim</span>
                                        <span class="date">Dec 15, 2024</span>
                                    </div>
                                </div>
                            </article><!-- End recent post -->

                            <article class="recent-post" data-aos="fade-up" data-aos-delay="250">
                                <div class="recent-img">
                                    <img src="assets/img/blog/blog-post-9.webp" alt="" class="img-fluid"
                                        loading="lazy">
                                </div>
                                <div class="recent-content">
                                    <a href="#" class="category">Marketing</a>
                                    <h3 class="recent-title">
                                        <a href="#">Voluptate velit esse cillum dolore eu fugiat nulla</a>
                                    </h3>
                                    <div class="recent-meta">
                                        <span class="author">By David Park</span>
                                        <span class="date">Dec 12, 2024</span>
                                    </div>
                                </div>
                            </article><!-- End recent post -->

                            <article class="recent-post" data-aos="fade-up" data-aos-delay="300">
                                <div class="recent-img">
                                    <img src="assets/img/blog/blog-post-6.webp" alt="" class="img-fluid"
                                        loading="lazy">
                                </div>
                                <div class="recent-content">
                                    <a href="#" class="category">Design</a>
                                    <h3 class="recent-title">
                                        <a href="#">Pariatur consectetur adipiscing elit sed do eiusmod</a>
                                    </h3>
                                    <div class="recent-meta">
                                        <span class="author">By Sarah Miller</span>
                                        <span class="date">Dec 10, 2024</span>
                                    </div>
                                </div>
                            </article><!-- End recent post -->

                            <article class="recent-post" data-aos="fade-up" data-aos-delay="350">
                                <div class="recent-img">
                                    <img src="assets/img/blog/blog-post-8.webp" alt="" class="img-fluid"
                                        loading="lazy">
                                </div>
                                <div class="recent-content">
                                    <a href="#" class="category">Tech</a>
                                    <h3 class="recent-title">
                                        <a href="#">Magna aliquam erat volutpat consectetur adipiscing</a>
                                    </h3>
                                    <div class="recent-meta">
                                        <span class="author">By Alex Chen</span>
                                        <span class="date">Dec 8, 2024</span>
                                    </div>
                                </div>
                            </article><!-- End recent post -->

                        </div>

                    </div>

                </div>

            </section><!-- /Recent Blog Posts Section -->
        @endif

    </main>
    @include('include.login')
    @include('include.footer')
    @include('include.script')
</body>
