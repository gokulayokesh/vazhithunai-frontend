@extends('include.header')
@section('title', 'Profile Listings | Vazhithunai Matrimony')
@section('content')

    <body class="properties-page">
        @include('include.nav-header')

        <main class="main">

            <!-- Page Title -->
            <div class="page-title light-background">
                <div class="container d-lg-flex justify-content-between align-items-center">
                    <h1 class="mb-2 mb-lg-0">Profiles</h1>
                    <nav class="breadcrumbs">
                        <ol>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="current">Profiles</li>
                        </ol>
                    </nav>
                </div>
            </div><!-- End Page Title -->

            <!-- Profiles Section -->
            <section id="properties" class="properties section"
                @if ((Auth::user()?->latestActiveSubscription->plan_code ?? 0) > 1) style="padding: 30px 60px 60px 60px;" @endif>
                <div class="container" data-aos="fade-up" data-aos-delay="100">
                    <form method="get" action="{{ route('listings.search') }}">
                        <div class="search-bar mb-5" data-aos="fade-up" data-aos-delay="150">
                            <div class="row justify-content-center">
                                <div @if ((Auth::user()?->latestActiveSubscription->plan_code ?? 0) > 1) class="col-lg-12" @else class="col-lg-10" @endif>
                                    <div class="search-wrapper">
                                        @if ((Auth::user()?->latestActiveSubscription->plan_code ?? 0) > 1)
                                            <div class="row g-3" style="justify-content: center;">
                                                <div class="col-lg-2 col-md-6">
                                                    <div class="search-field">
                                                        <label>Location</label>
                                                        <select class="form-select" name="city">
                                                            <option value="">Select
                                                                Location</option>
                                                            {{-- <option value='all_cities'
                                                        @if (request('city') == 'all_cities') selected @endif>
                                                        All Cities</option> --}}
                                                            @foreach ($cities as $city)
                                                                <option value={{ $city['id'] }}
                                                                    @if (request('city') == $city['id']) selected @endif>
                                                                    {{ $city['name'] . ' / ' . $city['tamil_name'] }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-6">
                                                    <div class="search-field">
                                                        <label>Looking For</label>
                                                        <select class="form-select" name="gender">
                                                            <option value="">Select Gender</option>
                                                            <option value="Male"
                                                                @if (request('gender') == 'Male') selected @endif>ஆண் / Male
                                                            </option>
                                                            <option value="Female"
                                                                @if (request('gender') == 'Female') selected @endif>பெண் /
                                                                Female
                                                            </option>
                                                            <option value="Other"
                                                                @if (request('gender') == 'Other') selected @endif>மற்றவை /
                                                                Other
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
                                            </div>
                                        @else
                                            <div class="row g-3" style="justify-content: center;">
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="search-field">
                                                        <label>Location</label>
                                                        <select class="form-select" name="city">
                                                            <option value="">Select
                                                                Location</option>
                                                            {{-- <option value='all_cities'
                                                        @if (request('city') == 'all_cities') selected @endif>
                                                        All Cities</option> --}}
                                                            @foreach ($cities as $city)
                                                                <option value={{ $city['id'] }}
                                                                    @if (request('city') == $city['id']) selected @endif>
                                                                    {{ $city['name'] . ' / ' . $city['tamil_name'] }}
                                                                </option>
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
                                                                @if (request('gender') == 'Male') selected @endif>ஆண் /
                                                                Male
                                                            </option>
                                                            <option value="Female"
                                                                @if (request('gender') == 'Female') selected @endif>பெண் /
                                                                Female
                                                            </option>
                                                            <option value="Other"
                                                                @if (request('gender') == 'Other') selected @endif>மற்றவை /
                                                                Other
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6">
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
                                                <div class="col-lg-3 col-md-6">
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
                                            </div>
                                        @endif
                                        @if ((Auth::user()?->latestActiveSubscription->plan_code ?? 0) > 1)
                                            <div class="row g-3" style="justify-content: center;">
                                                <h6>Advanced Search</h6>
                                                <!-- Birth Star -->
                                                <div class="col-lg-2 col-md-6">
                                                    <div class="search-field">
                                                        <label>Birth Star</label>
                                                        <select class="form-select" name="birth_star">
                                                            <option value="">Select Birth Star</option>
                                                            @foreach ($birthStars as $star)
                                                                <option value="{{ $star['name'] }}"
                                                                    @if (request('birth_star') == $star['name']) selected @endif>
                                                                    {{ $star['name'] }} - {{ $star['tamil_name'] }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Zodiac Sign -->
                                                <div class="col-lg-2 col-md-6">
                                                    <div class="search-field">
                                                        <label>Zodiac Sign</label>
                                                        <select class="form-select" name="zodiac">
                                                            <option value="">Select Zodiac</option>
                                                            @foreach ($zodiacs as $zodiac)
                                                                <option value="{{ $zodiac['name'] }}"
                                                                    @if (request('zodiac') == $zodiac['name']) selected @endif>
                                                                    {{ $zodiac['name'] }} - {{ $zodiac['tamil_name'] }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Education -->
                                                <div class="col-lg-2 col-md-6">
                                                    <div class="search-field">
                                                        <label>Education</label>
                                                        <select class="form-select" name="education">
                                                            <option value="">Select Education</option>
                                                            @foreach ($educations as $edu)
                                                                <option value="{{ $edu['name'] }}"
                                                                    @if (request('education') == $edu['name']) selected @endif>
                                                                    {{ $edu['name'] }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Salary -->
                                                <div class="col-lg-2 col-md-6">
                                                    <div class="search-field">
                                                        <label>Salary</label>
                                                        <select class="form-select" name="salary">
                                                            <option value="">Select Salary Range</option>
                                                            <option value="0-25000"
                                                                @if (request('salary') == '0-25000') selected @endif>Below
                                                                ₹25,000</option>
                                                            <option value="25000-50000"
                                                                @if (request('salary') == '25000-50000') selected @endif>₹25,000
                                                                -
                                                                ₹50,000</option>
                                                            <option value="50000-100000"
                                                                @if (request('salary') == '50000-100000') selected @endif>₹50,000
                                                                -
                                                                ₹1,00,000</option>
                                                            <option value="100000+"
                                                                @if (request('salary') == '100000+') selected @endif>Above
                                                                ₹1,00,000</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Job -->
                                                <div class="col-lg-2 col-md-6">
                                                    <div class="search-field">
                                                        <label>Job</label>
                                                        <select class="form-select" name="job">
                                                            <option value="">Select Job</option>
                                                            <option value="0-25000"
                                                                @if (request('job') == '0-25000') selected @endif>Below
                                                                ₹25,000</option>
                                                            <option value="25000-50000"
                                                                @if (request('job') == '25000-50000') selected @endif>₹25,000
                                                                -
                                                                ₹50,000</option>
                                                            <option value="50000-100000"
                                                                @if (request('job') == '50000-100000') selected @endif>₹50,000
                                                                -
                                                                ₹1,00,000</option>
                                                            <option value="100000+"
                                                                @if (request('job') == '100000+') selected @endif>Above
                                                                ₹1,00,000</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Marital Status -->
                                                <div class="col-lg-2 col-md-6">
                                                    <div class="search-field">
                                                        <label>Marital Status</label>
                                                        <select class="form-select" name="marital_status">
                                                            <option value="">Select Marital Status</option>
                                                            <option value="Never Married"
                                                                @if (request('marital_status') == 'Never Married') selected @endif>Never
                                                                Married</option>
                                                            <option value="Divorced"
                                                                @if (request('marital_status') == 'Divorced') selected @endif>Divorced
                                                            </option>
                                                            <option value="Widowed"
                                                                @if (request('marital_status') == 'Widowed') selected @endif>Widowed
                                                            </option>
                                                            <option value="Separated"
                                                                @if (request('marital_status') == 'Separated') selected @endif>
                                                                Separated
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="row g-3" style="justify-content: center;">
                                            <div class="col-lg-3 col-md-12">
                                                <div class="search-field">
                                                    <label>&nbsp;</label>
                                                    <button type="submit" class="btn btn-success w-100 search-btn">
                                                        <i class="bi bi-search-heart"></i> Search
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
                                    {{-- <p class="text-muted">Showing Profiles in {{ request('city') }}</p> --}}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="results-controls">
                                    <div class="d-flex gap-3 align-items-center justify-content-lg-end">
                                        {{-- <div class="sort-dropdown">
                                        <select class="form-select form-select-sm">
                                            <option>Price: Low to High</option>
                                            <option>Price: High to Low</option>
                                            <option>Newest First</option>
                                            <option>Largest Size</option>
                                        </select>
                                    </div> --}}
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
                                @if ($profiles->isEmpty())
                                    <p>No profiles found matching your criteria.</p>
                                    <div class="alert alert-warning text-center p-3 mb-4"
                                        style="border-radius: 8px; font-size: 0.95rem;">
                                        <strong>🚀 Heads-Up Before You Subscribe</strong><br>
                                        Our platform is brand new, and users are still joining. You might see only a few
                                        profiles at
                                        first.<br>
                                        More users are signing up every day — your experience will keep improving! You're
                                        getting in
                                        early and helping us grow.<br>
                                        <em>Please proceed with your purchase only if you're comfortable with this
                                            early-stage
                                            experience.</em><br>
                                        <hr />
                                        <strong>🚀 சந்தா செய்வதற்கு முன் ஒரு சிறிய அறிவிப்பு</strong><br>
                                        வணக்கம்! எங்கள் தளம் தற்போது புதியதாக தொடங்கப்பட்டுள்ளது. அதனால், நீங்கள் முதலில்
                                        சில பயனர்
                                        சுயவிவரங்களையே காணலாம்.<br>

                                        கவலைப்பட வேண்டாம் — தினமும் புதிய பயனர்கள் சேர்ந்து கொண்டிருக்கிறார்கள். விரைவில்
                                        உங்கள் அனுபவம்
                                        மேலும் சிறப்பாகும். நீங்கள் ஆரம்பத்திலேயே எங்களுடன் சேர்ந்து, வளர்ச்சிக்கு துணை
                                        நிற்கிறீர்கள்!<br>

                                        <em>இந்த ஆரம்ப நிலை அனுபவத்துடன் நீங்கள் வசதியாக இருந்தால் மட்டுமே, உங்கள் திட்டத்தை
                                            வாங்கத்
                                            தொடரவும். எங்களுடன் இணைந்ததற்கு நன்றி 💙</em>
                                    </div>
                                @endif
                                @foreach ($profiles as $profile)
                                    <div class="col-lg-4 col-md-6">
                                        <div class="property-item">

                                            <div class="property-image-wrapper">
                                                <a href="{{ route('profile', ['identifier' => $profile->user->identifier ?? '']) }}"
                                                    class="property-link">
                                                    @if (!Auth::user())
                                                        @if ($profile->gender == 'Male')
                                                            <img src="{{ asset('assets/img/m-default.webp') }}"
                                                                alt="Featured Agent" class="img-fluid">
                                                        @else
                                                            <img src="{{ asset('assets/img/f-default.webp') }}"
                                                                alt="Featured Agent" class="img-fluid">
                                                        @endif
                                                    @else
                                                        <img src="{{ asset($profile->userImages->first()->image_path) }}"
                                                            alt="{{ $profile->user->name }}" class="img-fluid">
                                                    @endif
                                                </a>
                                                <div class="property-status">
                                                    @if ($profile->featured)
                                                        <span class="status-badge featured">Featured</span>
                                                    @endif
                                                    {{-- <span class="status-badge sale">Active</span> --}}
                                                    @if (($profile->user->latestActiveSubscription->plan_code ?? 0) == 3)
                                                        <span class="shimmer status-badge premium"><span
                                                                style="font-size: small;"
                                                                class="bi bi-award"></span>Premium</span>
                                                    @endif
                                                    @if (($profile->user->email_verified_at ?? null) != null)
                                                        <span class="shimmer status-badge verified"><span
                                                                style="font-size: small;"
                                                                class="bi bi-patch-check-fill"></span>
                                                            Verified</span>
                                                    @endif
                                                </div>

                                                <div class="property-actions">
                                                    <button class="action-btn favorite-btn shortlist-btn"
                                                        data-toggle="tooltip" title="Add to Favorites"
                                                        data-user-id="{{ $profile->id }}">
                                                        @if (auth()->user() && auth()->user()->shortlistedUsers->contains('id', $profile->id))
                                                            <i class="bi bi-heart-fill text-danger"></i>
                                                        @else
                                                            <i class="bi bi-heart"></i>
                                                        @endif
                                                    </button>

                                                    <button class="action-btn share-btn" data-toggle="tooltip"
                                                        onclick="shareProfile('{{ route('profile', ['identifier' => $profile->user->identifier ?? '']) }}')">
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

                                            <div class="property-details">
                                                <a href="{{ route('profile', ['identifier' => $profile->user->identifier ?? '']) }}"
                                                    class="property-link">
                                                    <div class="property-header">
                                                        <div class="property-price">
                                                            {{ $profile->user->name }} </div>
                                                        <div class="property-type">
                                                            #{{ $profile->user->identifier ?? '' }}
                                                        </div>
                                                    </div>

                                                    <h4 class="property-title">
                                                        {{ $profile->gender ?? '' }} -
                                                        {{ \Carbon\Carbon::parse($profile->dob)->age }} yrs
                                                    </h4>

                                                    <p class="property-address">
                                                        <i class="bi bi-geo-alt"></i>
                                                        {{ $profile->city->name }}{{ $profile->city->state->name ? ', ' . $profile->city->state->name : '' }}
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
                                                    <a href="{{ route('profile', ['identifier' => $profile->user->identifier ?? '']) }}"
                                                        class="property-link">
                                                        {{-- <div class="agent-avatar">
                                                        <img src="{{ $profile->userImages->first()->image_path ?? asset('assets/img/default-profile.jpg') }}"
                                                            alt="{{ $profile->user->name }}">
                                                    </div> --}}
                                                        <div class="agent-details">
                                                            <strong>{{ $profile->user->name }}</strong>
                                                            <span>{{ $profile->caste }}</span>
                                                        </div>
                                                    </a>
                                                    {{-- <div class="agent-contact">
                                                        <a href="tel:{{ $profile->parent_mobile }}" class="contact-btn">
                                                            <i class="bi bi-telephone"></i>
                                                        </a>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- End Profile Item -->
                                    <!-- End Profile Item -->
                                @endforeach


                            </div>
                        </div>
                    </div>

                    <nav class="pagination-wrapper mt-5" data-aos="fade-up" data-aos-delay="350">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-lg-6">
                                <div class="pagination-info">
                                    <p>Showing <strong>{{ $profiles->firstItem() }}-{{ $profiles->lastItem() }}</strong>
                                        of <strong>{{ $profiles->total() }}</strong> Profiles</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <ul class="pagination justify-content-lg-end">
                                    {{ $profiles->links() }}
                                </ul>
                            </div>
                        </div>
                    </nav>

                </div>

            </section><!-- /Profiles Section -->

        </main>

        @include('include.login-modal')
        @include('include.footer')
        @include('include.script')
    </body>
@endsection
