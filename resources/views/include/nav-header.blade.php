<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <a href="/" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <img src="assets/img/logo.png" alt="">
            {{-- <svg class="my-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="bgCarrier" stroke-width="0"></g>
                <g id="tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="iconCarrier">
                    <path d="M22 22L2 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                    <path
                        d="M2 11L6.06296 7.74968M22 11L13.8741 4.49931C12.7784 3.62279 11.2216 3.62279 10.1259 4.49931L9.34398 5.12486"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                    <path d="M15.5 5.5V3.5C15.5 3.22386 15.7239 3 16 3H18.5C18.7761 3 19 3.22386 19 3.5V8.5"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                    <path d="M4 22V9.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                    <path d="M20 9.5V13.5M20 22V17.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                    </path>
                    <path
                        d="M15 22V17C15 15.5858 15 14.8787 14.5607 14.4393C14.1213 14 13.4142 14 12 14C10.5858 14 9.87868 14 9.43934 14.4393M9 22V17"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path
                        d="M14 9.5C14 10.6046 13.1046 11.5 12 11.5C10.8954 11.5 10 10.6046 10 9.5C10 8.39543 10.8954 7.5 12 7.5C13.1046 7.5 14 8.39543 14 9.5Z"
                        stroke="currentColor" stroke-width="1.5"></path>
                </g>
            </svg> --}}
            <h1 class="sitename logo-font">Vazhithunai</h1>

            <span class="logo-slogan">Find your perfect partner</span>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="/" @if (request()->segment(1) == '') class="active" @endif>Home</a></li>
                <li><a href="/about" @if (request()->segment(1) == 'about') class="active" @endif>About</a></li>
                {{-- <li><a href="properties.html">Partner</a></li> --}}
                {{-- <li><a href="services.html">Services</a></li> --}}
                {{-- <li><a href="agents.html">Agents</a></li>
                <li><a href="blog.html">Blog</a></li> --}}
                {{-- <li class="dropdown"><a href="#"><span>More Pages</span> <i
                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="property-details.html">Partner Details</a></li>
                        <li><a href="service-details.html">Service Details</a></li>
                        <li><a href="agent-profile.html">Agent Profile</a></li>
                        <li><a href="blog-details.html">Blog Details</a></li>
                        <li><a href="terms.html">Terms</a></li>
                        <li><a href="privacy.html">Privacy</a></li>
                        <li><a href="404.html">404</a></li>
                    </ul>
                </li>

                <li class="dropdown"><a href="#"><span>Dropdown</span> <i
                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="#">Dropdown 1</a></li>
                        <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i
                                    class="bi bi-chevron-down toggle-dropdown"></i></a>
                            <ul>
                                <li><a href="#">Deep Dropdown 1</a></li>
                                <li><a href="#">Deep Dropdown 2</a></li>
                                <li><a href="#">Deep Dropdown 3</a></li>
                                <li><a href="#">Deep Dropdown 4</a></li>
                                <li><a href="#">Deep Dropdown 5</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Dropdown 2</a></li>
                        <li><a href="#">Dropdown 3</a></li>
                        <li><a href="#">Dropdown 4</a></li>
                    </ul>
                </li> --}}
                <li><a href="/contact" @if (request()->segment(1) == 'contact') class="active" @endif>Contact</a></li>
                @if (!Auth::user())
                    <li>Already a member? </li>&nbsp;&nbsp;
                    <li>
                        <buton class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#loginModal">
                            Login</buton>
                    </li>

                    <li>
                        <a href="/register">Register</a>
                    </li>
                @else
                    <li class="dropdown"><a href="#"><span>Hi {{ ucfirst(Auth::user()->name) }}</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <li><a href="" id="logoutBtn"><span class="bi bi-box-arrow-right"></span>
                                        &nbsp;&nbsp;Logout</a></li>
                            </form>
                        </ul>
                    </li>
                @endif
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

    </div>
</header>
