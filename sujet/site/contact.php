<?php
session_start();

// 1. Inclusion des fichiers nécessaires
require_once("metier/DB_connector.php");
require_once("Dao/SupportDao.php");
// On suppose que tu as une classe métier Support.php, sinon il faut la créer
require_once("metier/Support.php"); 

$msgFeedback = "";

// 2. Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btnEnvoyer'])) {
    
    // Nettoyage des entrées
    $nom = htmlspecialchars($_POST['nom'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $sujet = htmlspecialchars($_POST['sujet'] ?? '');
    $message = htmlspecialchars($_POST['message'] ?? '');

    if (!empty($nom) && !empty($email) && !empty($message)) {
        try {
            // Connexion BDD
            $connector = new DB_connector();
            $pdo = $connector->openConnexion();

            // Création du DAO
            $supportManager = new SupportDao($pdo);

            // Création de l'objet Support (Hydratation)
            // Adapte ceci selon comment ton constructeur Support est fait (tableau ou setters)
            $newSupport = new Support([
                'suId' => 0, // Pas d'ID pour un ajout
                'suNom' => $nom,
                'suEmail' => $email,
                'suSub' => $sujet,
                'suMsg' => $message
            ]);

            // Enregistrement
            if ($supportManager->add($newSupport)) {
                $msgFeedback = "<div class='reussite'>Votre message a bien été envoyé !</div>";
            } else {
                $msgFeedback = "<div class='err'>Erreur lors de l'envoi du message.</div>";
            }

        } catch (Exception $e) {
            $msgFeedback = "<div class='err'>Erreur technique : " . $e->getMessage() . "</div>";
        }
    } else {
        $msgFeedback = "<div class='err'>Veuillez remplir tous les champs obligatoires.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Contact - TRUC</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <?php include "partials/_header.php"; ?>
    
    <main class="contact-wrapper">
        
        <h1 class="titre">Nous contacter</h1>

        <?php if(!empty($msgFeedback)) echo $msgFeedback; ?>

        <div class="contact-card">
            
            <div class="contact-grid">
                <div class="contact-item">
                    <div class="icon-circle"><i class="fa fa-envelope"></i></div>
                    <h2>EMAIL</h2>
                    <a href="mailto:scierie.gineste@wanadoo.fr">scierie.gineste@wanadoo.fr</a>
                </div>

                <div class="contact-item">
                    <div class="icon-circle"><i class="fa fa-phone"></i></div>
                    <h2>TÉLÉPHONE</h2>
                    <a href="tel:+33970355409">+33 9 70 35 54 09</a>
                </div>

                <div class="contact-item">
                    <div class="icon-circle"><i class="fa fa-map-marker"></i></div>
                    <h2>ADRESSE</h2>
                    <address>Route de Rodez<br>12220 MONTBAZENS</address>
                </div>

                <div class="contact-item">
                    <div class="icon-circle"><i class="fa fa-share-alt"></i></div>
                    <h2>NOUS SUIVRE</h2>
                    <div class="social-links">
                        <a href="#" target="_blank" class="facebook-link"><i class="fa fa-facebook-square"></i> Facebook</a>
                    </div>
                </div>
            </div>

            <div class="form-separator"></div>
            
            <div class="form-container">
                <h2>Envoyez-nous un message</h2>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="nom">Nom complet *</label>
                        <input type="text" id="nom" name="nom" placeholder="Votre nom" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" id="email" name="email" placeholder="Votre email" required>
                    </div>

                    <div class="form-group">
                        <label for="sujet">Sujet</label>
                        <input type="text" id="sujet" name="sujet" placeholder="Sujet de votre message">
                    </div>

                    <div class="form-group">
                        <label for="message">Message *</label>
                        <textarea id="message" name="message" placeholder="Comment pouvons-nous vous aider ?" required></textarea>
                    </div>

                    <div class="form-actions">
                        <input type="submit" name="btnEnvoyer" value="Envoyer le message" class="button">
                    </div>
                </form>
            </div>

        </div>
    </main>

    <?php include "partials/_footer.php"; ?>
</body>
</html>