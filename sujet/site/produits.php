<?php
	session_start();
?>
<!DOCTYPE html>

<html lang="fr">
<head>
	<title>TRUC</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	<!--*************** MENU ***************-->
	<?php
		include "views/partials/_header.php";
	?>
	<!--*************** END MENU ***************-->
	
	<!--*************** LISTE PRODUITS ***************-->
	<main id="container">
		<?php
			require_once("metier/DB_connector.php");
			require_once("metier/Produit.php");
			require_once("Dao/ProduitDao.php");

			// Ouverture de la connexion BDD
			$cnx = new DB_connector();
			$jeton = $cnx->openConnexion();


			// Création du manager permettant les actions en BDD
			$produitManager = new ProduitDao($jeton);

			$produits = $produitManager->getList();



			for ($i = 0; $i < count($produits); $i++) {
				
				$produit = "<ul class='main-list'>";
				$produit .= "<li class='main-item'><p class='titre'>".$produits[$i]->getTitre()."</p></li>";
				$produit .= "<li class ='main-item'><ul class ='sub-list'>";
				$produit .= "<li class='sub-item'><p class='texte'>".$produits[$i]->getDescr()."</p></li>";
				$produit .= "<li class='sub-item'><img class='image' src='images/".$produits[$i]->getImg()."'></li>";		
				$produit .= "</ul></li></ul>";
				echo $produit;
			}
		?>
	</main>
	<!--*************** END LISTE PRODUITS ***************-->
	
	<!--*************** PIED DE PAGE ***************-->
	<?php
		include "views/partials/_footer.php";
	?>
	<!--*************** END PIED DE PAGE ***************-->
</body>

</html>