<?php
session_start();
require_once("../metier/DB_connector.php");
require_once("../metier/User.php");
require_once("../Dao/UserDao.php");

// On récupère et test l'existance des variables de connexion
if (isset($_POST['idUtil']) || isset($_POST['mdpUtil'])) {

    // Accès à la BDD
    $cnx = new DB_connector();
    $jeton = $cnx->openConnexion();

    $userManager = new UserDao($jeton);
    $userId = htmlspecialchars(trim($_POST['idUtil']));
    $mdp = trim($_POST['mdpUtil']);
	
    if ($userManager->checkPassword($userId, $mdp)) {
      $_SESSION['id'] = $userId;
         
		  $cnx->closeConnexion();
		  header('Location:../index.php');
    } else {
		  $_SESSION['errCnx'] = "La combinaison nom d'utilisateur/mot de passe est incorrecte"; 
		  $cnx->closeConnexion();
		  header('Location:../connexion.php');	
    }
}
?>