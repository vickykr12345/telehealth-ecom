<?php

// Database connection
$conn = mysqli_connect("localhost", "root", "", "telehealth");

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Create products table
$sql = "CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price VARCHAR(50) NOT NULL,
    old_price VARCHAR(50),
    image VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    rating DECIMAL(3,1) DEFAULT 0,
    reviews INT DEFAULT 0
)";

if (mysqli_query($conn, $sql)) {
    echo "Products table created successfully!";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);

?>