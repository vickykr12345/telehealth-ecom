<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/auth.php';
ensure_appointments_table();

$name = $_POST['yourname'] ?? '';
$email = $_POST['emailaddress'] ?? '';
$date = $_POST['appointmentdate'] ?? '';
$department = $_POST['department'] ?? '';

// Basic validation
if (trim($name) === '' || trim($email) === '' || trim($date) === '' || trim($department) === '') {
    header("Location: index.php?appointment=error#book-appointment");
    exit();
}

// Optional: link to logged-in user if emails match
$user = auth_current_user();
$userId = null;
if ($user && isset($user['id']) && isset($user['email']) && strtolower($user['email']) === strtolower(trim($email))) {
    $userId = (int)$user['id'];
}

$stmt = $conn->prepare("INSERT INTO appointments (user_id, name, email, appointment_date, department) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("issss", $userId, $name, $email, $date, $department);
$ok = $stmt->execute();
$stmt->close();

if($ok){
    header("Location: index.php?appointment=success#book-appointment");
    exit();
}else{
    header("Location: index.php?appointment=error#book-appointment");
    exit();
}

?>
