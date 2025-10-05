@extends('include.header')
@section('title', 'Referral Program | Vazhithunai Matrimony')
@section('content')

    <body class="about-page">
        @include('include.nav-header')

        <main class="main">

            <!-- Page Title -->
            <div class="page-title light-background">
                <div class="container d-lg-flex justify-content-between align-items-center">
                    <h1 class="mb-2 mb-lg-0">Referral Program</h1>
                    <nav class="breadcrumbs">
                        <ol>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="current">Referral Program</li>
                        </ol>
                    </nav>
                </div>
            </div><!-- End Page Title -->

            <section id="about" class="about section">
                <div class="container" data-aos="fade-up" data-aos-delay="100">

                    <div class="row justify-content-center">
                        <div class="alert alert-success align-items-center" role="alert">
                            <div style="text-align: center">
                                <i class="bi bi-gift-fill me-2"></i>
                                <strong>Exclusive Reward for You! 🌟</strong><br> Invite your friends to join and, on
                                each
                                successful
                                subscription, you’ll be gifted an Amazon coupon worth ₹199.<br> 🔥 The more you refer,
                                the
                                more you earn—start now!
                                <hr>
                                <strong>🎉 உங்கள் பரிந்துரைக்கு பரிசு!</strong><br> ஒவ்வொரு வெற்றிகரமான சந்தா
                                பரிந்துரைக்கும், ₹199
                                மதிப்புள்ள Amazon கூப்பன் உங்களுக்கு!<br> 🚀 உடனே பரிந்துரையிடுங்கள் & பரிசுகளைப்
                                பெறுங்கள்!
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">My Referral Program</div>
                                <div class="card-body">
                                    <p>Your referral link:</p>
                                    <div class="input-group mb-3">
                                        <input type="text" id="referralCode" class="form-control"
                                            value="{{ url('/sign-up') . '?referral-code=' . $user->identifier ?? 'No code yet' }}"
                                            readonly>
                                        <button class="btn btn-outline-secondary" type="button"
                                            onclick="copyReferralCode()" title="Copy to clipboard">
                                            Copy
                                        </button>
                                    </div>

                                    <h5 class="mt-4">Referrals</h5>
                                    <ul>
                                        @foreach ($user->referralsGiven as $ref)
                                            <li>
                                                Code: {{ $ref->referral_code }} |
                                                Status: {{ ucfirst($ref->status) }} |
                                                Reward: {{ $ref->reward_points }}
                                            </li>
                                        @endforeach
                                        @if (count($user->referralsGiven) == 0)
                                            <li>No referrals yet</li>
                                        @endif
                                    </ul>
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

<script>
    function copyReferralCode() {
        let input = document.getElementById("referralCode");
        input.select();
        input.setSelectionRange(0, 99999); // for mobile
        navigator.clipboard.writeText(input.value).then(() => {
            showToast("Referral code copied!");
        });
    }
</script>
