<?php
require_once __DIR__ . '/auth.php';
ensure_users_table();

$next = isset($_GET['next']) ? $_GET['next'] : 'profile.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = (string)($_POST['password'] ?? '');

    if ($email !== '' && $password !== '') {
        $stmt = $conn->prepare("SELECT id, first_name, last_name, email, password_hash FROM users WHERE email = ? LIMIT 1");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $res = $stmt->get_result();
        $user = $res ? $res->fetch_assoc() : null;
        $stmt->close();

        if ($user && password_verify($password, $user['password_hash'])) {
            auth_login($user);
            header('Location: ' . $next . (str_contains($next, '?') ? '&' : '?') . 'login=success');
            exit();
        }
    }

    header('Location: login.php?error=1&next=' . urlencode($next));
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>

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
                    <h2>Sign in to your account</h2>
                    <p>Welcome back. Please enter your details.</p>
                </div>

                <form method="POST" class="auth-form">
                    <div class="auth-field">
                        <label>Email</label>
                        <input name="email" type="email" placeholder="you@example.com" required>
                    </div>

                    <div class="auth-field">
                        <label>Password</label>
                        <input name="password" type="password" placeholder="••••••••" required>
                    </div>

                    <input type="hidden" name="next" value="<?php echo htmlspecialchars($next); ?>">

                    <button class="auth-btn" type="submit">Sign in</button>

                    <div class="auth-foot">
                        <span>Don’t have an account?</span>
                        <a href="signup.php">Create account</a>
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
          title: "Login failed",
          message: "Incorrect email or password. Please try again.",
          type: "error"
        });
      }
    </script>
    <?php endif; ?>
</body>
</html>

