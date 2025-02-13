<?php
session_start();

// require_once '../app/config/config.php';
require_once '../app/controllers/AuthController.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';


use app\controllers\AuthController;

$authController = new AuthController();

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // Ensures only path is used

switch ($uri) {
    case '/register':
        $authController->register();
        break;
    case '/':
        require_once $_SERVER['DOCUMENT_ROOT'] . '/app/views/front/index-2.html';
        break;
    case '/dashboard':
        require_once $_SERVER['DOCUMENT_ROOT'] . '/app/views/front/event-booking.html';
        break;
    case '/login':
        $authController->login();
        break;
    case '/logout':
        $authController->logout();
        break;
    
    default:
        http_response_code(404);
        require_once $_SERVER['DOCUMENT_ROOT'] . '/app/views/front/404.html';
        break;
}
