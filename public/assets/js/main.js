(function () {
    "use strict";

    /**
     * Apply .scrolled class to the body as the page is scrolled down
     */
    function toggleScrolled() {
        const selectBody = document.querySelector("body");
        const selectHeader = document.querySelector("#header");
        if (
            !selectHeader.classList.contains("scroll-up-sticky") &&
            !selectHeader.classList.contains("sticky-top") &&
            !selectHeader.classList.contains("fixed-top")
        )
            return;
        window.scrollY > 100
            ? selectBody.classList.add("scrolled")
            : selectBody.classList.remove("scrolled");
    }

    document.addEventListener("scroll", toggleScrolled);
    window.addEventListener("load", toggleScrolled);

    /**
     * Mobile nav toggle
     */
    const mobileNavToggleBtn = document.querySelector(".mobile-nav-toggle");

    function mobileNavToogle() {
        document.querySelector("body").classList.toggle("mobile-nav-active");
        mobileNavToggleBtn.classList.toggle("bi-list");
        mobileNavToggleBtn.classList.toggle("bi-x");
    }
    if (mobileNavToggleBtn) {
        mobileNavToggleBtn.addEventListener("click", mobileNavToogle);
    }

    /**
     * Hide mobile nav on same-page/hash links
     */
    document.querySelectorAll("#navmenu a").forEach((navmenu) => {
        navmenu.addEventListener("click", () => {
            if (document.querySelector(".mobile-nav-active")) {
                mobileNavToogle();
            }
        });
    });

    /**
     * Frequently Asked Questions Toggle
     */
    document
        .querySelectorAll(
            ".faq-item h3, .faq-item .faq-toggle, .faq-item .faq-header"
        )
        .forEach((faqItem) => {
            faqItem.addEventListener("click", () => {
                faqItem.parentNode.classList.toggle("faq-active");
            });
        });

    /**
     * Toggle mobile nav dropdowns
     */
    document
        .querySelectorAll(".navmenu .toggle-dropdown")
        .forEach((navmenu) => {
            navmenu.addEventListener("click", function (e) {
                e.preventDefault();
                this.parentNode.classList.toggle("active");
                this.parentNode.nextElementSibling.classList.toggle(
                    "dropdown-active"
                );
                e.stopImmediatePropagation();
            });
        });

    /**
     * Preloader
     */
    const preloader = document.querySelector("#preloader");
    if (preloader) {
        window.addEventListener("load", () => {
            preloader.remove();
        });
    }

    /**
     * Scroll top button
     */
    let scrollTop = document.querySelector(".scroll-top");

    function toggleScrollTop() {
        if (scrollTop) {
            window.scrollY > 100
                ? scrollTop.classList.add("active")
                : scrollTop.classList.remove("active");
        }
    }
    scrollTop.addEventListener("click", (e) => {
        e.preventDefault();
        window.scrollTo({
            top: 0,
            behavior: "smooth",
        });
    });

    window.addEventListener("load", toggleScrollTop);
    document.addEventListener("scroll", toggleScrollTop);

    /**
     * Animation on scroll function and init
     */
    function aosInit() {
        AOS.init({
            duration: 600,
            easing: "ease-in-out",
            once: true,
            mirror: false,
        });
    }
    window.addEventListener("load", aosInit);

    /**
     * Initiate Pure Counter
     */
    new PureCounter();

    /**
     * Init swiper sliders
     */
    function initSwiper() {
        document
            .querySelectorAll(".init-swiper")
            .forEach(function (swiperElement) {
                let config = JSON.parse(
                    swiperElement
                        .querySelector(".swiper-config")
                        .innerHTML.trim()
                );

                if (swiperElement.classList.contains("swiper-tab")) {
                    initSwiperWithCustomPagination(swiperElement, config);
                } else {
                    new Swiper(swiperElement, config);
                }
            });
    }

    window.addEventListener("load", initSwiper);

    document.querySelectorAll(".logoutBtn").forEach(function (btn) {
        btn.addEventListener("click", function () {
            console.log("Logout button clicked");

            fetch("/logout", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                    Accept: "application/json",
                },
            })
                .then(() => {
                    location.reload(true);
                })
                .catch(() => alert("Logout failed"));
        });
    });
    $("#highest_education").select2({
        placeholder: "தேர்வு செய்யவும் / Select",
        width: "100%",
    });
    $("#occupation_category").select2({
        placeholder: "தேர்வு செய்யவும் / Select",
        width: "100%",
    });
    $("#employment_type").select2({
        placeholder: "தேர்வு செய்யவும் / Select",
        width: "100%",
    });
    $("#industry").select2({
        placeholder: "தேர்வு செய்யவும் / Select",
        width: "100%",
    });
    $("#annual_income").select2({
        placeholder: "தேர்வு செய்யவும் / Select",
        width: "100%",
    });
    $("#education_field").select2({
        placeholder: "தேர்வு செய்யவும் / Select",
        width: "100%",
    });
    $("#body_type").select2({
        placeholder: "தேர்வு செய்யவும் / Select",
        width: "100%",
    });
    $("#color").select2({
        placeholder: "தேர்வு செய்யவும் / Select",
        width: "100%",
    });
    $("#body_type").select2({
        placeholder: "தேர்வு செய்யவும் / Select",
        width: "100%",
    });
    $("#marital_status").select2({
        placeholder: "தேர்வு செய்யவும் / Select",
        width: "100%",
    });
    $("#physical_status").select2({
        placeholder: "தேர்வு செய்யவும் / Select",
        width: "100%",
    });
    $("#interests").select2({
        placeholder: "தேர்வு செய்யவும் / Select",
        width: "100%",
    });
    $("#hobbies").select2({
        placeholder: "தேர்வு செய்யவும் / Select",
        width: "100%",
    });
    $("#fav_cuisine").select2({
        placeholder: "தேர்வு செய்யவும் / Select",
        width: "100%",
    });
    $("#fav_music").select2({
        placeholder: "தேர்வு செய்யவும் / Select",
        width: "100%",
    });
    $("#sports").select2({
        placeholder: "தேர்வு செய்யவும் / Select",
        width: "100%",
    });
    $("#pet_pref").select2({
        placeholder: "தேர்வு செய்யவும் / Select",
        width: "100%",
    });
    $("#travel_pref").select2({
        placeholder: "தேர்வு செய்யவும் / Select",
        width: "100%",
    });
    $("#diet").select2({
        placeholder: "தேர்வு செய்யவும் / Select",
        width: "100%",
    });
    $("#smoking").select2({
        placeholder: "தேர்வு செய்யவும் / Select",
        width: "100%",
    });
    $("#drinking").select2({
        placeholder: "தேர்வு செய்யவும் / Select",
        width: "100%",
    });
    $("#languages").select2({
        placeholder: "தேர்வு செய்யவும் / Select",
        width: "100%",
    });
    $("#mother_tongue").select2({
        placeholder: "தேர்வு செய்யவும் / Select",
        width: "100%",
    });
    $("#height").select2({
        placeholder: "தேர்வு செய்யவும் / Select",
        width: "100%",
    });
    $("#specialization").select2({
        placeholder: "தேர்வு செய்யவும் / Select",
        width: "100%",
    });
    $("#completion_year").select2({
        placeholder: "தேர்வு செய்யவும் / Select",
        width: "100%",
    });
    $("#experience_years").select2({
        placeholder: "தேர்வு செய்யவும் / Select",
        width: "100%",
    });
    $("#gender").select2({
        placeholder: "தேர்வு செய்யவும் / Select",
        width: "100%",
    });
    $("#religion").select2({
        placeholder: "தேர்வு செய்யவும் / Select",
        width: "100%",
    });
    $("#city").select2({
        placeholder: "தேர்வு செய்யவும் / Select",
        width: "100%",
    });
    $("#family_status").select2({
        placeholder: "தேர்வு செய்யவும் / Select",
        width: "100%",
    });
    $("#father_alive").select2({
        placeholder: "தேர்வு செய்யவும் / Select",
        width: "100%",
    });
    $("#mother_alive").select2({
        placeholder: "தேர்வு செய்யவும் / Select",
        width: "100%",
    });
    $("#own_house").select2({
        placeholder: "தேர்வு செய்யவும் / Select",
        width: "100%",
    });

    $("#birth_star").select2({
        placeholder: "தேர்வு செய்யவும் / Select",
        width: "100%",
    });
    $("#rahu_ketu").select2({
        placeholder: "தேர்வு செய்யவும் / Select",
        width: "100%",
    });
    $("#chevvai").select2({
        placeholder: "தேர்வு செய்யவும் / Select",
        width: "100%",
    });
    $("#zodiac_sign").select2({
        placeholder: "தேர்வு செய்யவும் / Select",
        width: "100%",
    });
    $("#birth_lagnam").select2({
        placeholder: "தேர்வு செய்யவும் / Select",
        width: "100%",
    });

    document.addEventListener("DOMContentLoaded", function () {
        const buttons = document.querySelectorAll(".shortlist-btn");
        console.log(buttons);
        buttons.forEach((btn) => {
            btn.addEventListener("click", function () {
                let userId = this.getAttribute("data-user-id");
                let icon = this.querySelector("i");

                fetch(`/shortlist/${userId}`, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document
                            .querySelector('meta[name="csrf-token"]')
                            .getAttribute("content"),
                    },
                    body: JSON.stringify({}),
                })
                    .then((response) => response.json())
                    .then((data) => {
                        if (data.status === "added") {
                            icon.classList.remove("bi-heart");
                            icon.classList.add("bi-heart-fill", "text-danger");
                            showToast(data.message, "success");
                        } else if (data.status === "removed") {
                            icon.classList.remove(
                                "bi-heart-fill",
                                "text-danger"
                            );
                            icon.classList.add("bi-heart");
                            showToast(data.message, "success");
                        } else if (data.status === "error") {
                            showToast(data.message, "error");
                        }
                    })
                    .catch((error) => {
                        console.error("Error:", error);
                        showToast(error, "error");
                    });
            });
        });
    });

    function scrollToSection() {
        const target = document.getElementById("pricing");
        if (target) {
            target.scrollIntoView({ behavior: "smooth" });
        }
    }

    const popoverTriggerList = document.querySelectorAll(
        '[data-bs-toggle="popover"]'
    );
    const popoverList = [...popoverTriggerList].map(
        (popoverTriggerEl) => new bootstrap.Popover(popoverTriggerEl)
    );
})();
