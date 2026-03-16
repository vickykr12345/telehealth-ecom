<?php

// Include database config
require_once 'config.php';

// Read products from JSON file
$productsData = file_get_contents('js/products.json');
$products = json_decode($productsData, true);

if ($products && isset($products['products'])) {
    foreach ($products['products'] as $product) {
        // Check if product already exists
        $checkSql = "SELECT id FROM products WHERE id = " . (int)$product['id'];
        $result = $conn->query($checkSql);
        
        if ($result->num_rows == 0) {
            // Insert new product
            $sql = "INSERT INTO products (
                id, name, price, old_price, image, description, rating, reviews
            ) VALUES (
                " . (int)$product['id'] . ",
                '" . sanitizeInput($product['name']) . "',
                '" . sanitizeInput($product['price']) . "',
                '" . sanitizeInput($product['old_price']) . "',
                '" . sanitizeInput($product['image']) . "',
                '" . sanitizeInput($product['description']) . "',
                " . (float)$product['rating'] . ",
                " . (int)$product['reviews'] . "
            )";
            
            if ($conn->query($sql) === TRUE) {
                echo "Product " . $product['name'] . " imported successfully<br>";
            } else {
                echo "Error importing product " . $product['name'] . ": " . $conn->error . "<br>";
            }
        } else {
            echo "Product " . $product['name'] . " already exists<br>";
        }
    }
} else {
    echo "Error reading products.json file";
}

$conn->close();
?>