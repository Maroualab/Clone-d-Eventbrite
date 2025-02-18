<?php
include "layouts/header.php";
include "layouts/navbar.php";
include "layouts/sidebar.php";
?>
<div class="table-data">
    <div class="order">
        <!-- Formulaire d'ajout -->
        <div class="head">
            <h3>Ajouter un tag</h3>
        </div>
        <form action="" method="POST" class="add-category-form" style="background:rgb(255, 252, 252); padding: 24px; border-radius: 10px; margin-bottom: 24px; margin-bottom: 16px;" >
            <div class="form-group" style="margin-bottom: 16px">
                <label for="category-name">Nom du tag :</label>
                <input type="text" id="category-name" style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc; font-size: 14px; color: #333;" name="tag_name" required placeholder="Nom du tag">
            </div>
            <button type="submit" class="btn-submit" style="background-color: #3C91E6; color: white; padding: 10px 20px; font-size: 16px; border: none; border-radius: 8px; cursor: pointer; width: 100%;">Ajouter un tag</button>
        </form>

        <!-- Table des catégories -->
        <div class="head">
            <h3>Liste des tags</h3>
            <i class='bx bx-search'></i>
            <i class='bx bx-filter'></i>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Nom du tag</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Health</td>
                    <td>
                        <button style="padding: 8px 16px;font-size: 14px;border: none; border-radius: 5px; cursor: pointer;background-color: #3C91E6; color: white;" class="edit-btn">Edit</button>
                        <button style="padding: 8px 16px;font-size: 14px;border: none; border-radius: 5px; cursor: pointer;background-color: #DB504A; color: white;" class="delete-btn">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<script>
    let active=document.getElementById("tag");
    active.classList.add('active');
</script>
<?php
include "layouts/footer.php";
?>
