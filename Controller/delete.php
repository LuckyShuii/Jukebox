<?php

/**
 * Objectifs de ce script 
 * Vérifier que l'artiste que l'utilisateur veut sélectionner existe
 * Si il existe, tout supprimer dans la bdd qui est en rapport avec son ID unique
 */

include('id.php');

if(isset($_GET['id'])) {

    if (!empty($_GET['id'])) {
        
        require('../Model/select_artist_id.php');

        if(!empty($resultat)) {

            require('../Model/delete_artist_id.php');

        } else {

            echo "Aucun artiste trouvé";

        }

    } else {

        echo "Impossible de trouver l'artiste";

    }
    
} else {

    echo "Impossible de trouver l'artiste";

}

