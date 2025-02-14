<?php
namespace App\controllers;
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';



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
    public function Homepage(){
        require_once "../app/views/front/index-2.php";
    }
    public function Register(){
        require_once $_SERVER['DOCUMENT_ROOT'] . '/app/views/front/login.php';
    }
    public function DashboardOrganisateur(){
        require_once $_SERVER['DOCUMENT_ROOT'] . '/app/views/front/organisateurOne.php';
    }
    public function Login(){
        require_once $_SERVER['DOCUMENT_ROOT'] . '/app/views/front/login.php';
    }



  
}