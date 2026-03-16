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

// Function to get product by ID
function getProductById($productId) {
    global $conn;
    
    $productId = (int)$productId;
    $sql = "SELECT * FROM products WHERE id = $productId";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    }
    
    return null;
}

// Function to get all products
function getAllProducts() {
    global $conn;
    
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);
    
    $products = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }
    
    return $products;
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