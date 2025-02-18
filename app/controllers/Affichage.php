<?php
namespace App\controllers;
use App\models\CategorieModel;

class Affichage{
    public function dashboard(){
        require_once(__DIR__ . '/../views/Admin/dashboard.php');
    }

    public function users(){
        require_once(__DIR__ . '/../views/Admin/Users.php');
    }

    public function tags(){
        require_once(__DIR__ . '/../views/Admin/tag.php');
    }

    public function categories(){
        require_once(__DIR__ . '/../views/Admin/category.php');
    }
}