@extends('include.header')
@section('title', 'Profile Details | Vazhithunai Matrimony')
@section('content')

    <body class="agent-profile-page">
        @include('include.nav-header')

        <main class="main">

            <div class="page-title light-background">
                <div class="container d-lg-flex justify-content-between align-items-center">
                    <h1 class="mb-2 mb-lg-0">Profile Details</h1>
                    <nav class="breadcrumbs">
                        <ol>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('listings.search') }}">Listings</a></li>
                            <li class="current">Profile Details</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <section id="profile-details" class="property-details section">
                <div class="container" data-aos="fade-up" data-aos-delay="100">
                    <div class="row">
                        <div class="col-lg-7">

                            {{-- Profile Photo Slider --}}
                            <div class="property-hero mb-5" data-aos="fade-up" data-aos-delay="200">
                                <div class="hero-image-container">
                                    <div class="property-gallery-slider swiper init-swiper">
                                        <script type="application/json" class="swiper-config">
                                        {
                                          "loop": true,
                                          "speed": 600,
                                          "autoplay": {
                                            "delay": 5000
                                          },
                                          "navigation": {
                                            "nextEl": ".swiper-button-next",
                                            "prevEl": ".swiper-button-prev"
                                          },
                                          "thumbs": {
                                            "swiper": ".property-thumbnails-slider"
                                          }
                                        }
                                      </script>
                                        <div class="swiper-wrapper">
                                            @if ($alreadyViewed)
                                                @if (isset($profile->userImages) && count($profile->userImages) > 0)
                                                    @foreach ($profile->userImages as $image)
                                                        <div class="swiper-slide">
                                                            <img src="{{ Storage::url($image->image_path) }}"
                                                                class="img-fluid hero-image"
                                                                alt="{{ $profile->user->name }}">
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="swiper-slide">
                                                        @if ($profile->genders->value == 'Male')
                                                            <img src="{{ asset('assets/img/m-default.webp') }}"
                                                                class="img-fluid hero-image"
                                                                alt="{{ $profile->user->name }}">
                                                        @else
                                                            <img src="{{ asset('assets/img/f-default.webp') }}"
                                                                class="img-fluid hero-image"
                                                                alt="{{ $profile->user->name }}">
                                                        @endif
                                                    </div>
                                                @endif
                                            @else
                                                <div class="swiper-slide">
                                                    @if ($profile->genders->value == 'Male')
                                                        <img src="{{ asset('assets/img/m-default.webp') }}"
                                                            class="img-fluid hero-image" alt="{{ $profile->user->name }}">
                                                    @else
                                                        <img src="{{ asset('assets/img/f-default.webp') }}"
                                                            class="img-fluid hero-image" alt="{{ $profile->user->name }}">
                                                    @endif
                                                </div>
                                            @endif
                                        </div>
                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                    </div>
                                </div>

                                {{-- Thumbnails --}}
                                <div class="thumbnail-gallery mt-3">
                                    <div class="property-thumbnails-slider swiper init-swiper">
                                        <script type="application/json" class="swiper-config">
                                        {
                                          "loop": true,
                                          "spaceBetween": 10,
                                          "slidesPerView": 4,
                                          "freeMode": true,
                                          "watchSlidesProgress": true,
                                          "breakpoints": {
                                            "576": {
                                              "slidesPerView": 5
                                            },
                                            "768": {
                                              "slidesPerView": 6
                                            }
                                          }
                                        }
                                      </script>
                                        <div class="swiper-wrapper">
                                            @if ($alreadyViewed)
                                                @if (isset($profile->userImages) && count($profile->userImages) > 0)
                                                    @foreach ($profile->userImages as $image)
                                                        <div class="swiper-slide">
                                                            <img src="{{ Storage::url($image->image_path) }}"
                                                                class="img-fluid thumbnail-img"
                                                                alt="{{ $profile->user->name }}">
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="swiper-slide">
                                                        @if ($profile->genders->value == 'Male')
                                                            <img src="{{ asset('assets/img/m-default.webp') }}"
                                                                class="img-fluid thumbnail-img"
                                                                alt="{{ $profile->user->name }}">
                                                        @else
                                                            <img src="{{ asset('assets/img/f-default.webp') }}"
                                                                class="img-fluid thumbnail-img"
                                                                alt="{{ $profile->user->name }}">
                                                        @endif
                                                    </div>
                                                @endif
                                            @else
                                                <div class="swiper-slide">
                                                    <img src="{{ asset('assets/img/m-default.webp') }}"
                                                        class="img-fluid thumbnail-img" alt="{{ $profile->user->name }}">
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Profile Info --}}
                            <div class="property-info mb-5" data-aos="fade-up" data-aos-delay="300">
                                <div class="property-header">
                                    <h1 class="property-title">{{ $profile->user->name }}</h1>
                                    <div class="property-meta">
                                        <span class="address"><i class="bi bi-geo-alt"></i> {{ $profile->city->name }},
                                            {{ $profile->city->state->name }}</span>
                                        <span class="listing-id">Profile ID: #{{ $profile->user->identifier }}</span>
                                    </div>
                                </div>

                                <div class="pricing-section">
                                    <div class="main-price">
                                        {{ \Carbon\Carbon::parse($profile->dob)->age }} yrs</div>
                                    <div class="price-breakdown">
                                        <span class="deposit">DOB:
                                            {{ \Carbon\Carbon::parse($profile->dob)->format('d-m-Y') . ' ' . $profile->birth_time }}</span>
                                        <span class="deposit">Height: {{ $profile->heights->value }}</span>
                                        <span class="available">Marital Status: {{ $profile->maritalStatus->value }}</span>
                                    </div>
                                </div>

                                <div class="quick-stats">
                                    <div class="stat-grid">
                                        <div class="stat-card">
                                            <div class="stat-icon"><i class="bi bi-gender-ambiguous"></i></div>
                                            <div class="stat-content">
                                                <span class="stat-number">{{ ucfirst($profile->genders->value) }}</span>
                                                <span class="stat-label">Gender</span>
                                            </div>
                                        </div>
                                        <div class="stat-card">
                                            <div class="stat-icon"><i class="bi bi-mortarboard"></i></div>
                                            <div class="stat-content">
                                                <span class="stat-number">{{ $profile->educations->value }}</span>
                                                <span class="stat-label">Education</span>
                                            </div>
                                        </div>
                                        <div class="stat-card">
                                            <div class="stat-icon"><i class="bi bi-briefcase"></i></div>
                                            <div class="stat-content">
                                                <span class="stat-number">{{ $profile->occupationCategory->value }}</span>
                                                <span class="stat-label">Occupation</span>
                                            </div>
                                        </div>
                                        <div class="stat-card">
                                            <div class="stat-icon"><i class="bi bi-translate"></i></div>
                                            <div class="stat-content">
                                                <span
                                                    class="stat-number">{{ implode(', ', $profile->languages_known_values ?? []) }}</span>
                                                <span class="stat-label">Languages</span>
                                            </div>
                                        </div>
                                        <div class="stat-card">
                                            <div class="stat-icon"><i class="bi bi-heart"></i></div>
                                            <div class="stat-content">
                                                <span class="stat-number">{{ $profile->caste }}</span>
                                                <span class="stat-label">Caste</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Location Section -->
                            <div class="location-section mt-5" data-aos="fade-up" data-aos-delay="700">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="neighborhood-info">
                                            <h5>Education</h5>
                                            <div class="poi-item">
                                                <i class="bi bi-mortarboard"></i>
                                                <div class="poi-content">
                                                    <span class="poi-name">{{ $profile->institution }}</span>
                                                    <span class="poi-distance">Year:
                                                        {{ $profile->completion_year }}</span>
                                                </div>
                                            </div>
                                            <div class="poi-item">
                                                <i class="bi bi-book"></i>
                                                <div class="poi-content">
                                                    <span class="poi-name">{{ $profile->educations->value }}</span>
                                                    <span class="poi-distance">Field:
                                                        {{ $profile->education_field ?? 'N/A' }}</span>
                                                </div>
                                            </div>
                                            <div class="poi-item">
                                                <i class="bi bi-award"></i>
                                                <div class="poi-content">
                                                    <span class="poi-name">Achievements</span>
                                                    <span
                                                        class="poi-distance">{{ $profile->achievements ?? 'Not specified' }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="neighborhood-info">
                                            <h5>Career</h5>
                                            <div class="poi-item">
                                                <i class="bi bi-briefcase"></i>
                                                <div class="poi-content">
                                                    <span
                                                        class="poi-name">{{ $profile->occupationCategory->value }}</span>
                                                    <span class="poi-distance">{{ $profile->company_name ?? '—' }}</span>
                                                </div>
                                            </div>
                                            <div class="poi-item">
                                                <i class="bi bi-cash-coin"></i>
                                                <div class="poi-content">
                                                    <span class="poi-name">Annual Income</span>
                                                    <span
                                                        class="poi-distance">{{ $profile->salaries->value ?? 'Not disclosed' }}</span>
                                                </div>
                                            </div>
                                            <div class="poi-item">
                                                <i class="bi bi-geo-alt"></i>
                                                <div class="poi-content">
                                                    <span class="poi-name">Work Location</span>
                                                    <span
                                                        class="poi-distance">{{ $profile->work_location ?? $profile->city }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="neighborhood-info">
                                            <h5>Family</h5>
                                            <div class="poi-item">
                                                <i class="bi bi-people"></i>
                                                <div class="poi-content">
                                                    <span class="poi-name">Father’s Occupation</span>
                                                    <span class="poi-distance">{{ $profile->father_work ?? 'N/A' }}</span>
                                                </div>
                                            </div>
                                            <div class="poi-item">
                                                <i class="bi bi-person-heart"></i>
                                                <div class="poi-content">
                                                    <span class="poi-name">Mother’s Occupation</span>
                                                    <span class="poi-distance">{{ $profile->mother_work ?? 'N/A' }}</span>
                                                </div>
                                            </div>
                                            <div class="poi-item">
                                                <i class="bi bi-people-fill"></i>
                                                <div class="poi-content">
                                                    <span class="poi-name">Siblings</span>
                                                    <span class="poi-distance">
                                                        {{ $profile->brothers_count }} Brothers
                                                        ({{ $profile->married_brothers }}
                                                        Married),
                                                        {{ $profile->sisters_count }} Sisters
                                                        ({{ $profile->married_sisters }}
                                                        Married)
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div><!-- End Location Section -->

                            {{-- About Section --}}
                            <div class="property-details mb-5" data-aos="fade-up" data-aos-delay="400">
                                <h3>About {{ $profile->user->name }}</h3>
                                <p>{{ $profile->about ?? 'Profile description not provided.' }}</p>

                                <div class="features-grid mt-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5>Interests & Hobbies</h5>
                                            <ul class="feature-list">
                                                @foreach (explode(',', $profile->interests ?? '') as $interest)
                                                    @if (trim($interest) !== '')
                                                        <li><i class="bi bi-check2"></i> {{ trim($interest) }}</li>
                                                    @endif
                                                @endforeach
                                                @foreach (explode(',', $profile->hobbies ?? '') as $hobbies)
                                                    @if (trim($hobbies) !== '')
                                                        <li><i class="bi bi-check2"></i> {{ trim($hobbies) }}</li>
                                                    @endif
                                                @endforeach

                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <h5>Lifestyle Preferences</h5>
                                            <ul class="feature-list">
                                                <li><i class="bi bi-egg-fried"></i> Diet:
                                                    {{ $profile->diet_preference ?? 'Not specified' }}</li>
                                                <li><i class="bi bi-person-hearts"></i> Pet:
                                                    {{ $profile->pet_preference ?? 'Not specified' }}</li>
                                                <li><i class="bi bi-cup-straw"></i> Drinking:
                                                    {{ $profile->drinkingHabits->value ?? 'Not specified' }}</li>
                                                <li><i class="bi bi-lungs"></i> Smoking:
                                                    {{ $profile->smokingHabits->value ?? 'Not specified' }}</li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Floor Plan -->
                            <div class="floor-plan-section mb-5" data-aos="fade-up" data-aos-delay="500">
                                <h3>Horoscope Image</h3>
                                <div class="floor-plan-card">
                                    @if ($alreadyViewed)
                                        @if (isset($profile->userHoroscopeImages) && $profile->userHoroscopeImages->count() > 0)
                                            <img src="{{ Storage::url($profile->userHoroscopeImages->first()?->image_path) }}"
                                                class="img-fluid" alt="Floor Plan">
                                        @else
                                            @if ($profile->genders->value == 'Male')
                                                <img src="{{ asset('assets/img/m-default.webp') }}" class="img-fluid"
                                                    alt="{{ $profile->user->name }}">
                                            @else
                                                <img src="{{ asset('assets/img/f-default.webp') }}" class="img-fluid"
                                                    alt="{{ $profile->user->name }}">
                                            @endif
                                        @endif
                                    @else
                                        @if ($profile->genders->value == 'Male')
                                            <img src="{{ asset('assets/img/m-default.webp') }}" class="img-fluid"
                                                alt="{{ $profile->user->name }}">
                                        @else
                                            <img src="{{ asset('assets/img/f-default.webp') }}" class="img-fluid"
                                                alt="{{ $profile->user->name }}">
                                        @endif
                                        {{-- <div class="plan-details">
                                    <h5>3 Bedroom Penthouse Layout</h5>
                                    <p>Open concept living and dining area with private balcony access. Master suite
                                        features ensuite bathroom and city views.</p>
                                </div> --}}
                                    @endif
                                </div>
                            </div><!-- End Floor Plan -->

                        </div>
                        {{-- Sidebar --}}
                        <div class="col-lg-5">
                            <div class="sticky-sidebar">
                                {{-- Contact Card --}}
                                <div class="agent-card mb-4" data-aos="fade-up" data-aos-delay="350">
                                    <div class="agent-header">
                                        <div class="agent-avatar">
                                            @if ($alreadyViewed)
                                                @if (isset($profile->userImages) && $profile->userImages->count() > 0)
                                                    <img src="{{ Storage::url($profile->userImages->first()?->image_path) }}"
                                                        class="img-fluid" alt="{{ $profile->user->name }}">
                                                @else
                                                    <img src="{{ Storage::url($profile->userImages->first()?->image_path) ?? asset('assets/img/m-default.webp') }}"
                                                        class="img-fluid" alt="{{ $profile->user->name }}">
                                                @endif
                                            @else
                                                <img src="{{ asset('assets/img/m-default.webp') }}" class="img-fluid"
                                                    alt="{{ $profile->user->name }}">
                                            @endif
                                        </div>
                                        <div class="agent-info">
                                            <h4>{{ $profile->user->name }}
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
                                                @if ($alreadyViewed)
                                                    <span class="shimmer status-badge viewed"><span
                                                            style="font-size: small;" class="bi bi-eye"></span>
                                                        Viewed</span>

                                                    @if ($profile->user->isOnline())
                                                        <br><small class="text-success">● Online</small>
                                                    @else
                                                        <br>
                                                        <small class="agent-role"> Last seen
                                                            {{ $profile->user->last_seen?->diffForHumans() ?? 'a while ago' }}</small>
                                                    @endif
                                                @endif

                                            </h4>
                                            <p class="agent-role">{{ $profile->occupationCategory->value }}</p>
                                            @auth
                                                @if (!$alreadyViewed && (Auth::user()->view_profile_count ?? 0) > 0)
                                                    <a class="btn btn-primary"
                                                        href="{{ url('/add-watch-history', $profile->user->id) }}">
                                                        <span class="bi bi-eye"></span> View Profile
                                                    </a>
                                                @elseif((Auth::user()->view_profile_count ?? 0) == 0)
                                                    <span class="d-inline-block" tabindex="0" data-bs-toggle="popover"
                                                        data-bs-trigger="hover focus"
                                                        data-bs-content="Buy a subscription plan to view the Profile Details">
                                                        <button class="btn btn-primary" type="button" disabled><span
                                                                class="bi bi-eye"></span> View Profile</button>
                                                    </span>
                                                @endif
                                            @endauth

                                            @guest
                                                <span class="d-inline-block" tabindex="0" data-bs-toggle="popover"
                                                    data-bs-trigger="hover focus"
                                                    data-bs-content="Login to View the Profile details">
                                                    <button class="btn btn-primary" type="button" disabled><span
                                                            class="bi bi-eye"></span> View Profile</button>
                                                </span>
                                            @endguest
                                        </div>
                                    </div>

                                    <div class="agent-contact">
                                        <div class="contact-item">
                                            <i class="bi bi-telephone"></i>
                                            @if ($alreadyViewed)
                                                <span>{{ $profile->user->getRawOriginal('mobile') }}</span>
                                            @else
                                                <span>{{ $profile->user->mobile }}</span>
                                            @endif
                                        </div>
                                        <div class="contact-item">
                                            <i class="bi bi-envelope"></i>
                                            @if ($alreadyViewed)
                                                <span>{{ $profile->user->getRawOriginal('email') }}</span>
                                            @else
                                                <span>{{ $profile->user->email }}</span>
                                            @endif
                                        </div>
                                        @auth
                                            @if ((auth()->user()->latestActiveSubscription->plan_code ?? 0) >= 1)
                                                @if ($profile->instagram_profile_url != null)
                                                    <div class="contact-item">
                                                        <i class="bi bi-instagram"></i>
                                                        @if ($alreadyViewed)
                                                            <span>{{ $profile->getRawOriginal('instagram_profile_url') }}</span>
                                                        @else
                                                            <span>{{ $profile->instagram_profile_url }}</span>
                                                        @endif
                                                    </div>
                                                @endif
                                                @if ($profile->facebook_profile_url != null)
                                                    <div class="contact-item">
                                                        <i class="bi bi-facebook"></i>
                                                        @if ($alreadyViewed)
                                                            <span>{{ $profile->getRawOriginal('facebook_profile_url') }}</span>
                                                        @else
                                                            <span>{{ $profile->facebook_profile_url }}</span>
                                                        @endif
                                                    </div>
                                                @endif
                                                @if ($profile->twitter_profile_url != null)
                                                    <div class="contact-item">
                                                        <i class="bi bi-twitter"></i>
                                                        @if ($alreadyViewed)
                                                            <span>{{ $profile->getRawOriginal('twitter_profile_url') }}</span>
                                                        @else
                                                            <span>{{ $profile->twitter_profile_url }}</span>
                                                        @endif
                                                    </div>
                                                @endif
                                            @endif
                                        @endauth
                                    </div>

                                    @guest
                                        <div class="alert alert-info mt-3" role="alert">
                                            <i class="bi bi-info-circle"></i>
                                            To view full profile details, Please <a href="{{ url('/login') }}"
                                                data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
                                            or <a href="{{ url('/sign-up') }}">Register</a>.

                                        </div>
                                    @endguest


                                    @auth
                                        @if ((auth()->user()->latestActiveSubscription->plan_code ?? 0) > 1)
                                            <div class="agent-actions mt-3">
                                                {{-- <a href="tel:{{ $profile->mobile }}" class="btn btn-success w-100 mb-2">
                                                    <i class="bi bi-telephone"></i> Call Now
                                                </a> --}}
                                                <a href="{{ route('chat.start', $profile->user->id) }}"
                                                    class="btn btn-outline w-100">
                                                    <i class="bi bi-chat-dots"></i> Send Message
                                                </a>
                                            </div>
                                        @endif
                                    @endauth

                                </div>


                                <!-- Quick Actions -->
                                <div class="actions-card mb-4" data-aos="fade-up" data-aos-delay="250">
                                    <div class="action-buttons">

                                        <div class="row g-2">
                                            <div class="col-6">
                                                @auth
                                                    <button class="btn btn-outline-primary w-100 shortlist-btn"
                                                        data-user-id="{{ $profile->id }}">
                                                        @if (auth()->user() && auth()->user()->shortlistedUsers->contains('id', $profile->id))
                                                            <i class="bi bi-heart-fill text-danger"></i>
                                                        @else
                                                            <i class="bi bi-heart"></i>
                                                        @endif
                                                        Shortlist
                                                    </button>
                                                @endauth
                                                @guest
                                                    <span tabindex="0" data-bs-toggle="popover"
                                                        data-bs-trigger="hover focus" data-bs-placement="top"
                                                        data-bs-content="Login to Shortlist the Profile">
                                                        <button class="btn btn-outline-primary w-100 shortlist-btn"
                                                            type="button" disabled><span class="bi bi-eye"></span>
                                                            Shortlist</button>
                                                    </span>
                                                @endguest
                                                <div id="shortlist-message" class="mt-2 text-success"
                                                    style="display:none;"></div>
                                            </div>
                                            <div class="col-6">
                                                <button class="btn btn-outline-primary w-100"
                                                    onclick="shareProfile('{{ route('profile', ['identifier' => $profile->user->identifier ?? '']) }}')">
                                                    <i class="bi bi-share"></i>
                                                    Share
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End Quick Actions -->

                                <!-- Contact Form -->
                                {{-- <div class="contact-form-card mb-4" data-aos="fade-up" data-aos-delay="450">
                                <h4>Request Information</h4>
                                <form action="forms/contact.php" method="post" class="php-email-form">
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <input type="text" name="name" class="form-control"
                                                placeholder="Full Name" required="">
                                        </div>
                                        <div class="col-12 mb-3">
                                            <input type="email" name="email" class="form-control"
                                                placeholder="Email Address" required="">
                                        </div>
                                        <div class="col-12 mb-3">
                                            <input type="tel" name="phone" class="form-control"
                                                placeholder="Phone Number">
                                        </div>
                                        <div class="col-12 mb-3">
                                            <select name="subject" class="form-select" required="">
                                                <option value="">I'm interested in...</option>
                                                <option value="Scheduling a viewing">Scheduling a viewing</option>
                                                <option value="Getting more information">Getting more information
                                                </option>
                                                <option value="Submitting an application">Submitting an application
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <textarea name="message" class="form-control" rows="4"
                                                placeholder="Additional questions or preferred viewing times..."></textarea>
                                        </div>
                                    </div>

                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your request has been sent successfully!</div>

                                    <button type="submit" class="btn btn-primary w-100">Send Request</button>
                                </form>
                            </div><!-- End Contact Form --> --}}



                            </div>
                        </div>


                        <div class="location-section mt-5" data-aos="fade-up" data-aos-delay="700">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="neighborhood-info">
                                        <h5>Horoscope Details</h5>
                                        <div class="poi-item">
                                            <i class="bi bi-star"></i>
                                            <div class="poi-content">
                                                <span class="poi-name">Star -
                                                    {{ $profile->birthStars->value . ' - ' . $profile->birthStars->tamil_name }}</span>
                                                <span class="poi-distance">Zodiac:
                                                    {{ $profile->zodiacs->value . ' - ' . $profile->zodiacs->tamil_name }}</span>
                                                <span class="poi-distance">Lagnam:
                                                    {{ $profile->birthLagnam->value . ' - ' . $profile->birthLagnam->tamil_name }}</span>
                                            </div>
                                        </div>
                                        <div class="poi-item">
                                            <i class="bi bi-0-circle"></i>
                                            <div class="poi-content">
                                                <span class="poi-name">Rahu Ketu</span>
                                                <span
                                                    class="poi-distance">{{ ($profile->rahu_ketu == 1 ? 'Yes' : 'No') ?? 'Not specified' }}</span>
                                            </div>
                                        </div>
                                        <div class="poi-item">
                                            <i class="bi bi-circle-square"></i>
                                            <div class="poi-content">
                                                <span class="poi-name">Chevvai</span>
                                                <span
                                                    class="poi-distance">{{ ($profile->chevvai == 1 ? 'Yes' : 'No') ?? 'Not specified' }}</span>
                                            </div>
                                        </div>
                                        <div class="poi-item">
                                            <i class="bi bi-person-add"></i>
                                            <div class="poi-content">
                                                <span class="poi-name">Additional Details</span>
                                                <span
                                                    class="poi-distance">{{ $profile->additional_horoscope ?? 'N/A' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="neighborhood-info">
                                        <h5>Favorites</h5>
                                        <div class="poi-item">
                                            <i class="bi bi-heart"></i>
                                            <div class="poi-content">
                                                <span class="poi-name">Cuisine</span>
                                                <span
                                                    class="poi-distance">{{ $profile->favorite_cuisine ?? 'Not specified' }}</span>
                                            </div>
                                        </div>
                                        <div class="poi-item">
                                            <i class="bi bi-music-note-beamed"></i>
                                            <div class="poi-content">
                                                <span class="poi-name">Music</span>
                                                <span
                                                    class="poi-distance">{{ $profile->favorite_music ?? 'Not specified' }}</span>
                                            </div>
                                        </div>
                                        <div class="poi-item">
                                            <i class="bi bi-joystick"></i>
                                            <div class="poi-content">
                                                <span class="poi-name">Sports</span>
                                                <span
                                                    class="poi-distance">{{ $profile->sports ?? 'Not specified' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="neighborhood-info">
                                        <h5>Expectations</h5>
                                        <div class="poi-item">
                                            <i class="bi bi-people"></i>
                                            <div class="poi-content">
                                                <span class="poi-name">Expectations</span>
                                                <span class="poi-distance">{{ $profile->expectations ?? 'N/A' }}</span>
                                            </div>
                                        </div>
                                        <div class="poi-item">
                                            <i class="bi bi-person-heart"></i>
                                            <div class="poi-content">
                                                <span class="poi-name">Life's Motto</span>
                                                <span class="poi-distance">{{ $profile->life_motto ?? 'N/A' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
            </section>


        </main>

        @include('include.login-modal')
        @include('include.footer')
        @include('include.script')

    </body>
@endsection
