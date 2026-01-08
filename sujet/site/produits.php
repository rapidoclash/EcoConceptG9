<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<title>Nos Produits - TRUC</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	<?php include "partials/_header.php"; ?>
	<main id="container">
		<?php
		require_once("metier/DB_connector.php");
		require_once("metier/Produit.php");
		require_once("Dao/ProduitDao.php");

		// Ouverture de la connexion BDD
		$cnx = new DB_connector();
		$jeton = $cnx->openConnexion();

		// Création du manager
		$produitManager = new ProduitDao($jeton);
		$produits = $produitManager->getList();

		// 1. On ouvre le conteneur GRILLE (une seule fois avant la boucle)
		echo '<div class="products-grid">';

		// 2. On boucle pour créer les CARTES
		foreach ($produits as $produit) {
			echo '<div class="product-card">';

			// Image du produit
			echo '<div class="card-img">';
			echo '<img src="images/' . $produit->getImg() . '" alt="' . $produit->getTitre() . '">';
			echo '</div>';

			// Contenu (Titre + Description)
			echo '<div class="card-content">';
			echo '<h3 class="card-title">' . $produit->getTitre() . '</h3>';
			echo '<p class="card-desc">' . $produit->getDescr() . '</p>';
			echo '</div>';

			echo '</div>'; // Fin de la carte
		}

		// 3. On ferme le conteneur GRILLE (une seule fois après la boucle)
		echo '</div>';
		?>
	</main>

	<?php include "partials/_footer.php"; ?>
</body>

</html>