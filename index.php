<?php
require 'database.php';
require 'routes.php';

$requestMethod = $_SERVER["REQUEST_METHOD"];
$requestUri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

if (isset($routes[$requestUri][$requestMethod])) {
    $handler = $routes[$requestUri][$requestMethod];
    $handler();
} else {
    http_response_code(404);
    echo "Not Found";
}
