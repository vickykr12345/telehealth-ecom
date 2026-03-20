<?php
require_once __DIR__ . '/config.php';

$oid = isset($_GET['oid']) ? (int)$_GET['oid'] : 0;
$order = null;

if ($oid > 0) {
    $res = $conn->query("SELECT * FROM orders WHERE id = " . (int)$oid . " LIMIT 1");
    if ($res && $res->num_rows > 0) {
        $order = $res->fetch_assoc();
    }
}

if (!$order) {
    header('Location: index.php');
    exit();
}

$orderNumber = !empty($order['order_number']) ? $order['order_number'] : (string)(50000 + (int)$order['id']);
$placed = isset($_GET['placed']) && $_GET['placed'] === '1';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank you - Order <?php echo htmlspecialchars($orderNumber); ?></title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        .ty-wrap{padding:70px 0 30px}
        .ty-card{
            max-width:980px;margin:0 auto;
            background:rgba(255,255,255,.78);
            backdrop-filter:blur(18px);
            border:1px solid rgba(148,163,184,.25);
            border-radius:26px;
            box-shadow:0 30px 90px rgba(15,23,42,.12);
            padding:46px 34px;
        }
        .ty-title{font-weight:900;letter-spacing:.08em;text-transform:uppercase;text-align:center}
        .ty-sub{color:#475569;text-align:center;font-weight:600;max-width:720px;margin:10px auto 0}
        .ty-pill{
            width:max-content;margin:18px auto 0;
            padding:10px 14px;border-radius:999px;
            background:rgba(34,193,180,.14);
            border:1px solid rgba(34,193,180,.35);
            color:#0b847e;font-weight:900;
        }
        .ty-grid{margin-top:26px;display:grid;grid-template-columns:1fr;gap:14px}
        .ty-summary{
            background:rgba(255,255,255,.85);
            border:1px solid rgba(148,163,184,.25);
            border-radius:18px;
            padding:18px;
        }
        .ty-head{display:flex;justify-content:space-between;color:#64748b;font-weight:900;font-size:12px;letter-spacing:.12em;text-transform:uppercase}
        .ty-line{display:flex;justify-content:space-between;align-items:flex-start;gap:12px;margin-top:12px}
        .ty-line .name{font-weight:800;color:#0f172a}
        .ty-line .total{font-weight:900;color:#047857;font-size:18px}
        @media (max-width:576px){.ty-card{padding:30px 18px}}
    </style>
</head>
<body>
    <?php include __DIR__ . '/partials/header.php'; ?>

    <section class="ty-wrap">
        <div class="container">
            <div class="ty-card">
                <h2 class="ty-title">Thank you for your order</h2>
                <p class="ty-sub">
                    Your order has been successfully received and is now being processed.
                    Please allow 1–2 days to receive your tracking number via email.
                </p>
                <div class="ty-pill">Your Order ID is: <?php echo htmlspecialchars($orderNumber); ?></div>

                <div class="ty-grid">
                    <div class="ty-summary">
                        <div class="ty-head">
                            <span>Product</span>
                            <span>Total</span>
                        </div>
                        <div class="ty-line">
                            <div class="name"><?php echo htmlspecialchars($order['product_name']); ?></div>
                            <div class="total">$<?php echo number_format((float)$order['total_price'], 2); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include __DIR__ . '/partials/footer.php'; ?>

    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <?php if ($placed): ?>
    <script>
      if (typeof window.thShowToast === "function") {
        window.thShowToast({
          title: "Order placed",
          message: "Your order was placed successfully. Order ID: <?php echo addslashes($orderNumber); ?>",
          type: "success"
        });
      }
    </script>
    <?php endif; ?>
</body>
</html>

