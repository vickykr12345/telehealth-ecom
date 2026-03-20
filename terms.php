<?php require_once __DIR__ . '/auth.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms &amp; Conditions</title>
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
            <h2 class="legal-title">Terms &amp; Conditions</h2>
            <p class="legal-sub">These terms describe the rules and conditions for using this website and placing orders.</p>

            <h4>1. Use of the website</h4>
            <p>By accessing this website, you agree to use it only for lawful purposes and in a way that does not infringe the rights of others.</p>

            <h4>2. Orders &amp; payments</h4>
            <ul>
                <li>Placing an order indicates your intent to purchase the selected product(s).</li>
                <li>Payment details are collected for order processing in this proof-of-concept.</li>
                <li>We may refuse or cancel an order if information is incomplete or appears fraudulent.</li>
            </ul>

            <h4>3. Pricing &amp; availability</h4>
            <p>Prices and availability may change without notice. We attempt to keep information accurate but cannot guarantee it at all times.</p>

            <h4>4. Limitation of liability</h4>
            <p>This website is provided “as is”. We are not liable for any indirect or consequential damages arising from the use of the website.</p>

            <h4>5. Contact</h4>
            <p>If you have questions about these Terms, please contact us via the Contact page.</p>
        </div>
    </div>
</section>

<?php include __DIR__ . '/partials/footer.php'; ?>
<script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

