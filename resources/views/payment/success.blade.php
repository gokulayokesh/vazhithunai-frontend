@extends('include.header')
@section('title', 'Payment Successful | Vazhithunai Matrimony')
@section('content')

    <body class="about-page">
        @include('include.nav-header')

        <main class="main">
            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-md-8 text-center">
                        <div class="card shadow-lg border-success">
                            <div class="card-body">
                                <i class="bi bi-check-circle-fill text-success display-1 mb-3"></i>
                                <h2 class="fw-bold text-success">
                                    Payment Successful! / கட்டணம் வெற்றிகரமாக முடிந்தது!
                                </h2>
                                <p class="lead mt-3">
                                    Thank you for your payment. Your premium features are now active.
                                    <br>
                                    உங்கள் கட்டணத்திற்கு நன்றி. உங்கள் பிரீமியம் அம்சங்கள் இப்போது செயல்படுத்தப்பட்டுள்ளன.
                                </p>
                                <a href="/" class="btn btn-success mt-4">
                                    <i class="bi bi-house-door"></i> Go to Dashboard / முகப்புக்கு செல்லவும்
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
@endsection
