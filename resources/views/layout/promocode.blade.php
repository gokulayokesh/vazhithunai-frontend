@extends('include.header')
@section('title', 'Promocode | Vazhithunai Matrimony')
@section('content')

    <body class="about-page">
        @include('include.nav-header')

        <main class="main">

            <!-- Page Title -->
            <div class="page-title light-background">
                <div class="container d-lg-flex justify-content-between align-items-center">
                    <h1 class="mb-2 mb-lg-0">Promocode</h1>
                    <nav class="breadcrumbs">
                        <ol>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="current">Promocode</li>
                        </ol>
                    </nav>
                </div>
            </div><!-- End Page Title -->

            <!-- About Section -->
            <section id="about" class="about section">

                <div class="container" data-aos="fade-up" data-aos-delay="100">
                    <div class="container my-5">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="card border-danger shadow-sm">
                                    <div class="card-header bg-danger text-white fw-bold">
                                        🎁 Apply Your Promocode (உங்கள் குறியீட்டை பயன்படுத்துங்கள்)
                                    </div>
                                    <div class="card-body">
                                        <form id="promocodeForm">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="code" class="form-label">Promocode (குறியீடு)</label>
                                                <input type="text" class="form-control" id="code" name="code"
                                                    placeholder="Enter your code here..." required>
                                            </div>
                                            <button type="submit" class="btn btn-danger w-100 fw-semibold">
                                                Activate Plan (திட்டத்தை செயல்படுத்துங்கள்)
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section><!-- /About Section -->

        </main>
        @include('include.login-modal')
        @include('include.footer')
        @include('include.script')

        @include('include.plan-activation-success-modal')
    </body>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('promocodeForm');
        if (!form) return;

        form.addEventListener('submit', function(e) {
            e.preventDefault();

            const code = document.getElementById('code').value;
            const token = document.querySelector('input[name="_token"]').value;

            fetch("{{ route('promocode.apply') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": token
                    },
                    body: JSON.stringify({
                        code
                    })
                })
                .then(response => response.json())
                .then(data => {
                    showToast(data.message, data.status);
                    if (data.status != "success") {
                        const modalElement = document.getElementById('planSuccessModal');
                        const modal = new bootstrap.Modal(modalElement);
                        modal.show();
                        form.reset();
                    }

                })
                .catch(error => {
                    showToast("சிக்கல் ஏற்பட்டது. மீண்டும் முயற்சிக்கவும்.", "error");
                    console.error(error);
                });
        });
    });
</script>
