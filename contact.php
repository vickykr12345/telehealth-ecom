<?php
require_once __DIR__ . '/auth.php';

ensure_contact_messages_table();

$currentUser = auth_current_user();
$contactErrors = $_SESSION['contact_errors'] ?? [];
$contactOld = $_SESSION['contact_old'] ?? [];
$contactSuccess = isset($_GET['contact']) && $_GET['contact'] === 'success';

unset($_SESSION['contact_errors'], $_SESSION['contact_old']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $message = trim($_POST['message'] ?? '');

    $contactErrors = [];

    if ($name === '') {
        $contactErrors[] = 'Name is required.';
    }

    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $contactErrors[] = 'Please enter a valid email address.';
    }

    if ($subject === '') {
        $contactErrors[] = 'Subject is required.';
    }

    if ($phone === '') {
        $contactErrors[] = 'Phone number is required.';
    }

    if ($message === '') {
        $contactErrors[] = 'Message is required.';
    }

    if (!empty($contactErrors)) {
        $_SESSION['contact_errors'] = $contactErrors;
        $_SESSION['contact_old'] = [
            'name' => $name,
            'email' => $email,
            'subject' => $subject,
            'phone' => $phone,
            'message' => $message,
        ];
        header('Location: contact.php?contact=error');
        exit();
    }

    $userId = null;
    if ($currentUser && isset($currentUser['id'], $currentUser['email']) && strtolower((string)$currentUser['email']) === strtolower($email)) {
        $userId = (int)$currentUser['id'];
    }

    $stmt = $conn->prepare("INSERT INTO contact_messages (user_id, name, email, subject, phone, message) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssss", $userId, $name, $email, $subject, $phone, $message);
    $isSaved = $stmt->execute();
    $stmt->close();

    if ($isSaved) {
        header('Location: contact.php?contact=success');
        exit();
    }

    $_SESSION['contact_errors'] = ['Unable to send your message right now. Please try again.'];
    $_SESSION['contact_old'] = [
        'name' => $name,
        'email' => $email,
        'subject' => $subject,
        'phone' => $phone,
        'message' => $message,
    ];
    header('Location: contact.php?contact=error');
    exit();
}

if (empty($contactOld) && $currentUser) {
    $contactOld = [
        'name' => trim(($currentUser['first_name'] ?? '') . ' ' . ($currentUser['last_name'] ?? '')),
        'email' => $currentUser['email'] ?? '',
        'subject' => '',
        'phone' => '',
        'message' => '',
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
<?php include __DIR__ . '/partials/header.php'; ?>

<section class="contact-modern">
  <div class="container">

    <!-- TOP INFO CARDS -->
    <div class="contact-cards">
      <div class="contact-card">
        <div class="icon"><i class="fa-solid fa-envelope"></i></div>
        <h5>Email Address</h5>
        <p>info@webmail.com</p>
        <p>jobs@webexample.com</p>
      </div>

      <div class="contact-card">
        <div class="icon"><i class="fa-solid fa-phone"></i></div>
        <h5>Phone Number</h5>
        <p>+0123-456789</p>
        <p>+987-6543210</p>
      </div>

      <div class="contact-card">
        <div class="icon"><i class="fa-solid fa-location-dot"></i></div>
        <h5>Office Address</h5>
        <p>18/A, New Born Town Hall</p>
        <p>New York, US</p>
      </div>
    </div>

    <!-- FORM -->
    <div class="contact-form-glass">
      <h3>Get A Quote</h3>

      <?php if ($contactSuccess): ?>
        <div class="alert alert-success" role="alert">
          Your message has been sent successfully.
        </div>
      <?php endif; ?>

      <?php if (!empty($contactErrors)): ?>
        <div class="alert alert-danger" role="alert">
          <?php foreach ($contactErrors as $error): ?>
            <div><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <form method="post" action="contact.php">
        <div class="form-grid">
          <div class="input-box">
            <input type="text" name="name" placeholder="Enter your name" value="<?php echo htmlspecialchars($contactOld['name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
            <i class="fa-solid fa-user"></i>
          </div>

          <div class="input-box">
            <input type="email" name="email" placeholder="Enter email address" value="<?php echo htmlspecialchars($contactOld['email'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
            <i class="fa-solid fa-envelope"></i>
          </div>

          <div class="input-box">
            <input type="text" name="subject" placeholder="Enter subject" value="<?php echo htmlspecialchars($contactOld['subject'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
            <i class="fa-solid fa-eye"></i>
          </div>

          <div class="input-box">
            <input type="text" name="phone" placeholder="Enter phone number" value="<?php echo htmlspecialchars($contactOld['phone'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
            <i class="fa-solid fa-phone"></i>
          </div>

          <div class="input-box full">
            <textarea name="message" placeholder="Enter message" required><?php echo htmlspecialchars($contactOld['message'] ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea>
            <i class="fa-solid fa-pen"></i>
          </div>
        </div>

        <button type="submit" class="th-btn mt-3">GET A FREE SERVICE</button>
      </form>
    </div>

    <!-- MAP -->
    <div class="contact-map">
      <iframe 
        src="https://maps.google.com/maps?q=brooklyn&t=&z=13&ie=UTF8&iwloc=&output=embed"
        loading="lazy">
      </iframe>
    </div>

  </div>
</section>

<?php include __DIR__ . '/partials/footer.php'; ?>
<script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

