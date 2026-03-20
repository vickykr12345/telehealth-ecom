<?php require_once __DIR__ . '/auth.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        .page-wrap{padding:70px 0 40px}
        .page-card{max-width:1100px;margin:0 auto;background:rgba(255,255,255,.78);backdrop-filter:blur(18px);border:1px solid rgba(148,163,184,.25);border-radius:26px;box-shadow:0 30px 90px rgba(15,23,42,.12);padding:44px 34px}
        .page-title{font-weight:900;margin:0 0 10px}
        .page-sub{color:#475569;font-weight:700;margin-bottom:22px}
        .page-grid{display:grid;grid-template-columns:1.2fr .8fr;gap:18px;align-items:start}
        .chip{display:inline-flex;gap:8px;align-items:center;padding:10px 12px;border-radius:999px;background:rgba(34,193,180,.14);border:1px solid rgba(34,193,180,.35);color:#0b847e;font-weight:900}
        .side{background:rgba(248,250,252,.75);border:1px solid rgba(148,163,184,.25);border-radius:18px;padding:16px}
        .side h6{font-weight:900;letter-spacing:.12em;text-transform:uppercase;color:#64748b;font-size:12px}
        .side p{color:#475569;font-weight:600;margin:8px 0 0}
        @media(max-width:992px){.page-grid{grid-template-columns:1fr}}
        @media(max-width:576px){.page-card{padding:28px 18px}}
    </style>
</head>
<body>
<?php include __DIR__ . '/partials/header.php'; ?>

<section class="page-wrap">
    <div class="container">
        <div class="page-card">
            <div class="chip"><i class="fa-solid fa-shield-heart"></i> Trusted care</div>
            <h2 class="page-title">About Tele‑Health</h2>
            <p class="page-sub">A modern healthcare experience with real doctors, clean UX, and secure workflows.</p>

            <div class="page-grid">
                <div>
                    <h4 style="font-weight:900;margin-top:10px">Our mission</h4>
                    <p style="color:#475569;font-weight:600;line-height:1.7">
                        We help patients connect with certified providers and access quality healthcare services from anywhere.
                        This project is a proof‑of‑concept showcasing modern UI, appointment booking, and a checkout flow.
                    </p>
                    <h4 style="font-weight:900;margin-top:18px">What we offer</h4>
                    <ul style="color:#475569;font-weight:600;line-height:1.8;padding-left:18px">
                        <li>Virtual consultations and appointment booking</li>
                        <li>Healthcare products with a streamlined checkout</li>
                        <li>Account profile with orders and appointments</li>
                    </ul>
                </div>
                <div class="side">
                    <h6>Quick facts</h6>
                    <p><strong>Doctors:</strong> 500+</p>
                    <p><strong>Support:</strong> 24/7</p>
                    <p><strong>Patients:</strong> 10k+</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/partials/footer.php'; ?>
<script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

