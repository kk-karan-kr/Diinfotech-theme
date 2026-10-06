document.addEventListener("DOMContentLoaded", function() {
        var reducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)");

        document.querySelectorAll(".di-hero-slider").forEach(function(hero) {
            var floatingContacts = document.querySelectorAll(".di-hero-contact");
            function updateFloatingContacts() {
                var pastHero = hero.getBoundingClientRect().bottom <= 0;
                floatingContacts.forEach(function(contact) {
                    contact.classList.toggle("is-past-hero", pastHero);
                });
            }
            updateFloatingContacts();
            if ("IntersectionObserver" in window) {
                var heroObserver = new IntersectionObserver(updateFloatingContacts, {threshold: 0});
                heroObserver.observe(hero);
            } else {
                window.addEventListener("scroll", updateFloatingContacts, {passive: true});
            }
            window.addEventListener("pageshow", updateFloatingContacts);
            window.addEventListener("resize", updateFloatingContacts);

            var slides = Array.from(hero.querySelectorAll(".di-hero-slider__slide"));
            var dots = Array.from(hero.querySelectorAll(".di-hero-slider__dot"));
            var previousButton = hero.querySelector("[data-di-slider-prev]");
            var nextButton = hero.querySelector("[data-di-slider-next]");
            var delay = Number(hero.dataset.autoplay) || 6500;
            var currentIndex = 0;
            var autoplayTimer = null;
            var mobileViewport = window.matchMedia("(max-width: 767px)");

            if (slides.length < 2) {
                return;
            }

            function stopAutoplay() {
                if (autoplayTimer) {
                    window.clearTimeout(autoplayTimer);
                    autoplayTimer = null;
                }
            }

            function scheduleAutoplay() {
                stopAutoplay();

                if (reducedMotion.matches || mobileViewport.matches || document.hidden || hero.matches(":hover") || hero.contains(document.activeElement)) {
                    return;
                }

                autoplayTimer = window.setTimeout(function() {
                    showSlide(currentIndex + 1);
                }, delay);
            }

            function updateFocusableElements(slide, active) {
                var focusable = slide.querySelectorAll("a, button, input, select, textarea, [tabindex]");

                focusable.forEach(function(element) {
                    var previousTabIndex;

                    if (!active) {
                        if (!element.hasAttribute("data-di-slider-original-tabindex")) {
                            element.setAttribute("data-di-slider-original-tabindex", element
                                .getAttribute("tabindex") || "");
                        }

                        element.setAttribute("tabindex", "-1");
                        return;
                    }

                    previousTabIndex = element.getAttribute("data-di-slider-original-tabindex");

                    if (previousTabIndex === "") {
                        element.removeAttribute("tabindex");
                    } else if (previousTabIndex !== null) {
                        element.setAttribute("tabindex", previousTabIndex);
                    }

                    element.removeAttribute("data-di-slider-original-tabindex");
                });
            }

            function showSlide(requestedIndex) {
                var totalSlides = slides.length;

                currentIndex = ((requestedIndex % totalSlides) + totalSlides) % totalSlides;
                var picture = slides[currentIndex].querySelector("picture");
                picture.querySelectorAll("[data-srcset]").forEach(function(source) {
                    source.setAttribute("srcset", source.dataset.srcset);
                    source.removeAttribute("data-srcset");
                });
                var image = picture.querySelector("img");
                if (image.dataset.src) {
                    image.loading = "eager";
                    image.src = image.dataset.src;
                    image.removeAttribute("data-src");
                }

                slides.forEach(function(slide, index) {
                    var active = index === currentIndex;

                    slide.classList.toggle("is-active", active);
                    slide.setAttribute("aria-hidden", active ? "false" : "true");

                    if (active) {
                        slide.removeAttribute("inert");
                    } else {
                        slide.setAttribute("inert", "");
                    }

                    updateFocusableElements(slide, active);
                });

                dots.forEach(function(dot, index) {
                    var active = index === currentIndex;

                    dot.classList.toggle("is-active", active);
                    dot.setAttribute("aria-current", active ? "true" : "false");
                });

                var activeImage = slides[currentIndex].querySelector("img");
                if (activeImage.complete) { scheduleAutoplay(); }
                else { activeImage.addEventListener("load", scheduleAutoplay, {once: true}); }
            }

            if (previousButton) {
                previousButton.addEventListener("click", function() {
                    showSlide(currentIndex - 1);
                });
            }

            if (nextButton) {
                nextButton.addEventListener("click", function() {
                    showSlide(currentIndex + 1);
                });
            }

            dots.forEach(function(dot) {
                dot.addEventListener("click", function() {
                    showSlide(Number(dot.dataset.diSliderGo));
                });
            });

            hero.addEventListener("mouseenter", stopAutoplay);
            hero.addEventListener("mouseleave", scheduleAutoplay);
            hero.addEventListener("focusin", stopAutoplay);
            hero.addEventListener("focusout", function(event) {
                if (!hero.contains(event.relatedTarget)) {
                    scheduleAutoplay();
                }
            });

            hero.addEventListener("keydown", function(event) {
                if (event.key === "ArrowLeft") {
                    event.preventDefault();
                    showSlide(currentIndex - 1);
                }

                if (event.key === "ArrowRight") {
                    event.preventDefault();
                    showSlide(currentIndex + 1);
                }
            });

            document.addEventListener("visibilitychange", function() {
                if (document.hidden) {
                    stopAutoplay();
                } else {
                    scheduleAutoplay();
                }
            });

            if (typeof reducedMotion.addEventListener === "function") {
                reducedMotion.addEventListener("change", function() {
                    if (reducedMotion.matches) {
                        stopAutoplay();
                    } else {
                        scheduleAutoplay();
                    }
                });
            }

            mobileViewport.addEventListener("change", scheduleAutoplay);
            showSlide(0);
        });
    });
