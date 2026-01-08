<?php
session_start();
require_once("../metier/DB_connector.php");
require_once("../metier/Produit.php");
require_once("../Dao/ProduitDao.php");

// CSRF token validation
if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    die('Invalid CSRF token');
}

if (isset($_POST['lbProduitModif']) && isset($_POST['lbDescrModif']) && isset($_POST['lbImgModif'])) {
    $cnx = new DB_Connector();
    $jeton = $cnx->openConnexion();

    $produitManager = new ProduitDao($jeton);

    $produit = $produitManager->getById($_POST['lbProduitModif']);

    if ($produit) {
        $produit->setDescr(htmlspecialchars($_POST['lbDescrModif']));
        $produit->setImg(htmlspecialchars($_POST['lbImgModif']));

        if ($produitManager->update($produit)) {
            $_SESSION['msgModifOk'] = "Produit modifié avec succès";
        } else {
            $_SESSION['msgModifNok'] = "Erreur lors de la modification du produit";
        }
    } else {
        $_SESSION['msgModifNok'] = "Produit non trouvé";
    }

    $cnx->closeConnexion();
    header("Location:../administration.php");
}
?>