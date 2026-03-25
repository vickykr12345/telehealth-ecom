<?php require_once __DIR__ . '/auth.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms & Conditions - Telehealth Services</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        .legal-wrap{padding:70px 0 40px}
        .legal-card{max-width:980px;margin:0 auto;background:rgba(255,255,255,.78);backdrop-filter:blur(18px);border:1px solid rgba(148,163,184,.25);border-radius:26px;box-shadow:0 30px 90px rgba(15,23,42,.12);padding:44px 34px}
        .legal-title{font-weight:900;letter-spacing:.06em;text-transform:uppercase;margin:0 0 10px}
        .legal-sub{color:#475569;font-weight:700;margin-bottom:22px}
        .legal-card h4{margin-top:18px;font-weight:900}
        .legal-card p,.legal-card li{color:#475569;font-weight:600;line-height:1.7}
        .legal-card ul{padding-left:18px}
        @media(max-width:576px){.legal-card{padding:28px 18px}}
    </style>
</head>
<body>
<?php include __DIR__ . '/partials/header.php'; ?>

<section class="legal-wrap">
    <div class="container">
        <div class="legal-card">
            <h2 class="legal-title">Terms & Conditions</h2>
            <p class="legal-sub">Terms and Conditions for Telehealth Medicine Services</p>

            <h4>1. Acceptance of Terms</h4>
            <p>By accessing or using our telehealth platform, you agree to be bound by these Terms and Conditions. If you do not agree, please do not use our services. These terms govern your use of our website, mobile application, and all telehealth consultations, prescriptions, and medical products offered through our platform.</p>

            <h4>2. Scope of Services</h4>
            <p>Our platform provides telehealth services including but not limited to:</p>
            <ul>
                <li>Virtual medical consultations with licensed healthcare providers</li>
                <li>Online prescription services for approved medications</li>
                <li>Medical advice, diagnosis, and treatment recommendations</li>
                <li>Health monitoring and follow-up care</li>
                <li>Sale and delivery of medical products and equipment</li>
            </ul>

            <h4>3. No Emergency Services</h4>
            <p><strong>IMPORTANT:</strong> Our telehealth services are not for medical emergencies. If you are experiencing a life-threatening condition, call your local emergency number immediately or go to the nearest emergency room. Do not rely on our platform for urgent or emergency medical care.</p>

            <h4>4. Medical Disclaimer</h4>
            <p>Our healthcare providers offer medical advice based on the information you provide during consultations. While we strive for accuracy, we cannot guarantee that all diagnoses or treatments will be effective. Medical information provided is not a substitute for professional medical care. You should consult with a healthcare provider in person for any serious or persistent medical conditions.</p>

            <h4>5. User Responsibilities</h4>
            <p>You agree to provide accurate, complete, and current medical information during consultations, including:</p>
            <ul>
                <li>Your full medical history</li>
                <li>Current medications and supplements</li>
                <li>Allergies and adverse reactions</li>
                <li>Recent test results and diagnoses</li>
                <li>Any other relevant health information</li>
            </ul>
            <p>Withholding or misrepresenting information may affect the quality of care and could be dangerous to your health.</p>

            <h4>6. Prescription Policy</h4>
            <ul>
                <li>Prescriptions are issued at the sole discretion of our licensed healthcare providers after evaluation.</li>
                <li>We comply with all applicable laws regarding electronic prescribing (e-prescribing).</li>
                <li>Controlled substances may have additional restrictions and may not be available through our platform depending on local regulations.</li>
                <li>You are responsible for informing us of any medication allergies or contraindications.</li>
                <li>Refills require a new consultation unless otherwise specified by your provider.</li>
            </ul>

            <h4>7. Privacy and Data Protection</h4>
            <p>We take your health information privacy seriously. All medical data is protected in accordance with applicable healthcare privacy laws (including HIPAA where applicable). By using our services, you consent to the collection, use, and storage of your personal and medical information as described in our Privacy Policy. We will not share your health information without your consent except as required by law.</p>

            <h4>8. Technology Requirements</h4>
            <p>To use our telehealth services, you need:</p>
            <ul>
                <li>A stable internet connection</li>
                <li>A device (computer, smartphone, or tablet) with camera and microphone</li>
                <li>A compatible web browser or mobile application</li>
                <li>Basic technical skills to navigate the platform</li>
            </ul>
            <p>We are not responsible for technical issues on your end that may disrupt consultations.</p>

            <h4>9. Payment and Billing</h4>
            <ul>
                <li>Consultation fees and product prices are clearly displayed before payment.</li>
                <li>Payment is required prior to most consultations unless covered by insurance.</li>
                <li>We accept various payment methods as indicated on our checkout page.</li>
                <li>Refunds are subject to our Return and Refund Policy.</li>
                <li>Insurance coverage varies; you are responsible for verifying your insurance benefits.</li>
            </ul>

            <h4>10. Intellectual Property</h4>
            <p>All content on this platform, including medical information, articles, videos, and software, is owned by us or our licensors. You may access and use this content for personal, non-commercial purposes. You may not reproduce, distribute, or create derivative works without our written permission.</p>

            <h4>11. Prohibited Conduct</h4>
            <p>You agree not to:</p>
            <ul>
                <li>Use our services for any illegal purpose</li>
                <li>Attempt to bypass security measures or access restricted areas</li>
                <li>Submit false or misleading information</li>
                <li>Harass, threaten, or abuse our staff or other users</li>
                <li>Use automated tools to access our platform without permission</li>
                <li>Share your account credentials with others</li>
            </ul>

            <h4>12. Termination</h4>
            <p>We reserve the right to suspend or terminate your account and access to our services at our sole discretion, without notice, if we believe you have violated these Terms or for any other reason. You may terminate your account at any time by contacting us.</p>

            <h4>13. Limitation of Liability</h4>
            <p>To the maximum extent permitted by law, we shall not be liable for any indirect, incidental, special, consequential, or punitive damages arising from your use of our services. Our total liability shall not exceed the amount you paid us in the past six months. Some jurisdictions do not allow limitation of liability, so this may not apply to you.</p>

            <h4>14. Indemnification</h4>
            <p>You agree to indemnify and hold harmless our company, officers, employees, agents, and healthcare providers from any claims, damages, or expenses arising from your use of our services, violation of these Terms, or provision of inaccurate information.</p>

            <h4>15. Governing Law</h4>
            <p>These Terms shall be governed by and construed in accordance with the laws of the jurisdiction in which our company operates, without regard to its conflict of law principles. Any disputes shall be resolved in the courts of that jurisdiction.</p>

            <h4>16. Changes to Terms</h4>
            <p>We may update these Terms from time to time. The updated version will be indicated by an updated "Last Updated" date. Your continued use of our services after changes constitutes your acceptance of the new Terms. We encourage you to review these Terms periodically.</p>

            <h4>17. Severability</h4>
            <p>If any provision of these Terms is found to be unenforceable, the remaining provisions shall remain in full force and effect.</p>

            <h4>18. Contact Information</h4>
            <p>If you have any questions about these Terms and Conditions, please contact us through our Contact page or at the contact information provided on our website.</p>

            <p style="margin-top: 30px; font-size: 0.9em; color: #64748b;"><em>Last Updated: March 2025</em></p>
        </div>
    </div>
</section>

<?php include __DIR__ . '/partials/footer.php'; ?>
<script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
