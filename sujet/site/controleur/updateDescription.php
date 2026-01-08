<?php
    require_once("../metier/DB_connector.php");

    // 1. Récupération des données du formulaire
    // On vérifie si la variable existe pour éviter une erreur "Undefined index"
    $nouvelleDescription = $_POST['areaModifAccueil'] ?? '';

    try {
        // 2. Connexion via votre nouvelle classe
        $db = new DB_Connector();
        $pdo = $db->openConnexion();

        // 3. Préparation de la requête (SÉCURITÉ MAXIMALE)
        // On met un marqueur ":descr" au lieu de la variable directement.
        // J'ai utilisé 'descr' car 'desc' est un mot réservé SQL et c'était le nom dans votre code précédent.
        $sql = "UPDATE home SET descr = :descr WHERE id = 1";
        
        $stmt = $pdo->prepare($sql);

        // 4. Exécution en injectant la variable proprement
        $stmt->execute([':descr' => $nouvelleDescription]);

        // 5. Fermeture
        $db->closeConnexion();

        // 6. Redirection
        header('Location: ../index.php');
        exit(); // Toujours mettre exit() après un header location

    } catch (PDOException $e) {
        // En cas d'erreur, on l'affiche
        echo "Erreur lors de la mise à jour : " . $e->getMessage();
    }
?>