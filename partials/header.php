<?php
require_once __DIR__ . '/../auth.php';

// Determine current page for active state
// When using pretty URLs, check the 'path' parameter from router
$__current_path = $_GET['path'] ?? '';
$__page = '';

// Map path to filename for active state comparison
$path_to_file = [
    'index' => 'index.php',
    'about' => 'about.php',
    'services' => 'services.php',
    'shop' => 'shop.php',
    'doctors' => 'doctors.php',
    'contact' => 'contact.php',
    'billing-information' => 'billing-information.php',
    'shipping-policy' => 'shipping-policy.php',
    'return-policy' => 'return-policy.php',
    'terms' => 'terms.php',
    'privacy' => 'privacy.php',
    'terms-new' => 'terms-new.php',
    'login' => 'login.php',
    'signup' => 'signup.php',
    'profile' => 'profile.php',
    'logout' => 'logout.php',
    'checkout' => 'checkout.php',
    'thankyou' => 'thankyou.php',
];

if ($__current_path && isset($path_to_file[$__current_path])) {
    $__page = $path_to_file[$__current_path];
} else {
    // Fallback to PHP_SELF for direct .php access
    $__page = basename($_SERVER['PHP_SELF'] ?? '');
}

function __is_active($file) {
    global $__page;
    return $__page === $file ? ' active' : '';
}

$__user = auth_current_user();
?>

<header class="th-header">
    <nav class="navbar navbar-expand-lg th-navbar">
        <div class="container">
            <a class="navbar-brand th-brand" href="" aria-label="Tele-Health Home">
                <img src="images/Logo.webp" alt="Tele-Health Logo">
            </a>

            <button class="navbar-toggler th-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#thNav"
                aria-controls="thNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="thNav">
                <ul class="navbar-nav mx-auto text-capitalize th-nav">
                    <li class="nav-item">
                        <a class="nav-link<?php echo __is_active('index.php'); ?>" href="index">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link<?php echo __is_active('about.php'); ?>" href="about">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link<?php echo __is_active('services.php'); ?>" href="services">Services</a>
                    </li>
                    <li class="nav-item th-drop">
                        <a class="nav-link<?php echo __is_active('shop.php'); ?>" href="shop">Shop</a>
                    </li>
                    <li class="nav-item th-drop">
                        <a class="nav-link th-drop__toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            System
                        </a>
                        <ul class="dropdown-menu th-dropdown th-drop__menu">
                            <li><a class="dropdown-item" href="#">Price Planning</a></li>
                            <li><a class="dropdown-item" href="doctors">Our Doctors</a></li>
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
                    <a class="th-link th-book-link" href="index#book-appointment">Book Appointment</a>
                    <a class="th-btn" href="contact">Contact Us</a>
                </div>
            </div>
        </div>
    </nav>
</header>

