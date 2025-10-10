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

 <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
 <script src="{{ asset('assets/vendor/select2/select2.min.js') }}"></script>
 <script src="{{ asset('assets/js/main.js') }}"></script>
 <script src="{{ asset('assets/vendor/toastify/toastify.js') }}"></script>
 <script src="https://accounts.google.com/gsi/client" async defer></script>

 <script>
     function showToast(message, type = "success", gravity = 'top', position = 'right') {
         Toastify({
             text: message,
             duration: 4000, // 4 seconds
             close: true,
             gravity: gravity, // top or bottom
             position: position, // left, center or right
             stopOnFocus: true,
             style: {
                 background: type === "error" ?
                     "linear-gradient(to right, #e53935, #e35d5b)" :
                     "linear-gradient(to right, #43a047, #66bb6a)",
                 borderRadius: "6px",
                 padding: "10px 20px",
             },
         }).showToast();
     }


     function scrollToSection() {
         const target = document.getElementById("pricing");
         if (target) {
             target.scrollIntoView({
                 behavior: "smooth"
             });
         }
     }

     function copyReferralCode() {
         let input = document.getElementById("referralCode");
         input.select();
         input.setSelectionRange(0, 99999); // for mobile
         navigator.clipboard.writeText(input.value).then(() => {
             showToast("Referral code copied!");
         });
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

 @if (session('error'))
     <script>
         document.addEventListener("DOMContentLoaded", function() {
             showToast(@json(session('error')), "error");
         });
     </script>
 @endif

 @if (session('info'))
     <script>
         document.addEventListener("DOMContentLoaded", function() {
             showToast(@json(session('info')), "success");
         });
     </script>
 @endif
