<?php
require_once __DIR__ . '/config.php';

header('Content-Type: application/json; charset=utf-8');

$products = getAllProducts(false);
echo json_encode(['products' => array_values($products)]);
