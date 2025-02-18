<?php
include "layouts/header.php";
include "layouts/navbar.php";
include "layouts/sidebar.php";
?>

<div class="table-data">
    <div class="order">
        <!-- Formulaire d'ajout -->
        <div class="head">
            <h3>Ajouter une catégorie</h3>
        </div>
        <form action="/addCategorie" method="POST" id="formCategory" class="add-category-form" style="background:rgb(255, 252, 252); padding: 24px; border-radius: 10px; margin-bottom: 24px; margin-bottom: 16px;">
            <div class="form-group" style="margin-bottom: 16px">
                <label for="category-name">Nom de la catégorie:</label>
                <input type="text" id="category-name" style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc; font-size: 14px; color: #333;" name="category_name" required placeholder="Nom de la catégorie">
            </div>
            <button type="submit" class="btn-submit" style="background-color: #3C91E6; color: white; padding: 10px 20px; font-size: 16px; border: none; border-radius: 8px; cursor: pointer; width: 100%;">Ajouter la catégorie</button>
        </form>

        <!-- Table des catégories -->
        <div class="head">
            <h3>Liste des catégories</h3>
            <i class='bx bx-search'></i>
            <i class='bx bx-filter'></i>
        </div>
        <table id="category-table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nom de la catégorie</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>
<script>
    let active = document.getElementById("category");
    active.classList.add('active');

    $(document).ready(function() {
        loadCategories();

        $("#formCategory").on("submit", function(e) {
            e.preventDefault();
            let name = $("#category-name").val();
            $.ajax({
                url: '/addCategorie',
                type: 'POST',
                data: {
                    name
                },
                success: function(response) {
                    loadProducts();
                }
            })
        });

        // window.editProduct = function(id) {
        //     let name = prompt("Entrez le nouveau nom du produit");
        //     let price = prompt("Entrez le nouveau prix");

        //     if (name && price) {
        //         $.ajax({
        //             url: "index.php?action=updateProduct",
        //             type: "POST",
        //             data: {
        //                 id: id,
        //                 name: name,
        //                 price: price
        //             },
        //             success: function(response) {
        //                 //let res = JSON.parse(response);
        //                 loadProducts();
        //             },
        //         });
        //     }
        // };

        window.deleteCategory = function(id) {
            $.ajax({
                url: "/deleteCategory" + id,
                type: "POST",
                data: {
                    id: id
                },
                success: function(response) {
                    console.log("Réponse brute du serveur:", response);
                    try {
                        let res = JSON.parse(response); // Tente de parser la réponse
                        if (res.message === "Produit supprimé avec succès") {
                            alert("Catégorie supprimée avec succès !");
                            loadCategories();
                        } else {
                            alert("Erreur lors de la suppression de la catégorie !");
                        }
                    } catch (e) {
                        console.error("Erreur lors du parsing JSON:", e);
                        alert("Erreur serveur ou format de réponse incorrect.");
                    }
                },
            });
        };

        function loadCategories() {
            $.ajax({
                url: "/getCategories",
                type: "GET",
                success: function(response) {
                    let categories = JSON.parse(response);
                    let rows = "";

                    categories.forEach((category) => {
                        rows += `
                        <tr>
                            <td>${category.categorie_id}</td>
                            <td>${category.name}</td>
                            <td>
                                <button onclick="editCategory(${category.categorie_id})" class="edit-btn" style="padding: 8px 16px;font-size: 14px;border: none; border-radius: 5px; cursor: pointer; background-color: #3C91E6; color: white;">Edit</button>
                                <button onclick="deleteCategory(${category.categorie_id})" class="delete-btn"  style="padding: 8px 16px;font-size: 14px;border: none; border-radius: 5px; cursor: pointer;background-color: #DB504A; color: white;">Delete</button>
                            </td>
                        </tr>
                    `;
                    });

                    $("#category-table tbody").html(rows);
                },
            });
        }
    });
</script>
<?php
include "layouts/footer.php";
?>