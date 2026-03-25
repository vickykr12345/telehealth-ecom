<?php
// Include database configuration for potential future use
// require_once 'config.php';

// You can add PHP logic here in the future, such as:
// - User session management
// - Dynamic content loading
// - Analytics tracking
// - A/B testing
// - Personalized recommendations

// Enhanced page-specific styles
$pageStyles = [
    'css/services-glass.css'
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Doctors - tele-helath</title>
    <!-- custom css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/services-glass.css">
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
    <section class="doctors-hero">
        <div class="container">
            <div class="row align-items-center gy-5">
                <!-- LEFT CONTENT -->
                <div class="col-lg-6">
                    <div class="hero-content">

                        <span class="hero-badge-glass">
                            <i class="fa-solid fa-user-doctor"></i>
                            Meet Our Specialists
                        </span>

                        <h1 class="hero-title-glass">
                            Expert Care <br>
                            <span>From Trusted Doctors</span>
                        </h1>

                        <p class="hero-subtitle-glass">
                            Our team of certified medical professionals provides personalized care and expert guidance to help you achieve optimal health.
                        </p>

                        <div class="hero-buttons-glass">
                            <a href="#book-appointment" class="btn-glass-enhanced btn-glass-primary-enhanced">
                                <i class="fa-solid fa-calendar-check"></i>
                                Book Appointment
                            </a>
                            <a href="services.php" class="btn-glass-enhanced btn-glass-secondary-enhanced">
                                <i class="fa-solid fa-stethoscope"></i>
                                Explore Services
                            </a>
                        </div>

                        <!-- stats -->
                        <div class="hero-stats-glass">

                            <div class="stat-card-glass">
                                <span class="stat-icon-glass">👨‍⚕️</span>
                                <span class="stat-number-glass">500+</span>
                                <span class="stat-label-glass">Specialists</span>
                            </div>

                            <div class="stat-card-glass">
                                <span class="stat-icon-glass">⏰</span>
                                <span class="stat-number-glass">24/7</span>
                                <span class="stat-label-glass">Availability</span>
                            </div>

                            <div class="stat-card-glass">
                                <span class="stat-icon-glass">❤️</span>
                                <span class="stat-number-glass">10k+</span>
                                <span class="stat-label-glass">Happy Patients</span>
                            </div>

                        </div>

                    </div>
                </div>

                <!-- RIGHT IMAGE -->
                <div class="col-lg-6">

                    <div class="hero-image-glass">

                        <img src="images/doctors.webp" alt="Our Doctors Team">

                        <!-- floating card 1 -->
                        <div class="floating-card-glass card1-glass">
                            🩺 General Medicine
                        </div>

                        <!-- floating card 2 -->
                        <div class="floating-card-glass card2-glass">
                            🧠 Specialist Care
                        </div>

                        <!-- floating card 3 -->
                        <div class="doctor-mini-card-glass">
                            <img src="images/doc1.webp" alt="Dr. Sarah Wilson">
                            <div class="doctor-mini-info-glass">
                                <h6>Dr. Sarah Wilson</h6>
                                <div class="rating">⭐ 4.9</div>
                                <div class="live">● Available Now</div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </section>

    <!-- doctors grid section -->
    <section class="doctors-section-glass reveal">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="section-title-glass">Our Medical Team</h2>
                    <p class="section-subtitle-glass">Meet our dedicated team of healthcare professionals committed to your well-being</p>
                </div>
            </div>

            <div class="doctors-grid-glass">
                <!-- Doctor 1 -->
                <div class="doctor-card-glass">
                    <div class="doctor-image-glass">
                        <img src="images/doc1.webp" alt="Dr. Sarah Wilson">
                        <div class="specialty-badge-glass">General Medicine</div>
                    </div>
                    <div class="doctor-details-glass">
                        <h3 class="doctor-name-glass">Dr. Sarah Wilson</h3>
                        <span class="doctor-specialty-glass">MBBS, MD (Internal Medicine)</span>
                        <div class="doctor-rating-glass">
                            <span class="stars-glass">⭐⭐⭐⭐⭐</span>
                            <span class="reviews-count-glass">(128 Reviews)</span>
                        </div>
                        <p class="doctor-experience-glass">15+ years experience in family medicine and preventive care</p>
                        <div class="doctor-actions-glass">
                            <a href="#book-appointment" class="btn-appointment-glass">
                                <i class="fa-solid fa-calendar-check"></i>
                                Book Appointment
                            </a>
                            <a href="#" class="btn-profile-glass">
                                <i class="fa-solid fa-user"></i>
                                View Profile
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Doctor 2 -->
                <div class="doctor-card-glass">
                    <div class="doctor-image-glass">
                        <img src="images/doc2.webp" alt="Dr. Michael Chen">
                        <div class="specialty-badge-glass">Cardiology</div>
                    </div>
                    <div class="doctor-details-glass">
                        <h3 class="doctor-name-glass">Dr. Michael Chen</h3>
                        <span class="doctor-specialty-glass">MBBS, DM (Cardiology)</span>
                        <div class="doctor-rating-glass">
                            <span class="stars-glass">⭐⭐⭐⭐⭐</span>
                            <span class="reviews-count-glass">(256 Reviews)</span>
                        </div>
                        <p class="doctor-experience-glass">12+ years experience in heart health and cardiovascular care</p>
                        <div class="doctor-actions-glass">
                            <a href="#book-appointment" class="btn-appointment-glass">
                                <i class="fa-solid fa-calendar-check"></i>
                                Book Appointment
                            </a>
                            <a href="#" class="btn-profile-glass">
                                <i class="fa-solid fa-user"></i>
                                View Profile
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Doctor 3 -->
                <div class="doctor-card-glass">
                    <div class="doctor-image-glass">
                        <img src="images/doc3.webp" alt="Dr. Emily Rodriguez">
                        <div class="specialty-badge-glass">Dermatology</div>
                    </div>
                    <div class="doctor-details-glass">
                        <h3 class="doctor-name-glass">Dr. Emily Rodriguez</h3>
                        <span class="doctor-specialty-glass">MBBS, MD (Dermatology)</span>
                        <div class="doctor-rating-glass">
                            <span class="stars-glass">⭐⭐⭐⭐⭐</span>
                            <span class="reviews-count-glass">(189 Reviews)</span>
                        </div>
                        <p class="doctor-experience-glass">10+ years experience in skin care and cosmetic dermatology</p>
                        <div class="doctor-actions-glass">
                            <a href="#book-appointment" class="btn-appointment-glass">
                                <i class="fa-solid fa-calendar-check"></i>
                                Book Appointment
                            </a>
                            <a href="#" class="btn-profile-glass">
                                <i class="fa-solid fa-user"></i>
                                View Profile
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Doctor 4 -->
                <div class="doctor-card-glass">
                    <div class="doctor-image-glass">
                        <img src="images/doc1.webp" alt="Dr. James Anderson">
                        <div class="specialty-badge-glass">Pediatrics</div>
                    </div>
                    <div class="doctor-details-glass">
                        <h3 class="doctor-name-glass">Dr. James Anderson</h3>
                        <span class="doctor-specialty-glass">MBBS, MD (Pediatrics)</span>
                        <div class="doctor-rating-glass">
                            <span class="stars-glass">⭐⭐⭐⭐⭐</span>
                            <span class="reviews-count-glass">(203 Reviews)</span>
                        </div>
                        <p class="doctor-experience-glass">18+ years experience in child health and development</p>
                        <div class="doctor-actions-glass">
                            <a href="#book-appointment" class="btn-appointment-glass">
                                <i class="fa-solid fa-calendar-check"></i>
                                Book Appointment
                            </a>
                            <a href="#" class="btn-profile-glass">
                                <i class="fa-solid fa-user"></i>
                                View Profile
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Doctor 5 -->
                <div class="doctor-card-glass">
                    <div class="doctor-image-glass">
                        <img src="images/doc2.webp" alt="Dr. Lisa Thompson">
                        <div class="specialty-badge-glass">Gynecology</div>
                    </div>
                    <div class="doctor-details-glass">
                        <h3 class="doctor-name-glass">Dr. Lisa Thompson</h3>
                        <span class="doctor-specialty-glass">MBBS, MD (Obstetrics & Gynecology)</span>
                        <div class="doctor-rating-glass">
                            <span class="stars-glass">⭐⭐⭐⭐⭐</span>
                            <span class="reviews-count-glass">(167 Reviews)</span>
                        </div>
                        <p class="doctor-experience-glass">14+ years experience in women's health and reproductive care</p>
                        <div class="doctor-actions-glass">
                            <a href="#book-appointment" class="btn-appointment-glass">
                                <i class="fa-solid fa-calendar-check"></i>
                                Book Appointment
                            </a>
                            <a href="#" class="btn-profile-glass">
                                <i class="fa-solid fa-user"></i>
                                View Profile
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Doctor 6 -->
                <div class="doctor-card-glass">
                    <div class="doctor-image-glass">
                        <img src="images/doc3.webp" alt="Dr. Robert Kim">
                        <div class="specialty-badge-glass">Orthopedics</div>
                    </div>
                    <div class="doctor-details-glass">
                        <h3 class="doctor-name-glass">Dr. Robert Kim</h3>
                        <span class="doctor-specialty-glass">MBBS, MS (Orthopedics)</span>
                        <div class="doctor-rating-glass">
                            <span class="stars-glass">⭐⭐⭐⭐⭐</span>
                            <span class="reviews-count-glass">(142 Reviews)</span>
                        </div>
                        <p class="doctor-experience-glass">16+ years experience in bone health and sports medicine</p>
                        <div class="doctor-actions-glass">
                            <a href="#book-appointment" class="btn-appointment-glass">
                                <i class="fa-solid fa-calendar-check"></i>
                                Book Appointment
                            </a>
                            <a href="#" class="btn-profile-glass">
                                <i class="fa-solid fa-user"></i>
                                View Profile
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- specialties section -->
    <section class="specialties-section-glass">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="section-title-glass">Medical Specialties</h2>
                    <p class="section-subtitle-glass">Comprehensive care across all major medical disciplines</p>
                </div>
            </div>

            <div class="specialties-grid-glass">
                <div class="specialty-card-glass">
                    <div class="specialty-icon-glass">🩺</div>
                    <h3 class="specialty-title-glass">General Medicine</h3>
                    <p class="specialty-desc-glass">Comprehensive primary care for all ages</p>
                </div>

                <div class="specialty-card-glass">
                    <div class="specialty-icon-glass">❤️</div>
                    <h3 class="specialty-title-glass">Cardiology</h3>
                    <p class="specialty-desc-glass">Heart health and cardiovascular care</p>
                </div>

                <div class="specialty-card-glass">
                    <div class="specialty-icon-glass">👶</div>
                    <h3 class="specialty-title-glass">Pediatrics</h3>
                    <p class="specialty-desc-glass">Specialized care for children and adolescents</p>
                </div>

                <div class="specialty-card-glass">
                    <div class="specialty-icon-glass">👩‍⚕️</div>
                    <h3 class="specialty-title-glass">Gynecology</h3>
                    <p class="specialty-desc-glass">Women's health and reproductive care</p>
                </div>

                <div class="specialty-card-glass">
                    <div class="specialty-icon-glass">🦴</div>
                    <h3 class="specialty-title-glass">Orthopedics</h3>
                    <p class="specialty-desc-glass">Bone health and musculoskeletal care</p>
                </div>

                <div class="specialty-card-glass">
                    <div class="specialty-icon-glass">🔬</div>
                    <h3 class="specialty-title-glass">Dermatology</h3>
                    <p class="specialty-desc-glass">Skin health and cosmetic care</p>
                </div>

                <div class="specialty-card-glass">
                    <div class="specialty-icon-glass">🧠</div>
                    <h3 class="specialty-title-glass">Neurology</h3>
                    <p class="specialty-desc-glass">Brain and nervous system care</p>
                </div>

                <div class="specialty-card-glass">
                    <div class="specialty-icon-glass">👁️</div>
                    <h3 class="specialty-title-glass">Ophthalmology</h3>
                    <p class="specialty-desc-glass">Eye health and vision care</p>
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

    <?php include __DIR__ . '/partials/footer.php'; ?>
    
    <!-- custom js -->
    <script src="js/script.js"></script>
    
    <script>
        // Add smooth scrolling for appointment section
        document.querySelector(".appointment-section form").addEventListener("submit", function() {
            const btn = this.querySelector("button[type='submit']");
            if (btn) btn.innerText = "Booking...";
        });
    </script>
    
    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>