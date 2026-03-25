<?php
// Include database configuration for potential future use
// require_once 'config.php';

// You can add PHP logic here in the future, such as:
// - User session management
// - Dynamic content loading
// - Analytics tracking
// - A/B testing
// - Personalized recommendations
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tele-helath</title>
    <!-- custom css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/product.css">
    <!-- bootstrap cdn -->
    <link rel=" stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <!-- google fonts cdn -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
    <?php include __DIR__ . '/partials/header.php'; ?>

    <!-- hero section -->
    <section class="hero">
        <div class="container">
            <div class="row align-items-center gy-5">
                <!-- LEFT CONTENT -->
                <div class="col-lg-6">
                    <div class="hero-content">

                        <span class="hero-badge">Trusted Tele-Health Platform</span>

                        <h1>
                            Virtual Care <br>
                            With Real Doctors
                        </h1>

                        <p>
                            Connect instantly with certified doctors, get prescriptions, and
                            receive expert care from the comfort of your home.
                        </p>

                        <div class="hero-buttons">
                            <a href="#book-appointment" class="btn btn-primary">Book Appointment</a>
                            <a href="services" class="btn btn-outline-primary">Explore Services</a>
                        </div>

                        <!-- stats -->
                        <div class="hero-stats">

                            <div class="stat-card">
                                <div class="stat-icon">👨‍⚕️</div>
                                <h4>500+</h4>
                                <p>Doctors</p>
                            </div>

                            <div class="stat-card">
                                <div class="stat-icon">⏰</div>
                                <h4>24/7</h4>
                                <p>Support</p>
                            </div>

                            <div class="stat-card">
                                <div class="stat-icon">❤️</div>
                                <h4>10k+</h4>
                                <p>Happy Patients</p>
                            </div>

                        </div>

                    </div>
                </div>

                <!-- RIGHT IMAGE -->
                <div class="col-lg-6">

                    <div class="hero-image">

                        <img src="images/banner.webp" alt="Doctor Telehealth">

                        <!-- floating card 1 -->
                        <div class="floating-card card1">
                            👨‍⚕️ Online Consultation
                        </div>

                        <!-- floating card 2 -->
                        <div class="floating-card card2">
                            💊 Instant Prescription
                        </div>

                        <!-- floating card 3 -->
                        <div class="doctor-card">
                            <img src="images/doctor.webp" alt="Doctor">
                            <div class="doctor-info">
                                <h6>Dr. Sarah Wilson</h6>
                                <span class="rating">⭐ 4.9 Rating</span><br>
                                <span class="live text-success">● Available Now</span>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>
        </div>

    </section>

    <!-- about section -->
    <section class="about-section reveal">

        <div class="container">
            <div class="row align-items-center gy-5">

                <!-- LEFT IMAGE -->
                <div class="col-lg-6">

                    <div class="about-image">
                        <img src="images/about-team.webp" alt="Dental Team">
                    </div>

                    <div class="emergency-card">

                        <h4>Emergency Dental</h4>

                        <p>
                            Prompt treatment for dental emergencies with expert care when you need it most.
                        </p>

                        <a href="#" class="btn btn-light">Learn More</a>

                    </div>

                </div>


                <!-- RIGHT TEXT -->
                <div class="col-lg-6">

                    <h2 class="about-title">
                        Advanced Dental Care For Confident Smiles
                    </h2>

                    <p class="about-text">
                        Comprehensive dental services designed to keep your smile healthy and confident.
                    </p>

                    <div class="about-features">

                        <div class="feature-box">
                            <div class="feature-icon">🦷</div>
                            <div>
                                <h5>General Dental Checkups</h5>
                                <p>Complete oral health evaluation and preventive care.</p>
                            </div>
                        </div>

                        <div class="feature-box">
                            <div class="feature-icon">✨</div>
                            <div>
                                <h5>Teeth Whitening</h5>
                                <p>Professional whitening treatments for a brighter smile.</p>
                            </div>
                        </div>

                        <div class="feature-box">
                            <div class="feature-icon">😁</div>
                            <div>
                                <h5>Smile Design</h5>
                                <p>Personalized cosmetic dental treatments.</p>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>

    </section>

    <!-- service section -->
    <section class="services-section">

        <div class="container">

            <div class="row align-items-center gy-5">

                <!-- LEFT CARDS -->
                <div class="col-lg-4">

                    <div class="service-card glass-card">
                        <div class="service-icon">🦷</div>
                        <h4>Tooth Rehabilitation</h4>
                        <p>Our preventive care services focus on protecting your teeth and gums.</p>
                    </div>

                    <div class="service-card glass-card blue-card">
                        <div class="service-icon">🪥</div>
                        <h4>Dental Care Plans</h4>
                        <p>Education on proper brushing and flossing techniques.</p>
                    </div>

                </div>


                <!-- RIGHT SIDE -->
                <div class="col-lg-8">

                    <div class="row align-items-center gy-4">

                        <!-- IMAGE -->
                        <div class="col-md-6 text-center">

                            <div class="services-image">
                                <img src="images/service-doctor.webp" alt="Doctor">

                                <div class="doctor-badge">
                                    Trusted Specialist
                                </div>
                            </div>

                        </div>


                        <!-- ACCORDION -->
                        <div class="col-md-6">

                            <p class="section-tag">OUR SERVICES</p>

                            <h2 class="services-title">
                                Trusted Dental Services
                            </h2>

                            <div class="accordion services-accordion" id="servicesAccordion">

                                <!-- item -->
                                <div class="accordion-item glass-card">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#s1"
                                            data-bs-parent="#servicesAccordion">
                                            Oral Hygiene Products
                                        </button>
                                    </h2>

                                    <div id="s1" class="accordion-collapse collapse show">
                                        <div class="accordion-body">
                                            Professional oral hygiene products for better dental care.
                                        </div>
                                    </div>
                                </div>

                                <!-- item -->
                                <div class="accordion-item glass-card">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#s2"
                                            data-bs-parent="#servicesAccordion">
                                            Dental Check-up
                                        </button>
                                    </h2>

                                    <div id="s2" class="accordion-collapse collapse">
                                        <div class="accordion-body">
                                            Keeps teeth and gums healthy with regular inspection.
                                        </div>
                                    </div>
                                </div>

                                <!-- item -->
                                <div class="accordion-item glass-card">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#s3"
                                            data-bs-parent="#servicesAccordion">
                                            Teeth Whitening
                                        </button>
                                    </h2>

                                    <div id="s3" class="accordion-collapse collapse">
                                        <div class="accordion-body">
                                            Brighten your smile with professional whitening treatment.
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- product section -->
    <section class="products-section reveal">

        <div class="container">

            <h2 class="section-title">Trending Products</h2>

            <!-- PRODUCT GRID -->
            <div class="products-grid" id="productsGrid"></div>


            <!-- SECOND ROW -->
            <div class="products-bottom">

                <!-- PROMO BANNERS -->
                <div class="promo-banners">

                    <div class="promo-banner">
                        <img src="images/promo1.webp">
                        <div class="promo-content">
                            <h4>50% off in all products</h4>
                            <a href="shop.php">Shop Now</a>
                        </div>
                    </div>

                    <div class="promo-banner">
                        <img src="images/promo2.webp">
                        <div class="promo-content another-content">
                            <h4>28% off in all products</h4>
                            <a href="shop.php">Shop Now</a>
                        </div>
                    </div>

                </div>


                <!-- SMALL PRODUCT LIST -->
                <div class="product-list" id="productList"></div>

            </div>

        </div>

    </section>

    <!-- product modal -->
    <div id="quickModal" class="quick-modal">

        <div class="quick-container">

            <span class="quick-close">&times;</span>

            <div class="quick-grid">

                <div class="quick-image">
                    <img id="quickImage">
                </div>

                <div class="quick-info">

                    <div class="quick-rating">
                        <span id="quickStars" class="text-warning"></span>
                        <span class="review-text">( <span id="quickReviews"></span> Reviews )</span>
                    </div>

                    <h2 id="quickTitle"></h2>

                    <div class="quick-price">
                        <span id="quickPrice"></span>
                        <span id="quickOldPrice"></span>
                    </div>

                    <p id="quickDesc"></p>

                    <!-- <div class="quick-actions">
                        <a href="#" class="add-wishlist" data-id="${product.id}">
                            <i class="fa-regular fa-heart"></i> Add to Wishlist
                        </a>

                    </div> -->



                    <a id="viewDetails" class="view-details text-success text-decoration-underline" href="checkout.php">View Details</a>

                </div>

            </div>

        </div>

    </div>

    <!-- features section -->
    <section class="features-section reveal">

        <div class="features-container">

            <div class="feature-card">
                <i class="fa-solid fa-truck-fast"></i>
                <h4>Free Shipping</h4>
                <p>Free shipping world wide</p>
            </div>

            <div class="feature-card active">
                <i class="fa-solid fa-headset"></i>
                <h4>Support 24/7</h4>
                <p>Contact us 24 hours daily</p>
            </div>

            <div class="feature-card">
                <i class="fa-solid fa-credit-card"></i>
                <h4>Secure Payments</h4>
                <p>100% Payments Protection</p>
            </div>

            <div class="feature-card">
                <i class="fa-solid fa-box-open"></i>
                <h4>Easy Returns</h4>
                <p>Free shipping world wide</p>
            </div>

        </div>

    </section>

    <!-- our services section -->
    <section class="trust-section-modern reveal">

        <div class="container">

            <div class="trust-header-modern">

                <span class="trust-tag">WHY CHOOSE US</span>

                <h2>Trusted Healthcare <br> With Modern Technology</h2>

                <p>
                    Clara provides modern healthcare equipment and diagnostic
                    solutions designed for accuracy, reliability, and patient safety.
                </p>

                <a href="#" class="trust-btn">Discover Our Story</a>

            </div>


            <div class="trust-grid-modern">

                <div class="trust-card stat">
                    <h3 class="counter" data-count="50">0</h3>
                    <p>Certified Doctors</p>
                </div>

                <div class="trust-card image">
                    <img src="images/team.webp">
                </div>

                <div class="trust-card stat">
                    <h3 class="counter" data-count="200">0</h3>
                    <p>Healthcare Partners</p>
                </div>

                <div class="trust-card image">
                    <img src="images/patient.webp">
                </div>

                <div class="trust-card stat">
                    <h3 class="counter" data-count="99">0</h3>
                    <p>Patient Satisfaction</p>
                </div>

                <div class="trust-card image">
                    <img src="images/doctors.webp">
                </div>

            </div>

        </div>

    </section>

    <!-- client testimonials -->
    <!-- testimonials section -->
    <section class="testimonials-section-glass reveal">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="section-title-glass">Patient Experiences</h2>
                    <p class="section-subtitle-glass">Hear what our patients have to say about our care</p>
                </div>
            </div>

            <div class="testimonials-grid-glass">
                <div class="testimonial-card-glass">
                    <div class="testimonial-content">
                        <div class="testimonial-quote-glass">"The consultation was thorough and professional. Dr. Wilson took the time to understand my concerns and provided excellent guidance."</div>
                        <div class="testimonial-author-glass">
                            <div class="author-avatar-glass">SJ</div>
                            <div class="author-info-glass">
                                <h5>Sarah Johnson</h5>
                                <div class="author-rating-glass">⭐⭐⭐⭐⭐</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card-glass">
                    <div class="testimonial-content">
                        <div class="testimonial-quote-glass">"I was impressed by the level of care and attention to detail. The online consultation made healthcare so convenient."</div>
                        <div class="testimonial-author-glass">
                            <div class="author-avatar-glass">ML</div>
                            <div class="author-info-glass">
                                <h5>Michael Lee</h5>
                                <div class="author-rating-glass">⭐⭐⭐⭐⭐</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card-glass">
                    <div class="testimonial-content">
                        <div class="testimonial-quote-glass">"Dr. Chen's expertise in cardiology is exceptional. He explained everything clearly and made me feel confident about my treatment plan."</div>
                        <div class="testimonial-author-glass">
                            <div class="author-avatar-glass">ER</div>
                            <div class="author-info-glass">
                                <h5>Emily Rodriguez</h5>
                                <div class="author-rating-glass">⭐⭐⭐⭐⭐</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- book an appointment section -->
    <section class="appointment-section-glass" id="book-appointment">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-6">
                    <img src="images/doctor-consultation.webp" class="img-fluid consultation-img-glass">
                </div>

                <div class="col-lg-6">
                    <h2 class="appointment-title-glass">Book an Online Consultation</h2>

                    <p class="appointment-subtitle-glass">
                        Connect with our certified doctors instantly from the comfort of your home.
                        Get professional healthcare advice and treatment plans.
                    </p>
                    <form action="book-appointment.php" method="POST">

                        <div class="appointment-card-glass">

                            <div class="row g-3">

                                <div class="col-md-6">
                                    <div class="form-group-glass">
                                        <label class="form-label-glass">Full Name</label>
                                        <input type="text" name="yourname" class="form-control-glass" placeholder="Enter your full name" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group-glass">
                                        <label class="form-label-glass">Email Address</label>
                                        <input type="email" name="emailaddress" class="form-control-glass" placeholder="Enter your email" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group-glass">
                                        <label class="form-label-glass">Preferred Date</label>
                                        <input type="date" name="appointmentdate" class="form-control-glass" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group-glass">
                                        <label class="form-label-glass">Department</label>
                                        <select name="department" class="form-control-glass" required>
                                            <option value="">Select Department</option>
                                            <option>General Medicine</option>
                                            <option>Cardiology</option>
                                            <option>Pediatrics</option>
                                            <option>Gynecology</option>
                                            <option>Orthopedics</option>
                                            <option>Dermatology</option>
                                            <option>Neurology</option>
                                            <option>Ophthalmology</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn-submit-glass">
                                        <i class="fa-solid fa-calendar-plus"></i>
                                        Book Appointment
                                    </button>
                                </div>

                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>

    <?php include __DIR__ . '/partials/footer.php'; ?>
    <!-- custom js -->
    <script src="js/products.js"></script>
    <script src="js/script.js"></script>
    <script>
        document.querySelector(".quick-close").onclick = () => {
            document.getElementById("quickModal").classList.remove("show");
        };
    </script>
    <script>
        const apptForm = document.querySelector(".appointment-section form");
        if (apptForm) {
            apptForm.addEventListener("submit", function () {
                const btn = this.querySelector("button[type='submit']");
                if (btn) btn.innerText = "Booking...";
            });
        }
    </script>
    <script>
        (() => {
            const thSlider = document.getElementById("thSlider");
            const thDotsContainer = document.getElementById("thDots");

            if (!thSlider || !thDotsContainer) return;

            const thSlides = Array.from(thSlider.querySelectorAll(".th-slide"));
            if (!thSlides.length) return;

            let thIndex = 0;
            let thInterval = null;
            let startX = 0;

            thSlides.forEach((_, i) => {
                const dot = document.createElement("button");
                dot.type = "button";
                dot.className = i === 0 ? "active" : "";
                dot.setAttribute("aria-label", `Show testimonial ${i + 1}`);
                dot.addEventListener("click", () => {
                    thIndex = i;
                    thShow(thIndex);
                    thStart();
                });
                thDotsContainer.appendChild(dot);
            });

            const thDots = Array.from(thDotsContainer.querySelectorAll("button"));

            function thShow(i) {
                thSlides.forEach((slide, idx) => {
                    const isActive = idx === i;
                    slide.classList.toggle("active", isActive);
                    thDots[idx].classList.toggle("active", isActive);
                    thDots[idx].setAttribute("aria-pressed", isActive ? "true" : "false");
                });
            }

            function thNext() {
                thIndex = (thIndex + 1) % thSlides.length;
                thShow(thIndex);
            }

            function thPrev() {
                thIndex = (thIndex - 1 + thSlides.length) % thSlides.length;
                thShow(thIndex);
            }

            function thStop() {
                if (thInterval) {
                    clearInterval(thInterval);
                    thInterval = null;
                }
            }

            function thStart() {
                thStop();
                thInterval = setInterval(thNext, 4500);
            }

            thSlider.addEventListener("mouseenter", thStop);
            thSlider.addEventListener("mouseleave", thStart);
            thSlider.addEventListener("focusin", thStop);
            thSlider.addEventListener("focusout", thStart);

            thSlider.addEventListener("touchstart", (event) => {
                startX = event.touches[0].clientX;
            }, { passive: true });

            thSlider.addEventListener("touchend", (event) => {
                const endX = event.changedTouches[0].clientX;
                const swipeDistance = startX - endX;

                if (swipeDistance > 50) {
                    thNext();
                    thStart();
                } else if (swipeDistance < -50) {
                    thPrev();
                    thStart();
                }
            }, { passive: true });

            document.addEventListener("visibilitychange", () => {
                if (document.hidden) {
                    thStop();
                } else {
                    thStart();
                }
            });

            thShow(thIndex);
            thStart();
        })();
    </script>
    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
