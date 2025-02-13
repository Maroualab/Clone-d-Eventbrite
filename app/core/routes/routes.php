<?php
namespace App\core\routes;
use App\controllers\CategorieController;
use App\controllers\ControllerView;
class Routes{
    public array $routes = [
        "POST"=>[
        ],

        "GET"=>[
            "/"=>[CategorieController::class, 'afficher'],
            "/add"=>[CategorieController::class, 'afficherAI'],
            "/dashboardAdmin"=>[ControllerView::class,'Dashboard'],
            "/userManagement"=>[ControllerView::class,'User'],
            "/categoryManagement"=>[ControllerView::class,'Category']
        ]
    ];

    public function dispatch($methode, $uri){
        try{
            if(isset($this->routes[$methode][$uri])){
                [$class, $methode] = $this->routes[$methode][$uri];
                $objClass= new $class();
                $objClass->$methode();
            }
        }catch(\Throwable $th){
            echo 'erreur';
        }
    }


}

?>