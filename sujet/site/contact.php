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

		<div class="contactContainer">

			<div class="rightContainer">

				<div class = "email">
					<h2> EMAIL </h2>
					<p> scierie.gineste@wanadoo.fr <p>
				</div>

				<div class = "telephone">
					<h2> TELEPHONE </h2>
					<p> +33 9 70 35 54 09 <p>
				</div>

				<div class = "adresse">
					<h2> ADRESSE </h2>
					<ul>
						<li> Route de Rodez <li>
						<li> 12220 <li>
						<li> MONTBAZENS <li>
					</ul>
				</div>

				<div class = "reseauxSociaux">
					<h2> NOUS SUIVRE </h2>

					<ul class="logo">
						<li class="facebook"><a href="https://www.facebook.com/Scierie-du-Fargal-613509152159633/" target="_blank"><img src="images/facebook.webp" loading="lazy"></a></li>
					</ul>
				</div>

			</div>

		</div>

<!--*************** PIED DE PAGE ***************-->
<?php
	include "views/partials/_footer.php";
?>

<!--*************** PIED DE PAGE ***************-->

	</body>

</html>