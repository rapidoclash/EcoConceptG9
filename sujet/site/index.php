<?php 
	session_start();
?>

<!DOCTYPE html>

<html lang="fr">

<head>
<title>TEST GREEN IT</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>	
<!--*************** MENU ***************-->
<?php
	include "views/partials/_header.php";
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
	include "views/partials/_footer.php";
?>

<!--*************** PIED DE PAGE ***************-->
	<script type="text/javascript" src="scripts/slider.js"></script>

</body>

</html>