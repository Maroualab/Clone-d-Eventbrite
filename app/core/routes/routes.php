<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use app\controllers\AuthController;

$authController = new AuthController();

if ($_SERVER['REQUEST_URI'] === '/register' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $authController->register();
}

if ($_SERVER['REQUEST_URI'] === '/login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $authController->login();
}

if ($_SERVER['REQUEST_URI'] === '/logout') {
    $authController->logout();
}
