<?php require_once __DIR__ . '/auth.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy</title>
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
            <h2 class="legal-title">Privacy Policy</h2>
            <p class="legal-sub">Protecting your health information is our priority. This policy explains how we collect, use, and safeguard your personal and medical data.</p>

            <h4>1. Introduction and Scope</h4>
            <p>This Privacy Policy applies to all users of Telehealth Medicine's website, mobile application, and telehealth services. We are committed to protecting your privacy, especially your Protected Health Information (PHI), in compliance with applicable healthcare privacy laws including the Health Insurance Portability and Accountability Act (HIPAA) where applicable, and other data protection regulations.</p>
            <p>By using our services, you consent to the practices described in this policy. If you do not agree, please do not use our platform.</p>

            <h4>2. Types of Information We Collect</h4>
            <p><strong>Personal Information:</strong></p>
            <ul>
                <li>Name, email address, phone number, and physical address</li>
                <li>Date of birth, gender, and other demographic information</li>
                <li>Login credentials and account preferences</li>
                <li>Payment information (processed securely through PCI-compliant providers)</li>
            </ul>
            <p><strong>Medical/Health Information (Protected Health Information):</strong></p>
            <ul>
                <li>Medical history, current conditions, and symptoms</li>
                <li>Medications, allergies, and adverse reactions</li>
                <li>Diagnoses, treatment plans, and clinical notes</li>
                <li>Lab results, imaging reports, and test outcomes</li>
                <li>Prescription information and pharmacy records</li>
                <li>Consultation recordings, chat logs, and communications with healthcare providers</li>
                <li>Insurance information and coverage details</li>
            </ul>
            <p><strong>Technical Information:</strong></p>
            <ul>
                <li>IP address, device type, browser type, and operating system</li>
                <li>Usage data, pages visited, time spent on site</li>
                <li>Location data (if permitted by your device settings)</li>
                <li>Cookies and similar tracking technologies (see our Cookie Policy section)</li>
            </ul>

            <h4>3. How We Use Your Information</h4>
            <p>We use your information for the following purposes:</p>
            <ul>
                <li><strong>Service Delivery:</strong> To provide telehealth consultations, medical advice, prescriptions, and healthcare services</li>
                <li><strong>Care Coordination:</strong> To facilitate communication between you and your healthcare providers, maintain your medical records, and ensure continuity of care</li>
                <li><strong>Account Management:</strong> To create and manage your account, verify your identity, and provide access to your health information</li>
                <li><strong>Order Processing:</strong> To fulfill medical product orders, process payments, and manage shipping</li>
                <li><strong>Communication:</strong> To send appointment reminders, treatment updates, prescription notifications, and important service announcements</li>
                <li><strong>Quality Improvement:</strong> To review and improve our services, train healthcare providers, and conduct research (de-identified data only)</li>
                <li><strong>Legal Compliance:</strong> To comply with healthcare regulations, maintain required records, and respond to legal requests</li>
                <li><strong>Marketing:</strong> With your consent, to send promotional content about our services and health-related information (you may opt out at any time)</li>
            </ul>

            <h4>4. Sharing and Disclosure of Your Information</h4>
            <p>We do not sell your personal or medical information. We may share your information only under the following circumstances:</p>
            <ul>
                <li><strong>Healthcare Providers:</strong> With your consent, we share your medical information with the healthcare providers involved in your care, including referring physicians and specialists</li>
                <li><strong>Treatment and Operations:</strong> As necessary for treatment, payment, and healthcare operations (TPO) under HIPAA</li>
                <li><strong>Business Associates:</strong> With third-party service providers who assist in delivering our services (e.g., payment processors, IT support, transcription services) under strict confidentiality agreements</li>
                <li><strong>Legal Requirements:</strong> When required by law, court order, or government agency, or to protect our rights, safety, or property</li>
                <li><strong>Emergency Situations:</strong> To prevent serious harm or in emergency medical situations where you are unable to provide consent</li>
                <li><strong>Public Health:</strong> For public health activities such as disease reporting or health oversight as permitted by law</li>
                <li><strong>Insurance:</strong> With your consent or as necessary for insurance claims processing and coverage verification</li>
            </ul>

            <h4>5. Data Security Measures</h4>
            <p>We implement industry-standard security measures to protect your information:</p>
            <ul>
                <li>Encryption of data in transit using SSL/TLS protocols</li>
                <li>Secure storage with encryption at rest for sensitive medical data</li>
                <li>Access controls limiting data access to authorized personnel only</li>
                <li>Regular security audits and vulnerability assessments</li>
                <li>Employee training on privacy and security protocols</li>
                <li>HIPAA-compliant systems and Business Associate Agreements (BAAs) with all service providers handling PHI</li>
                <li>Incident response procedures for potential data breaches</li>
            </ul>
            <p><strong>Important:</strong> While we implement robust security measures, no method of transmission or storage is 100% secure. We cannot guarantee absolute security of your information.</p>

            <h4>6. Your Rights and Choices</h4>
            <p>You have the following rights regarding your personal and medical information:</p>
            <ul>
                <li><strong>Access and Copy:</strong> Request a copy of your medical records and personal information we hold</li>
                <li><strong>Amendment:</strong> Request corrections to inaccurate or incomplete information</li>
                <li><strong>Restriction:</strong> Request restrictions on certain uses and disclosures of your information</li>
                <li><strong>Confidential Communications:</strong> Request that we communicate with you in a specific manner or at a specific location</li>
                <li><strong>Accounting of Disclosures:</strong> Request an accounting of certain disclosures of your medical information</li>
                <li><strong>Portability:</strong> Request transfer of your medical records to another healthcare provider</li>
                <li><strong>Withdraw Consent:</strong> Withdraw consent for certain uses, such as marketing communications</li>
                <li><strong>Object:</strong> Object to certain processing of your personal data</li>
            </ul>
            <p>To exercise these rights, contact us through the methods provided in the "Contact Us" section. We will respond within the timeframe required by law (typically 30 days).</p>

            <h4>7. Data Retention</h4>
            <p>We retain your personal and medical information for as long as necessary to:</p>
            <ul>
                <li>Provide healthcare services and maintain your medical records</li>
                <li>Comply with legal, regulatory, and professional obligations (medical records are typically retained for 7-10 years after last patient contact, depending on jurisdiction)</li>
                <li>Resolve disputes and enforce our agreements</li>
            </ul>
            <p>When information is no longer needed, we securely delete or anonymize it in accordance with applicable laws and professional standards.</p>

            <h4>8. Cookies and Tracking Technologies</h4>
            <p>We use cookies and similar technologies to enhance your experience, analyze site usage, and personalize content. You can manage cookie preferences through your browser settings. Disabling cookies may limit certain functionality of our platform.</p>
            <p>Types of cookies we use:</p>
            <ul>
                <li><strong>Essential Cookies:</strong> Required for platform functionality and security</li>
                <li><strong>Functional Cookies:</strong> Remember your preferences and settings</li>
                <li><strong>Analytics Cookies:</strong> Help us understand how users interact with our platform</li>
                <li><strong>Marketing Cookies:</strong> Used for advertising and remarketing (with your consent)</li>
            </ul>

            <h4>9. Third-Party Services</h4>
            <p>Our platform may integrate with third-party services, including:</p>
            <ul>
                <li>Payment processors (PCI-compliant)</li>
                <li>Video conferencing platforms for telehealth consultations</li>
                <li>Electronic health record (EHR) systems</li>
                <li>Pharmacy networks for prescription fulfillment</li>
                <li>Analytics and marketing platforms</li>
            </ul>
            <p>These third parties have their own privacy policies. We encourage you to review them. We are not responsible for the privacy practices of third-party services.</p>

            <h4>10. International Data Transfers</h4>
            <p>Your information may be transferred to and processed in countries other than your own, including the United States. When we transfer data internationally, we ensure appropriate safeguards are in place, such as:</p>
            <ul>
                <li>Standard Contractual Clauses (SCCs) approved by relevant authorities</li>
                <li>Data processing agreements with robust privacy protections</li>
                <li>Compliance with applicable data transfer regulations (e.g., GDPR, HIPAA)</li>
            </ul>
            <p>By using our services, you consent to such international transfers.</p>

            <h4>11. Children's Privacy</h4>
            <p>Our services are not intended for individuals under the age of 18 without parental consent. We do not knowingly collect personal information from children. If we become aware that we have collected information from a child without parental consent, we will delete it promptly.</p>

            <h4>12. Data Breach Notification</h4>
            <p>In the event of a data breach affecting your personal or medical information, we will:</p>
            <ul>
                <li>Take immediate steps to contain and investigate the breach</li>
                <li>Notify affected individuals without unreasonable delay as required by law</li>
                <li>Report to relevant regulatory authorities when mandated</li>
                <li>Provide guidance on protective measures you can take</li>
            </ul>

            <h4>13. Changes to This Privacy Policy</h4>
            <p>We may update this Privacy Policy from time to time to reflect changes in our practices, technology, or legal requirements. The updated policy will be posted on this page with a revised "Last Updated" date. Your continued use of our services after changes constitutes acceptance of the updated policy. We encourage you to review this policy periodically.</p>

            <h4>14. Contact Us</h4>
            <p>If you have questions, concerns, or requests regarding this Privacy Policy or your personal data, please contact us:</p>
            <ul>
                <li>Through our Contact page on the website</li>
                <li>Email: privacy@telehealthmedicine.com</li>
                <li>Phone: [Insert phone number]</li>
                <li>Mail: [Insert mailing address]</li>
            </ul>
            <p>For matters involving protected health information, you may also contact our Privacy Officer at the same contact details.</p>

            <p style="margin-top: 30px; font-size: 0.9em; color: #64748b;"><em>Last Updated: March 2025</em></p>
        </div>
    </div>
</section>

<?php include __DIR__ . '/partials/footer.php'; ?>
<script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
