<?php
session_start();

require_once '../config/database.php';
require_once '../controllers/AuthController.php';

use Controllers\AuthController;

$authController = new AuthController();

$uri = $_SERVER['REQUEST_URI'];

switch ($uri) {
    case '/register':
        $authController->register();
        break;
    case '/login':
        $authController->login();
        break;
    case '/logout':
        $authController->logout();
        break;
}
