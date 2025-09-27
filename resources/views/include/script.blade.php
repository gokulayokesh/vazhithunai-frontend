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
 <script src="https://js.pusher.com/8.4.0/pusher.min.js"></script>
 <script>
     function scrollToSection() {
         const target = document.getElementById("pricing");
         if (target) {
             target.scrollIntoView({
                 behavior: "smooth"
             });
         }
     }

     async function shareProfile(profileUrl) {
         try {
             // Try copying to clipboard first
             if (navigator.clipboard && window.isSecureContext) {
                 await navigator.clipboard.writeText(profileUrl);
                 console.log("Profile link copied to clipboard!");
             } else {
                 // Fallback for older browsers
                 const tempInput = document.createElement("input");
                 tempInput.value = profileUrl;
                 document.body.appendChild(tempInput);
                 tempInput.select();
                 document.execCommand("copy");
                 document.body.removeChild(tempInput);
                 console.log("Profile link copied (fallback)!");
             }

             // If Web Share API is supported, open native share
             if (navigator.share) {
                 await navigator.share({
                     title: "Check out this profile",
                     text: "Here’s a profile I wanted to share with you:",
                     url: profileUrl
                     // files: [file] // optional: add a File object if you want to share an image/logo
                 });
                 console.log("Shared successfully!");
             } else {
                 //  alert("Link copied! Share it anywhere you like.");
             }
         } catch (err) {
             console.error("Share failed:", err);
             //  alert("Something went wrong while sharing.");
         }
     }
 </script>
