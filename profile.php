<?php
require_once __DIR__ . '/auth.php';
auth_require_login();

$user = auth_current_user();
$tab = isset($_GET['tab']) ? $_GET['tab'] : 'dashboard';
$isAdmin = auth_is_admin($user);

ensureProductsTable();
ensure_contact_messages_table();

function profile_slugify($value) {
    $value = strtolower(trim((string)$value));
    $value = preg_replace('/[^a-z0-9]+/', '-', $value);
    $value = trim((string)$value, '-');
    return $value !== '' ? $value : 'product';
}

function profile_store_uploaded_images($fieldName, $nameSeed, $allowMultiple = false) {
    if (!isset($_FILES[$fieldName])) {
        return [];
    }

    $rawFiles = $_FILES[$fieldName];
    $files = [];

    if ($allowMultiple && is_array($rawFiles['name'] ?? null)) {
        $count = count($rawFiles['name']);
        for ($i = 0; $i < $count; $i++) {
            $files[] = [
                'name' => $rawFiles['name'][$i] ?? '',
                'tmp_name' => $rawFiles['tmp_name'][$i] ?? '',
                'error' => $rawFiles['error'][$i] ?? UPLOAD_ERR_NO_FILE,
            ];
        }
    } else {
        $files[] = [
            'name' => $rawFiles['name'] ?? '',
            'tmp_name' => $rawFiles['tmp_name'] ?? '',
            'error' => $rawFiles['error'] ?? UPLOAD_ERR_NO_FILE,
        ];
    }

    $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
    $imagesDir = __DIR__ . '/images';

    if (!is_dir($imagesDir)) {
        mkdir($imagesDir, 0775, true);
    }

    $storedPaths = [];
    foreach ($files as $file) {
        if (($file['error'] ?? UPLOAD_ERR_NO_FILE) === UPLOAD_ERR_NO_FILE) {
            continue;
        }

        if (($file['error'] ?? UPLOAD_ERR_OK) !== UPLOAD_ERR_OK) {
            continue;
        }

        $extension = strtolower(pathinfo((string)$file['name'], PATHINFO_EXTENSION));
        if (!in_array($extension, $allowedExtensions, true)) {
            continue;
        }

        if (@getimagesize((string)$file['tmp_name']) === false) {
            continue;
        }

        $fileName = profile_slugify($nameSeed) . '-' . date('YmdHis') . '-' . bin2hex(random_bytes(3)) . '.' . $extension;
        $targetPath = $imagesDir . DIRECTORY_SEPARATOR . $fileName;

        if (move_uploaded_file((string)$file['tmp_name'], $targetPath)) {
            $storedPaths[] = 'images/' . $fileName;
        }
    }

    return $storedPaths;
}

function profile_status_badge_class($status) {
    $status = strtolower(trim((string)$status));
    if ($status === 'approved') {
        return 'pf-badge--approved';
    }
    if ($status === 'rejected') {
        return 'pf-badge--danger';
    }
    return 'pf-badge--pending';
}

if (!$isAdmin && in_array($tab, ['products', 'contacts'], true)) {
    $tab = 'dashboard';
}

$productFormError = '';
$appointmentAdminError = '';
$contactAdminError = '';
$productFormValues = [
    'product_id' => '',
    'name' => '',
    'price' => '',
    'old_price' => '',
    'image' => '',
    'image_variations' => [],
    'category' => 'medical',
    'description' => '',
    'rating' => '0',
    'reviews' => '0',
    'approved' => '1',
];

if ($isAdmin && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_action'])) {
    $action = (string)$_POST['product_action'];

    if ($action === 'delete_product') {
        $deleteId = (int)($_POST['product_id'] ?? 0);
        if ($deleteId > 0) {
            $stmtDelete = $conn->prepare("DELETE FROM products WHERE id = ?");
            $stmtDelete->bind_param("i", $deleteId);
            $stmtDelete->execute();
            $stmtDelete->close();

            header('Location: profile.php?tab=products&product=deleted');
            exit();
        }
        $productFormError = 'Unable to delete that product.';
        $tab = 'products';
    }

    if ($action === 'save_product') {
        $tab = 'products';
        $productId = (int)($_POST['product_id'] ?? 0);
        $name = trim($_POST['name'] ?? '');
        $price = trim($_POST['price'] ?? '');
        $oldPrice = trim($_POST['old_price'] ?? '');
        $existingImage = trim($_POST['existing_image'] ?? '');
        $existingImageVariations = json_decode((string)($_POST['existing_image_variations'] ?? '[]'), true);
        if (!is_array($existingImageVariations)) {
            $existingImageVariations = [];
        }
        $category = trim($_POST['category'] ?? 'medical');
        $description = trim($_POST['description'] ?? '');
        $rating = (float)($_POST['rating'] ?? 0);
        $reviews = (int)($_POST['reviews'] ?? 0);
        $approved = isset($_POST['approved']) && (string)$_POST['approved'] === '1' ? 1 : 0;

        $uploadedMainImage = profile_store_uploaded_images('main_image', $name, false);
        $uploadedVariationImages = profile_store_uploaded_images('variation_images', $name . '-variation', true);

        $image = !empty($uploadedMainImage) ? $uploadedMainImage[0] : $existingImage;
        $imageVariations = $existingImageVariations;
        if (!empty($uploadedVariationImages)) {
            $imageVariations = array_values(array_unique(array_merge($existingImageVariations, $uploadedVariationImages)));
        }

        $productFormValues = [
            'product_id' => $productId > 0 ? (string)$productId : '',
            'name' => $name,
            'price' => $price,
            'old_price' => $oldPrice,
            'image' => $image,
            'image_variations' => $imageVariations,
            'category' => in_array($category, ['medical', 'health'], true) ? $category : 'medical',
            'description' => $description,
            'rating' => (string)$rating,
            'reviews' => (string)$reviews,
            'approved' => (string)$approved,
        ];

        if ($name === '' || $price === '' || $image === '' || $description === '') {
            $productFormError = 'Name, price, image, and description are required.';
        } elseif (!preg_match('/^\$?\d+(\.\d{1,2})?$/', $price)) {
            $productFormError = 'Price must look like 25 or $25.00.';
        } elseif ($oldPrice !== '' && !preg_match('/^\$?\d+(\.\d{1,2})?$/', $oldPrice)) {
            $productFormError = 'Old price must look like 30 or $30.00.';
        } else {
            $imageVariationsJson = json_encode(array_values($imageVariations));

            if ($productId > 0) {
                $stmtProduct = $conn->prepare("UPDATE products SET name = ?, price = ?, old_price = ?, image = ?, image_variations = ?, category = ?, description = ?, rating = ?, reviews = ?, approved = ? WHERE id = ?");
                $stmtProduct->bind_param("sssssssdiii", $name, $price, $oldPrice, $image, $imageVariationsJson, $category, $description, $rating, $reviews, $approved, $productId);
            } else {
                $productId = getNextProductId();
                $stmtProduct = $conn->prepare("INSERT INTO products (id, name, price, old_price, image, image_variations, category, description, rating, reviews, approved) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmtProduct->bind_param("isssssssdii", $productId, $name, $price, $oldPrice, $image, $imageVariationsJson, $category, $description, $rating, $reviews, $approved);
            }

            $okProduct = $stmtProduct->execute();
            $stmtProduct->close();

            if ($okProduct) {
                header('Location: profile.php?tab=products&product=' . ($productFormValues['product_id'] !== '' ? 'updated' : 'created'));
                exit();
            }

            $productFormError = 'Unable to save the product right now. Please try again.';
        }
    }
}

if ($isAdmin && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['appointment_action'])) {
    $appointmentAction = (string)$_POST['appointment_action'];

    if ($appointmentAction === 'update_appointment_status') {
        $tab = 'appointments';
        $appointmentId = (int)($_POST['appointment_id'] ?? 0);
        $status = strtolower(trim((string)($_POST['status'] ?? 'pending')));
        $allowedStatuses = ['pending', 'approved', 'rejected'];

        if ($appointmentId <= 0 || !in_array($status, $allowedStatuses, true)) {
            $appointmentAdminError = 'Unable to update that appointment status.';
        } else {
            $stmtAppointment = $conn->prepare("UPDATE appointments SET status = ? WHERE id = ?");
            $stmtAppointment->bind_param("si", $status, $appointmentId);
            $okAppointment = $stmtAppointment->execute();
            $stmtAppointment->close();

            if ($okAppointment) {
                header('Location: profile.php?tab=appointments&appointment=updated');
                exit();
            }

            $appointmentAdminError = 'Unable to update the appointment right now. Please try again.';
        }
    }
}

if ($isAdmin && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contact_action'])) {
    $contactAction = (string)$_POST['contact_action'];
    $tab = 'contacts';

    if ($contactAction === 'update_contact_read_status') {
        $messageId = (int)($_POST['message_id'] ?? 0);
        $isRead = isset($_POST['is_read']) && (string)$_POST['is_read'] === '1' ? 1 : 0;

        if ($messageId <= 0) {
            $contactAdminError = 'Unable to update that contact message.';
        } else {
            $stmtContact = $conn->prepare("UPDATE contact_messages SET is_read = ? WHERE id = ?");
            $stmtContact->bind_param("ii", $isRead, $messageId);
            $okContact = $stmtContact->execute();
            $stmtContact->close();

            if ($okContact) {
                header('Location: profile.php?tab=contacts&contact=' . ($isRead === 1 ? 'read' : 'unread'));
                exit();
            }

            $contactAdminError = 'Unable to update the contact message right now. Please try again.';
        }
    }

    if ($contactAction === 'mark_all_contacts_read') {
        $okMarkAll = $conn->query("UPDATE contact_messages SET is_read = 1 WHERE is_read = 0");
        if ($okMarkAll) {
            header('Location: profile.php?tab=contacts&contact=all-read');
            exit();
        }

        $contactAdminError = 'Unable to mark all contact messages as read right now. Please try again.';
    }
}

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

$allAppointments = [];
if ($isAdmin) {
    $resultAllAppointments = $conn->query("SELECT id, name, email, appointment_date, department, status, created_at FROM appointments ORDER BY id DESC LIMIT 100");
    if ($resultAllAppointments) {
        while ($row = $resultAllAppointments->fetch_assoc()) {
            $allAppointments[] = $row;
        }
    }
}

$contactMessages = [];
if ($isAdmin) {
    $resultContactMessages = $conn->query("SELECT id, user_id, name, email, subject, phone, message, is_read, created_at FROM contact_messages ORDER BY id DESC LIMIT 100");
    if ($resultContactMessages) {
        while ($row = $resultContactMessages->fetch_assoc()) {
            $contactMessages[] = $row;
        }
    }
}

$unreadContactCount = 0;
foreach ($contactMessages as $contactMessageRow) {
    if (empty($contactMessageRow['is_read'])) {
        $unreadContactCount++;
    }
}

$managedProducts = $isAdmin ? getAllProducts(true) : [];

if ($isAdmin && $tab === 'products' && empty($productFormError) && isset($_GET['edit'])) {
    $editProduct = getProductById((int)$_GET['edit'], true);
    if ($editProduct) {
        $productFormValues = [
            'product_id' => (string)($editProduct['id'] ?? ''),
            'name' => (string)($editProduct['name'] ?? ''),
            'price' => (string)($editProduct['price'] ?? ''),
            'old_price' => (string)($editProduct['old_price'] ?? ''),
            'image' => (string)($editProduct['image'] ?? ''),
            'image_variations' => isset($editProduct['image_variations']) && is_array($editProduct['image_variations']) ? $editProduct['image_variations'] : [],
            'category' => (string)($editProduct['category'] ?? 'medical'),
            'description' => (string)($editProduct['description'] ?? ''),
            'rating' => (string)($editProduct['rating'] ?? '0'),
            'reviews' => (string)($editProduct['reviews'] ?? '0'),
            'approved' => (string)((int)($editProduct['approved'] ?? 1)),
        ];
    }
}
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
    <?php include __DIR__ . '/partials/header.php'; ?>

    <section class="pf">
        <div class="container">
            <div class="pf-grid">
                <aside class="pf-side">
                    <div class="pf-user">
                        <div class="pf-avatar"><i class="fa-solid fa-user"></i></div>
                        <div>
                            <div class="pf-hello">Hello</div>
                            <div class="pf-name">
                                <?php echo htmlspecialchars($user['first_name'] . ' ' . $user['last_name']); ?>
                                <?php if ($isAdmin): ?>
                                    <span class="pf-admin-tag">(ADMIN)</span>
                                <?php endif; ?>
                            </div>
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
                        <?php if ($isAdmin): ?>
                        <a class="<?php echo $tab === 'products' ? 'active' : ''; ?>" href="profile.php?tab=products">
                            <i class="fa-solid fa-box-open"></i> Products
                        </a>
                        <a class="<?php echo $tab === 'contacts' ? 'active' : ''; ?>" href="profile.php?tab=contacts">
                            <i class="fa-solid fa-envelope-open-text"></i> Contact Messages
                            <?php if ($unreadContactCount > 0): ?>
                                <span class="pf-nav-count"><?php echo (int)$unreadContactCount; ?></span>
                            <?php endif; ?>
                        </a>
                        <?php endif; ?>
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
                                <p><?php echo $isAdmin ? 'Your own appointments are listed here, and you can approve all appointment requests below.' : 'Appointments booked with your email.'; ?></p>
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
                                            <div><span class="pf-badge <?php echo profile_status_badge_class($a['status']); ?>"><?php echo htmlspecialchars($a['status']); ?></span></div>
                                            <div><?php echo htmlspecialchars(date('M d, Y', strtotime($a['created_at']))); ?></div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if ($isAdmin): ?>
                            <div class="pf-card pf-card--stacked">
                                <div class="pf-card__head">
                                    <h3>Appointment Approvals</h3>
                                    <p>Review all appointment requests and update their approval status.</p>
                                </div>

                                <?php if ($appointmentAdminError !== ''): ?>
                                    <div class="pf-admin-alert pf-admin-alert--error"><?php echo htmlspecialchars($appointmentAdminError); ?></div>
                                <?php elseif (isset($_GET['appointment']) && $_GET['appointment'] === 'updated'): ?>
                                    <div class="pf-admin-alert pf-admin-alert--success">Appointment status updated successfully.</div>
                                <?php endif; ?>

                                <div class="pf-table pf-table--admin-appts">
                                    <div class="pf-tr pf-th pf-tr--admin-appts">
                                        <div>Patient</div>
                                        <div>Email</div>
                                        <div>Appointment</div>
                                        <div>Department</div>
                                        <div>Status</div>
                                        <div>Action</div>
                                    </div>

                                    <?php if (count($allAppointments) === 0): ?>
                                        <div class="pf-empty">No appointment requests found yet.</div>
                                    <?php else: ?>
                                        <?php foreach ($allAppointments as $adminAppointment): ?>
                                            <div class="pf-tr pf-tr--admin-appts">
                                                <div>
                                                    <strong class="pf-inline-title"><?php echo htmlspecialchars($adminAppointment['name']); ?></strong>
                                                    <div class="pf-inline-meta">Booked <?php echo htmlspecialchars(date('M d, Y', strtotime($adminAppointment['created_at']))); ?></div>
                                                </div>
                                                <div><?php echo htmlspecialchars($adminAppointment['email']); ?></div>
                                                <div><?php echo htmlspecialchars(date('M d, Y', strtotime($adminAppointment['appointment_date']))); ?></div>
                                                <div><?php echo htmlspecialchars($adminAppointment['department']); ?></div>
                                                <div><span class="pf-badge <?php echo profile_status_badge_class($adminAppointment['status']); ?>"><?php echo htmlspecialchars($adminAppointment['status']); ?></span></div>
                                                <div>
                                                    <form method="POST" class="pf-inline-form">
                                                        <input type="hidden" name="appointment_action" value="update_appointment_status">
                                                        <input type="hidden" name="appointment_id" value="<?php echo (int)$adminAppointment['id']; ?>">
                                                        <select name="status" class="pf-inline-select">
                                                            <option value="pending" <?php echo strtolower((string)$adminAppointment['status']) === 'pending' ? 'selected' : ''; ?>>Pending</option>
                                                            <option value="approved" <?php echo strtolower((string)$adminAppointment['status']) === 'approved' ? 'selected' : ''; ?>>Approved</option>
                                                            <option value="rejected" <?php echo strtolower((string)$adminAppointment['status']) === 'rejected' ? 'selected' : ''; ?>>Rejected</option>
                                                        </select>
                                                        <button class="pf-btn pf-btn--small" type="submit">Update</button>
                                                    </form>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php elseif ($tab === 'contacts' && $isAdmin): ?>
                        <div class="pf-card">
                            <div class="pf-card__head">
                                <h3>Contact Messages</h3>
                                <p><?php echo (int)count($contactMessages); ?> total messages, <?php echo (int)$unreadContactCount; ?> unread, listed here for <?php echo htmlspecialchars(auth_admin_email()); ?>.</p>
                            </div>

                            <?php if ($contactAdminError !== ''): ?>
                                <div class="pf-admin-alert pf-admin-alert--error"><?php echo htmlspecialchars($contactAdminError); ?></div>
                            <?php elseif (isset($_GET['contact']) && in_array($_GET['contact'], ['read', 'unread', 'all-read'], true)): ?>
                                <div class="pf-admin-alert pf-admin-alert--success">
                                    <?php
                                        $contactState = (string)$_GET['contact'];
                                        echo htmlspecialchars(
                                            $contactState === 'all-read'
                                                ? 'All contact messages have been marked as read.'
                                                : ($contactState === 'read'
                                                    ? 'Contact message marked as read.'
                                                    : 'Contact message marked as unread.')
                                        );
                                    ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($unreadContactCount > 0): ?>
                                <div class="pf-admin-actions pf-admin-actions--flush">
                                    <form method="POST">
                                        <input type="hidden" name="contact_action" value="mark_all_contacts_read">
                                        <button class="pf-btn pf-btn--small mb-3" type="submit">Mark All As Read</button>
                                    </form>
                                </div>
                            <?php endif; ?>

                            <div class="pf-table pf-table--contacts">
                                <div class="pf-tr pf-th pf-tr--contacts">
                                    <div>Sender</div>
                                    <div>Contact</div>
                                    <div>Subject</div>
                                    <div>Message</div>
                                    <div>Status</div>
                                    <div>Action</div>
                                </div>

                                <?php if (count($contactMessages) === 0): ?>
                                    <div class="pf-empty">No contact messages found yet.</div>
                                <?php else: ?>
                                    <?php foreach ($contactMessages as $contactMessage): ?>
                                        <div class="pf-tr pf-tr--contacts <?php echo empty($contactMessage['is_read']) ? 'pf-tr--unread' : ''; ?>">
                                            <div>
                                                <strong class="pf-inline-title"><?php echo htmlspecialchars($contactMessage['name']); ?></strong>
                                                <div class="pf-inline-meta">Message #<?php echo (int)$contactMessage['id']; ?> | <?php echo htmlspecialchars(date('M d, Y', strtotime($contactMessage['created_at']))); ?></div>
                                            </div>
                                            <div>
                                                <div><?php echo htmlspecialchars($contactMessage['email']); ?></div>
                                                <div class="pf-inline-meta"><?php echo htmlspecialchars($contactMessage['phone']); ?></div>
                                            </div>
                                            <div><?php echo htmlspecialchars($contactMessage['subject']); ?></div>
                                            <div class="pf-message-preview"><?php echo nl2br(htmlspecialchars($contactMessage['message'])); ?></div>
                                            <div>
                                                <span class="pf-badge <?php echo empty($contactMessage['is_read']) ? 'pf-badge--unread' : 'pf-badge--approved'; ?>">
                                                    <?php echo empty($contactMessage['is_read']) ? 'Unread' : 'Read'; ?>
                                                </span>
                                            </div>
                                            <div>
                                                <form method="POST" class="pf-inline-form">
                                                    <input type="hidden" name="contact_action" value="update_contact_read_status">
                                                    <input type="hidden" name="message_id" value="<?php echo (int)$contactMessage['id']; ?>">
                                                    <input type="hidden" name="is_read" value="<?php echo empty($contactMessage['is_read']) ? '1' : '0'; ?>">
                                                    <button class="pf-btn pf-btn--small <?php echo empty($contactMessage['is_read']) ? '' : 'pf-btn--ghost'; ?>" type="submit">
                                                        <?php echo empty($contactMessage['is_read']) ? 'Mark Read' : 'Mark Unread'; ?>
                                                    </button>
                                                </form>
                                            </div>
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
                    <?php elseif ($tab === 'products' && $isAdmin): ?>
                        <div class="pf-card">
                            <div class="pf-card__head">
                                <h3>Products</h3>
                                <p>Only <?php echo htmlspecialchars(auth_admin_email()); ?> can add, edit, delete, and approve products.</p>
                            </div>

                            <?php if ($productFormError !== ''): ?>
                                <div class="pf-admin-alert pf-admin-alert--error"><?php echo htmlspecialchars($productFormError); ?></div>
                            <?php endif; ?>

                            <div class="pf-admin-grid">
                                <div class="pf-admin-panel" id="product-editor">
                                    <h4><?php echo $productFormValues['product_id'] !== '' ? 'Edit Product' : 'Add Product'; ?></h4>
                                    <form method="POST" class="pf-product-form" enctype="multipart/form-data">
                                        <input type="hidden" name="product_action" value="save_product">
                                        <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($productFormValues['product_id']); ?>">
                                        <input type="hidden" name="existing_image" value="<?php echo htmlspecialchars($productFormValues['image']); ?>">
                                        <input type="hidden" name="existing_image_variations" value="<?php echo htmlspecialchars(json_encode($productFormValues['image_variations'])); ?>">

                                        <div class="pf-form-grid">
                                            <label>
                                                <span>Name</span>
                                                <input type="text" name="name" value="<?php echo htmlspecialchars($productFormValues['name']); ?>" required>
                                            </label>
                                            <label>
                                                <span>Category</span>
                                                <select name="category">
                                                    <option value="medical" <?php echo $productFormValues['category'] === 'medical' ? 'selected' : ''; ?>>Medical</option>
                                                    <option value="health" <?php echo $productFormValues['category'] === 'health' ? 'selected' : ''; ?>>Health</option>
                                                </select>
                                            </label>
                                            <label>
                                                <span>Price</span>
                                                <input type="text" name="price" placeholder="$25.00" value="<?php echo htmlspecialchars($productFormValues['price']); ?>" required>
                                            </label>
                                            <label>
                                                <span>Old Price</span>
                                                <input type="text" name="old_price" placeholder="$30.00" value="<?php echo htmlspecialchars($productFormValues['old_price']); ?>">
                                            </label>
                                            <label class="pf-form-grid__wide">
                                                <span>Main Image Upload</span>
                                                <input type="file" name="main_image" accept="image/*" <?php echo $productFormValues['image'] === '' ? 'required' : ''; ?>>
                                                <small class="pf-field-help">The image will be uploaded to the `images/` folder and the saved path will be generated automatically.</small>
                                                <?php if ($productFormValues['image'] !== ''): ?>
                                                    <div class="pf-upload-preview">
                                                        <img src="<?php echo htmlspecialchars($productFormValues['image']); ?>" alt="Main product image">
                                                        <div>
                                                            <strong>Current Main Image</strong>
                                                            <span><?php echo htmlspecialchars($productFormValues['image']); ?></span>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            </label>
                                            <label class="pf-form-grid__wide">
                                                <span>Image Variation Upload</span>
                                                <input type="file" name="variation_images[]" accept="image/*" multiple>
                                                <small class="pf-field-help">Upload one or more extra product images. These will appear in the checkout thumbnail slider.</small>
                                                <?php if (!empty($productFormValues['image_variations'])): ?>
                                                    <div class="pf-variation-grid">
                                                        <?php foreach ($productFormValues['image_variations'] as $variationImage): ?>
                                                            <div class="pf-variation-card">
                                                                <img src="<?php echo htmlspecialchars($variationImage); ?>" alt="Variation image">
                                                                <span><?php echo htmlspecialchars($variationImage); ?></span>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </label>
                                            <label>
                                                <span>Rating</span>
                                                <input type="number" name="rating" min="0" max="5" step="0.1" value="<?php echo htmlspecialchars($productFormValues['rating']); ?>">
                                            </label>
                                            <label>
                                                <span>Reviews</span>
                                                <input type="number" name="reviews" min="0" step="1" value="<?php echo htmlspecialchars($productFormValues['reviews']); ?>">
                                            </label>
                                            <label class="pf-form-grid__wide">
                                                <span>Description</span>
                                                <textarea name="description" rows="5" required><?php echo htmlspecialchars($productFormValues['description']); ?></textarea>
                                            </label>
                                            <label>
                                                <span>Visibility</span>
                                                <select name="approved">
                                                    <option value="1" <?php echo $productFormValues['approved'] === '1' ? 'selected' : ''; ?>>Approved</option>
                                                    <option value="0" <?php echo $productFormValues['approved'] === '0' ? 'selected' : ''; ?>>Hidden</option>
                                                </select>
                                            </label>
                                        </div>

                                        <div class="pf-admin-actions">
                                            <button class="pf-btn" type="submit"><?php echo $productFormValues['product_id'] !== '' ? 'Update Product' : 'Add Product'; ?></button>
                                            <?php if ($productFormValues['product_id'] !== ''): ?>
                                                <a class="pf-btn pf-btn--ghost" href="profile.php?tab=products">Cancel</a>
                                            <?php endif; ?>
                                        </div>
                                    </form>
                                </div>

                                <div class="pf-admin-panel pf-admin-panel--list">
                                    <div class="pf-products-head">
                                        <div>
                                            <h4>All Products</h4>
                                            <p>Manage visibility and jump into editing faster.</p>
                                        </div>
                                        <div class="pf-products-count"><?php echo (int)count($managedProducts); ?> total</div>
                                    </div>
                                    <div class="pf-product-search">
                                        <input
                                            type="search"
                                            id="pfProductSearch"
                                            placeholder="Search products by name, category, or product ID"
                                            aria-label="Search products"
                                        >
                                    </div>
                                    <div class="pf-product-list">
                                        <?php if (count($managedProducts) === 0): ?>
                                            <div class="pf-empty">No products found yet.</div>
                                        <?php else: ?>
                                            <?php foreach ($managedProducts as $managedProduct): ?>
                                                <article
                                                    class="pf-product-card"
                                                    data-product-search="<?php echo htmlspecialchars(strtolower(trim(
                                                        (string)($managedProduct['name'] ?? '') . ' ' .
                                                        (string)($managedProduct['category'] ?? '') . ' ' .
                                                        (string)($managedProduct['id'] ?? '')
                                                    ))); ?>"
                                                >
                                                    <div class="pf-product-card__top">
                                                        <div>
                                                            <strong class="pf-product-title"><?php echo htmlspecialchars($managedProduct['name']); ?></strong>
                                                            <div class="pf-product-meta">Product #<?php echo (int)$managedProduct['id']; ?></div>
                                                        </div>
                                                        <span class="pf-badge <?php echo !empty($managedProduct['approved']) ? '' : 'pf-badge--muted'; ?>">
                                                            <?php echo !empty($managedProduct['approved']) ? 'Approved' : 'Hidden'; ?>
                                                        </span>
                                                    </div>

                                                    <div class="pf-product-facts">
                                                        <div class="pf-product-fact">
                                                            <span>Category</span>
                                                            <strong><?php echo htmlspecialchars(ucfirst((string)($managedProduct['category'] ?? 'medical'))); ?></strong>
                                                        </div>
                                                        <div class="pf-product-fact">
                                                            <span>Price</span>
                                                            <strong><?php echo htmlspecialchars($managedProduct['price']); ?></strong>
                                                        </div>
                                                        <div class="pf-product-fact">
                                                            <span>Rating</span>
                                                            <strong><?php echo htmlspecialchars((string)($managedProduct['rating'] ?? '0')); ?>/5</strong>
                                                        </div>
                                                        <div class="pf-product-fact">
                                                            <span>Reviews</span>
                                                            <strong><?php echo (int)($managedProduct['reviews'] ?? 0); ?></strong>
                                                        </div>
                                                    </div>

                                                    <div class="pf-product-footer">
                                                        <div class="pf-product-path">
                                                            <div><?php echo htmlspecialchars((string)($managedProduct['image'] ?? '')); ?></div>
                                                            <div><?php echo count(isset($managedProduct['image_variations']) && is_array($managedProduct['image_variations']) ? $managedProduct['image_variations'] : []); ?> variation images</div>
                                                        </div>
                                                        <div class="pf-row-actions">
                                                        <a class="pf-btn pf-btn--small" href="profile.php?tab=products&edit=<?php echo (int)$managedProduct['id']; ?>#product-editor">Edit</a>
                                                        <form method="POST" onsubmit="return confirm('Delete this product?');">
                                                            <input type="hidden" name="product_action" value="delete_product">
                                                            <input type="hidden" name="product_id" value="<?php echo (int)$managedProduct['id']; ?>">
                                                            <button class="pf-btn pf-btn--danger pf-btn--small" type="submit">Delete</button>
                                                        </form>
                                                        </div>
                                                    </div>
                                                </article>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
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
                                    <div class="pf-stat__label"><?php echo $isAdmin ? 'Unread Messages' : 'Status'; ?></div>
                                    <div class="pf-stat__value"><?php echo $isAdmin ? (int)$unreadContactCount : 'Active'; ?></div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </main>
            </div>
        </div>
    </section>

    <?php include __DIR__ . '/partials/footer.php'; ?>

    <?php if ($tab === 'products' && $isAdmin): ?>
    <script>
        (() => {
            const searchInput = document.getElementById('pfProductSearch');
            const productCards = Array.from(document.querySelectorAll('.pf-product-card'));
            if (!searchInput || productCards.length === 0) {
                return;
            }

            let emptyState = document.querySelector('.pf-product-search-empty');
            if (!emptyState) {
                emptyState = document.createElement('div');
                emptyState.className = 'pf-empty pf-product-search-empty';
                emptyState.textContent = 'No products match this search.';
                emptyState.hidden = true;
                const productList = document.querySelector('.pf-product-list');
                if (productList) {
                    productList.appendChild(emptyState);
                }
            }

            const applySearch = () => {
                const query = searchInput.value.trim().toLowerCase();
                let visibleCount = 0;

                productCards.forEach((card) => {
                    const haystack = (card.dataset.productSearch || '').toLowerCase();
                    const isVisible = query === '' || haystack.includes(query);
                    card.hidden = !isVisible;
                    if (isVisible) {
                        visibleCount += 1;
                    }
                });

                emptyState.hidden = visibleCount !== 0;
            };

            searchInput.addEventListener('input', applySearch);
        })();
    </script>
    <?php endif; ?>
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
    <?php if (isset($_GET['product']) && in_array($_GET['product'], ['created', 'updated', 'deleted'], true)): ?>
    <script>
      if (typeof window.thShowToast === "function") {
        const productMessages = {
          created: { title: "Product added", message: "The product was saved successfully." },
          updated: { title: "Product updated", message: "The product changes are now live." },
          deleted: { title: "Product deleted", message: "The product was removed successfully." }
        };
        const state = <?php echo json_encode($_GET['product']); ?>;
        const config = productMessages[state];
        if (config) {
          window.thShowToast({ title: config.title, message: config.message, type: "success" });
        }
      }
    </script>
    <?php endif; ?>
</body>
</html>
