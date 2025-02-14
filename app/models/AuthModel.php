<?php
namespace App\models;
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use App\config\Database;
use PDO;

class AuthModel {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function register($fullName, $email, $password, $role, $avatar) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $query = "INSERT INTO public.\"User\" (nom, email, password, role, avatar) VALUES (:nom, :email, :password, :role, :avatar)";

        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':nom' => $fullName,
            ':email' => $email,
            ':password' => $hashedPassword,
            ':role' => $role,
            ':avatar' => $avatar
        ]);
    }

    public function findByEmail($email) {
        $query = "SELECT * FROM public.\"User\" WHERE email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function login($email, $password) {
        $user = $this->findByEmail($email);
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            return true;
        }
        return false;
    }

    public function logout() {
        session_destroy();
        unset($_SESSION['user_id']);
        unset($_SESSION['role']);
    }

    public function isAuthenticated() {
        return isset($_SESSION['user_id']);
    }
}

