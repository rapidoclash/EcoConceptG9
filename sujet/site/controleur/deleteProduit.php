<?php
session_start();
require_once("../metier/DB_connector.php");
require_once("../metier/Produit.php");
require_once("../Dao/ProduitDao.php");

// CSRF token validation
if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    die('Invalid CSRF token');
}

if (isset($_POST['lbProduitSupp'])) {
    $cnx = new DB_Connector();
    $jeton = $cnx->openConnexion();

    $produitManager = new ProduitDao($jeton);

    $produit = $produitManager->getById($_POST['lbProduitSupp']);

    if ($produit) {
        if ($produitManager->delete($produit)) {
            $_SESSION['msgSuppOk'] = "Produit supprimé avec succès";
        } else {
            $_SESSION['msgSuppNok'] = "Erreur lors de la suppression du produit";
        }
    } else {
        $_SESSION['msgSuppNok'] = "Produit non trouvé";
    }

    $cnx->closeConnexion();
    header("Location:../administration.php");
}
?>