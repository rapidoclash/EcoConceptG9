<?php
    require_once("metier/DB_connector.php");

    /* 1. Instanciation de votre classe et connexion PDO */
    $db = new DB_Connector();
    $pdo = $db->openConnexion();

    /* 2. Requête SQL */
    $sql = "SELECT home.titre, home.descr, home.img FROM home";

    /* 3. Exécution de la requête via PDO */
    // query() suffit ici car il n'y a pas de variables externes. 
    // Si vous aviez des variables (WHERE id = ?), il faudrait utiliser prepare() + execute()
    $stmt = $pdo->query($sql);

    /* 4. Boucle de lecture */
    // PDO::FETCH_ASSOC permet de récupérer les résultats avec le nom des colonnes
    while ($resultat = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        // Sécurisation des données avant affichage (Protection XSS)
        $titre = htmlspecialchars($resultat['titre'] ?? '');
        $descr =  htmlspecialchars($resultat['descr'] ?? '');
        $img   = htmlspecialchars($resultat['img'] ?? '');

        $description = "<ul class='main-list'>";
        
        if(!empty($titre)) {
            $description .= "<li class='main-item'><p class='titre'>" . $titre . "</p></li>";
        }
        
        if(!empty($descr) && !empty($img)){
            $description .= "<li class ='main-item'><ul class ='sub-list'>";
            $description .= "<li class='sub-item'><p class='texte'>" . $descr . "</p></li>";
            $description .= "<li class='sub-item'><img class='image' src='images/" . $img . "' alt='" . $descr . "'></li>";
            $description .= "</ul></li>";
        
        } else {
            if(!empty($descr)){
                $description .= "<li class='main-item'><p class='texte'>" . $descr . "</p></li>";
            }
            if(!empty($img)){
                $description .= "<li class='main-item'><img class='image' src='images/" . $img . "' alt='" . $descr . "'></li>";
            }
        }
        
        $description .="</ul>";
        echo $description;
    }

    /* 5. Fermeture de la connexion */
    $db->closeConnexion();
?>