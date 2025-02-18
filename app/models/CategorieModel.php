<?php
namespace App\models;
use App\config\Database;

class CategorieModel{
    private $pdo;
    private $id_categorie;
    private $nom;

    public function __construct($id,$nom) {
        $this->pdo = Database::getConnection();
        $this->nom = $nom;
        $this->id_categorie = $id;
        

    }

    public function addCategorie() {
        $stmt = $this->pdo->prepare("INSERT INTO categorie(name) VALUES(:nom)");
        return $stmt->execute([
            ':nom' => $this->nom
        ]);
    }

    public function getCategories() {
        $stmt = $this->pdo->prepare("SELECT * FROM categorie");
        $stmt->execute();
        $data = $stmt->fetchAll();
        $array=[];
        foreach($data as $row){
            $array[] = [
                'categorie_id' => $row["categorie_id"],
                'name' => $row["name"]
            ];
        }
        return $array;
    }

    public function deleteCategorie($id) {
        $stmt = $this->pdo->prepare("DELETE FROM categorie WHERE categorie_id = :id_categorie");
        return $stmt->execute([
            ':id_categorie' => $id
        ]);
    }

    // public function getCategorieId($id_categorie) {
    //     $stmt = $this->pdo->prepare("SELECT * FROM categorie WHERE id_categorie = :id");
    //     $stmt->execute([
    //         ':id' => $id_categorie
    //     ]);
    //     return $stmt->fetch();

    // }

    // public function displayCategories() {
    //     $categories = $this->getCategories();
    //     return $categories;
    // }

    // public function countCategories() {
    //     $stmt = $this->pdo->prepare("SELECT COUNT(*) as nb_total FROM categorie");
    //     $stmt->execute();
    //     return $stmt->fetch();
    // }

    // public function editCategorie($id, $nom, $description) {
    //     $stmt = $this->pdo->prepare("UPDATE categorie SET nom = :nom, description = :description WHERE id_categorie = :id_categorie");
    //     return $stmt->execute([
    //         ':id_categorie' => $id,
    //         ':nom' => $nom,
    //         ':description' => $description
    //     ]);
    // }

   
}