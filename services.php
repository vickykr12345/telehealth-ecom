<?php require_once __DIR__ . '/auth.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        .page-wrap{padding:70px 0 40px}
        .page-card{max-width:1100px;margin:0 auto;background:rgba(255,255,255,.78);backdrop-filter:blur(18px);border:1px solid rgba(148,163,184,.25);border-radius:26px;box-shadow:0 30px 90px rgba(15,23,42,.12);padding:44px 34px}
        .page-title{font-weight:900;margin:0 0 10px}
        .page-sub{color:#475569;font-weight:700;margin-bottom:22px}
        .svc-grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:14px}
        .svc{background:rgba(248,250,252,.75);border:1px solid rgba(148,163,184,.25);border-radius:18px;padding:16px}
        .svc i{color:#0b847e}
        .svc h5{margin:10px 0 6px;font-weight:900}
        .svc p{color:#475569;font-weight:600;line-height:1.7;margin:0}
        @media(max-width:992px){.svc-grid{grid-template-columns:1fr}}
        @media(max-width:576px){.page-card{padding:28px 18px}}
    </style>
</head>
<body>
<?php include 'partials/header.php'; ?>

<section class="page-wrap">
    <div class="container">
        <div class="page-card">
            <h2 class="page-title">Services</h2>
            <p class="page-sub">Explore our core services designed for modern, reliable care.</p>

            <div class="svc-grid">
                <div class="svc">
                    <i class="fa-solid fa-user-doctor"></i>
                    <h5>Online Consultation</h5>
                    <p>Connect with certified doctors for guidance, prescriptions, and care plans.</p>
                </div>
                <div class="svc">
                    <i class="fa-solid fa-calendar-check"></i>
                    <h5>Appointment Booking</h5>
                    <p>Book consultations and manage appointments easily from your account.</p>
                </div>
                <div class="svc">
                    <i class="fa-solid fa-bag-shopping"></i>
                    <h5>Healthcare Products</h5>
                    <p>Shop verified medical supplies with a smooth checkout experience.</p>
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

