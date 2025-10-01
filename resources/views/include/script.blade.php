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

     document.addEventListener("DOMContentLoaded", function() {
         const form = document.getElementById('contactForm');
         if (form) {
             document.getElementById('contactForm').addEventListener('submit', async function(e) {
                 e.preventDefault();

                 // Clear old errors
                 document.querySelectorAll('small.text-danger').forEach(el => el.textContent = '');
                 document.getElementById('successMsg').classList.add('d-none');
                 document.getElementById('errorMsg').classList.add('d-none');

                 const form = e.target;
                 const formData = new FormData(form);

                 // Client-side validation
                 let hasError = false;

                 if (!formData.get('name').trim()) {
                     document.querySelector('.error-name').textContent = "Name is required";
                     hasError = true;
                 }

                 const mobile = formData.get('mobile').trim();
                 if (!/^[0-9]{10}$/.test(mobile)) {
                     document.querySelector('.error-mobile').textContent =
                         "Enter a valid 10-digit mobile number";
                     hasError = true;
                 }

                 const email = formData.get('mail_id').trim();
                 if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                     document.querySelector('.error-mail_id').textContent =
                         "Enter a valid email address";
                     hasError = true;
                 }

                 if (!formData.get('subject').trim()) {
                     document.querySelector('.error-subject').textContent = "Subject is required";
                     hasError = true;
                 }

                 if (!formData.get('message').trim()) {
                     document.querySelector('.error-message-field').textContent =
                         "Message cannot be empty";
                     hasError = true;
                 }

                 if (hasError) return;

                 try {
                     const response = await fetch("{{ url('/contact-us') }}", {
                         method: "POST",
                         headers: {
                             "X-CSRF-TOKEN": "{{ csrf_token() }}",
                             "Accept": "application/json"
                         },
                         body: formData
                     });

                     const result = await response.json();

                     if (response.ok && result.status === "success") {
                         document.getElementById('successMsg').classList.remove('d-none');
                         document.getElementById('successMsg').textContent = result.message ||
                             "Message sent successfully!";
                         form.reset();
                     } else {
                         document.getElementById('errorMsg').classList.remove('d-none');
                         document.getElementById('errorMsg').textContent = result.message ||
                             "Something went wrong!";
                     }
                 } catch (error) {
                     document.getElementById('errorMsg').classList.remove('d-none');
                     document.getElementById('errorMsg').textContent = "Network error: " + error;
                 }
             });
         }
     });
 </script>
