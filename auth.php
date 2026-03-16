<?php
// Session + auth helpers
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/config.php';

function auth_current_user() {
    return isset($_SESSION['user']) && is_array($_SESSION['user']) ? $_SESSION['user'] : null;
}

function auth_require_login() {
    if (!auth_current_user()) {
        header('Location: login.php?next=' . urlencode($_SERVER['REQUEST_URI'] ?? 'profile.php'));
        exit();
    }
}

function auth_login(array $userRow) {
    $_SESSION['user'] = [
        'id' => (int)$userRow['id'],
        'first_name' => (string)$userRow['first_name'],
        'last_name' => (string)$userRow['last_name'],
        'email' => (string)$userRow['email'],
    ];
}

function auth_logout() {
    unset($_SESSION['user']);
}

function ensure_users_table() {
    global $conn;
    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        first_name VARCHAR(100) NOT NULL,
        last_name VARCHAR(100) NOT NULL,
        email VARCHAR(255) NOT NULL UNIQUE,
        password_hash VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
    $conn->query($sql);
}

function ensure_appointments_table() {
    global $conn;
    $sql = "CREATE TABLE IF NOT EXISTS appointments (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NULL,
        name VARCHAR(150) NOT NULL,
        email VARCHAR(255) NOT NULL,
        appointment_date DATE NOT NULL,
        department VARCHAR(120) NOT NULL,
        status VARCHAR(50) NOT NULL DEFAULT 'pending',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        INDEX idx_appointments_email (email),
        INDEX idx_appointments_user_id (user_id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
    $conn->query($sql);
}

