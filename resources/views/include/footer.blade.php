<footer id="footer" class="footer accent-background">

    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-5 col-md-12 footer-about">
                <a href="index.html" class="logo d-flex align-items-center">
                    <span class="sitename">Vazhithunai</span>
                </a>
                <p>Where Souls Connect, Love Grows. At Vazhithunai Matrimony, we believe that love is the foundation
                    upon which
                    beautiful unions are built, and destiny is the guiding force that brings two souls together.</p>
                <div class="social-links d-flex mt-4">
                    <a href=""><i class="bi bi-twitter-x"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-6 footer-links">
                <h4>Useful Links</h4>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="/about">About us</a></li>
                    {{-- <li><a href="#">Services</a></li> --}}
                    <li><a href="/terms">Terms of service</a></li>
                    <li><a href="/privacy-policy">Privacy policy</a></li>
                </ul>
            </div>

            {{-- <div class="col-lg-2 col-6 footer-links">
                <h4>Our Services</h4>
                <ul>
                    <li><a href="#">Web Design</a></li>
                    <li><a href="#">Web Development</a></li>
                    <li><a href="#">Product Management</a></li>
                    <li><a href="#">Marketing</a></li>
                    <li><a href="#">Graphic Design</a></li>
                </ul>
            </div> --}}

            <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                <h4>Contact Us</h4>
                <p>#48, Mukkannar Street</p>
                <p>Kumbakonam, TN 612001</p>
                <p>India</p>
                <p class="mt-4"><strong>Phone:</strong> <span>+91 94438 74110</span></p>
                <p><strong>Email:</strong> <span>support@vazhithunai.com</span></p>
            </div>

        </div>
    </div>

    <div class="container copyright text-center mt-4">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">Vazhithunai</strong> <span>All Rights
                Reserved</span>
        </p>
        <div class="credits">
            Designed by Hashtag.academy</a>
        </div>
    </div>

</footer>
@yield('script')
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1100">
    <div id="liveToast" class="toast align-items-center text-white bg-success border-0" role="alert"
        aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body" id="toast-message">
                <!-- Message will be injected here -->
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                aria-label="Close"></button>
        </div>
    </div>
</div>
