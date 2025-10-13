<!-- Banner Modal -->
<div class="modal fade" id="bannerModal" tabindex="-1" aria-labelledby="bannerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content text-center" style="background-color: transparent; border: none;">
            <div class="modal-body">
                <button type="button"
                    style="margin-left: 47%;background-color: white;padding: 5px;opacity: unset;border-radius: 25px;font-size: smaller;"
                    class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <img src="{{ asset('assets/img/banner/Banner2.png') }}"
                    style="height: 500px; width: 100%; object-fit: contain;" alt="Welcome Banner"
                    class="img-fluid rounded" />
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (!sessionStorage.getItem('bannerShown')) {
            const bannerModal = new bootstrap.Modal(document.getElementById('bannerModal'));
            bannerModal.show();
            sessionStorage.setItem('bannerShown', 'true');
        }
    });
</script>
