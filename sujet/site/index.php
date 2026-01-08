<?php 
	session_start();
?>

<!DOCTYPE html>

<html lang="fr">

<head>
<title>TEST GREEN IT</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>	
<!--*************** MENU ***************-->
<?php
	include "partials/_header.php";
?>

<!--*************** END MENU ***************-->
	<section>
		<?php 
			include "includes/slider.php";
		?>
	</section>
	<main>
		<?php
			include "controleur/initIndex.php";
		?>
	</main>
<!--*************** PIED DE PAGE ***************-->
<?php
	include "partials/_footer.php";
?>

<!--*************** PIED DE PAGE ***************-->
	<script type="text/javascript" src="scripts/slider.js"></script>

</body>

</html>