<!-- Success Modal -->
<div class="modal fade" id="profileSuccessModal" tabindex="-1" aria-labelledby="profileSuccessLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center">
            <div class="modal-header border-0">
                <h5 class="modal-title w-100" id="profileSuccessLabel" style="color: #fff;">🎉 Profile Completed!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body position-relative">
                <!-- Confetti Canvas -->
                <canvas id="confettiCanvas"
                    style="position:absolute; top:0; left:0; width:100%; height:100%; pointer-events:none;"></canvas>

                <p class="fs-5 mt-4">Your profile details have been successfully completed.</p>
                <p class="text-muted">Once verification is done, your profile will be listed publicly.</p>
            </div>
            <div class="modal-footer border-0">
                <a href="/" type="button" class="btn btn-success" data-bs-dismiss="modal">Awesome!</a>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
<script>
    const modal = document.getElementById('profileSuccessModal');
    modal.addEventListener('shown.bs.modal', () => {
        const canvas = document.getElementById('confettiCanvas');
        const myConfetti = confetti.create(canvas, {
            resize: true,
            useWorker: true
        });

        // Blast animation
        myConfetti({
            particleCount: 100,
            spread: 70,
            origin: {
                y: 0.6
            }
        });
    });
</script>
