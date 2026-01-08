<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Vidéo - TRUC</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <?php include "partials/_header.php"; ?>
    <main>
        <div class="video-container">
            <iframe 
                src="https://www.youtube.com/embed/dbHXPnhCicI?autoplay=1&mute=1" 
                title="YouTube video player" 
                frameborder="0" 
                allow="autoplay; accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                allowfullscreen>
            </iframe>
        </div>
    </main>

    <?php include "partials/_footer.php"; ?>
    </body>
</html>