<?php

/**
 * Objectif de ce script 
 * mettre à jour une étiquette / un tag
 * Mais avant ça, vérifier que l'étiquette, existe
 */

include('id.php');
    
if(isset($_GET['tag_name']) && isset($_GET['tag_update_name'])) {

    if (!empty($_GET['tag_name']) && !empty($_GET['tag_update_name'])) {
        
        require('../Model/select_tag_name.php');

        if(!empty($resultat)) {

            require('../Model/select_update_tag_name.php');

            if(empty($resultat_tag)) {

                require('../Model/update_tag_name.php');

            } else {

                echo "Étiquette déjà existante";

            }

        } else {

            echo "Étiquette inconnue";

        }


    } else {

        echo "Étiquette non-définie";

    }
    
} else {

    echo "Étiquette non-définie";

}
