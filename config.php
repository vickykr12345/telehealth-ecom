<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "telehealth";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize input
function sanitizeInput($input) {
    global $conn;
    return mysqli_real_escape_string($conn, trim($input));
}

function ensureProductsTable() {
    global $conn;

    $sql = "CREATE TABLE IF NOT EXISTS products (
        id INT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        price VARCHAR(50) NOT NULL,
        old_price VARCHAR(50),
        image VARCHAR(255) NOT NULL,
        image_variations TEXT DEFAULT NULL,
        category VARCHAR(100) DEFAULT NULL,
        description TEXT NOT NULL,
        rating DECIMAL(3,1) DEFAULT 0,
        reviews INT DEFAULT 0,
        approved TINYINT(1) NOT NULL DEFAULT 1
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
    $conn->query($sql);

    $columnsToEnsure = [
        'image_variations' => "ALTER TABLE products ADD COLUMN image_variations TEXT DEFAULT NULL",
        'category' => "ALTER TABLE products ADD COLUMN category VARCHAR(100) DEFAULT NULL",
        'approved' => "ALTER TABLE products ADD COLUMN approved TINYINT(1) NOT NULL DEFAULT 1",
    ];

    foreach ($columnsToEnsure as $column => $alterSql) {
        $check = $conn->query("SHOW COLUMNS FROM products LIKE '" . sanitizeInput($column) . "'");
        if ($check && $check->num_rows === 0) {
            $conn->query($alterSql);
        }
    }
}

function loadCatalogProducts() {
    static $catalogProducts = null;

    if ($catalogProducts !== null) {
        return $catalogProducts;
    }

    $catalogProducts = [];
    $catalogPath = __DIR__ . '/js/products.json';

    if (!is_file($catalogPath)) {
        return $catalogProducts;
    }

    $json = file_get_contents($catalogPath);
    if ($json === false) {
        return $catalogProducts;
    }

    $decoded = json_decode($json, true);
    if (!is_array($decoded) || !isset($decoded['products']) || !is_array($decoded['products'])) {
        return $catalogProducts;
    }

    $catalogProducts = array_map(function ($product) {
        if (!array_key_exists('approved', $product)) {
            $product['approved'] = 1;
        }
        if (!isset($product['image_variations']) || !is_array($product['image_variations'])) {
            $product['image_variations'] = [];
        }
        return $product;
    }, $decoded['products']);
    return $catalogProducts;
}

function normalizeProductRecord($product) {
    if (!is_array($product)) {
        return null;
    }

    if (isset($product['image_variations']) && is_string($product['image_variations'])) {
        $decoded = json_decode($product['image_variations'], true);
        $product['image_variations'] = is_array($decoded) ? array_values($decoded) : [];
    } elseif (!isset($product['image_variations']) || !is_array($product['image_variations'])) {
        $product['image_variations'] = [];
    }

    $product['approved'] = isset($product['approved']) ? (int)$product['approved'] : 1;
    return $product;
}

function hasStoredProducts() {
    global $conn;

    ensureProductsTable();

    $result = $conn->query("SELECT COUNT(*) AS total FROM products");
    if ($result && ($row = $result->fetch_assoc())) {
        return (int)($row['total'] ?? 0) > 0;
    }

    return false;
}

// Function to get product by ID
function getProductById($productId, $includeUnapproved = false) {
    global $conn;

    ensureProductsTable();

    $productId = (int)$productId;
    $sql = "SELECT * FROM products WHERE id = $productId";
    if (!$includeUnapproved) {
        $sql .= " AND approved = 1";
    }
    $sql .= " LIMIT 1";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        return normalizeProductRecord($result->fetch_assoc());
    }

    if (hasStoredProducts()) {
        return null;
    }

    foreach (loadCatalogProducts() as $product) {
        $approved = isset($product['approved']) ? (int)$product['approved'] : 1;
        if ((int)($product['id'] ?? 0) === $productId && ($includeUnapproved || $approved === 1)) {
            return normalizeProductRecord($product);
        }
    }

    return null;
}

// Function to get all products
function getAllProducts($includeUnapproved = false) {
    global $conn;

    ensureProductsTable();

    $sql = "SELECT * FROM products";
    if (!$includeUnapproved) {
        $sql .= " WHERE approved = 1";
    }
    $sql .= " ORDER BY id ASC";
    $result = $conn->query($sql);

    $products = [];
    if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $products[] = normalizeProductRecord($row);
        }
    }

    if (!empty($products)) {
        return $products;
    }

    if (hasStoredProducts()) {
        return [];
    }

    return array_values(array_map('normalizeProductRecord', array_filter(loadCatalogProducts(), function ($product) use ($includeUnapproved) {
        $approved = isset($product['approved']) ? (int)$product['approved'] : 1;
        return $includeUnapproved || $approved === 1;
    })));
}

function getNextProductId() {
    global $conn;

    ensureProductsTable();

    $result = $conn->query("SELECT MAX(id) AS max_id FROM products");
    if ($result && ($row = $result->fetch_assoc())) {
        return ((int)($row['max_id'] ?? 0)) + 1;
    }

    $maxId = 0;
    foreach (loadCatalogProducts() as $product) {
        $maxId = max($maxId, (int)($product['id'] ?? 0));
    }

    return $maxId + 1;
}

// Ensure optional column exists (non-destructive)
function ensureOrdersColumnExists($columnName, $definitionSql) {
    global $conn;
    $columnName = preg_replace('/[^a-zA-Z0-9_]/', '', $columnName);
    if ($columnName === '') return false;

    $check = $conn->query("SHOW COLUMNS FROM orders LIKE '" . sanitizeInput($columnName) . "'");
    if ($check && $check->num_rows > 0) {
        return true;
    }

    // Try to add the column if it doesn't exist
    $alterSql = "ALTER TABLE orders ADD COLUMN " . $definitionSql;
    return (bool)$conn->query($alterSql);
}

// Function to insert order
function insertOrder($orderData) {
    global $conn;
    
    $sql = "INSERT INTO orders (
        product_id, product_name, quantity, total_price,
        customer_email, customer_phone, customer_first_name, customer_last_name,
        shipping_address1, shipping_address2, shipping_country, shipping_state,
        shipping_city, shipping_zip, payment_card_number, payment_expiry, payment_cvv
    ) VALUES (
        '" . sanitizeInput($orderData['product_id']) . "',
        '" . sanitizeInput($orderData['product_name']) . "',
        '" . sanitizeInput($orderData['quantity']) . "',
        '" . sanitizeInput($orderData['total_price']) . "',
        '" . sanitizeInput($orderData['customer_email']) . "',
        '" . sanitizeInput($orderData['customer_phone']) . "',
        '" . sanitizeInput($orderData['customer_first_name']) . "',
        '" . sanitizeInput($orderData['customer_last_name']) . "',
        '" . sanitizeInput($orderData['shipping_address1']) . "',
        '" . sanitizeInput($orderData['shipping_address2']) . "',
        '" . sanitizeInput($orderData['shipping_country']) . "',
        '" . sanitizeInput($orderData['shipping_state']) . "',
        '" . sanitizeInput($orderData['shipping_city']) . "',
        '" . sanitizeInput($orderData['shipping_zip']) . "',
        '" . sanitizeInput($orderData['payment_card_number']) . "',
        '" . sanitizeInput($orderData['payment_expiry']) . "',
        '" . sanitizeInput($orderData['payment_cvv']) . "'
    )";
    
    if ($conn->query($sql)) {
        return (int)$conn->insert_id;
    }
    return false;
}
?>
