<?php
// Single router for pretty URLs (keeps existing .php pages working too)
// Example: /billing-information -> billing-information.php
//          /checkout?id=1       -> checkout.php?id=1

$path = isset($_GET['path']) ? trim((string)$_GET['path'], "/") : "";

// Home
if ($path === "" || $path === "index") {
    require __DIR__ . "/index.php";
    exit();
}

$routes = [
    "about" => "about.php",
    "services" => "services.php",
    "contact" => "contact.php",
    "billing-information" => "billing-information.php",
    "shipping-policy" => "shipping-policy.php",
    "return-policy" => "return-policy.php",
    "terms" => "terms.php",
    "privacy" => "privacy.php",

    "login" => "login.php",
    "signup" => "signup.php",
    "profile" => "profile.php",
    "logout" => "logout.php",

    "checkout" => "checkout.php",
    "thankyou" => "thankyou.php",
];

if (isset($routes[$path])) {
    require __DIR__ . "/" . $routes[$path];
    exit();
}

// Fallback 404
http_response_code(404);
require __DIR__ . "/index.php";

