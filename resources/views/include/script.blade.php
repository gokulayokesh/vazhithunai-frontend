 <!-- Scroll Top -->
 <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
         class="bi bi-arrow-up-short"></i></a>

 <!-- Preloader -->
 <div id="preloader"></div>

 <!-- Vendor JS Files -->
 <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
 <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
 <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
 <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
 <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

 <!-- Main JS File -->

 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
 <script src="{{ asset('assets/js/main.js') }}"></script>
 <script>
     function scrollToSection() {
         const target = document.getElementById("pricing");
         if (target) {
             target.scrollIntoView({
                 behavior: "smooth"
             });
         }
     }

     function shareProfile(profileUrl) {
         // Copy to clipboard
         navigator.clipboard.writeText(profileUrl).then(() => {
             console.log("Profile link copied!");

             // Open native share popup if supported
             if (navigator.share) {
                 navigator
                     .share({
                         title: "Check out this profile",
                         text: "Here’s a profile I wanted to share with you:",
                         url: profileUrl,
                     })
                     .catch((err) => console.log("Share failed:", err));
             } else {
                 alert("Link copied! Share it anywhere you like.");
             }
         });
     }
 </script>

 <script type="text/javascript">
     var configuration = {
         widgetId: "356973735335323932343834",
         tokenAuth: "469919TnbuxVIbA68ce3b11P1",
         identifier: "<enter mobile number/email here> (optional)",
         exposeMethods: "<true | false> (optional)", // When true will expose the methods for OTP verification. Refer 'How it works?' for more details
         success: (data) => {
             // get verified token in response
             console.log('success response', data);
         },
         failure: (error) => {
             // handle error
             console.log('failure reason', error);
         },

     };
 </script>
 <script type="text/javascript" onload="initSendOTP(configuration)" src="https://verify.msg91.com/otp-provider.js">
 </script>
