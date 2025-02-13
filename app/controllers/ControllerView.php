<?php
namespace App\controllers;

class ControllerView{


    public function Dashboard(){
        require_once "../app/views/admin/dashboard.php";
    }
    public function User(){
        require_once "../app/views/admin/Users.php";
    }
    public function Category(){
        require_once "../app/views/admin/Category.php";
    }
    
}