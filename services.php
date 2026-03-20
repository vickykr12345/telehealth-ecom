<?php require_once __DIR__ . '/auth.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services</title>
    <link rel="stylesheet" href="css/services-glass.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="services-glass-body">
<?php include __DIR__ . '/partials/header.php'; ?>

<main class="services-glass-main">
    <!-- Floating Background Elements -->
    <div class="floating-element"></div>
    <div class="floating-element"></div>
    <div class="floating-element"></div>

    <section class="hero-glass">
        <div class="container-glass">
            <span class="badge-glass">
                <i class="fa-solid fa-star"></i>
                Premium Healthcare Services
            </span>
            
            <h1 class="title-glass">
                Comprehensive Care,
                <span>Seamless Experience</span>
            </h1>
            
            <p class="subtitle-glass">
                We offer a complete range of healthcare services designed to meet your needs with 
                modern technology, expert care, and personalized attention every step of the way.
            </p>

            <div class="stats-grid">
                <div class="stat-card">
                    <span class="stat-number">500+</span>
                    <span class="stat-label">Certified Doctors</span>
                </div>
                <div class="stat-card">
                    <span class="stat-number">10k+</span>
                    <span class="stat-label">Patients Served</span>
                </div>
                <div class="stat-card">
                    <span class="stat-number">24/7</span>
                    <span class="stat-label">Support Available</span>
                </div>
                <div class="stat-card">
                    <span class="stat-number">99%</span>
                    <span class="stat-label">Satisfaction Rate</span>
                </div>
            </div>

            <div class="cta-section">
                <h2 class="cta-title">Ready to Get Started?</h2>
                <p class="cta-subtitle">Join thousands of satisfied patients who trust us with their healthcare needs</p>
                
                <div class="btn-group">
                    <a href="index.php#book-appointment" class="btn-glass btn-glass-primary">
                        <i class="fa-solid fa-calendar-check"></i>
                        Book Appointment
                    </a>
                    <a href="shop.php" class="btn-glass btn-glass-secondary">
                        <i class="fa-solid fa-bag-shopping"></i>
                        Shop Products
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="services-showcase">
        <div class="container-glass">
            <div class="services-grid">
                <!-- Online Consultation Card -->
                <article class="service-card">
                    <div class="service-icon">
                        <i class="fa-solid fa-video"></i>
                    </div>
                    
                    <h3 class="service-title">Online Consultation</h3>
                    <p class="service-desc">
                        Connect with our certified doctors from the comfort of your home through secure video consultations.
                    </p>
                    
                    <div class="features-list">
                        <div class="feature-item">
                            <i class="fa-solid fa-check"></i>
                            24/7 availability
                        </div>
                        <div class="feature-item">
                            <i class="fa-solid fa-check"></i>
                            Secure video calls
                        </div>
                        <div class="feature-item">
                            <i class="fa-solid fa-check"></i>
                            Prescription delivery
                        </div>
                    </div>
                </article>

                <!-- Diagnostic Services Card -->
                <article class="service-card">
                    <div class="service-icon">
                        <i class="fa-solid fa-stethoscope"></i>
                    </div>
                    
                    <h3 class="service-title">Diagnostic Services</h3>
                    <p class="service-desc">
                        Comprehensive diagnostic testing with state-of-the-art equipment and rapid results delivery.
                    </p>
                    
                    <div class="features-list">
                        <div class="feature-item">
                            <i class="fa-solid fa-check"></i>
                            Home sample collection
                        </div>
                        <div class="feature-item">
                            <i class="fa-solid fa-check"></i>
                            Advanced testing facilities
                        </div>
                        <div class="feature-item">
                            <i class="fa-solid fa-check"></i>
                            Digital reports
                        </div>
                    </div>
                </article>

                <!-- Pharmacy Services Card -->
                <article class="service-card">
                    <div class="service-icon">
                        <i class="fa-solid fa-pills"></i>
                    </div>
                    
                    <h3 class="service-title">Pharmacy Services</h3>
                    <p class="service-desc">
                        Quality medications delivered to your doorstep with expert consultation and advice.
                    </p>
                    
                    <div class="features-list">
                        <div class="feature-item">
                            <i class="fa-solid fa-check"></i>
                            Genuine medications
                        </div>
                        <div class="feature-item">
                            <i class="fa-solid fa-check"></i>
                            Fast delivery
                        </div>
                        <div class="feature-item">
                            <i class="fa-solid fa-check"></i>
                            Price transparency
                        </div>
                    </div>
                </article>

                <!-- Health Checkups Card -->
                <article class="service-card">
                    <div class="service-icon">
                        <i class="fa-solid fa-heart-pulse"></i>
                    </div>
                    
                    <h3 class="service-title">Health Checkups</h3>
                    <p class="service-desc">
                        Preventive health packages tailored to your age, lifestyle, and medical history.
                    </p>
                    
                    <div class="features-list">
                        <div class="feature-item">
                            <i class="fa-solid fa-check"></i>
                            Customized packages
                        </div>
                        <div class="feature-item">
                            <i class="fa-solid fa-check"></i>
                            Expert analysis
                        </div>
                        <div class="feature-item">
                            <i class="fa-solid fa-check"></i>
                            Follow-up care
                        </div>
                    </div>
                </article>

                <!-- Emergency Care Card -->
                <article class="service-card">
                    <div class="service-icon">
                        <i class="fa-solid fa-ambulance"></i>
                    </div>
                    
                    <h3 class="service-title">Emergency Care</h3>
                    <p class="service-desc">
                        Immediate medical attention and ambulance services available round the clock.
                    </p>
                    
                    <div class="features-list">
                        <div class="feature-item">
                            <i class="fa-solid fa-check"></i>
                            24/7 emergency response
                        </div>
                        <div class="feature-item">
                            <i class="fa-solid fa-check"></i>
                            Trained medical staff
                        </div>
                        <div class="feature-item">
                            <i class="fa-solid fa-check"></i>
                            Advanced life support
                        </div>
                    </div>
                </article>

                <!-- Telemedicine Card -->
                <article class="service-card">
                    <div class="service-icon">
                        <i class="fa-solid fa-mobile-screen"></i>
                    </div>
                    
                    <h3 class="service-title">Telemedicine</h3>
                    <p class="service-desc">
                        Remote healthcare services using digital communication tools for convenient medical consultations.
                    </p>
                    
                    <div class="features-list">
                        <div class="feature-item">
                            <i class="fa-solid fa-check"></i>
                            Mobile app support
                        </div>
                        <div class="feature-item">
                            <i class="fa-solid fa-check"></i>
                            Secure data handling
                        </div>
                        <div class="feature-item">
                            <i class="fa-solid fa-check"></i>
                            Multi-specialty access
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>
</main>
<?php include __DIR__ . '/partials/footer.php'; ?>
<script>
    // Enhanced glassmorphism effects
    document.addEventListener('DOMContentLoaded', function() {
        // Add floating animation to service cards
        const serviceCards = document.querySelectorAll('.service-card');
        serviceCards.forEach((card, index) => {
            card.style.animationDelay = `${index * 0.1}s`;
        });

        // Add interactive hover effects
        const glassElements = document.querySelectorAll('.service-card, .stat-card, .btn-glass');
        glassElements.forEach(element => {
            element.addEventListener('mousemove', (e) => {
                const rect = element.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                
                const centerX = rect.width / 2;
                const centerY = rect.height / 2;
                
                const rotateX = (y - centerY) / 10;
                const rotateY = (centerX - x) / 10;
                
                element.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(1.02)`;
            });
            
            element.addEventListener('mouseleave', () => {
                element.style.transform = 'perspective(1000px) rotateX(0deg) rotateY(0deg) scale(1)';
            });
        });
    });
</script>
