<?php
require_once __DIR__ . '/auth.php';
ensure_users_table();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first = trim($_POST['first_name'] ?? '');
    $last = trim($_POST['last_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $pass = (string)($_POST['password'] ?? '');
    $confirm = (string)($_POST['confirm_password'] ?? '');

    if ($first !== '' && $last !== '' && $email !== '' && $pass !== '' && $pass === $confirm) {
        $hash = password_hash($pass, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password_hash) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $first, $last, $email, $hash);
        $ok = $stmt->execute();
        $stmt->close();

        if ($ok) {
            // auto-login
            $user = ['id' => $conn->insert_id, 'first_name' => $first, 'last_name' => $last, 'email' => $email];
            auth_login($user);
            header('Location: profile.php?signup=success');
            exit();
        }
    }

    header('Location: signup.php?error=1');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create account</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/auth.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <?php include 'partials/header.php'; ?>

    <section class="auth">
        <div class="container">
            <div class="auth-card">
                <div class="auth-head">
                    <h2>Create your account</h2>
                    <p>Join Tele‑Health to manage orders and profile settings.</p>
                </div>

                <form method="POST" class="auth-form">
                    <div class="auth-row">
                        <div class="auth-field">
                            <label>First name</label>
                            <input name="first_name" type="text" placeholder="John" required>
                        </div>
                        <div class="auth-field">
                            <label>Last name</label>
                            <input name="last_name" type="text" placeholder="Doe" required>
                        </div>
                    </div>

                    <div class="auth-field">
                        <label>Email</label>
                        <input name="email" type="email" placeholder="you@example.com" required>
                    </div>

                    <div class="auth-row">
                        <div class="auth-field">
                            <label>Password</label>
                            <input name="password" type="password" placeholder="Create a password" required minlength="6">
                        </div>
                        <div class="auth-field">
                            <label>Confirm</label>
                            <input name="confirm_password" type="password" placeholder="Confirm password" required minlength="6">
                        </div>
                    </div>

                    <button class="auth-btn" type="submit">Create account</button>

                    <div class="auth-foot">
                        <span>Already have an account?</span>
                        <a href="login.php">Sign in</a>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <?php include 'partials/footer.php'; ?>

    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <?php if (isset($_GET['error']) && $_GET['error'] === '1'): ?>
    <script>
      if (typeof window.thShowToast === "function") {
        window.thShowToast({
          title: "Sign up failed",
          message: "Please check your details (email may already be used).",
          type: "error"
        });
      }
    </script>
    <?php endif; ?>
</body>
</html>

