<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Contact - TRUC</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <?php include "partials/_header.php"; ?>
    <main class="contact-wrapper">
        
        <h1 class="titre">Nous contacter</h1>

        <div class="contact-card">
            
            <div class="contact-grid">
                
                <div class="contact-item">
                    <div class="icon-circle">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <h2>EMAIL</h2>
                    <a href="mailto:scierie.gineste@wanadoo.fr">scierie.gineste@wanadoo.fr</a>
                </div>

                <div class="contact-item">
                    <div class="icon-circle">
                        <i class="fa fa-phone"></i>
                    </div>
                    <h2>TÉLÉPHONE</h2>
                    <a href="tel:+33970355409">+33 9 70 35 54 09</a>
                </div>

                <div class="contact-item">
                    <div class="icon-circle">
                        <i class="fa fa-map-marker"></i>
                    </div>
                    <h2>ADRESSE</h2>
                    <address>
                        Route de Rodez<br>
                        12220 MONTBAZENS
                    </address>
                </div>

                <div class="contact-item">
                    <div class="icon-circle">
                        <i class="fa fa-share-alt"></i>
                    </div>
                    <h2>NOUS SUIVRE</h2>
                    <div class="social-links">
                        <a href="https://www.facebook.com/Scierie-du-Fargal-613509152159633/" target="_blank" class="facebook-link">
                            <i class="fa fa-facebook-square"></i> Facebook
                        </a>
                    </div>
                </div>

            </div>
        </div>

    </main>

    <?php include "partials/_footer.php"; ?>
    </body>
</html>