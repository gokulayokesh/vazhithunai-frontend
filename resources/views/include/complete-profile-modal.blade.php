@if (Auth::check() && Auth::user()->profile_completed == 0)
    <!-- Modal Trigger -->
    <script>
        window.onload = function() {
            const modal = new bootstrap.Modal(document.getElementById('completeProfileModal'));
            modal.show();
        };
    </script>

    <!-- Modal HTML -->
    <div class="modal fade" id="completeProfileModal" tabindex="-1" aria-labelledby="completeProfileLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-warning text-dark">
                    <h5 class="modal-title" style="color:white" id="completeProfileLabel">Complete Your Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <h3>Welcome to Vazhithunai Matrimony!!</h3>
                    <h6>To get the best experience, please complete your profile.</h6>
                    <h6 class="mb-3" style="color: #6c757d;">This helps us personalize your dashboard and unlock all
                        features.</h6>
                </div>
                <div class="modal-footer justify-content-center">
                    {{-- <a class="btn btn-secondary" data-bs-dismiss="modal">Later</a> --}}
                    <a class="btn btn-primary" href="{{ url('/register') }}">
                        Complete Profile Now
                    </a>

                </div>
            </div>
        </div>
    </div>
@endif
