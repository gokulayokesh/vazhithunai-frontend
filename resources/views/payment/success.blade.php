@include('include.header')

<body class="about-page">
    @include('include.nav-header')

    <main class="main">
        <div class="container text-center">
            <h2>Payment {{ $status === 'SUCCESS' ? 'Successful' : 'Status: ' . $status }}</h2>
            <p>Transaction ID: <strong>{{ $transactionId }}</strong></p>
            <a href="{{ route('home') }}" class="btn btn-primary mt-3">Go to Dashboard</a>
        </div>

    </main>
    @include('include.login')
    @include('include.footer')
    @include('include.script')
</body>
