<?php

// Include database config
require_once 'config.php';

// Ensure products table exists with the fields used by the JSON catalog
$createTableSql = "CREATE TABLE IF NOT EXISTS products (
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
)";

if ($conn->query($createTableSql) !== TRUE) {
    die("Error creating products table: " . $conn->error);
}

$checkImageVariationsColumn = $conn->query("SHOW COLUMNS FROM products LIKE 'image_variations'");
if ($checkImageVariationsColumn && $checkImageVariationsColumn->num_rows === 0) {
    if ($conn->query("ALTER TABLE products ADD COLUMN image_variations TEXT DEFAULT NULL") !== TRUE) {
        die("Error adding image_variations column: " . $conn->error);
    }
}

$checkCategoryColumn = $conn->query("SHOW COLUMNS FROM products LIKE 'category'");
if ($checkCategoryColumn && $checkCategoryColumn->num_rows === 0) {
    if ($conn->query("ALTER TABLE products ADD COLUMN category VARCHAR(100) DEFAULT NULL") !== TRUE) {
        die("Error adding category column: " . $conn->error);
    }
}

$checkApprovedColumn = $conn->query("SHOW COLUMNS FROM products LIKE 'approved'");
if ($checkApprovedColumn && $checkApprovedColumn->num_rows === 0) {
    if ($conn->query("ALTER TABLE products ADD COLUMN approved TINYINT(1) NOT NULL DEFAULT 1") !== TRUE) {
        die("Error adding approved column: " . $conn->error);
    }
}

// Read products from JSON file
$productsData = file_get_contents('js/products.json');
$products = json_decode($productsData, true);

if ($products && isset($products['products'])) {
    foreach ($products['products'] as $product) {
        $productId = (int)($product['id'] ?? 0);
        $name = sanitizeInput($product['name'] ?? '');
        $price = sanitizeInput($product['price'] ?? '');
        $oldPrice = sanitizeInput($product['old_price'] ?? '');
        $image = sanitizeInput($product['image'] ?? '');
        $imageVariations = sanitizeInput(json_encode(isset($product['image_variations']) && is_array($product['image_variations']) ? array_values($product['image_variations']) : []));
        $category = sanitizeInput($product['category'] ?? '');
        $description = sanitizeInput($product['description'] ?? '');
        $rating = (float)($product['rating'] ?? 0);
        $reviews = (int)($product['reviews'] ?? 0);
        $approved = array_key_exists('approved', $product) ? (int)$product['approved'] : 1;

        if ($productId <= 0 || $name === '' || $price === '' || $image === '' || $description === '') {
            echo "Skipped invalid product record<br>";
            continue;
        }

        $existsSql = "SELECT id FROM products WHERE id = " . $productId . " LIMIT 1";
        $existsResult = $conn->query($existsSql);
        $exists = $existsResult && $existsResult->num_rows > 0;

        if ($exists) {
            $sql = "UPDATE products SET
                name = '" . $name . "',
                price = '" . $price . "',
                old_price = '" . $oldPrice . "',
                image = '" . $image . "',
                image_variations = '" . $imageVariations . "',
                category = '" . $category . "',
                description = '" . $description . "',
                rating = " . $rating . ",
                reviews = " . $reviews . ",
                approved = " . $approved . "
                WHERE id = " . $productId;

            if ($conn->query($sql) === TRUE) {
                echo "Product " . htmlspecialchars($product['name']) . " updated successfully<br>";
            } else {
                echo "Error updating product " . htmlspecialchars($product['name']) . ": " . $conn->error . "<br>";
            }
        } else {
            $sql = "INSERT INTO products (
                id, name, price, old_price, image, image_variations, category, description, rating, reviews, approved
            ) VALUES (
                " . $productId . ",
                '" . $name . "',
                '" . $price . "',
                '" . $oldPrice . "',
                '" . $image . "',
                '" . $imageVariations . "',
                '" . $category . "',
                '" . $description . "',
                " . $rating . ",
                " . $reviews . ",
                " . $approved . "
            )";

            if ($conn->query($sql) === TRUE) {
                echo "Product " . htmlspecialchars($product['name']) . " imported successfully<br>";
            } else {
                echo "Error importing product " . htmlspecialchars($product['name']) . ": " . $conn->error . "<br>";
            }
        }
    }
} else {
    echo "Error reading products.json file";
}

$conn->close();
?>
