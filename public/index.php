<?php
session_start();

require_once  '../vendor/autoload.php';
use App\core\routes\Routes;

$methode = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

$cleanuri = str_replace('/Clone-d-Eventbrite/public', '', strtok($uri, '?'));

$routes = new Routes();
$routes->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
