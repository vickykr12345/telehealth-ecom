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
<?php include 'partials/header.php'; ?>

<section class="legal-wrap">
    <div class="container">
        <div class="legal-card">
            <h2 class="legal-title">Privacy Policy</h2>
            <p class="legal-sub">This policy explains what information we collect and how we use it.</p>

            <h4>1. Information we collect</h4>
            <ul>
                <li>Account details (name, email) when you sign up.</li>
                <li>Order details (shipping and billing information) when you checkout.</li>
                <li>Appointment details (name, email, department, date) when you book.</li>
            </ul>

            <h4>2. How we use your information</h4>
            <ul>
                <li>To provide account access and profile features.</li>
                <li>To process orders and show order history.</li>
                <li>To store and display booked appointments in your profile.</li>
            </ul>

            <h4>3. Data security</h4>
            <p>We apply reasonable measures to protect your data. For production use, payment information should be handled by a PCI-compliant payment provider.</p>

            <h4>4. Contact</h4>
            <p>If you have questions about this Privacy Policy, contact us via the Contact page.</p>
        </div>
    </div>
</section>

<?php include 'partials/footer.php'; ?>
<script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

