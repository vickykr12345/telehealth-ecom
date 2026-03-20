<?php
// Session + auth helpers
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/config.php';

function auth_admin_email() {
    return 'vicky.kumar@gmail.com';
}

function auth_is_admin($user = null) {
    $user = $user ?: auth_current_user();
    if (!$user || empty($user['email'])) {
        return false;
    }

    return strtolower((string)$user['email']) === auth_admin_email();
}

function auth_current_user() {
    if (!isset($_SESSION['user']) || !is_array($_SESSION['user'])) {
        return null;
    }

    $user = $_SESSION['user'];
    $user['is_admin'] = auth_is_admin($user);
    return $user;
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
        'is_admin' => auth_is_admin($userRow),
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

function ensure_contact_messages_table() {
    global $conn;
    $sql = "CREATE TABLE IF NOT EXISTS contact_messages (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NULL,
        name VARCHAR(150) NOT NULL,
        email VARCHAR(255) NOT NULL,
        subject VARCHAR(255) NOT NULL,
        phone VARCHAR(50) NOT NULL,
        message TEXT NOT NULL,
        is_read TINYINT(1) NOT NULL DEFAULT 0,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        INDEX idx_contact_messages_email (email),
        INDEX idx_contact_messages_user_id (user_id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
    $conn->query($sql);

    $checkIsRead = $conn->query("SHOW COLUMNS FROM contact_messages LIKE 'is_read'");
    if ($checkIsRead && $checkIsRead->num_rows === 0) {
        $conn->query("ALTER TABLE contact_messages ADD COLUMN is_read TINYINT(1) NOT NULL DEFAULT 0 AFTER message");
    }
}

