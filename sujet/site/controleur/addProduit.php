<?php
session_start();
require_once("../metier/DB_connector.php");
require_once("../metier/Produit.php");
require_once("../Dao/ProduitDao.php");

// CSRF token validation
if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    die('Invalid CSRF token');
}

if (isset($_POST['lbProduit']) && isset($_POST['lbDescr']) && isset($_POST['lbImg'])) {
    $cnx = new DB_Connector();
    $jeton = $cnx->openConnexion();

    $produitManager = new ProduitDao($jeton);

    $newProduit = new Produit([
        'titre' => htmlspecialchars($_POST['lbProduit']),
        'descr' => htmlspecialchars($_POST['lbDescr']),
        'img' => htmlspecialchars($_POST['lbImg'])
    ]);

    if ($produitManager->add($newProduit)) {
        $_SESSION['msgAddOk'] = "Produit ajouté avec succès";
    } else {
        $_SESSION['msgAddNok'] = "Erreur lors de l'ajout du produit";
    }

    $cnx->closeConnexion();
    header("Location:../administration.php");
}
?>