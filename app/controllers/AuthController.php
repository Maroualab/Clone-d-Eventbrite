<?php
namespace App\controllers;
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';


use App\models\AuthModel;

class AuthController {
    private $authModel;

    public function __construct() {
        $this->authModel = new AuthModel();
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fullName = $_POST['full_name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role = $_POST['role'];

            $avatar = "default.png";

            if (!empty($_FILES['avatar']['name'])) {
            
                $target =  $_SERVER['DOCUMENT_ROOT'].'/app/uploads/'.$_FILES['avatar']['name'];
    
                if (move_uploaded_file($_FILES['avatar']['tmp_name'], $target)) {
                    $avatar = $_FILES['avatar']['name'];
                } else {
                    die("Avatar upload failed.");
                }
            }
            print_r($_POST);
            if ($this->authModel->findByEmail($email)) {
                die("Email already exists.");
            }

            if ($this->authModel->register($fullName, $email, $password, $role, $avatar)) {
                header("Location: /login");
                exit();
            } else {
                die("Registration failed.");
            }
        }

    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            if ($this->authModel->login($email, $password)) {
                header("Location: /dashboard");
                exit();
            } else {
                die("Invalid email or password.");
            }
        }

    }

    public function logout() {
        $this->authModel->logout();
        header("Location: /login");
        exit();
    }
}
