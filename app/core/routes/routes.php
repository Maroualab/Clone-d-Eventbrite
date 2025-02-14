<?php
namespace App\core\routes;
use App\controllers\ControllerView;

class Routes
{
    public array $routes = [
        "POST" => [
            "/Register" => [ControllerView::class, 'Register'],
            "/Login" => [ControllerView::class, 'Login']

        ],

        "GET" => [
            // "/add" => [CategorieController::class, 'afficherAI'],
            "/dashboardAdmin" => [ControllerView::class, 'Dashboard'],
            "/userManagement" => [ControllerView::class, 'User'],
            "/categoryManagement" => [ControllerView::class, 'Category'],
            "/" => [ControllerView::class, 'Homepage'],
            "/dashboardOrganisateur" => [ControllerView::class, 'DashboardOrganisateur'],
            "/register" => [ControllerView::class, 'Register'],
            "/login" => [ControllerView::class, 'Login'],


        ]
    ];

    public function dispatch($methode, $uri)
    {
        // echo "Routing is working!"; // Debug message
        // echo "Method: $methode, URI: $uri";



        try {
            if (isset($this->routes[$methode][$uri])) {
                [$class, $methode] = $this->routes[$methode][$uri];
                $objClass = new $class();
                $objClass->$methode();
            }
        } catch (\Throwable $th) {
            // Make sure this path is correct
            require_once  $_SERVER['DOCUMENT_ROOT']."/app/views/front/404.php";

        }
    }


}
