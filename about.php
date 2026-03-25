<?php require_once __DIR__ . '/auth.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/about.css">
    <link rel="stylesheet" href="css/about-services.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="th-about-body">
<?php include __DIR__ . '/partials/header.php'; ?>

<main class="th-about-page">
    <section class="th-about-hero">
        <div class="th-about-wrap">
            <div class="th-about-hero__shell">
                <div class="th-about-hero__content">
                    <span class="th-about-eyebrow">Who We Are</span>
                    <h1 class="th-about-title">
                        Modern Healthcare,
                        <span>Built Around People</span>
                    </h1>

                    <p class="th-about-copy">
                        Tele-Health is designed to simplify how patients connect with trusted doctors,
                        access treatment plans, and manage care in one secure digital experience.
                    </p>

                    <p class="th-about-copy th-about-copy--muted">
                        We blend medical expertise, thoughtful product design, and dependable support
                        so healthcare feels clear, calm, and accessible from the very first click.
                    </p>

                    <div class="th-about-highlight-list">
                        <div class="th-about-highlight-item">
                            <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                            <span>500+ verified doctors across high-demand specialties</span>
                        </div>
                        <div class="th-about-highlight-item">
                            <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                            <span>10,000+ patient journeys supported with confidence</span>
                        </div>
                        <div class="th-about-highlight-item">
                            <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                            <span>Fast booking, secure records, and reliable follow-up</span>
                        </div>
                    </div>

                    <div class="th-about-action-row">
                        <a href="services" class="th-about-button th-about-button--primary">Explore Services</a>
                        <a href="contact" class="th-about-button th-about-button--secondary">Contact Us</a>
                    </div>
                </div>

                <div class="th-about-hero__visual">
                    <div class="th-about-media-card">
                        <img
                            src="images/doctor-consultation.webp"
                            alt="Doctor consulting with a patient in a modern care setting"
                            class="th-about-media-card__image"
                            loading="lazy"
                        >

                        <div class="th-about-floating-card th-about-floating-card--top">
                            <span class="th-about-floating-card__label">Care Network</span>
                            <strong class="th-about-floating-card__value">38 Cities Connected</strong>
                        </div>

                        <div class="th-about-floating-card th-about-floating-card--bottom">
                            <span class="th-about-floating-card__label">Patient Satisfaction</span>
                            <strong class="th-about-floating-card__value">99% Positive Feedback</strong>
                        </div>
                    </div>

                    <div class="th-about-hero-metrics">
                        <article class="th-about-metric-card">
                            <span class="th-about-metric-card__value">12 min</span>
                            <p class="th-about-metric-card__text">Average time to book an appointment</p>
                        </article>
                        <article class="th-about-metric-card">
                            <span class="th-about-metric-card__value">24/7</span>
                            <p class="th-about-metric-card__text">Support for bookings, guidance, and care updates</p>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="th-about-proof">
        <div class="th-about-wrap">
            <div class="th-about-proof-grid">
                <article class="th-about-proof-card">
                    <span class="th-about-proof-card__value">500+</span>
                    <p class="th-about-proof-card__label">Verified Doctors</p>
                </article>
                <article class="th-about-proof-card">
                    <span class="th-about-proof-card__value">10k+</span>
                    <p class="th-about-proof-card__label">Patients Helped</p>
                </article>
                <article class="th-about-proof-card">
                    <span class="th-about-proof-card__value">24/7</span>
                    <p class="th-about-proof-card__label">Always-On Support</p>
                </article>
                <article class="th-about-proof-card">
                    <span class="th-about-proof-card__value">99%</span>
                    <p class="th-about-proof-card__label">Satisfaction Score</p>
                </article>
            </div>
        </div>
    </section>

    <section class="th-about-story">
        <div class="th-about-wrap">
            <div class="th-about-section-head">
                <span class="th-about-section-head__eyebrow">Our Story</span>
                <h2 class="th-about-section-head__title">Healthcare that feels more human and less complicated.</h2>
            </div>

            <div class="th-about-story-grid">
                <article class="th-about-panel th-about-panel--story">
                    <p class="th-about-panel__copy">
                        Tele-Health started with one simple belief: access to quality healthcare should
                        feel easy, not exhausting. Too many patients were losing time, clarity, and trust
                        while trying to book the right care.
                    </p>
                    <p class="th-about-panel__copy">
                        We built a platform that connects expert doctors, faster scheduling, secure digital
                        workflows, and patient-friendly design into one experience that feels modern from end to end.
                    </p>

                    <div class="th-about-story-points">
                        <div class="th-about-story-point">
                            <i class="fa-solid fa-shield-heart" aria-hidden="true"></i>
                            <span>Secure and compliant patient experience</span>
                        </div>
                        <div class="th-about-story-point">
                            <i class="fa-solid fa-bolt" aria-hidden="true"></i>
                            <span>Faster access to trusted specialists</span>
                        </div>
                        <div class="th-about-story-point">
                            <i class="fa-solid fa-hand-holding-heart" aria-hidden="true"></i>
                            <span>Designed around comfort, clarity, and support</span>
                        </div>
                    </div>
                </article>

                <div class="th-about-story-stack">
                    <article class="th-about-panel th-about-panel--compact">
                        <span class="th-about-panel__kicker">Mission</span>
                        <h3 class="th-about-panel__title">Make healthcare simple, accessible, and reliable through technology.</h3>
                    </article>

                    <article class="th-about-panel th-about-panel--compact">
                        <span class="th-about-panel__kicker">Vision</span>
                        <h3 class="th-about-panel__title">Create a world where quality care is available without friction.</h3>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <section class="th-about-process">
        <div class="th-about-wrap">
            <div class="th-about-section-head th-about-section-head--center">
                <span class="th-about-section-head__eyebrow">How It Works</span>
                <h2 class="th-about-section-head__title">A calm, guided flow from booking to treatment.</h2>
            </div>

            <div class="th-about-process-grid">
                <article class="th-about-process-card">
                    <div class="th-about-process-card__icon">
                        <i class="fa-solid fa-stethoscope" aria-hidden="true"></i>
                    </div>
                    <span class="th-about-process-card__step">Step 01</span>
                    <h3 class="th-about-process-card__title">Choose a Service</h3>
                    <p class="th-about-process-card__text">Pick the consultation or treatment that matches your current needs.</p>
                </article>

                <article class="th-about-process-card">
                    <div class="th-about-process-card__icon">
                        <i class="fa-regular fa-calendar-check" aria-hidden="true"></i>
                    </div>
                    <span class="th-about-process-card__step">Step 02</span>
                    <h3 class="th-about-process-card__title">Book in Minutes</h3>
                    <p class="th-about-process-card__text">Schedule with verified doctors through a faster and more transparent flow.</p>
                </article>

                <article class="th-about-process-card">
                    <div class="th-about-process-card__icon">
                        <i class="fa-solid fa-heart-pulse" aria-hidden="true"></i>
                    </div>
                    <span class="th-about-process-card__step">Step 03</span>
                    <h3 class="th-about-process-card__title">Receive Care</h3>
                    <p class="th-about-process-card__text">Get expert consultation, treatment guidance, and support without delays.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="th-about-specialties">
        <div class="th-about-wrap">
            <div class="th-about-section-head">
                <span class="th-about-section-head__eyebrow">Specialties</span>
                <h2 class="th-about-section-head__title">Care pathways tailored to real patient needs.</h2>
            </div>

            <div class="th-about-tabs">
                <div class="th-about-tabs__nav" role="tablist" aria-label="Treatment specialties">
                    <button
                        type="button"
                        class="th-about-tab th-about-tab--active"
                        data-th-about-tab-trigger="general"
                        role="tab"
                        aria-selected="true"
                        aria-controls="th-about-panel-general"
                        id="th-about-tab-general"
                    >
                        General Care
                    </button>
                    <button
                        type="button"
                        class="th-about-tab"
                        data-th-about-tab-trigger="pediatric"
                        role="tab"
                        aria-selected="false"
                        aria-controls="th-about-panel-pediatric"
                        id="th-about-tab-pediatric"
                    >
                        Pediatric
                    </button>
                    <button
                        type="button"
                        class="th-about-tab"
                        data-th-about-tab-trigger="neuro"
                        role="tab"
                        aria-selected="false"
                        aria-controls="th-about-panel-neuro"
                        id="th-about-tab-neuro"
                    >
                        Neurology
                    </button>
                    <button
                        type="button"
                        class="th-about-tab"
                        data-th-about-tab-trigger="women"
                        role="tab"
                        aria-selected="false"
                        aria-controls="th-about-panel-women"
                        id="th-about-tab-women"
                    >
                        Women's Care
                    </button>
                </div>

                <div class="th-about-tabs__content">
                    <article
                        class="th-about-tab-panel th-about-tab-panel--active"
                        id="th-about-panel-general"
                        data-th-about-tab-panel="general"
                        role="tabpanel"
                        aria-labelledby="th-about-tab-general"
                    >
                        <span class="th-about-tab-panel__eyebrow">General Treatments</span>
                        <h3 class="th-about-tab-panel__title">Everyday healthcare with better speed, continuity, and trust.</h3>
                        <p class="th-about-tab-panel__text">
                            From primary consultations to ongoing treatment plans, patients get a smoother path
                            to care with less waiting and better follow-up.
                        </p>
                        <div class="service-card-grid">
                            <article class="service-card animate-in">
                                <div class="service-icon">
                                    <i class="fa-solid fa-heart-pulse"></i>
                                </div>
                                <h3 class="service-title">Preventive Checkups</h3>
                                <p class="service-desc">
                                    Routine care, guidance, and wellness tracking in one flow.
                                </p>
                            </article>

                            <article class="service-card animate-in">
                                <div class="service-icon">
                                    <i class="fa-solid fa-database"></i>
                                </div>
                                <h3 class="service-title">Digital Records</h3>
                                <p class="service-desc">
                                    Secure access to appointments, prescriptions, and treatment updates.
                                </p>
                            </article>

                            <article class="service-card animate-in">
                                <div class="service-icon">
                                    <i class="fa-solid fa-comment-medical"></i>
                                </div>
                                <h3 class="service-title">Smart Follow-up</h3>
                                <p class="service-desc">
                                    Patients stay connected to the next step after every consultation.
                                </p>
                            </article>
                        </div>
                    </article>

                    <article
                        class="th-about-tab-panel"
                        id="th-about-panel-pediatric"
                        data-th-about-tab-panel="pediatric"
                        role="tabpanel"
                        aria-labelledby="th-about-tab-pediatric"
                        hidden
                    >
                        <span class="th-about-tab-panel__eyebrow">Pediatric Care</span>
                        <h3 class="th-about-tab-panel__title">Child-focused healthcare designed for reassurance and clarity.</h3>
                        <p class="th-about-tab-panel__text">
                            Parents can book with confidence, access ongoing advice, and manage care for growing families
                            through a friendlier and more supportive experience.
                        </p>
                        <div class="service-card-grid">
                            <article class="service-card animate-in">
                                <div class="service-icon">
                                    <i class="fa-solid fa-child"></i>
                                </div>
                                <h3 class="service-title">Growth Monitoring</h3>
                                <p class="service-desc">
                                    Age-aware care plans and routine developmental guidance.
                                </p>
                            </article>

                            <article class="service-card animate-in">
                                <div class="service-icon">
                                    <i class="fa-solid fa-users"></i>
                                </div>
                                <h3 class="service-title">Family Support</h3>
                                <p class="service-desc">
                                    Clear communication for appointments, questions, and recovery steps.
                                </p>
                            </article>

                            <article class="service-card animate-in">
                                <div class="service-icon">
                                    <i class="fa-solid fa-user-md"></i>
                                </div>
                                <h3 class="service-title">Trusted Specialists</h3>
                                <p class="service-desc">
                                    Access to doctors who understand pediatric needs deeply.
                                </p>
                            </article>
                        </div>
                    </article>

                    <article
                        class="th-about-tab-panel"
                        id="th-about-panel-neuro"
                        data-th-about-tab-panel="neuro"
                        role="tabpanel"
                        aria-labelledby="th-about-tab-neuro"
                        hidden
                    >
                        <span class="th-about-tab-panel__eyebrow">Neurology</span>
                        <h3 class="th-about-tab-panel__title">Specialist-led neurological care with stronger coordination.</h3>
                        <p class="th-about-tab-panel__text">
                            Neurology pathways need precision and consistency. We support both with easier scheduling,
                            careful documentation, and guided treatment visibility.
                        </p>
                        <div class="th-about-service-grid">
                            <div class="th-about-service-card">
                                <strong>Preventive Checkups</strong>
                                <span>Routine care, guidance, and wellness tracking in one flow.</span>
                            </div>
                            <div class="th-about-service-card">
                                <strong>Digital Records</strong>
                                <span>Secure access to appointments, prescriptions, and treatment updates.</span>
                            </div>
                            <div class="th-about-service-card">
                                <strong>Smart Follow-up</strong>
                                <span>Patients stay connected to the next step after every consultation.</span>
                            </div>
                        </div>
                    </article>

                    <article
                        class="th-about-tab-panel"
                        id="th-about-panel-women"
                        data-th-about-tab-panel="women"
                        role="tabpanel"
                        aria-labelledby="th-about-tab-women"
                        hidden
                    >
                        <span class="th-about-tab-panel__eyebrow">Women's Care</span>
                        <h3 class="th-about-tab-panel__title">Supportive, private, and specialized care for every life stage.</h3>
                        <p class="th-about-tab-panel__text">
                            Women's healthcare should feel respectful, informed, and easy to navigate. Our platform
                            helps patients connect with the right doctors while keeping every step private and seamless.
                        </p>
                        <div class="th-about-service-grid">
                            <div class="th-about-service-card">
                                <strong>Growth Monitoring</strong>
                                <span>Age-aware care plans and routine developmental guidance.</span>
                            </div>
                            <div class="th-about-service-card">
                                <strong>Family Support</strong>
                                <span>Clear communication for appointments, questions, and recovery steps.</span>
                            </div>
                            <div class="th-about-service-card">
                                <strong>Trusted Specialists</strong>
                                <span>Access to doctors who understand pediatric needs deeply.</span>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <section class="th-about-labs">
        <div class="th-about-wrap">
            <div class="th-about-section-head">
                <span class="th-about-section-head__eyebrow">Diagnostics</span>
                <h2 class="th-about-section-head__title">Hospital-grade labs and equipment that support confident decisions.</h2>
            </div>

            <div class="th-about-lab-grid">
                <article class="th-about-lab-card">
                    <img src="images/lab1.webp" alt="Modern clinical chemistry laboratory" class="th-about-lab-card__image" loading="lazy">
                    <div class="th-about-lab-card__overlay">
                        <span class="th-about-lab-card__tag">Clinical Chemistry</span>
                        <h3 class="th-about-lab-card__title">Fast, accurate testing with modern diagnostic support.</h3>
                    </div>
                </article>

                <article class="th-about-lab-card">
                    <img src="images/lab2.webp" alt="Clinical microbiology laboratory analysis" class="th-about-lab-card__image" loading="lazy">
                    <div class="th-about-lab-card__overlay">
                        <span class="th-about-lab-card__tag">Clinical Microbiology</span>
                        <h3 class="th-about-lab-card__title">Advanced lab capability for detailed and dependable results.</h3>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <section class="th-about-team">
        <div class="th-about-wrap">
            <div class="th-about-section-head th-about-section-head--center">
                <span class="th-about-section-head__eyebrow">Our Specialists</span>
                <h2 class="th-about-section-head__title">Experienced doctors backed by a patient-first platform.</h2>
            </div>

            <div class="th-about-team-grid">
                <article class="th-about-doctor-card">
                    <div class="th-about-doctor-card__media">
                        <img src="images/doc1.webp" alt="Lucas Murray, Dental Specialist" class="th-about-doctor-card__image" loading="lazy">
                    </div>
                    <div class="th-about-doctor-card__body">
                        <h3 class="th-about-doctor-card__name">Lucas Murray</h3>
                        <p class="th-about-doctor-card__role">Dental Specialist</p>
                    </div>
                </article>

                <article class="th-about-doctor-card">
                    <div class="th-about-doctor-card__media">
                        <img src="images/doc2.webp" alt="Tommy Gould, Heart Specialist" class="th-about-doctor-card__image" loading="lazy">
                    </div>
                    <div class="th-about-doctor-card__body">
                        <h3 class="th-about-doctor-card__name">Tommy Gould</h3>
                        <p class="th-about-doctor-card__role">Heart Specialist</p>
                    </div>
                </article>

                <article class="th-about-doctor-card">
                    <div class="th-about-doctor-card__media">
                        <img src="images/doc3.webp" alt="Kyle Macdonald, Skin Specialist" class="th-about-doctor-card__image" loading="lazy">
                    </div>
                    <div class="th-about-doctor-card__body">
                        <h3 class="th-about-doctor-card__name">Kyle Macdonald</h3>
                        <p class="th-about-doctor-card__role">Skin Specialist</p>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <section class="th-about-cta">
        <div class="th-about-wrap">
            <div class="th-about-cta-card">
                <div class="th-about-cta-card__content">
                    <span class="th-about-section-head__eyebrow">Let's Build Better Care</span>
                    <h2 class="th-about-cta-card__title">A more polished healthcare experience starts with one appointment.</h2>
                    <p class="th-about-cta-card__text">
                        Explore services, meet trusted specialists, and move through a calmer healthcare journey from day one.
                    </p>
                </div>
                <div class="th-about-cta-card__actions">
                    <a href="index.php#book-appointment" class="th-about-button th-about-button--primary">Book Appointment</a>
                    <a href="contact" class="th-about-button th-about-button--secondary">Talk to Us</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include __DIR__ . '/partials/footer.php'; ?>

<script src="js/script.js"></script>
<script>
// Highly optimized JavaScript with performance improvements
document.addEventListener("DOMContentLoaded", function () {
  const aboutTabButtons = document.querySelectorAll("[data-th-about-tab-trigger]");
  const aboutTabPanels = document.querySelectorAll("[data-th-about-tab-panel]");

  // Performance optimized tab switching - minimal DOM operations
  aboutTabButtons.forEach((aboutTabButton) => {
    aboutTabButton.addEventListener("click", function () {
      const aboutTarget = aboutTabButton.getAttribute("data-th-about-tab-trigger");
      
      // Use classList for batch operations
      aboutTabButtons.forEach(btn => {
        btn.classList.remove("th-about-tab--active");
        btn.setAttribute("aria-selected", "false");
      });
      
      aboutTabButton.classList.add("th-about-tab--active");
      aboutTabButton.setAttribute("aria-selected", "true");

      // Update panels efficiently
      aboutTabPanels.forEach((panel) => {
        const matches = panel.getAttribute("data-th-about-tab-panel") === aboutTarget;
        panel.classList.toggle("th-about-tab-panel--active", matches);
        panel.hidden = !matches;
      });
    });
  });

  // Optimized intersection observer for service cards with batch processing
  const observerOptions = {
    root: null,
    rootMargin: '0px',
    threshold: 0.1
  };

  const observer = new IntersectionObserver((entries) => {
    // Use requestAnimationFrame for smooth animations
    requestAnimationFrame(() => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add("animate-in");
          observer.unobserve(entry.target);
        }
      });
    });
  }, observerOptions);

  // Observe service cards - CSS handles staggered animation via nth-child
  const serviceCards = document.querySelectorAll(".service-card");
  serviceCards.forEach(card => {
    observer.observe(card);
  });

  // Cleanup function
  window.addEventListener('beforeunload', () => {
    observer.disconnect();
  });
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
