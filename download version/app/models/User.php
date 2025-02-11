<?php

class User {
    private int $id;
    private string $nom;
    private string $email;
    private string $password;
    private string $role;
    private string $avatar;
    private array $reservations = [];

    public function __construct(int $id, string $nom, string $email, string $password, string $role, string $avatar) {
        $this->id = $id;
        $this->nom = $nom;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        $this->avatar = $avatar;
    }
}