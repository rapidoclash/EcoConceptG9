<?php
	
	// On récupère tous les éléments du formulaire
	$img1 = htmlspecialchars($_POST['img1']);
    $img2 = htmlspecialchars($_POST["img2"]);
    $img3 = htmlspecialchars($_POST["img3"]);
    $img4 = htmlspecialchars($_POST["img4"]);

    $des1 = htmlspecialchars($_POST['des1']);
    $des2 = htmlspecialchars($_POST["des2"]);
    $des3 = htmlspecialchars($_POST["des3"]);
    $des4 = htmlspecialchars($_POST["des4"]);

    
	$slider = simplexml_load_file('../data.xml') or die("Ouverture du fichier xml impossible");

	// On met à jour
	$slider->slide[0]->image = $img1;
	$slider->slide[1]->image = $img2;
	$slider->slide[2]->image = $img3;
	$slider->slide[3]->image = $img4;

	$slider->slide[0]->description = $des1;
	$slider->slide[1]->description = $des2;
	$slider->slide[2]->description = $des3;
	$slider->slide[3]->description = $des4;

	$slider->asXML('../data.xml') or die("Sauvegarde du fichier xml impossible");

	header('Location: ../index.php'); 

?>