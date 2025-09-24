@include('include.header')

<body class="account-page">
    @include('include.nav-header')

    <main class="main">

        <!-- Page Title -->
        <div class="page-title light-background">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h1 class="mb-2 mb-lg-0">Account</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="current">Account</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <!-- Account Section -->
        <section id="account" class="account section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <!-- Mobile Menu Toggle -->
                <div class="mobile-menu d-lg-none mb-4">
                    <button class="mobile-menu-toggle" type="button" data-bs-toggle="collapse"
                        data-bs-target="#profileMenu">
                        <i class="bi bi-grid"></i>
                        <span>Menu</span>
                    </button>
                </div>

                <div class="row g-4">
                    <!-- Profile Menu -->
                    <div class="col-lg-3">
                        <div class="profile-menu collapse d-lg-block" id="profileMenu">
                            <!-- User Info -->
                            <div class="user-info" data-aos="fade-right">
                                <div class="user-avatar">
                                    <img src="{{ Auth::user()->userImages()->first()->image_path }}"
                                        alt="{{ Auth::user()->name }}" alt="Profile" loading="lazy">
                                    <span class="status-badge"><i class="bi bi-shield-check"></i></span>
                                </div>
                                <h4>{{ $user->name }}</h4>
                                @if (Auth::user()->latestActiveSubscription->plan_code == '1')
                                    <div class="user-status">
                                        <i class="bi bi-award">Silver User</i>
                                        <span></span>
                                    </div>
                                @elseif(Auth::user()->latestActiveSubscription->plan_code == '2')
                                    <div class="user-status">
                                        <i class="bi bi-award">Gold User</i>
                                        <span></span>
                                    </div>
                                @elseif(Auth::user()->latestActiveSubscription->plan_code == '3')
                                    <div class="user-status">
                                        <i class="bi bi-award">Premium User</i>
                                        <span></span>
                                    </div>
                                @endif

                            </div>

                            <!-- Navigation Menu -->
                            <nav class="menu-nav">
                                <ul class="nav flex-column" role="tablist">
                                    {{-- <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#orders">
                                            <i class="bi bi-box-seam"></i>
                                            <span>My Orders</span>
                                            <span class="badge">3</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#wishlist">
                                            <i class="bi bi-heart"></i>
                                            <span>Wishlist</span>
                                            <span class="badge">12</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#wallet">
                                            <i class="bi bi-wallet2"></i>
                                            <span>Payment Methods</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#reviews">
                                            <i class="bi bi-star"></i>
                                            <span>My Reviews</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#addresses">
                                            <i class="bi bi-geo-alt"></i>
                                            <span>Addresses</span>
                                        </a>
                                    </li> --}}
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#settings">
                                            <i class="bi bi-gear"></i>
                                            <span>Account Settings</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#wishlist">
                                            <i class="bi bi-heart"></i>
                                            <span>Wishlist</span>
                                            <span class="badge">{{ count($user->shortlistedUsers) }}</span>
                                        </a>
                                    </li>
                                </ul>

                                <div class="menu-footer">
                                    <a href="#" class="help-link">
                                        <i class="bi bi-question-circle"></i>
                                        <span>Help Center</span>
                                    </a>
                                    <a href="" class="logout-link logoutBtn">
                                        <i class="bi bi-box-arrow-right"></i>
                                        <span>Log Out</span>
                                    </a>
                                </div>
                            </nav>
                        </div>
                    </div>

                    <!-- Content Area -->
                    <div class="col-lg-9">
                        <div class="content-area">
                            <div class="tab-content">
                                <!-- Orders Tab -->
                                <div class="tab-pane fade" id="orders">
                                    <div class="section-header" data-aos="fade-up">
                                        <h2>My Orders</h2>
                                        <div class="header-actions">
                                            <div class="search-box">
                                                <i class="bi bi-search"></i>
                                                <input type="text" placeholder="Search orders...">
                                            </div>
                                            <div class="dropdown">
                                                <button class="filter-btn" data-bs-toggle="dropdown">
                                                    <i class="bi bi-funnel"></i>
                                                    <span>Filter</span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#">All Orders</a></li>
                                                    <li><a class="dropdown-item" href="#">Processing</a></li>
                                                    <li><a class="dropdown-item" href="#">Shipped</a></li>
                                                    <li><a class="dropdown-item" href="#">Delivered</a></li>
                                                    <li><a class="dropdown-item" href="#">Cancelled</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="orders-grid">
                                        <!-- Order Card 1 -->
                                        <div class="order-card" data-aos="fade-up" data-aos-delay="100">
                                            <div class="order-header">
                                                <div class="order-id">
                                                    <span class="label">Order ID:</span>
                                                    <span class="value">#ORD-2024-1278</span>
                                                </div>
                                                <div class="order-date">Feb 20, 2025</div>
                                            </div>
                                            <div class="order-content">
                                                <div class="product-grid">
                                                    <img src="assets/img/product/product-1.webp" alt="Product"
                                                        loading="lazy">
                                                    <img src="assets/img/product/product-2.webp" alt="Product"
                                                        loading="lazy">
                                                    <img src="assets/img/product/product-3.webp" alt="Product"
                                                        loading="lazy">
                                                </div>
                                                <div class="order-info">
                                                    <div class="info-row">
                                                        <span>Status</span>
                                                        <span class="status processing">Processing</span>
                                                    </div>
                                                    <div class="info-row">
                                                        <span>Items</span>
                                                        <span>3 items</span>
                                                    </div>
                                                    <div class="info-row">
                                                        <span>Total</span>
                                                        <span class="price">$789.99</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="order-footer">
                                                <button type="button" class="btn-track" data-bs-toggle="collapse"
                                                    data-bs-target="#tracking1" aria-expanded="false">Track
                                                    Order</button>
                                                <button type="button" class="btn-details" data-bs-toggle="collapse"
                                                    data-bs-target="#details1" aria-expanded="false">View
                                                    Details</button>
                                            </div>

                                            <!-- Order Tracking -->
                                            <div class="collapse tracking-info" id="tracking1">
                                                <div class="tracking-timeline">
                                                    <div class="timeline-item completed">
                                                        <div class="timeline-icon">
                                                            <i class="bi bi-check-circle-fill"></i>
                                                        </div>
                                                        <div class="timeline-content">
                                                            <h5>Order Confirmed</h5>
                                                            <p>Your order has been received and confirmed</p>
                                                            <span class="timeline-date">Feb 20, 2025 - 10:30 AM</span>
                                                        </div>
                                                    </div>

                                                    <div class="timeline-item completed">
                                                        <div class="timeline-icon">
                                                            <i class="bi bi-check-circle-fill"></i>
                                                        </div>
                                                        <div class="timeline-content">
                                                            <h5>Processing</h5>
                                                            <p>Your order is being prepared for shipment</p>
                                                            <span class="timeline-date">Feb 20, 2025 - 2:45 PM</span>
                                                        </div>
                                                    </div>

                                                    <div class="timeline-item active">
                                                        <div class="timeline-icon">
                                                            <i class="bi bi-box-seam"></i>
                                                        </div>
                                                        <div class="timeline-content">
                                                            <h5>Packaging</h5>
                                                            <p>Your items are being packaged for shipping</p>
                                                            <span class="timeline-date">Feb 20, 2025 - 4:15 PM</span>
                                                        </div>
                                                    </div>

                                                    <div class="timeline-item">
                                                        <div class="timeline-icon">
                                                            <i class="bi bi-truck"></i>
                                                        </div>
                                                        <div class="timeline-content">
                                                            <h5>In Transit</h5>
                                                            <p>Expected to ship within 24 hours</p>
                                                        </div>
                                                    </div>

                                                    <div class="timeline-item">
                                                        <div class="timeline-icon">
                                                            <i class="bi bi-house-door"></i>
                                                        </div>
                                                        <div class="timeline-content">
                                                            <h5>Delivery</h5>
                                                            <p>Estimated delivery: Feb 22, 2025</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Order Details -->
                                            <div class="collapse order-details" id="details1">
                                                <div class="details-content">
                                                    <div class="detail-section">
                                                        <h5>Order Information</h5>
                                                        <div class="info-grid">
                                                            <div class="info-item">
                                                                <span class="label">Payment Method</span>
                                                                <span class="value">Credit Card (**** 4589)</span>
                                                            </div>
                                                            <div class="info-item">
                                                                <span class="label">Shipping Method</span>
                                                                <span class="value">Express Delivery (2-3 days)</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="detail-section">
                                                        <h5>Items (3)</h5>
                                                        <div class="order-items">
                                                            <div class="item">
                                                                <img src="assets/img/product/product-1.webp"
                                                                    alt="Product" loading="lazy">
                                                                <div class="item-info">
                                                                    <h6>Lorem ipsum dolor sit amet</h6>
                                                                    <div class="item-meta">
                                                                        <span class="sku">SKU: PRD-001</span>
                                                                        <span class="qty">Qty: 1</span>
                                                                    </div>
                                                                </div>
                                                                <div class="item-price">$899.99</div>
                                                            </div>

                                                            <div class="item">
                                                                <img src="assets/img/product/product-2.webp"
                                                                    alt="Product" loading="lazy">
                                                                <div class="item-info">
                                                                    <h6>Consectetur adipiscing elit</h6>
                                                                    <div class="item-meta">
                                                                        <span class="sku">SKU: PRD-002</span>
                                                                        <span class="qty">Qty: 2</span>
                                                                    </div>
                                                                </div>
                                                                <div class="item-price">$599.95</div>
                                                            </div>

                                                            <div class="item">
                                                                <img src="assets/img/product/product-3.webp"
                                                                    alt="Product" loading="lazy">
                                                                <div class="item-info">
                                                                    <h6>Sed do eiusmod tempor</h6>
                                                                    <div class="item-meta">
                                                                        <span class="sku">SKU: PRD-003</span>
                                                                        <span class="qty">Qty: 1</span>
                                                                    </div>
                                                                </div>
                                                                <div class="item-price">$129.99</div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="detail-section">
                                                        <h5>Price Details</h5>
                                                        <div class="price-breakdown">
                                                            <div class="price-row">
                                                                <span>Subtotal</span>
                                                                <span>$1,929.93</span>
                                                            </div>
                                                            <div class="price-row">
                                                                <span>Shipping</span>
                                                                <span>$15.99</span>
                                                            </div>
                                                            <div class="price-row">
                                                                <span>Tax</span>
                                                                <span>$159.98</span>
                                                            </div>
                                                            <div class="price-row total">
                                                                <span>Total</span>
                                                                <span>$2,105.90</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="detail-section">
                                                        <h5>Shipping Address</h5>
                                                        <div class="address-info">
                                                            <p>Sarah Anderson<br>123 Main Street<br>Apt 4B<br>New York,
                                                                NY 10001<br>United States</p>
                                                            <p class="contact">+1 (555) 123-4567</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Order Card 2 -->
                                        <div class="order-card" data-aos="fade-up" data-aos-delay="200">
                                            <div class="order-header">
                                                <div class="order-id">
                                                    <span class="label">Order ID:</span>
                                                    <span class="value">#ORD-2024-1265</span>
                                                </div>
                                                <div class="order-date">Feb 15, 2025</div>
                                            </div>
                                            <div class="order-content">
                                                <div class="product-grid">
                                                    <img src="assets/img/product/product-4.webp" alt="Product"
                                                        loading="lazy">
                                                    <img src="assets/img/product/product-5.webp" alt="Product"
                                                        loading="lazy">
                                                </div>
                                                <div class="order-info">
                                                    <div class="info-row">
                                                        <span>Status</span>
                                                        <span class="status shipped">Shipped</span>
                                                    </div>
                                                    <div class="info-row">
                                                        <span>Items</span>
                                                        <span>2 items</span>
                                                    </div>
                                                    <div class="info-row">
                                                        <span>Total</span>
                                                        <span class="price">$459.99</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="order-footer">
                                                <button type="button" class="btn-track" data-bs-toggle="collapse"
                                                    data-bs-target="#tracking2" aria-expanded="false">Track
                                                    Order</button>
                                                <button type="button" class="btn-details" data-bs-toggle="collapse"
                                                    data-bs-target="#details2" aria-expanded="false">View
                                                    Details</button>
                                            </div>

                                            <!-- Order Tracking -->
                                            <div class="collapse tracking-info" id="tracking2">
                                                <div class="tracking-timeline">
                                                    <div class="timeline-item completed">
                                                        <div class="timeline-icon">
                                                            <i class="bi bi-check-circle-fill"></i>
                                                        </div>
                                                        <div class="timeline-content">
                                                            <h5>Order Confirmed</h5>
                                                            <p>Your order has been received and confirmed</p>
                                                            <span class="timeline-date">Feb 15, 2025 - 9:15 AM</span>
                                                        </div>
                                                    </div>

                                                    <div class="timeline-item completed">
                                                        <div class="timeline-icon">
                                                            <i class="bi bi-check-circle-fill"></i>
                                                        </div>
                                                        <div class="timeline-content">
                                                            <h5>Processing</h5>
                                                            <p>Your order is being prepared for shipment</p>
                                                            <span class="timeline-date">Feb 15, 2025 - 11:30 AM</span>
                                                        </div>
                                                    </div>

                                                    <div class="timeline-item completed">
                                                        <div class="timeline-icon">
                                                            <i class="bi bi-check-circle-fill"></i>
                                                        </div>
                                                        <div class="timeline-content">
                                                            <h5>Packaging</h5>
                                                            <p>Your items have been packaged for shipping</p>
                                                            <span class="timeline-date">Feb 15, 2025 - 2:45 PM</span>
                                                        </div>
                                                    </div>

                                                    <div class="timeline-item active">
                                                        <div class="timeline-icon">
                                                            <i class="bi bi-truck"></i>
                                                        </div>
                                                        <div class="timeline-content">
                                                            <h5>In Transit</h5>
                                                            <p>Package in transit with carrier</p>
                                                            <span class="timeline-date">Feb 16, 2025 - 10:20 AM</span>
                                                            <div class="shipping-info">
                                                                <span>Tracking Number: </span>
                                                                <span class="tracking-number">1Z999AA1234567890</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="timeline-item">
                                                        <div class="timeline-icon">
                                                            <i class="bi bi-house-door"></i>
                                                        </div>
                                                        <div class="timeline-content">
                                                            <h5>Delivery</h5>
                                                            <p>Estimated delivery: Feb 18, 2025</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Order Details -->
                                            <div class="collapse order-details" id="details2">
                                                <div class="details-content">
                                                    <div class="detail-section">
                                                        <h5>Order Information</h5>
                                                        <div class="info-grid">
                                                            <div class="info-item">
                                                                <span class="label">Payment Method</span>
                                                                <span class="value">Credit Card (**** 7821)</span>
                                                            </div>
                                                            <div class="info-item">
                                                                <span class="label">Shipping Method</span>
                                                                <span class="value">Standard Shipping (3-5
                                                                    days)</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="detail-section">
                                                        <h5>Items (2)</h5>
                                                        <div class="order-items">
                                                            <div class="item">
                                                                <img src="assets/img/product/product-4.webp"
                                                                    alt="Product" loading="lazy">
                                                                <div class="item-info">
                                                                    <h6>Ut enim ad minim veniam</h6>
                                                                    <div class="item-meta">
                                                                        <span class="sku">SKU: PRD-004</span>
                                                                        <span class="qty">Qty: 1</span>
                                                                    </div>
                                                                </div>
                                                                <div class="item-price">$299.99</div>
                                                            </div>

                                                            <div class="item">
                                                                <img src="assets/img/product/product-5.webp"
                                                                    alt="Product" loading="lazy">
                                                                <div class="item-info">
                                                                    <h6>Quis nostrud exercitation</h6>
                                                                    <div class="item-meta">
                                                                        <span class="sku">SKU: PRD-005</span>
                                                                        <span class="qty">Qty: 1</span>
                                                                    </div>
                                                                </div>
                                                                <div class="item-price">$159.99</div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="detail-section">
                                                        <h5>Price Details</h5>
                                                        <div class="price-breakdown">
                                                            <div class="price-row">
                                                                <span>Subtotal</span>
                                                                <span>$459.98</span>
                                                            </div>
                                                            <div class="price-row">
                                                                <span>Shipping</span>
                                                                <span>$9.99</span>
                                                            </div>
                                                            <div class="price-row">
                                                                <span>Tax</span>
                                                                <span>$38.02</span>
                                                            </div>
                                                            <div class="price-row total">
                                                                <span>Total</span>
                                                                <span>$459.99</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="detail-section">
                                                        <h5>Shipping Address</h5>
                                                        <div class="address-info">
                                                            <p>Sarah Anderson<br>123 Main Street<br>Apt 4B<br>New York,
                                                                NY 10001<br>United States</p>
                                                            <p class="contact">+1 (555) 123-4567</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Order Card 3 -->
                                        <div class="order-card" data-aos="fade-up" data-aos-delay="300">
                                            <div class="order-header">
                                                <div class="order-id">
                                                    <span class="label">Order ID:</span>
                                                    <span class="value">#ORD-2024-1252</span>
                                                </div>
                                                <div class="order-date">Feb 10, 2025</div>
                                            </div>
                                            <div class="order-content">
                                                <div class="product-grid">
                                                    <img src="assets/img/product/product-6.webp" alt="Product"
                                                        loading="lazy">
                                                </div>
                                                <div class="order-info">
                                                    <div class="info-row">
                                                        <span>Status</span>
                                                        <span class="status delivered">Delivered</span>
                                                    </div>
                                                    <div class="info-row">
                                                        <span>Items</span>
                                                        <span>1 item</span>
                                                    </div>
                                                    <div class="info-row">
                                                        <span>Total</span>
                                                        <span class="price">$129.99</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="order-footer">
                                                <button type="button" class="btn-review">Write Review</button>
                                                <button type="button" class="btn-details">View Details</button>
                                            </div>
                                        </div>

                                        <!-- Order Card 4 -->
                                        <div class="order-card" data-aos="fade-up" data-aos-delay="400">
                                            <div class="order-header">
                                                <div class="order-id">
                                                    <span class="label">Order ID:</span>
                                                    <span class="value">#ORD-2024-1245</span>
                                                </div>
                                                <div class="order-date">Feb 5, 2025</div>
                                            </div>
                                            <div class="order-content">
                                                <div class="product-grid">
                                                    <img src="assets/img/product/product-7.webp" alt="Product"
                                                        loading="lazy">
                                                    <img src="assets/img/product/product-8.webp" alt="Product"
                                                        loading="lazy">
                                                    <img src="assets/img/product/product-9.webp" alt="Product"
                                                        loading="lazy">
                                                    <span class="more-items">+2</span>
                                                </div>
                                                <div class="order-info">
                                                    <div class="info-row">
                                                        <span>Status</span>
                                                        <span class="status cancelled">Cancelled</span>
                                                    </div>
                                                    <div class="info-row">
                                                        <span>Items</span>
                                                        <span>5 items</span>
                                                    </div>
                                                    <div class="info-row">
                                                        <span>Total</span>
                                                        <span class="price">$1,299.99</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="order-footer">
                                                <button type="button" class="btn-reorder">Reorder</button>
                                                <button type="button" class="btn-details">View Details</button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Pagination -->
                                    <div class="pagination-wrapper" data-aos="fade-up">
                                        <button type="button" class="btn-prev" disabled="">
                                            <i class="bi bi-chevron-left"></i>
                                        </button>
                                        <div class="page-numbers">
                                            <button type="button" class="active">1</button>
                                            <button type="button">2</button>
                                            <button type="button">3</button>
                                            <span>...</span>
                                            <button type="button">12</button>
                                        </div>
                                        <button type="button" class="btn-next">
                                            <i class="bi bi-chevron-right"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- Wishlist Tab -->
                                <div class="tab-pane fade" id="wishlist">
                                    <div class="section-header" data-aos="fade-up">
                                        <h2>My Wishlist</h2>
                                    </div>

                                    <div class="wishlist">
                                        <!-- Wishlist Item 1 -->

                                        <section id="properties" class="properties section">

                                            <div class="container" data-aos="fade-up" data-aos-delay="100">
                                                <div class="properties-container">

                                                    <div class="properties-masonry view-masonry active"
                                                        data-aos="fade-up" data-aos-delay="250">
                                                        <div class="row g-4">
                                                            @foreach ($user->shortlistedUsers as $profile)
                                                                <div class="col-lg-4 col-md-6">
                                                                    <div class="property-item">
                                                                        <a href="{{ route('profile', ['identifier' => $profile->identifier ?? '']) }}"
                                                                            class="property-link">
                                                                            <div class="property-image-wrapper">
                                                                                <img src="{{ $profile->userImages->first()->image_path }}"
                                                                                    alt="{{ $profile->name }}"
                                                                                    class="img-fluid">

                                                                                <div class="property-status">
                                                                                    @if ($profile->featured)
                                                                                        <span
                                                                                            class="status-badge featured">Featured</span>
                                                                                    @endif
                                                                                    <span
                                                                                        class="status-badge sale">Active</span>
                                                                                </div>

                                                                                <div class="property-actions">
                                                                                    <button
                                                                                        class="action-btn favorite-btn shortlist-btn"
                                                                                        data-toggle="tooltip"
                                                                                        title="Add to Favorites"
                                                                                        data-user-id="{{ $profile->id }}">
                                                                                        @if (auth()->user() && auth()->user()->shortlistedUsers->contains('id', $profile->id))
                                                                                            <i
                                                                                                class="bi bi-heart-fill text-danger"></i>
                                                                                        @else
                                                                                            <i class="bi bi-heart"></i>
                                                                                        @endif
                                                                                    </button>

                                                                                    <button
                                                                                        class="action-btn share-btn"
                                                                                        data-toggle="tooltip"
                                                                                        title="Share Profile">
                                                                                        <i class="bi bi-share"></i>
                                                                                    </button>
                                                                                    <button
                                                                                        class="action-btn gallery-btn"
                                                                                        data-toggle="tooltip"
                                                                                        title="View Gallery">
                                                                                        <i class="bi bi-images"></i>
                                                                                        <span
                                                                                            class="gallery-count">{{ $profile->userImages->count() }}</span>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </a>

                                                                        <div class="property-details">
                                                                            <a href="{{ route('profile', ['identifier' => $profile->identifier ?? '']) }}"
                                                                                class="property-link">
                                                                                <div class="property-header">
                                                                                    <div class="property-price"
                                                                                        style="font-size: 20px">
                                                                                        {{ $profile->name }}
                                                                                    </div>
                                                                                </div>
                                                                                <div class="property-header">
                                                                                    <div class="property-type">
                                                                                        {{ $profile->identifier ?? '' }}
                                                                                    </div>
                                                                                </div>
                                                                                <h4 class="property-title">
                                                                                    {{ $profile->userDetails->gender ?? '' }}
                                                                                    -
                                                                                    {{ \Carbon\Carbon::parse($profile->userDetails->dob)->age }}
                                                                                    yrs
                                                                                </h4>

                                                                                <p class="property-address">
                                                                                    <i class="bi bi-geo-alt"></i>
                                                                                    {{ $profile->userDetails->city->name }}{{ $profile->userDetails->city->state->name ? ', ' . $profile->userDetails->city->state->name : '' }}
                                                                                </p>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>

                                    </div>
                                </div>
                                <!-- Payment Methods Tab -->
                                <div class="tab-pane fade" id="wallet">
                                    <div class="section-header" data-aos="fade-up">
                                        <h2>Payment Methods</h2>
                                        <div class="header-actions">
                                            <button type="button" class="btn-add-new">
                                                <i class="bi bi-plus-lg"></i>
                                                Add New Card
                                            </button>
                                        </div>
                                    </div>

                                    <div class="payment-cards-grid">
                                        <!-- Payment Card 1 -->
                                        <div class="payment-card default" data-aos="fade-up" data-aos-delay="100">
                                            <div class="card-header">
                                                <i class="bi bi-credit-card"></i>
                                                <div class="card-badges">
                                                    <span class="default-badge">Default</span>
                                                    <span class="card-type">Visa</span>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="card-number">•••• •••• •••• 4589</div>
                                                <div class="card-info">
                                                    <span>Expires 09/2026</span>
                                                </div>
                                            </div>
                                            <div class="card-actions">
                                                <button type="button" class="btn-edit">
                                                    <i class="bi bi-pencil"></i>
                                                    Edit
                                                </button>
                                                <button type="button" class="btn-remove">
                                                    <i class="bi bi-trash"></i>
                                                    Remove
                                                </button>
                                            </div>
                                        </div>

                                        <!-- Payment Card 2 -->
                                        <div class="payment-card" data-aos="fade-up" data-aos-delay="200">
                                            <div class="card-header">
                                                <i class="bi bi-credit-card"></i>
                                                <div class="card-badges">
                                                    <span class="card-type">Mastercard</span>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="card-number">•••• •••• •••• 7821</div>
                                                <div class="card-info">
                                                    <span>Expires 05/2025</span>
                                                </div>
                                            </div>
                                            <div class="card-actions">
                                                <button type="button" class="btn-edit">
                                                    <i class="bi bi-pencil"></i>
                                                    Edit
                                                </button>
                                                <button type="button" class="btn-remove">
                                                    <i class="bi bi-trash"></i>
                                                    Remove
                                                </button>
                                                <button type="button" class="btn-make-default">Make Default</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Reviews Tab -->
                                <div class="tab-pane fade" id="reviews">
                                    <div class="section-header" data-aos="fade-up">
                                        <h2>My Reviews</h2>
                                        <div class="header-actions">
                                            <div class="dropdown">
                                                <button class="filter-btn" data-bs-toggle="dropdown">
                                                    <i class="bi bi-funnel"></i>
                                                    <span>Sort by: Recent</span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#">Recent</a></li>
                                                    <li><a class="dropdown-item" href="#">Highest Rating</a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="#">Lowest Rating</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="reviews-grid">
                                        <!-- Review Card 1 -->
                                        <div class="review-card" data-aos="fade-up" data-aos-delay="100">
                                            <div class="review-header">
                                                <img src="assets/img/product/product-1.webp" alt="Product"
                                                    class="product-image" loading="lazy">
                                                <div class="review-meta">
                                                    <h4>Lorem ipsum dolor sit amet</h4>
                                                    <div class="rating">
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i>
                                                        <span>(5.0)</span>
                                                    </div>
                                                    <div class="review-date">Reviewed on Feb 15, 2025</div>
                                                </div>
                                            </div>
                                            <div class="review-content">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do
                                                    eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                            </div>
                                            <div class="review-footer">
                                                <button type="button" class="btn-edit">Edit Review</button>
                                                <button type="button" class="btn-delete">Delete</button>
                                            </div>
                                        </div>

                                        <!-- Review Card 2 -->
                                        <div class="review-card" data-aos="fade-up" data-aos-delay="200">
                                            <div class="review-header">
                                                <img src="assets/img/product/product-2.webp" alt="Product"
                                                    class="product-image" loading="lazy">
                                                <div class="review-meta">
                                                    <h4>Consectetur adipiscing elit</h4>
                                                    <div class="rating">
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star"></i>
                                                        <span>(4.0)</span>
                                                    </div>
                                                    <div class="review-date">Reviewed on Feb 10, 2025</div>
                                                </div>
                                            </div>
                                            <div class="review-content">
                                                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                                    nisi ut aliquip ex ea commodo consequat.</p>
                                            </div>
                                            <div class="review-footer">
                                                <button type="button" class="btn-edit">Edit Review</button>
                                                <button type="button" class="btn-delete">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Addresses Tab -->
                                <div class="tab-pane fade" id="addresses">
                                    <div class="section-header" data-aos="fade-up">
                                        <h2>My Addresses</h2>
                                        <div class="header-actions">
                                            <button type="button" class="btn-add-new">
                                                <i class="bi bi-plus-lg"></i>
                                                Add New Address
                                            </button>
                                        </div>
                                    </div>

                                    <div class="addresses-grid">
                                        <!-- Address Card 1 -->
                                        <div class="address-card default" data-aos="fade-up" data-aos-delay="100">
                                            <div class="card-header">
                                                <h4>Home</h4>
                                                <span class="default-badge">Default</span>
                                            </div>
                                            <div class="card-body">
                                                <p class="address-text">123 Main Street<br>Apt 4B<br>New York, NY
                                                    10001<br>United States</p>
                                                <div class="contact-info">
                                                    <div><i class="bi bi-person"></i> Sarah Anderson</div>
                                                    <div><i class="bi bi-telephone"></i> +1 (555) 123-4567</div>
                                                </div>
                                            </div>
                                            <div class="card-actions">
                                                <button type="button" class="btn-edit">
                                                    <i class="bi bi-pencil"></i>
                                                    Edit
                                                </button>
                                                <button type="button" class="btn-remove">
                                                    <i class="bi bi-trash"></i>
                                                    Remove
                                                </button>
                                            </div>
                                        </div>

                                        <!-- Address Card 2 -->
                                        <div class="address-card" data-aos="fade-up" data-aos-delay="200">
                                            <div class="card-header">
                                                <h4>Office</h4>
                                            </div>
                                            <div class="card-body">
                                                <p class="address-text">456 Business Ave<br>Suite 200<br>San Francisco,
                                                    CA 94107<br>United States</p>
                                                <div class="contact-info">
                                                    <div><i class="bi bi-person"></i> Sarah Anderson</div>
                                                    <div><i class="bi bi-telephone"></i> +1 (555) 987-6543</div>
                                                </div>
                                            </div>
                                            <div class="card-actions">
                                                <button type="button" class="btn-edit">
                                                    <i class="bi bi-pencil"></i>
                                                    Edit
                                                </button>
                                                <button type="button" class="btn-remove">
                                                    <i class="bi bi-trash"></i>
                                                    Remove
                                                </button>
                                                <button type="button" class="btn-make-default">Make Default</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Settings Tab -->
                                <div class="tab-pane fade show active" id="settings">
                                    <div class="section-header" data-aos="fade-up">
                                        <h2>Account Settings</h2>
                                    </div>

                                    <div class="settings-content">

                                        <!-- Birth Details -->
                                        <div class="settings-section" data-aos="fade-up">
                                            <h3>பிறப்பு விவரங்கள் / Birth Details</h3>
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label for="name" class="form-label">பெயர் / Name</label>
                                                    <input type="text" class="form-control" id="name"
                                                        name="name" value="{{ $user->name }}" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="dob" class="form-label">பிறந்த தேதி / Birth
                                                        Date</label>
                                                    <input type="date" class="form-control" id="dob"
                                                        name="dob" value="{{ $user->dob }}" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="birth_time" class="form-label">பிறந்த நேரம் / Birth
                                                        Time</label>
                                                    <input type="time" class="form-control" id="birth_time"
                                                        name="birth_time" value="{{ $user->birth_time }}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="age" class="form-label">வயது / Age</label>
                                                    <input type="number" class="form-control" id="age"
                                                        name="age" value="{{ $user->age }}" min="18"
                                                        max="99">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="birth_place" class="form-label">பிறந்த ஊர் / Birth
                                                        Place</label>
                                                    <input type="text" class="form-control" id="birth_place"
                                                        name="birth_place" value="{{ $user->birth_place }}">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Education & Occupation Details -->
                                        <div class="settings-section" data-aos="fade-up">
                                            <h3>கல்வி மற்றும் தொழில் விவரங்கள் / Education & Occupation Details</h3>
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label for="highest_education" class="form-label">உயர்ந்த கல்வி /
                                                        Highest Education</label>
                                                    <select class="form-control" id="highest_education"
                                                        name="highest_education" required>
                                                        @foreach ($educations as $level)
                                                            <option value="{{ $level }}"
                                                                {{ $user->highest_education == $level ? 'selected' : '' }}>
                                                                {{ $level }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                {{-- <div class="col-md-6">
                                                    <label for="education_field" class="form-label">பிரிவு / Education
                                                        Field</label>
                                                    <select class="form-control" id="education_field"
                                                        name="education_field">
                                                        @foreach ($educationFields as $field)
                                                            <option value="{{ $field }}"
                                                                {{ $user->education_field == $field ? 'selected' : '' }}>
                                                                {{ $field }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div> --}}

                                                {{-- <div class="col-md-6">
                                                    <label for="specialization" class="form-label">சிறப்பு /
                                                        Specialization</label>
                                                    <select class="form-control" id="specialization"
                                                        name="specialization">
                                                        @foreach ($specializations as $spec)
                                                            <option value="{{ $spec }}"
                                                                {{ $user->specialization == $spec ? 'selected' : '' }}>
                                                                {{ $spec }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div> --}}

                                                <div class="col-md-6">
                                                    <label for="institution" class="form-label">கல்லூரி /
                                                        பல்கலைக்கழகம் / Institution</label>
                                                    <input type="text" class="form-control" id="institution"
                                                        name="institution" value="{{ $user->institution }}">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="completion_year" class="form-label">பட்டம் பெற்ற ஆண்டு
                                                        / Year of Completion</label>
                                                    <input type="number" class="form-control" id="completion_year"
                                                        name="completion_year" value="{{ $user->completion_year }}"
                                                        min="1950" max="{{ now()->year }}">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="additional_qualifications" class="form-label">கூடுதல்
                                                        தகுதிகள் / Additional Qualifications</label>
                                                    <input type="text" class="form-control"
                                                        id="additional_qualifications"
                                                        name="additional_qualifications"
                                                        value="{{ $user->additional_qualifications }}">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="occupation_category" class="form-label">தொழில் வகை /
                                                        Occupation Category</label>
                                                    <select class="form-control" id="occupation_category"
                                                        name="occupation_category">
                                                        @foreach ($jobs as $cat)
                                                            <option value="{{ $cat }}"
                                                                {{ $user->occupation_category == $cat ? 'selected' : '' }}>
                                                                {{ $cat }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="job_title" class="form-label">பணி / Job Title</label>
                                                    <input type="text" class="form-control" id="job_title"
                                                        name="job_title" value="{{ $user->job_title }}">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="company_name" class="form-label">நிறுவனம் / Company
                                                        Name</label>
                                                    <input type="text" class="form-control" id="company_name"
                                                        name="company_name" value="{{ $user->company_name }}">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="employment_type" class="form-label">வேலை வகை /
                                                        Employment Type</label>
                                                    <select class="form-control" id="employment_type"
                                                        name="employment_type">
                                                        @foreach ($employmentTypes as $type)
                                                            <option value="{{ $type }}"
                                                                {{ $user->employment_type == $type ? 'selected' : '' }}>
                                                                {{ $type }}
                                                            </option>
                                                            <option value="">Select</option>
                                                            <option>Permanent</option>
                                                            <option>Contract</option>
                                                            <option>Self-employed</option>
                                                            <option>Freelancer</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="industry" class="form-label">தொழில் துறை /
                                                        Industry</label>
                                                    <select class="form-control" id="industry" name="industry">
                                                        @foreach ($industries as $ind)
                                                            <option value="{{ $ind }}"
                                                                {{ $user->industry == $ind ? 'selected' : '' }}>
                                                                {{ $ind }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="work_location" class="form-label">பணியிடம் / Work
                                                        Location</label>
                                                    <input type="text" class="form-control" id="work_location"
                                                        name="work_location" value="{{ $user->work_location }}">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="annual_income" class="form-label">வருடாந்திர வருமானம்
                                                        / Annual Income</label>
                                                    <select class="form-control" id="annual_income"
                                                        name="annual_income">
                                                        @foreach ($salaries as $range)
                                                            <option value="{{ $range }}"
                                                                {{ $user->annual_income == $range ? 'selected' : '' }}>
                                                                {{ $range }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="experience" class="form-label">அனுபவம் / Years of
                                                        Experience</label>
                                                    <input type="number" class="form-control" id="experience"
                                                        name="experience" value="{{ $user->experience }}"
                                                        min="0" max="60">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Personal Details -->
                                        <div class="settings-section" data-aos="fade-up">
                                            <h3>சொந்த விவரங்கள் / Personal Details</h3>
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label for="gender" class="form-label">பாலினம் / Gender</label>
                                                    <select class="form-control" id="gender" name="gender"
                                                        required>
                                                        <option value="Male"
                                                            {{ $user->gender == 'Male' ? 'selected' : '' }}>Male
                                                        </option>
                                                        <option value="Female"
                                                            {{ $user->gender == 'Female' ? 'selected' : '' }}>Female
                                                        </option>
                                                        <option value="Other"
                                                            {{ $user->gender == 'Other' ? 'selected' : '' }}>Other
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="height" class="form-label">ஜாதகரின் உயரம் /
                                                        Height</label>
                                                    <input type="text" class="form-control" id="height"
                                                        name="height" value="{{ $user->height }}"
                                                        placeholder="e.g., 5 ft 7 in or 170 cm">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="complexion" class="form-label">ஜாதகரின் நிறம் /
                                                        Complexion</label>
                                                    <input type="text" class="form-control" id="complexion"
                                                        name="complexion" value="{{ $user->complexion }}">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="caste" class="form-label">ஜாதகரின் உட்பிரிவு /
                                                        Caste</label>
                                                    <input type="text" class="form-control" id="caste"
                                                        name="caste" value="{{ $user->caste }}">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="marital_status" class="form-label">திருமண நிலை /
                                                        Marital Status</label>
                                                    <select class="form-control" id="marital_status"
                                                        name="marital_status">
                                                        @foreach ($maritalStatuses as $status)
                                                            <option value="{{ $status }}"
                                                                {{ $user->marital_status == $status ? 'selected' : '' }}>
                                                                {{ $status }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="city" class="form-label">நகரம் / City</label>
                                                    <input type="text" class="form-control" id="city"
                                                        name="city" value="{{ $user->city }}">
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="address" class="form-label">முகவரி / Address</label>
                                                    <textarea class="form-control" id="address" name="address" rows="3">{{ $user->address }}</textarea>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="body_type" class="form-label">உடல் அமைப்பு / Body
                                                        Type</label>
                                                    <select class="form-control" id="body_type" name="body_type">
                                                        @foreach ($bodyTypes as $type)
                                                            <option value="{{ $type }}"
                                                                {{ $user->body_type == $type ? 'selected' : '' }}>
                                                                {{ $type }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="physical_status" class="form-label">உடல் நிலை /
                                                        Physical Status</label>
                                                    <select class="form-control" id="physical_status"
                                                        name="physical_status">
                                                        @foreach ($bodyTypes as $ps)
                                                            <option value="{{ $ps }}"
                                                                {{ $user->physical_status == $ps ? 'selected' : '' }}>
                                                                {{ $ps }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="mother_tongue" class="form-label">தாய்மொழி / Mother
                                                        Tongue</label>
                                                    <select class="form-control" id="mother_tongue"
                                                        name="mother_tongue">
                                                        @foreach ($motherTongues as $lang)
                                                            <option value="{{ $lang }}"
                                                                {{ $user->mother_tongue == $lang ? 'selected' : '' }}>
                                                                {{ $lang }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <!-- Interests (checkbox group) -->
                                                <div class="col-md-12">
                                                    <label class="form-label">விருப்பங்கள் / Interests</label>
                                                    <div class="row">
                                                        @foreach ($interests as $interest)
                                                            <div class="col-md-3">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="interest_{{ Str::slug($interest) }}"
                                                                        name="interests[]"
                                                                        value="{{ $interest }}"
                                                                        {{ in_array($interest, $user->interests ?? []) ? 'checked' : '' }}>
                                                                    <label class="form-check-label"
                                                                        for="interest_{{ Str::slug($interest) }}">{{ $interest }}</label>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>

                                                <!-- Hobbies (checkbox group) -->
                                                <div class="col-md-12">
                                                    <label class="form-label">பொழுதுபோக்குகள் / Hobbies</label>
                                                    <div class="row">
                                                        @foreach ($hobbies as $hobby)
                                                            <div class="col-md-3">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="hobby_{{ Str::slug($hobby) }}"
                                                                        name="hobbies[]" value="{{ $hobby }}"
                                                                        {{ in_array($hobby, $user->hobbies ?? []) ? 'checked' : '' }}>
                                                                    <label class="form-check-label"
                                                                        for="hobby_{{ Str::slug($hobby) }}">{{ $hobby }}</label>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>

                                                <!-- Favourite Cuisine -->
                                                <div class="col-md-6">
                                                    <label for="favourite_cuisine" class="form-label">விருப்பமான
                                                        சமையல் / Favourite Cuisine</label>
                                                    <select class="form-control" id="favourite_cuisine"
                                                        name="favourite_cuisine">
                                                        @foreach ($cuisines as $cuisine)
                                                            <option value="{{ $cuisine }}"
                                                                {{ $user->favourite_cuisine == $cuisine ? 'selected' : '' }}>
                                                                {{ $cuisine }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <!-- Favourite Music Genre -->
                                                <div class="col-md-6">
                                                    <label for="favourite_music" class="form-label">விருப்பமான இசை வகை
                                                        / Favourite Music Genre</label>
                                                    <select class="form-control" id="favourite_music"
                                                        name="favourite_music">
                                                        @foreach ($musicGenres as $genre)
                                                            <option value="{{ $genre }}"
                                                                {{ $user->favourite_music == $genre ? 'selected' : '' }}>
                                                                {{ $genre }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <!-- Sports / Fitness (checkbox group) -->
                                                <div class="col-md-12">
                                                    <label class="form-label">விளையாட்டு / உடற்பயிற்சி / Sports /
                                                        Fitness</label>
                                                    <div class="row">
                                                        @foreach ($sportsFitness as $sf)
                                                            <div class="col-md-3">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="sf_{{ Str::slug($sf) }}"
                                                                        name="sports_fitness[]"
                                                                        value="{{ $sf }}"
                                                                        {{ in_array($sf, $user->sports_fitness ?? []) ? 'checked' : '' }}>
                                                                    <label class="form-check-label"
                                                                        for="sf_{{ Str::slug($sf) }}">{{ $sf }}</label>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>

                                                <!-- Preferences -->
                                                <div class="col-md-6">
                                                    <label for="pet_preference" class="form-label">செல்லப்பிராணி
                                                        விருப்பம் / Pet Preference</label>
                                                    <select class="form-control" id="pet_preference"
                                                        name="pet_preference">
                                                        @foreach ($petPreferences as $opt)
                                                            <option value="{{ $opt }}"
                                                                {{ $user->pet_preference == $opt ? 'selected' : '' }}>
                                                                {{ $opt }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="travel_preference" class="form-label">பயண விருப்பம் /
                                                        Travel Preference</label>
                                                    <select class="form-control" id="travel_preference"
                                                        name="travel_preference">
                                                        @foreach ($travelPreferences as $opt)
                                                            <option value="{{ $opt }}"
                                                                {{ $user->travel_preference == $opt ? 'selected' : '' }}>
                                                                {{ $opt }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="dietary_preference" class="form-label">உணவு விருப்பம்
                                                        / Dietary Preference</label>
                                                    <select class="form-control" id="dietary_preference"
                                                        name="dietary_preference">
                                                        @foreach ($dietaryPreferences as $opt)
                                                            <option value="{{ $opt }}"
                                                                {{ $user->dietary_preference == $opt ? 'selected' : '' }}>
                                                                {{ $opt }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="smoking_habit" class="form-label">புகைபிடிக்கும்
                                                        பழக்கம் / Smoking Habit</label>
                                                    <select class="form-control" id="smoking_habit"
                                                        name="smoking_habit">
                                                        @foreach ($smokingHabits as $opt)
                                                            <option value="{{ $opt }}"
                                                                {{ $user->smoking_habit == $opt ? 'selected' : '' }}>
                                                                {{ $opt }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="drinking_habit" class="form-label">மது அருந்தும்
                                                        பழக்கம் / Drinking Habit</label>
                                                    <select class="form-control" id="drinking_habit"
                                                        name="drinking_habit">
                                                        @foreach ($drinkingHabits as $opt)
                                                            <option value="{{ $opt }}"
                                                                {{ $user->drinking_habit == $opt ? 'selected' : '' }}>
                                                                {{ $opt }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <!-- Languages Known (checkbox or multi-select) -->
                                                <div class="col-md-12">
                                                    <label class="form-label">தெரிந்த மொழிகள் / Languages Known</label>
                                                    <div class="row">
                                                        @foreach ($languagesKnown as $lang)
                                                            <div class="col-md-3">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="lang_{{ Str::slug($lang) }}"
                                                                        name="languages_known[]"
                                                                        value="{{ $lang }}"
                                                                        {{ in_array($lang, $user->languages_known ?? []) ? 'checked' : '' }}>
                                                                    <label class="form-check-label"
                                                                        for="lang_{{ Str::slug($lang) }}">{{ $lang }}</label>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>

                                                <!-- Life Motto -->
                                                <div class="col-md-12">
                                                    <label for="life_motto" class="form-label">வாழ்க்கை குறிக்கோள் /
                                                        Your life motto</label>
                                                    <textarea class="form-control" id="life_motto" name="life_motto" rows="3">{{ $user->life_motto }}</textarea>
                                                </div>

                                                <!-- Contact & Social -->
                                                <div class="col-md-6">
                                                    <label for="mobile_number" class="form-label">தொலைபேசி எண் /
                                                        Mobile Number</label>
                                                    <input type="tel" class="form-control" id="mobile_number"
                                                        name="mobile_number" value="{{ $user->mobile_number }}">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="email" class="form-label">மின்னஞ்சல் முகவரி /
                                                        E-mail</label>
                                                    <input type="email" class="form-control" id="email"
                                                        name="email" value="{{ $user->email }}" required>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="facebook_profile" class="form-label">FaceBook
                                                        Profile</label>
                                                    <input type="url" class="form-control" id="facebook_profile"
                                                        name="facebook_profile"
                                                        value="{{ $user->facebook_profile }}">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="instagram_profile" class="form-label">Instagram
                                                        profile url</label>
                                                    <input type="url" class="form-control" id="instagram_profile"
                                                        name="instagram_profile"
                                                        value="{{ $user->instagram_profile }}">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="twitter_profile" class="form-label">Twitter profile
                                                        url</label>
                                                    <input type="url" class="form-control" id="twitter_profile"
                                                        name="twitter_profile" value="{{ $user->twitter_profile }}">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Family Details -->
                                        <div class="settings-section" data-aos="fade-up">
                                            <h3>Family Details</h3>
                                            <form class="php-email-form settings-form">
                                                <div class="row g-3">
                                                    <div class="col-md-6">
                                                        <label for="fatherName" class="form-label">Father's
                                                            Name</label>
                                                        <input type="text" class="form-control" id="fatherName"
                                                            value="<?= $user->father_name ?>">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="motherName" class="form-label">Mother's
                                                            Name</label>
                                                        <input type="text" class="form-control" id="motherName"
                                                            value="<?= $user->mother_name ?>">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="siblings" class="form-label">Siblings</label>
                                                        <input type="text" class="form-control" id="siblings"
                                                            value="<?= $user->siblings ?>">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="familyStatus" class="form-label">Family
                                                            Status</label>
                                                        <input type="text" class="form-control" id="familyStatus"
                                                            value="<?= $user->family_status ?>">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <!-- Horoscope Details -->
                                        <div class="settings-section" data-aos="fade-up">
                                            <h3>Horoscope Details</h3>
                                            <form class="php-email-form settings-form">
                                                <div class="row g-3">
                                                    <div class="col-md-6">
                                                        <label for="zodiac" class="form-label">Zodiac Sign</label>
                                                        <input type="text" class="form-control" id="zodiac"
                                                            value="<?= $user->zodiac ?>">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="birthStar" class="form-label">Birth Star</label>
                                                        <input type="text" class="form-control" id="birthStar"
                                                            value="<?= $user->birth_star ?>">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="rasi" class="form-label">Rasi</label>
                                                        <input type="text" class="form-control" id="rasi"
                                                            value="<?= $user->rasi ?>">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="horoscopeMatch" class="form-label">Horoscope
                                                            Match</label>
                                                        <input type="text" class="form-control"
                                                            id="horoscopeMatch"
                                                            value="<?= $user->horoscope_match ?>">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <!-- Save Button -->
                                        <div class="form-buttons">
                                            <button type="submit" class="btn-save">Save Changes</button>
                                        </div>

                                        <!-- Email Preferences -->
                                        <div class="settings-section" data-aos="fade-up" data-aos-delay="100">
                                            <h3>Email Preferences</h3>
                                            <div class="preferences-list">
                                                <div class="preference-item">
                                                    <div class="preference-info">
                                                        <h4>Order Updates</h4>
                                                        <p>Receive notifications about your order status</p>
                                                    </div>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="orderUpdates" checked="">
                                                    </div>
                                                </div>

                                                <div class="preference-item">
                                                    <div class="preference-info">
                                                        <h4>Promotions</h4>
                                                        <p>Receive emails about new promotions and deals</p>
                                                    </div>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="promotions">
                                                    </div>
                                                </div>

                                                <div class="preference-item">
                                                    <div class="preference-info">
                                                        <h4>Newsletter</h4>
                                                        <p>Subscribe to our weekly newsletter</p>
                                                    </div>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="newsletter" checked="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Security Settings -->
                                        <div class="settings-section" data-aos="fade-up" data-aos-delay="200">
                                            <h3>Security</h3>
                                            <form class="php-email-form settings-form">
                                                <div class="row g-3">
                                                    <div class="col-md-12">
                                                        <label for="currentPassword" class="form-label">Current
                                                            Password</label>
                                                        <input type="password" class="form-control"
                                                            id="currentPassword" required="">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="newPassword" class="form-label">New
                                                            Password</label>
                                                        <input type="password" class="form-control"
                                                            id="newPassword" required="">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="confirmPassword" class="form-label">Confirm
                                                            Password</label>
                                                        <input type="password" class="form-control"
                                                            id="confirmPassword" required="">
                                                    </div>
                                                </div>

                                                <div class="form-buttons">
                                                    <button type="submit" class="btn-save">Update Password</button>
                                                </div>

                                                <div class="loading">Loading</div>
                                                <div class="error-message"></div>
                                                <div class="sent-message">Your password has been updated successfully!
                                                </div>
                                            </form>
                                        </div>

                                        <!-- Delete Account -->
                                        <div class="settings-section danger-zone" data-aos="fade-up"
                                            data-aos-delay="300">
                                            <h3>Delete Account</h3>
                                            <div class="danger-zone-content">
                                                <p>Once you delete your account, there is no going back. Please be
                                                    certain.</p>
                                                <button type="button" class="btn-danger">Delete Account</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section><!-- /Account Section -->

    </main>

    @include('include.login')
    @include('include.footer')
    @include('include.script')
</body>
