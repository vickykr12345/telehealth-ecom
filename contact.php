<?php require_once __DIR__ . '/auth.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        .page-wrap{padding:70px 0 40px}
        .page-card{max-width:980px;margin:0 auto;background:rgba(255,255,255,.78);backdrop-filter:blur(18px);border:1px solid rgba(148,163,184,.25);border-radius:26px;box-shadow:0 30px 90px rgba(15,23,42,.12);padding:44px 34px}
        .page-title{font-weight:900;margin:0 0 10px}
        .page-sub{color:#475569;font-weight:700;margin-bottom:22px}
        .grid{display:grid;grid-template-columns:1fr 1fr;gap:14px}
        .box{background:rgba(248,250,252,.75);border:1px solid rgba(148,163,184,.25);border-radius:18px;padding:16px}
        .box h6{font-weight:900;letter-spacing:.12em;text-transform:uppercase;color:#64748b;font-size:12px}
        .box p{color:#475569;font-weight:600;margin:8px 0 0}
        @media(max-width:992px){.grid{grid-template-columns:1fr}}
        @media(max-width:576px){.page-card{padding:28px 18px}}
    </style>
</head>
<body>
<?php include 'partials/header.php'; ?>

<section class="page-wrap">
    <div class="container">
        <div class="page-card">
            <h2 class="page-title">Contact Us</h2>
            <p class="page-sub">Need help? Reach out and we’ll get back to you soon.</p>

            <div class="grid">
                <div class="box">
                    <h6>Email</h6>
                    <p><i class="fa-solid fa-envelope"></i> support@example.com</p>
                </div>
                <div class="box">
                    <h6>Phone</h6>
                    <p><i class="fa-solid fa-phone"></i> +1 (800) 000-0000</p>
                </div>
                <div class="box">
                    <h6>Address</h6>
                    <p><i class="fa-solid fa-location-dot"></i> 104 Albemarle Rd, USA</p>
                </div>
                <div class="box">
                    <h6>Hours</h6>
                    <p><i class="fa-solid fa-clock"></i> 24/7 Support</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'partials/footer.php'; ?>
<script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

