@include('include.header')

<body class="properties-page">
    @include('include.nav-header')

    <main class="main">

        <!-- Page Title -->
        <div class="page-title light-background">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h1 class="mb-2 mb-lg-0">Profiles</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="index.html">Home</a></li>
                        <li class="current">Profiles</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <!-- Profiles Section -->
        <section id="properties" class="properties section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <form method="get" action="{{ route('listings.search') }}">
                    <div class="search-bar mb-5" data-aos="fade-up" data-aos-delay="150">
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <div class="search-wrapper">
                                    <div class="row g-3">
                                        <div class="col-lg-3 col-md-6">
                                            <div class="search-field">
                                                <label>Location</label>
                                                <select class="form-select" name="city">
                                                    <option value="">Select
                                                        Location</option>
                                                    <option value='all_cities'
                                                        @if (request('city') == 'all_cities') selected @endif>
                                                        All Cities</option>
                                                    @foreach ($cities as $city)
                                                        <option value={{ $city['name'] }}
                                                            @if (request('city') == $city['name']) selected @endif>
                                                            {{ $city['name'] . ' / ' . $city['tamil_name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="search-field">
                                                <label>Looking For</label>
                                                <select class="form-select" name="gender">
                                                    <option value="">Select Gender</option>
                                                    <option value="Male"
                                                        @if (request('gender') == 'Male') selected @endif>ஆண் / Male
                                                    </option>
                                                    <option value="Female"
                                                        @if (request('gender') == 'Female') selected @endif>பெண் / Female
                                                    </option>
                                                    <option value="Other"
                                                        @if (request('gender') == 'Other') selected @endif>மற்றவை / Other
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-6">
                                            <div class="search-field">
                                                <label>Age From</label>
                                                <select class="form-select" name="age_from">
                                                    <option value="" selected>Select From Age</option>
                                                    <option value="0">Any Age</option>
                                                    @for ($i = 18; $i <= 40; $i++)
                                                        <option value="{{ $i }}"
                                                            @if (request('age_from') == $i) selected @endif>
                                                            {{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-6">
                                            <div class="search-field">
                                                <label>Age To</label>
                                                <select class="form-select" name="age_to">
                                                    <option value="" selected>Select To Age</option>
                                                    <option value="0">Any Age</option>
                                                    @for ($i = 18; $i <= 40; $i++)
                                                        <option value="{{ $i }}"
                                                            @if (request('age_to') == $i) selected @endif>
                                                            {{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-md-12">
                                            <div class="search-field">
                                                <label>&nbsp;</label>
                                                <button type="submit" class="btn btn-primary w-100 search-btn">
                                                    <i class="bi bi-search"></i> Search
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
                <div class="results-header mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="results-info">
                                <h5>{{ count($profiles) }} Profiles Found</h5>
                                <p class="text-muted">Showing Profiles in {{ request('city') }}</p>
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
                                    {{-- <div class="view-toggle">
                                        <button class="view-btn active" data-view="masonry">
                                            <i class="bi bi-grid"></i>
                                        </button>
                                        <button class="view-btn" data-view="rows">
                                            <i class="bi bi-view-stacked"></i>
                                        </button>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="properties-container">

                    <div class="properties-masonry view-masonry active" data-aos="fade-up" data-aos-delay="250">
                        <div class="row g-4">

                            @foreach ($profiles as $profile)
                                <div class="col-lg-4 col-md-6">
                                    <div class="property-item">
                                        <a href="{{ route('profile', $profile->id) }}" class="property-link">
                                            <div class="property-image-wrapper">
                                                <img src="{{ $profile->userImages->first()->image_path ?? asset('assets/img/person/person-f-3.webp') }}"
                                                    alt="{{ $profile->user->name }}" class="img-fluid">

                                                <div class="property-status">
                                                    @if ($profile->featured)
                                                        <span class="status-badge featured">Featured</span>
                                                    @endif
                                                    <span class="status-badge sale">Active</span>
                                                </div>

                                                <div class="property-actions">
                                                    <button class="action-btn favorite-btn" data-toggle="tooltip"
                                                        title="Add to Favorites">
                                                        <i class="bi bi-heart"></i>
                                                    </button>
                                                    <button class="action-btn share-btn" data-toggle="tooltip"
                                                        title="Share Profile">
                                                        <i class="bi bi-share"></i>
                                                    </button>
                                                    <button class="action-btn gallery-btn" data-toggle="tooltip"
                                                        title="View Gallery">
                                                        <i class="bi bi-images"></i>
                                                        <span
                                                            class="gallery-count">{{ $profile->userImages->count() }}</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </a>

                                        <div class="property-details">
                                            <a href="{{ route('profile', $profile->id) }}" class="property-link">
                                                <div class="property-header">
                                                    <div class="property-price">
                                                        {{ $profile->user->name }} </div>
                                                    <div class="property-type">{{ ucfirst($profile->gender) }}</div>
                                                </div>

                                                <h4 class="property-title">
                                                    {{ \Carbon\Carbon::parse($profile->dob)->age }} yrs</h4>

                                                <p class="property-address">
                                                    <i class="bi bi-geo-alt"></i>
                                                    {{ $profile->city }}{{ $profile->state ? ', ' . $profile->state : '' }}
                                                </p>

                                                <div class="property-specs">
                                                    <div class="spec-item">
                                                        <i class="bi bi-rulers"></i>
                                                        <span>{{ $profile->height }}</span>
                                                    </div>
                                                    <div class="spec-item">
                                                        <i class="bi bi-mortarboard"></i>
                                                        <span>{{ $profile->highest_education }}</span>
                                                    </div>
                                                    <div class="spec-item">
                                                        <i class="bi bi-briefcase"></i>
                                                        <span>{{ $profile->occupation_category }}</span>
                                                    </div>
                                                </div>
                                            </a>

                                            <div class="property-agent-info">
                                                <a href="{{ route('profile', $profile->id) }}" class="property-link">
                                                    {{-- <div class="agent-avatar">
                                                        <img src="{{ $profile->userImages->first()->image_path ?? asset('assets/img/default-profile.jpg') }}"
                                                            alt="{{ $profile->user->name }}">
                                                    </div> --}}
                                                    <div class="agent-details">
                                                        <strong>{{ $profile->user->name }}</strong>
                                                        <span>{{ $profile->caste }}</span>
                                                    </div>
                                                </a>
                                                <div class="agent-contact">
                                                    <a href="tel:{{ $profile->parent_mobile }}" class="contact-btn">
                                                        <i class="bi bi-telephone"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End Profile Item -->
                                <!-- End Profile Item -->
                            @endforeach


                        </div>
                    </div>

                    <div class="properties-rows view-rows">
                        <div class="row g-4">

                            <div class="col-12">
                                <div class="property-row-item">
                                    <a href="{{ route('profile', ['id' => $profile->id]) }}"
                                        class="property-row-link">
                                        <div class="row align-items-center">
                                            <div class="col-lg-4">
                                                <div class="property-image-wrapper">
                                                    <img src="assets/img/real-estate/property-exterior-2.webp"
                                                        alt="Luxury Villa" class="img-fluid">
                                                    <div class="property-status">
                                                        <span class="status-badge featured">Featured</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="property-row-content">
                                                    <div class="row align-items-center">
                                                        <div class="col-lg-8">
                                                            <div class="property-info">
                                                                <div class="property-header">
                                                                    <h4 class="property-title">Luxury Modern Villa with
                                                                        Pool</h4>
                                                                    <div class="property-type-price">
                                                                        <span class="property-type">House</span>
                                                                        <span class="property-price">$1,850,000</span>
                                                                    </div>
                                                                </div>
                                                                <p class="property-address">
                                                                    <i class="bi bi-geo-alt"></i>
                                                                    3458 Sunset Boulevard, Beverly Hills, CA 90210
                                                                </p>
                                                                <div class="property-specs">
                                                                    <span><i class="bi bi-house-door"></i> 5 Bed</span>
                                                                    <span><i class="bi bi-droplet"></i> 4 Bath</span>
                                                                    <span><i class="bi bi-arrows-angle-expand"></i>
                                                                        3,400 sq ft</span>
                                                                </div>
                                                                <div class="property-agent">
                                                                    <img src="assets/img/real-estate/agent-2.webp"
                                                                        alt="Agent" class="agent-avatar">
                                                                    <span>Jennifer Miller, Prime Realty Group</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="property-actions">
                                                                <div class="action-buttons">
                                                                    <button class="action-btn favorite-btn">
                                                                        <i class="bi bi-heart"></i> Save
                                                                    </button>
                                                                    <button class="action-btn contact-btn">
                                                                        <i class="bi bi-telephone"></i> Call
                                                                    </button>
                                                                    <button class="action-btn gallery-btn">
                                                                        <i class="bi bi-images"></i> 14 Photos
                                                                    </button>
                                                                </div>
                                                                <span class="btn btn-primary view-details-btn">View
                                                                    Details</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div><!-- End Profile Row Item -->

                            <div class="col-12">
                                <div class="property-row-item">
                                    <a href="{{ route('profile', ['id' => $profile->id]) }}"
                                        class="property-row-link">
                                        <div class="row align-items-center">
                                            <div class="col-lg-4">
                                                <div class="property-image-wrapper">
                                                    <img src="assets/img/real-estate/property-interior-1.webp"
                                                        alt="Modern Apartment" class="img-fluid">
                                                    <div class="property-status">
                                                        <span class="status-badge new">New</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="property-row-content">
                                                    <div class="row align-items-center">
                                                        <div class="col-lg-8">
                                                            <div class="property-info">
                                                                <div class="property-header">
                                                                    <h4 class="property-title">Downtown Modern
                                                                        Penthouse</h4>
                                                                    <div class="property-type-price">
                                                                        <span class="property-type">Apartment</span>
                                                                        <span
                                                                            class="property-price">$5,200<small>/month</small></span>
                                                                    </div>
                                                                </div>
                                                                <p class="property-address">
                                                                    <i class="bi bi-geo-alt"></i>
                                                                    1247 Broadway Street, Manhattan, NY 10001
                                                                </p>
                                                                <div class="property-specs">
                                                                    <span><i class="bi bi-house-door"></i> 3 Bed</span>
                                                                    <span><i class="bi bi-droplet"></i> 2 Bath</span>
                                                                    <span><i class="bi bi-arrows-angle-expand"></i>
                                                                        2,100 sq ft</span>
                                                                </div>
                                                                <div class="property-agent">
                                                                    <img src="assets/img/real-estate/agent-4.webp"
                                                                        alt="Agent" class="agent-avatar">
                                                                    <span>Robert Thompson, Urban Living Realty</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="property-actions">
                                                                <div class="action-buttons">
                                                                    <button class="action-btn favorite-btn">
                                                                        <i class="bi bi-heart"></i> Save
                                                                    </button>
                                                                    <button class="action-btn contact-btn">
                                                                        <i class="bi bi-telephone"></i> Call
                                                                    </button>
                                                                    <button class="action-btn gallery-btn">
                                                                        <i class="bi bi-images"></i> 9 Photos
                                                                    </button>
                                                                </div>
                                                                <span class="btn btn-primary view-details-btn">View
                                                                    Details</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div><!-- End Profile Row Item -->

                            <div class="col-12">
                                <div class="property-row-item">
                                    <a href="{{ route('profile', ['id' => $profile->id]) }}"
                                        class="property-row-link">
                                        <div class="row align-items-center">
                                            <div class="col-lg-4">
                                                <div class="property-image-wrapper">
                                                    <img src="assets/img/real-estate/property-exterior-5.webp"
                                                        alt="Family Home" class="img-fluid">
                                                    <div class="property-status">
                                                        <span class="status-badge sale">For Sale</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="property-row-content">
                                                    <div class="row align-items-center">
                                                        <div class="col-lg-8">
                                                            <div class="property-info">
                                                                <div class="property-header">
                                                                    <h4 class="property-title">Charming Family Home
                                                                        with Garden</h4>
                                                                    <div class="property-type-price">
                                                                        <span class="property-type">House</span>
                                                                        <span class="property-price">$975,000</span>
                                                                    </div>
                                                                </div>
                                                                <p class="property-address">
                                                                    <i class="bi bi-geo-alt"></i>
                                                                    892 Maple Grove Avenue, Austin, TX 73301
                                                                </p>
                                                                <div class="property-specs">
                                                                    <span><i class="bi bi-house-door"></i> 4 Bed</span>
                                                                    <span><i class="bi bi-droplet"></i> 3 Bath</span>
                                                                    <span><i class="bi bi-arrows-angle-expand"></i>
                                                                        2,650 sq ft</span>
                                                                </div>
                                                                <div class="property-agent">
                                                                    <img src="assets/img/real-estate/agent-6.webp"
                                                                        alt="Agent" class="agent-avatar">
                                                                    <span>Lisa Anderson, Texas Home Solutions</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="property-actions">
                                                                <div class="action-buttons">
                                                                    <button class="action-btn favorite-btn">
                                                                        <i class="bi bi-heart"></i> Save
                                                                    </button>
                                                                    <button class="action-btn contact-btn">
                                                                        <i class="bi bi-telephone"></i> Call
                                                                    </button>
                                                                    <button class="action-btn gallery-btn">
                                                                        <i class="bi bi-images"></i> 11 Photos
                                                                    </button>
                                                                </div>
                                                                <span class="btn btn-primary view-details-btn">View
                                                                    Details</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div><!-- End Profile Row Item -->

                        </div>
                    </div>

                </div>

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

        </section><!-- /Profiles Section -->

    </main>

    @include('include.login')
    @include('include.footer')
    @include('include.script')
</body>
