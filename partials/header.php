<?php
require_once __DIR__ . '/../auth.php';

// Simple active-link helper
$__page = basename($_SERVER['PHP_SELF'] ?? '');
function __is_active($file) {
    global $__page;
    return $__page === $file ? ' active' : '';
}

$__user = auth_current_user();
?>

<header class="th-header">
    <nav class="navbar navbar-expand-lg th-navbar">
        <div class="container">
            <a class="navbar-brand th-brand" href="index.php" aria-label="Tele-Health Home">
                <img src="images/Logo.png" alt="Tele-Health Logo">
            </a>

            <button class="navbar-toggler th-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#thNav"
                aria-controls="thNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="thNav">
                <ul class="navbar-nav mx-auto text-capitalize th-nav">
                    <li class="nav-item">
                        <a class="nav-link<?php echo __is_active('index.php'); ?>" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link<?php echo __is_active('about.php'); ?>" href="about">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link<?php echo __is_active('services.php'); ?>" href="services">Services</a>
                    </li>
                    <li class="nav-item dropdown th-drop">
                        <a class="nav-link dropdown-toggle th-drop__toggle<?php echo __is_active('book-appointment.php'); ?>" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            System
                        </a>
                        <ul class="dropdown-menu th-dropdown th-drop__menu">
                            <li><a class="dropdown-item" href="#">Price Planning</a></li>
                            <li><a class="dropdown-item" href="#">Our Doctors</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <?php if ($__user): ?>
                                <li><a class="dropdown-item" href="profile">Profile</a></li>
                                <li><a class="dropdown-item" href="logout">Logout</a></li>
                            <?php else: ?>
                                <li><a class="dropdown-item" href="login">Log in</a></li>
                                <li><a class="dropdown-item" href="signup">Sign up</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                </ul>

                <div class="d-flex align-items-center gap-2 th-nav-cta">
                    <a class="th-link th-book-link" href="index.php#book-appointment">Book Appointment</a>
                    <a class="th-btn" href="contact">Contact Us</a>
                </div>
            </div>
        </div>
    </nav>
</header>

