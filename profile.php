<?php
require_once __DIR__ . '/auth.php';
auth_require_login();

$user = auth_current_user();
$tab = isset($_GET['tab']) ? $_GET['tab'] : 'dashboard';

// Load orders by email (simple mapping)
$orders = [];
$stmt = $conn->prepare("SELECT id, order_number, product_name, quantity, total_price, order_date, order_status FROM orders WHERE customer_email = ? ORDER BY id DESC LIMIT 50");
$stmt->bind_param("s", $user['email']);
$stmt->execute();
$res = $stmt->get_result();
if ($res) {
    while ($row = $res->fetch_assoc()) $orders[] = $row;
}
$stmt->close();

// Load appointments by email
ensure_appointments_table();
$appointments = [];
$stmtA = $conn->prepare("SELECT id, appointment_date, department, status, created_at FROM appointments WHERE email = ? ORDER BY id DESC LIMIT 50");
$stmtA->bind_param("s", $user['email']);
$stmtA->execute();
$resA = $stmtA->get_result();
if ($resA) {
    while ($row = $resA->fetch_assoc()) $appointments[] = $row;
}
$stmtA->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <?php include 'partials/header.php'; ?>

    <section class="pf">
        <div class="container">
            <div class="pf-grid">
                <aside class="pf-side">
                    <div class="pf-user">
                        <div class="pf-avatar"><i class="fa-solid fa-user"></i></div>
                        <div>
                            <div class="pf-hello">Hello</div>
                            <div class="pf-name"><?php echo htmlspecialchars($user['first_name'] . ' ' . $user['last_name']); ?></div>
                            <div class="pf-email"><?php echo htmlspecialchars($user['email']); ?></div>
                        </div>
                    </div>

                    <nav class="pf-nav">
                        <a class="<?php echo $tab === 'dashboard' ? 'active' : ''; ?>" href="profile.php?tab=dashboard">
                            <i class="fa-solid fa-house"></i> Dashboard
                        </a>
                        <a class="<?php echo $tab === 'orders' ? 'active' : ''; ?>" href="profile.php?tab=orders">
                            <i class="fa-solid fa-receipt"></i> Orders
                        </a>
                        <a class="<?php echo $tab === 'appointments' ? 'active' : ''; ?>" href="profile.php?tab=appointments">
                            <i class="fa-solid fa-calendar-check"></i> Appointments
                        </a>
                        <a class="<?php echo $tab === 'address' ? 'active' : ''; ?>" href="profile.php?tab=address">
                            <i class="fa-solid fa-location-dot"></i> Address
                        </a>
                        <a class="<?php echo $tab === 'account' ? 'active' : ''; ?>" href="profile.php?tab=account">
                            <i class="fa-solid fa-user-gear"></i> Account Details
                        </a>
                        <a href="logout.php">
                            <i class="fa-solid fa-right-from-bracket"></i> Logout
                        </a>
                    </nav>
                </aside>

                <main class="pf-main">
                    <?php if ($tab === 'orders'): ?>
                        <div class="pf-card">
                            <div class="pf-card__head">
                                <h3>Your Orders</h3>
                                <p>Recent orders placed with your email.</p>
                            </div>

                            <div class="pf-table">
                                <div class="pf-tr pf-th">
                                    <div>Order</div>
                                    <div>Date</div>
                                    <div>Status</div>
                                    <div>Total</div>
                                    <div>Action</div>
                                </div>

                                <?php if (count($orders) === 0): ?>
                                    <div class="pf-empty">No orders found yet.</div>
                                <?php else: ?>
                                    <?php foreach ($orders as $o): 
                                        $num = !empty($o['order_number']) ? $o['order_number'] : (string)(50000 + (int)$o['id']);
                                    ?>
                                        <div class="pf-tr">
                                            <div>#<?php echo htmlspecialchars($num); ?></div>
                                            <div><?php echo htmlspecialchars(date('M d, Y', strtotime($o['order_date']))); ?></div>
                                            <div><span class="pf-badge"><?php echo htmlspecialchars($o['order_status']); ?></span></div>
                                            <div>$<?php echo htmlspecialchars(number_format((float)$o['total_price'], 2)); ?></div>
                                            <div><a class="pf-link" href="thankyou?oid=<?php echo (int)$o['id']; ?>">View</a></div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php elseif ($tab === 'appointments'): ?>
                        <div class="pf-card">
                            <div class="pf-card__head">
                                <h3>Your Appointments</h3>
                                <p>Appointments booked with your email.</p>
                            </div>

                            <div class="pf-table pf-table--appts">
                                <div class="pf-tr pf-th pf-tr--appts">
                                    <div>Appointment</div>
                                    <div>Department</div>
                                    <div>Status</div>
                                    <div>Booked</div>
                                </div>

                                <?php if (count($appointments) === 0): ?>
                                    <div class="pf-empty">No appointments found yet.</div>
                                <?php else: ?>
                                    <?php foreach ($appointments as $a): ?>
                                        <div class="pf-tr pf-tr--appts">
                                            <div><?php echo htmlspecialchars(date('M d, Y', strtotime($a['appointment_date']))); ?></div>
                                            <div><?php echo htmlspecialchars($a['department']); ?></div>
                                            <div><span class="pf-badge"><?php echo htmlspecialchars($a['status']); ?></span></div>
                                            <div><?php echo htmlspecialchars(date('M d, Y', strtotime($a['created_at']))); ?></div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php elseif ($tab === 'address'): ?>
                        <div class="pf-card">
                            <div class="pf-card__head">
                                <h3>Address</h3>
                                <p>Addresses are pulled from your latest order (if available).</p>
                            </div>
                            <?php
                                $addr = null;
                                $stmt2 = $conn->prepare("SELECT shipping_address1, shipping_address2, shipping_city, shipping_state, shipping_zip, shipping_country, customer_phone FROM orders WHERE customer_email = ? ORDER BY id DESC LIMIT 1");
                                $stmt2->bind_param("s", $user['email']);
                                $stmt2->execute();
                                $r2 = $stmt2->get_result();
                                if ($r2 && $r2->num_rows > 0) $addr = $r2->fetch_assoc();
                                $stmt2->close();
                            ?>
                            <?php if (!$addr): ?>
                                <div class="pf-empty">No address found yet. Place an order to save one.</div>
                            <?php else: ?>
                                <div class="pf-address">
                                    <div class="pf-address__block">
                                        <h6>Shipping Address</h6>
                                        <div><?php echo htmlspecialchars($user['first_name'] . ' ' . $user['last_name']); ?></div>
                                        <div><?php echo htmlspecialchars($addr['shipping_address1']); ?></div>
                                        <?php if (!empty($addr['shipping_address2'])): ?>
                                            <div><?php echo htmlspecialchars($addr['shipping_address2']); ?></div>
                                        <?php endif; ?>
                                        <div><?php echo htmlspecialchars($addr['shipping_city'] . ', ' . $addr['shipping_state'] . ' ' . $addr['shipping_zip']); ?></div>
                                        <div><?php echo htmlspecialchars($addr['shipping_country']); ?></div>
                                        <div>Mobile: <?php echo htmlspecialchars($addr['customer_phone']); ?></div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php elseif ($tab === 'account'): ?>
                        <div class="pf-card">
                            <div class="pf-card__head">
                                <h3>Account Details</h3>
                                <p>For this POC, account editing is not enabled yet.</p>
                            </div>
                            <div class="pf-kv">
                                <div><span>First name</span><strong><?php echo htmlspecialchars($user['first_name']); ?></strong></div>
                                <div><span>Last name</span><strong><?php echo htmlspecialchars($user['last_name']); ?></strong></div>
                                <div><span>Email</span><strong><?php echo htmlspecialchars($user['email']); ?></strong></div>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="pf-card">
                            <div class="pf-card__head">
                                <h3>Dashboard</h3>
                                <p>From your account dashboard you can view recent orders and manage your profile.</p>
                            </div>
                            <div class="pf-stats">
                                <div class="pf-stat">
                                    <div class="pf-stat__label">Orders</div>
                                    <div class="pf-stat__value"><?php echo (int)count($orders); ?></div>
                                </div>
                                <div class="pf-stat">
                                    <div class="pf-stat__label">Appointments</div>
                                    <div class="pf-stat__value"><?php echo (int)count($appointments); ?></div>
                                </div>
                                <div class="pf-stat">
                                    <div class="pf-stat__label">Status</div>
                                    <div class="pf-stat__value">Active</div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </main>
            </div>
        </div>
    </section>

    <?php include 'partials/footer.php'; ?>

    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <?php if (isset($_GET['login']) && $_GET['login'] === 'success'): ?>
    <script>
      if (typeof window.thShowToast === "function") {
        window.thShowToast({ title: "Welcome back", message: "You are now logged in.", type: "success" });
      }
    </script>
    <?php endif; ?>
    <?php if (isset($_GET['signup']) && $_GET['signup'] === 'success'): ?>
    <script>
      if (typeof window.thShowToast === "function") {
        window.thShowToast({ title: "Account created", message: "Welcome! Your account is ready.", type: "success" });
      }
    </script>
    <?php endif; ?>
</body>
</html>

