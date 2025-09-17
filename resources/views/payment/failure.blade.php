@include('include.header')

<body class="about-page">
    @include('include.nav-header')

    <main class="main">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="card shadow-lg border-danger">
                        <div class="card-body">
                            <i class="bi bi-x-circle-fill text-danger display-1 mb-3"></i>
                            <h2 class="fw-bold text-danger">
                                Payment Failed! / கட்டணம் தோல்வியடைந்தது!
                            </h2>
                            <p class="lead mt-3">
                                Unfortunately, your payment could not be processed.
                                <br> மன்னிக்கவும், உங்கள் கட்டணம் செயல்படுத்தப்படவில்லை.
                            </p>
                            <a href="/" class="btn btn-danger mt-4">
                                <i class="bi bi-arrow-repeat"></i> Try Again / மீண்டும் முயற்சிக்கவும்
                            </a>
                            <a href="/" class="btn btn-outline-secondary mt-2">
                                <i class="bi bi-headset"></i> Contact Support
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('include.login')
    @include('include.footer')
    @include('include.script')
</body>
