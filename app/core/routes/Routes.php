<?php
namespace App\core\routes;
use App\controllers\Affichage;
use App\controllers\CategorieController;

class Routes{
    public array $routes = [
        "POST"=>[
            "/addCategorie"=>[CategorieController::class, 'addCategorie'],
            // "/deleteCategory/{id}"=>[CategorieController::class, 'supprimerCategorie'],
            
        ],

        "GET"=>[
            "/"=>[Affichage::class, 'dashboard'],
            "/Users"=>[Affichage::class, 'users'],
            "/tag"=>[Affichage::class, 'tags'],
            "/category"=>[Affichage::class, 'categories'],
            "/delete/{id}"=>[CategorieController::class, 'delete'],
            "/getCategories"=>[CategorieController::class, 'afficheCategories'],
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
            error_log($th->getMessage());
            return 'erreur';
        }
    }
}
?>