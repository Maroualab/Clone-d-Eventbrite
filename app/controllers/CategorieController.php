<?php
namespace App\controllers;
use App\models\CategorieModel;
class CategorieController{


    public function addCategorie(){
        if($_SERVER['REQUEST_METHOD']=== 'POST'){
            $categorie = new CategorieModel(null,$_POST['category_name']);
            $mess = $categorie->addCategorie();
            if ($mess) {
                // echo "category created successfully!";
                header('location: /category');
            }else {
                // echo "Failed to create category.";
                header('location: /category');
            }
        }
    }

    public function afficheCategories() {
        $categorie = new CategorieModel(null,null);
        $data = $categorie->getCategories();
        echo json_encode($data);
    }

    public function delete($id) {
        echo 'hhh';
    }

    public function supprimerCategorie($id) {
        echo 'cc';
        $categorie = new CategorieModel(null,null);
        $result = $categorie->deleteCategorie($id);
        if ($result) {
            echo json_encode(["message" => "Produit supprimé avec succès"]);
        } else {
            echo json_encode(["message" => "Échec de la suppression du produit"]);
        }
    }
}
