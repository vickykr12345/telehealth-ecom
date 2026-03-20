<?php
require_once __DIR__ . '/auth.php';

$currentUser = auth_current_user();

// Get product ID from URL
$productId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Debug: Log the product ID being requested
error_log("Checkout requested for product ID: " . $productId);

// Get product data from database
$product = null;
if ($productId > 0) {
    $product = getProductById($productId);
    // Debug: Log if product was found
    if ($product) {
        error_log("Product found: " . $product['name']);
    } else {
        error_log("Product NOT found for ID: " . $productId);
    }
} else {
    error_log("Invalid product ID: " . $productId);
}

// If no product found, redirect to home
if (!$product) {
    // Add some debugging info before redirect
    if ($conn->connect_error) {
        error_log("Database connection failed: " . $conn->connect_error);
        die("Database connection failed. Please check the logs.");
    }
    
    error_log("Redirecting to index.php - no product found");
    header('Location: index.php');
    exit();
}

// Prefill checkout details for logged-in users using their latest saved order
$savedCheckout = [
    'email' => (string)($currentUser['email'] ?? ''),
    'phone' => '',
    'firstName' => (string)($currentUser['first_name'] ?? ''),
    'lastName' => (string)($currentUser['last_name'] ?? ''),
    'address1' => '',
    'address2' => '',
    'country' => '',
    'state' => '',
    'city' => '',
    'zip' => '',
];

if ($currentUser && !empty($currentUser['email'])) {
    $ordersTableCheck = $conn->query("SHOW TABLES LIKE 'orders'");
    if ($ordersTableCheck && $ordersTableCheck->num_rows > 0) {
        $stmtPrefill = $conn->prepare("SELECT customer_phone, customer_first_name, customer_last_name, shipping_address1, shipping_address2, shipping_country, shipping_state, shipping_city, shipping_zip FROM orders WHERE customer_email = ? ORDER BY id DESC LIMIT 1");
        $stmtPrefill->bind_param("s", $currentUser['email']);
        $stmtPrefill->execute();
        $resultPrefill = $stmtPrefill->get_result();
        if ($resultPrefill && ($savedOrder = $resultPrefill->fetch_assoc())) {
            $savedCheckout['phone'] = (string)($savedOrder['customer_phone'] ?? '');
            $savedCheckout['firstName'] = (string)($savedOrder['customer_first_name'] ?? $savedCheckout['firstName']);
            $savedCheckout['lastName'] = (string)($savedOrder['customer_last_name'] ?? $savedCheckout['lastName']);
            $savedCheckout['address1'] = (string)($savedOrder['shipping_address1'] ?? '');
            $savedCheckout['address2'] = (string)($savedOrder['shipping_address2'] ?? '');
            $savedCheckout['country'] = (string)($savedOrder['shipping_country'] ?? '');
            $savedCheckout['state'] = (string)($savedOrder['shipping_state'] ?? '');
            $savedCheckout['city'] = (string)($savedOrder['shipping_city'] ?? '');
            $savedCheckout['zip'] = (string)($savedOrder['shipping_zip'] ?? '');
        }
        $stmtPrefill->close();
    }
}

// Build product gallery images for the checkout page
$imagePath = (string)($product['image'] ?? '');
$imageVariations = isset($product['image_variations']) && is_array($product['image_variations'])
    ? array_values(array_filter($product['image_variations'], function ($path) {
        return is_string($path) && trim($path) !== '';
    }))
    : [];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!$currentUser) {
        $loginNext = 'checkout.php?id=' . $productId;
        header('Location: login.php?next=' . urlencode($loginNext));
        exit();
    }

    // Sanitize and validate form data
    $qty = (int)$_POST['qty'];
    $email = sanitizeInput($_POST['email']);
    $phone = sanitizeInput($_POST['phone']);
    $firstName = sanitizeInput($_POST['firstName']);
    $lastName = sanitizeInput($_POST['lastName']);
    $address1 = sanitizeInput($_POST['address1']);
    $address2 = sanitizeInput($_POST['address2']);
    $country = sanitizeInput($_POST['country']);
    $state = sanitizeInput($_POST['state']);
    $city = sanitizeInput($_POST['city']);
    $zip = sanitizeInput($_POST['zip']);
    $cardNumber = sanitizeInput($_POST['cardNumber']);
    $expiry = sanitizeInput($_POST['expiry']);
    $cvv = sanitizeInput($_POST['cvv']);

    // Never store full card number or CVV in DB (POC safety)
    $cardDigits = preg_replace('/\D+/', '', $cardNumber);
    $last4 = substr($cardDigits, -4);
    $maskedCard = $last4 ? ('**** **** **** ' . $last4) : '';
    
    // Calculate total price
    $price = floatval(str_replace('$', '', $product['price']));
    $totalPrice = $price * $qty;
    
    // Prepare order data
    $orderData = [
        'product_id' => $product['id'],
        'product_name' => $product['name'],
        'quantity' => $qty,
        'total_price' => $totalPrice,
        'customer_email' => $email,
        'customer_phone' => $phone,
        'customer_first_name' => $firstName,
        'customer_last_name' => $lastName,
        'shipping_address1' => $address1,
        'shipping_address2' => $address2,
        'shipping_country' => $country,
        'shipping_state' => $state,
        'shipping_city' => $city,
        'shipping_zip' => $zip,
        'payment_card_number' => $maskedCard,
        'payment_expiry' => $expiry,
        'payment_cvv' => ''
    ];
    
    // Insert order into database (returns inserted row id)
    $insertedId = insertOrder($orderData);
    if ($insertedId) {
        // Generate a friendly order number and store it (if column exists / can be added)
        $orderNumber = 50000 + (int)$insertedId;
        if (ensureOrdersColumnExists('order_number', "order_number VARCHAR(20) NULL")) {
            $conn->query("UPDATE orders SET order_number = '" . sanitizeInput((string)$orderNumber) . "' WHERE id = " . (int)$insertedId);
        }

        header('Location: thankyou?oid=' . (int)$insertedId . '&placed=1');
        exit();
    }

    $errorMessage = "Error placing order: " . $conn->error;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['name']); ?> - Checkout</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="css/checkout.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <?php include __DIR__ . '/partials/header.php'; ?>
    <section class="checkout">
        <div class="checkout-container">
            <!-- LEFT -->
            <div class="checkout-left">
                <div class="gallery">
                    <img id="mainImage" class="main-image" src="<?php echo htmlspecialchars($imagePath); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                    <div id="thumbSlider" class="thumb-slider is-hidden" aria-label="Product image variations"></div>
                </div>

                <div class="product-tabs">
                    <div class="tabs">
                        <button class="active" data-tab="desc">Description</button>
                        <button data-tab="use">How to Use</button>
                        <button data-tab="delivery">Delivery Info</button>
                    </div>
                    <div id="desc" class="tab-content active"><?php echo htmlspecialchars($product['description']); ?></div>
                    <div id="use" class="tab-content">Instructions: <?php echo htmlspecialchars($product['description']); ?></div>
                    <div id="delivery" class="tab-content">Delivery: Free shipping on orders over $50. Estimated delivery in 3-5 business days.</div>
                </div>

                <h3 class="mt-4">Related Products</h3>
                <div id="relatedProducts" class="related-grid"></div>
            </div>

            <!-- RIGHT -->
            <div class="checkout-right">
                <h2 id="productName"><?php echo htmlspecialchars($product['name']); ?></h2>
                <div class="price" id="productPrice">
                    <?php echo htmlspecialchars($product['price']); ?>
                    <?php if (!empty($product['old_price'])): ?>
                        <span class="old-price"><?php echo htmlspecialchars($product['old_price']); ?></span>
                    <?php endif; ?>
                </div>

                <div class="qty-box">
                    <button id="minus">-</button>
                    <span id="qty">1</span>
                    <button id="plus">+</button>
                </div>

                <h5>Customer Information</h5>
                <input id="email" name="email" placeholder="Email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : htmlspecialchars($savedCheckout['email']); ?>">
                <input id="phone" name="phone" placeholder="Phone" value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : htmlspecialchars($savedCheckout['phone']); ?>">

                <div class="row">
                    <input id="firstName" name="firstName" placeholder="First Name" value="<?php echo isset($_POST['firstName']) ? htmlspecialchars($_POST['firstName']) : htmlspecialchars($savedCheckout['firstName']); ?>">
                    <input id="lastName" name="lastName" placeholder="Last Name" value="<?php echo isset($_POST['lastName']) ? htmlspecialchars($_POST['lastName']) : htmlspecialchars($savedCheckout['lastName']); ?>">
                </div>

                <h5>Shipping Information</h5>
                <input id="address1" name="address1" placeholder="Address Line 1" value="<?php echo isset($_POST['address1']) ? htmlspecialchars($_POST['address1']) : htmlspecialchars($savedCheckout['address1']); ?>">
                <input id="address2" name="address2" placeholder="Address Line 2" value="<?php echo isset($_POST['address2']) ? htmlspecialchars($_POST['address2']) : htmlspecialchars($savedCheckout['address2']); ?>">

                <select id="country" name="country">
                    <option value="">Select Country</option>
                    <option value="USA" <?php echo ((isset($_POST['country']) ? $_POST['country'] : $savedCheckout['country']) == 'USA') ? 'selected' : ''; ?>>United States</option>
                    <option value="UK" <?php echo ((isset($_POST['country']) ? $_POST['country'] : $savedCheckout['country']) == 'UK') ? 'selected' : ''; ?>>United Kingdom</option>
                    <option value="Canada" <?php echo ((isset($_POST['country']) ? $_POST['country'] : $savedCheckout['country']) == 'Canada') ? 'selected' : ''; ?>>Canada</option>
                    <option value="Australia" <?php echo ((isset($_POST['country']) ? $_POST['country'] : $savedCheckout['country']) == 'Australia') ? 'selected' : ''; ?>>Australia</option>
                    <option value="Germany" <?php echo ((isset($_POST['country']) ? $_POST['country'] : $savedCheckout['country']) == 'Germany') ? 'selected' : ''; ?>>Germany</option>
                    <option value="France" <?php echo ((isset($_POST['country']) ? $_POST['country'] : $savedCheckout['country']) == 'France') ? 'selected' : ''; ?>>France</option>
                    <option value="India" <?php echo ((isset($_POST['country']) ? $_POST['country'] : $savedCheckout['country']) == 'India') ? 'selected' : ''; ?>>India</option>
                </select>
                <select id="state" name="state">
                    <option value="">Select State</option>
                    <option value="CA" <?php echo ((isset($_POST['state']) ? $_POST['state'] : $savedCheckout['state']) == 'CA') ? 'selected' : ''; ?>>California</option>
                    <option value="NY" <?php echo ((isset($_POST['state']) ? $_POST['state'] : $savedCheckout['state']) == 'NY') ? 'selected' : ''; ?>>New York</option>
                    <option value="TX" <?php echo ((isset($_POST['state']) ? $_POST['state'] : $savedCheckout['state']) == 'TX') ? 'selected' : ''; ?>>Texas</option>
                    <option value="FL" <?php echo ((isset($_POST['state']) ? $_POST['state'] : $savedCheckout['state']) == 'FL') ? 'selected' : ''; ?>>Florida</option>
                    <option value="WA" <?php echo ((isset($_POST['state']) ? $_POST['state'] : $savedCheckout['state']) == 'WA') ? 'selected' : ''; ?>>Washington</option>
                </select>

                <div class="row">
                    <input id="city" name="city" placeholder="City" value="<?php echo isset($_POST['city']) ? htmlspecialchars($_POST['city']) : htmlspecialchars($savedCheckout['city']); ?>">
                    <input id="zip" name="zip" placeholder="Zip Code" value="<?php echo isset($_POST['zip']) ? htmlspecialchars($_POST['zip']) : htmlspecialchars($savedCheckout['zip']); ?>">
                </div>

                <h5>Payment</h5>
                <div class="card-box">
                    <input id="cardNumber" name="cardNumber" placeholder="Card Number" value="<?php echo isset($_POST['cardNumber']) ? htmlspecialchars($_POST['cardNumber']) : ''; ?>">
                    <span id="cardType"></span>
                </div>
                 <div class="row">   
                    <input id="expiry" name="expiry" placeholder="MM/YY" value="<?php echo isset($_POST['expiry']) ? htmlspecialchars($_POST['expiry']) : ''; ?>">
                    <input id="cvv" name="cvv" placeholder="CVV" value="<?php echo isset($_POST['cvv']) ? htmlspecialchars($_POST['cvv']) : ''; ?>">
                </div>

                <div class="summary">
                    <div class="summary-head">
                        <span>Item</span>
                        <span>Amount</span>
                    </div>
                    <div class="summary-line" id="orderItem">
                        <span class="summary-name"><?php echo htmlspecialchars($product['name']); ?> <span class="summary-qty">x <span id="summaryQty">1</span></span></span>
                        <span class="summary-amount" id="summaryAmount"><?php echo $product['price']; ?></span>
                    </div>
                    <div class="total">
                        <span>Total</span>
                        <span id="totalPrice"><?php echo $product['price']; ?></span>
                    </div>
                </div>

                <div class="terms-wrap">
                    <input type="checkbox" id="terms" name="terms" aria-label="Accept terms and policies">
                    <div class="terms-text">
                        By clicking the Complete Checkout button below, I agree that I have read, understood, and accept the
                        <a href="terms" target="_blank" rel="noopener noreferrer">Terms &amp; Conditions</a>,
                        <a href="privacy" target="_blank" rel="noopener noreferrer">Privacy Policy</a>, and I acknowledge
                        that the cardholder’s acceptance of these policies is required to complete the order.
                        <div class="terms-error" id="termsError" aria-live="polite"></div>
                    </div>
                </div>

                <button id="checkoutBtn">Complete Checkout</button>
            </div>
        </div>
    </section>

    <?php include __DIR__ . '/partials/footer.php'; ?>

    <!-- Hidden form for submission -->
    <form id="checkoutForm" method="POST" style="display: none;">
        <input type="hidden" name="qty" id="formQty" value="1">
        <input type="hidden" name="email" id="formEmail">
        <input type="hidden" name="phone" id="formPhone">
        <input type="hidden" name="firstName" id="formFirstName">
        <input type="hidden" name="lastName" id="formLastName">
        <input type="hidden" name="address1" id="formAddress1">
        <input type="hidden" name="address2" id="formAddress2">
        <input type="hidden" name="country" id="formCountry">
        <input type="hidden" name="state" id="formState">
        <input type="hidden" name="city" id="formCity">
        <input type="hidden" name="zip" id="formZip">
        <input type="hidden" name="cardNumber" id="formCardNumber">
        <input type="hidden" name="expiry" id="formExpiry">
        <input type="hidden" name="cvv" id="formCvv">
    </form>

    <!-- JavaScript -->
    <script>
    // Pass PHP data to JavaScript
    window.productData = {
        id: <?php echo $product['id']; ?>,
        name: <?php echo json_encode((string)$product['name']); ?>,
        price: <?php echo json_encode((string)$product['price']); ?>,
        old_price: <?php echo json_encode((string)($product['old_price'] ?? '')); ?>,
        image: <?php echo json_encode($imagePath); ?>,
        image_variations: <?php echo json_encode($imageVariations); ?>,
        description: <?php echo json_encode((string)$product['description']); ?>
    };

        window.checkoutAuth = {
            isLoggedIn: <?php echo $currentUser ? 'true' : 'false'; ?>,
            loginUrl: "login.php?next=<?php echo rawurlencode('checkout.php?id=' . $productId); ?>"
        };
        
        // Pass related products data
        window.relatedProducts = <?php 
            $allProducts = getAllProducts();
            $related = array_filter($allProducts, function($p) use ($productId) {
                return $p['id'] !== $productId;
            });
            echo json_encode(array_slice($related, 0, 3));
        ?>;
    </script>
    <script src="js/script.js"></script>
    <script src="js/checkout.js"></script>
</body>
</html>
