<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <a href="/" class="logo d-flex align-items-center">
            <img src="{{ asset('assets/img/logo1.webp') }}" alt="">
            <h1 class="sitename logo-font">Vazhithunai</h1>

            <span class="logo-slogan">Find your perfect partner</span>

        </a>
        @if ($activeSubscription)
            @if ($activeSubscription->plan_code == '1')
                <span class="shimmer header-silver-plan-badge">
                    <span class="bi bi-award"></span>
                    Silver User
                </span>
            @elseif($activeSubscription->plan_code == '2')
                <span class="shimmer header-gold-plan-badge">
                    <span class="bi bi-award"></span>
                    Gold User
                </span>
            @elseif($activeSubscription->plan_code == '3')
                <span class="shimmer header-premium-plan-badge">
                    <span class="bi bi-award"></span>
                    Premium User
                </span>
            @endif
        @endif

        <nav id="navmenu" class="navmenu">
            <ul class="navmenu-list">
                <li><a href="/" @if (request()->segment(1) == '') class="active" @endif>Home</a></li>
                <li><a href="/about" @if (request()->segment(1) == 'about') class="active" @endif>About</a></li>
                <li><a href="/#pricing" @if (request()->segment(index: 0) == '#pricing') class="active" @endif>Pricing</a></li>
                <li><a href="/contact" @if (request()->segment(1) == 'contact') class="active" @endif>Contact</a></li>

                @if (!Auth::user())
                    <li class="nav-auth">
                        <!-- Login (modal trigger) -->
                        <button type="button" class="btn-login" data-bs-toggle="modal" data-bs-target="#loginModal"
                            aria-haspopup="dialog" aria-expanded="false" aria-controls="loginModal">
                            <i class="bi bi-box-arrow-in-right"></i>
                            <span>Login</span>
                        </button>

                        <!-- Register (redirect) -->
                        <a href="/sign-up" class="btn-register">
                            <i class="bi bi-person-plus-fill"></i>
                            <span>Register</span>
                        </a>
                    </li>
                @else
                    <li class="dropdown">
                        <a href="#" class="user-greet">
                            <div class="agent-header">
                                <div class="agent-avatar">
                                    <img src="{{ Auth::user()->avatar ?? asset($profile->userImages->first()?->image_path) }}"
                                        class="img-fluid" alt="{{ $profile->user->name }}">
                                </div>
                            </div>
                            {{-- <span>Hi {{ ucfirst(Auth::user()->name) }}</span> --}}
                            <i class="bi bi-chevron-down toggle-dropdown"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="/my-account">
                                    <span class="bi bi-person-fill-gear"></span>&nbsp;My Account
                                </a>
                            </li>
                            <li>
                                <a href="/chats">
                                    <span class="bi bi-chat-heart"></span>&nbsp;My Chats
                                </a>
                            </li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <li>
                                    <a href="#" id="logoutBtn" class="logoutBtn">
                                        <span class="bi bi-box-arrow-right"></span>&nbsp;Logout
                                    </a>
                                </li>
                            </form>
                        </ul>
                    </li>
                @endif
            </ul>

            <button class="mobile-nav-toggle d-xl-none" aria-label="Toggle navigation">
                <i class="bi bi-list"></i>
            </button>
        </nav>


    </div>

</header>
@auth
    @if (Auth::user()->profile_completed == 0)
        <div class="profile-alert">
            <div class="profile-alert-text">
                ⚠️ Please complete your profile details to get your profile listed! | ⚠️ உங்கள் சுயவிவர விவரங்களை பூர்த்தி
                செய்யுங்கள், அப்போதுதான் உங்கள் சுயவிவரம் பட்டியலில் காணப்படும்! - <a href="/register">Click Here To
                    Complete Your Profile</a>
            </div>
        </div>
    @endif
@endauth
@if (!Auth::check())
    <div id="g_id_onload" data-client_id="930369423455-8jsjucb90ns0glstji99v8gdjugo2sl2.apps.googleusercontent.com"
        data-login_uri="https://vazhithunai.com/auth/google/callback" data-prompt_parent_id="g_id_onload">
    </div>
@endif
