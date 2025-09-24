@extends('include.header')
@section('title', 'Payment Pending | Vazhithunai Matrimony')
@section('content')

    <body class="about-page">
        @include('include.nav-header')

        <main class="main">
            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-md-8 text-center">
                        <div class="card shadow-lg border-warning">
                            <div class="card-body">
                                <i class="bi bi-hourglass-split text-warning display-1 mb-3"></i>
                                <h2 class="fw-bold text-warning">
                                    Payment Pending! / கட்டணம் நிலுவையில் உள்ளது!
                                </h2>
                                <p class="lead mt-3">
                                    Your payment is being processed. This may take a few minutes.
                                    <br> உங்கள் கட்டணம் செயலாக்கப்படுகிறது. இதற்கு சில நிமிடங்கள் ஆகலாம்.
                                </p>
                                <p class="text-muted small">
                                    If the status does not update automatically, please click below to check again.
                                    <br> நிலை தானாகப் புதுப்பிக்காவிட்டால், கீழே உள்ள பொத்தானை அழுத்தி மீண்டும்
                                    சரிபார்க்கவும்.
                                </p>
                                <a href="/payment-callback" class="btn btn-warning mt-4">
                                    <i class="bi bi-arrow-clockwise"></i> Check Again / மீண்டும் சரிபார்க்கவும்
                                </a>
                                <a href="/" class="btn btn-outline-secondary mt-2">
                                    <i class="bi bi-headset"></i> Contact Support / உதவியை தொடர்பு கொள்ளவும்
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
