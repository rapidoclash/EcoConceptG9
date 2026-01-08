<?php
session_start();
?>
<!DOCTYPE html>

<html lang="fr">
<head>
	<title>TRUC</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
<!--*************** MENU ***************-->
<?php
	include "views/partials/_header.php";
?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!--*************** END MENU ***************-->
	
	<main id="container">
	</main>
	
<!--*************** PIED DE PAGE ***************-->
<?php
	include "views/partials/_footer.php";
?>

<!--*************** PIED DE PAGE ***************-->
	<script src="scripts/initListeProduits.js"></script>
</body>

</html>