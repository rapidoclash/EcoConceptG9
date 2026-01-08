<?php
session_start();

// Sécurité : redirection si pas connecté ou pas admin
if ((!isset($_SESSION['id']) || empty($_SESSION['id'])) && $_SESSION['role'] != "admin") {
    header("Location:connexion.php");
    exit(); // Toujours ajouter exit après une redirection header
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Administration - GREEN IT</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="content/administration.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <?php include "partials/_header.php"; ?>
    <div class="admin-wrapper">

        <div class="admin-card">
            <h1>Ajout d'un nouveau produit</h1>

            <?php
                if (!empty($_SESSION['msgAddOk'])) {
                    echo '<div class="reussite">' . $_SESSION['msgAddOk'] . '</div>';
                    $_SESSION['msgAddOk'] = "";
                }
                if (!empty($_SESSION['msgAddNok'])) {
                    echo '<div class="err">' . $_SESSION['msgAddNok'] . '</div>';
                    $_SESSION['msgAddNok'] = "";
                }
            ?>

            <form id="formAjoutProduit" action="" method="post">
                <div class="form-row">
                    <label for="lbProduit">Titre du produit</label>
                    <input type="text" id="lbProduit" name="lbProduit" placeholder="Ex: Ordinateur reconditionné" required/>
                </div>

                <div class="form-row" id="description">
                    <label for="lbDescr">Description</label>
                    <input type="text" id="lbDescr" name="lbDescr" placeholder="Entrer la description courte" required/>
                </div>

                <div class="form-row" id="image">
                    <label for="lbImg">Image</label>
                    <input type="text" id="lbImg" name="lbImg" placeholder="Ex: mon-image.jpg" required/>
                </div>

                <div class="btn-container">
                    <input id="btnAjoutProduit" type="button" value="Ajouter">
                </div>
            </form>
        </div>


        <div class="admin-card">
            <h1>Modification d'un produit</h1>

            <?php
                if (!empty($_SESSION['msgModifOk'])) {
                    echo '<div class="reussite">' . $_SESSION['msgModifOk'] . '</div>';
                    $_SESSION['msgModifOk'] = "";
                }
                if (!empty($_SESSION['msgModifNok'])) {
                    echo '<div class="err">' . $_SESSION['msgModifNok'] . '</div>';
                    $_SESSION['msgModifNok'] = "";
                }
            ?>

            <form id="formModifproduit" action="#" method="post">
                <div class="form-row" id="rowModificationProduit">
                    <label>Sélectionner</label>
                    <?php include "controleur/initSelectModifProduit.php"; ?>
                </div>  

                <div class="form-row" id="descriptionModif">
                    <label for="lbDescrModif">Description</label>
                    <input type="text" id="lbDescrModif" name="lbDescrModif" placeholder="Modifier la description" required/>
                </div>

                <div class="form-row" id="imageModif">
                    <label for="lbImgModif">Image</label>
                    <input type="text" id="lbImgModif" name="lbImgModif" placeholder="Modifier le nom de l'image" required/>
                </div>

                <div class="btn-container">
                    <input id="btnModifProduit" type="button" value="Modifier">
                </div>
            </form>
        </div>


        <div class="admin-card">
            <h1>Suppression d'un produit</h1>

            <?php
                if (!empty($_SESSION['msgSuppOk'])) {
                    echo '<div class="reussite">' . $_SESSION['msgSuppOk'] . '</div>';
                    $_SESSION['msgSuppOk'] = "";
                }
                if (!empty($_SESSION['msgSuppNok'])) {
                    echo '<div class="err">' . $_SESSION['msgSuppNok'] . '</div>';
                    $_SESSION['msgSuppNok'] = "";
                }
            ?>

            <form id="formSuppProduit" action="#" method="post">
                <div class="form-row" id="rowSuppression">
                    <label>Sélectionner</label>
                    <?php include "controleur/initSelectSuprProduit.php"; ?>
                </div>

                <div class="btn-container">
                    <input id="btnSuppProduit" type="button" value="Supprimer" style="background-color: #d9534f;"> </div>
            </form>
        </div>

    </div> <?php include "partials/_footer.php"; ?>
    <script src="scripts/initSelectModifAccueil.js"></script>
</body>
</html>