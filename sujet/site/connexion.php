<?php
session_start();
?>
<!DOCTYPE html>

<html lang="fr">

<head>
	<title>TEST GREEN IT</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

	<section>
		<!--*************** MENU ***************-->
		<?php
		include "partials/_header.php";
		?>

		<!--*************** END MENU ***************-->
	</section>

	<div class="forms">

		<ul class="onglets">
			<li class="onglet active"><a href="#login">Connexion</a></li>
			<li class="onglet"><a href="#sinscrire">Inscription</a></li>
		</ul>

		<form action="controleur/traitementFormConnexion.php" method="POST" id="login">
			<h1>Connexion</h1>
			<span class="err"><?php
								if (isset($_SESSION['errCnx'])) {
									echo htmlspecialchars($_SESSION['errCnx']);
									$_SESSION['errCnx'] = "";
								}
								if (isset($_SESSION['creationOk'])) {
									echo htmlspecialchars($_SESSION['creationOk']);
									$_SESSION['creationOk'] = "";
								}
								if (isset($_SESSION['creationNok'])) {
									echo htmlspecialchars($_SESSION['creationNok']);
									$_SESSION['creationNok'] = "";
								}
								if (isset($_SESSION['errMdp'])) {
									echo htmlspecialchars($_SESSION['errMdp']);
									$_SESSION['errMdp'] = "";
								}
								if (isset($_SESSION['errId'])) {
									echo htmlspecialchars($_SESSION['errId']);
									$_SESSION['errId'] = "";
								}
								?></span>
			<div class="input-field">

				<label for="idUtil">Identifiant</label>
				<input type="text" placeholder="Entrer le nom d'utilisateur" name="idUtil" id="idUtil" required>

				<label for="mdpUtil">Mot de Passe</label>
				<input type="password" placeholder="Entrer le mot de passe" name="mdpUtil" id="mdpUtil" required>

				<input type="submit" value="Se connecter" class="button">


			</div>
		</form>

		<form action="controleur/traitementFormInscription.php" id="sinscrire" method="POST">
			<h1>S'inscrire</h1>
			<?php
			$msgInscription = "";

			// On récupère les messages d'erreur s'ils existent
			if (isset($_SESSION['errMdp'])) {
				$msgInscription .= $_SESSION['errMdp'] . " "; // Ajout d'un espace au cas où
				$_SESSION['errMdp'] = "";
			}

			if (isset($_SESSION['errId'])) {
				$msgInscription .= $_SESSION['errId'];
				$_SESSION['errId'] = "";
			}

			// On affiche le span SEULEMENT s'il y a du texte
			if (!empty($msgInscription)) {
				echo '<span class="err">' . htmlspecialchars($msgInscription) . '</span>';
			}
			?>
			<div class="input-field">
				<label for="idUtilCreation">Identifiant</label>
				<input type="text" placeholder="Choisir un nom d'utilisateur" name="idUtilCreation" id="idUtilCreation" required>

				<label for="pwdCreation">Mot de Passe</label>
				<input type="password" placeholder="Choisir un mot de passe" name="pwdCreation" id="pwdCreation" required>

				<label for="pwdBis">Confirmez le Mot de Passe</label>
				<input type="password" placeholder="Ressaisir le mot de passe" name="pwdBis" id="pwdBis" required>

				<input type="submit" value="S'inscrire" class="button" />
			</div>
		</form>
	</div>

	<!--*************** PIED DE PAGE ***************-->
	<?php
	include "partials/_footer.php";
	?>

	<!--*************** PIED DE PAGE ***************-->

	<script type="text/javascript">
		function fadeIn(element, duration) {
			element.style.opacity = 0;
			element.style.display = 'block';

			let start = null;

			function animate(timestamp) {
				if (!start) start = timestamp;
				const progress = timestamp - start;
				const opacity = Math.min(progress / duration, 1);

				element.style.opacity = opacity;

				if (progress < duration) {
					requestAnimationFrame(animate);
				}
			}

			requestAnimationFrame(animate);
		}

		document.addEventListener('DOMContentLoaded', function() {
			const links = document.querySelectorAll('.onglet a');
			const forms = document.querySelectorAll('.forms > form');

			links.forEach(function(link) {
				link.addEventListener('click', function(e) {
					e.preventDefault();

					const parent = this.parentElement;

					// Ajout / suppression de la classe "active"
					parent.classList.add('active');
					Array.from(parent.parentElement.children).forEach(function(sibling) {
						if (sibling !== parent) {
							sibling.classList.remove('active');
						}
					});

					// Cacher tous les formulaires
					forms.forEach(function(form) {
						form.style.display = 'none';
					});

					// Afficher le formulaire ciblé
					const targetSelector = this.getAttribute('href');
					const target = document.querySelector(targetSelector);

					if (target) {
						fadeIn(target, 333);
					}
				});
			});
		});
	</script>

</body>

</html>