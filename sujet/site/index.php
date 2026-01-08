<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Accueil - GREEN IT</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>  

    <?php include "partials/_header.php"; ?>
    <section class="slider-container">
        <?php include "includes/slider.php"; ?>
    </section>

    <main class="home-content">
        <div class="content-wrapper">
            <?php include "controleur/initIndex.php"; ?>
        </div>
    </main>

    <?php include "partials/_footer.php"; ?>
    <script type="text/javascript" src="scripts/slider.js"></script>

</body>
</html>