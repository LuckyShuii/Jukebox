<?php

/**
 * Objectif de ce script 
 * Supprimer une étiquette / un tag
 * Mais avant ça, vérifier que le tag que l'utilisateur veut supprimer, existe
 */

include('id.php');
    
if(isset($_GET['tag_name'])) {

    if (!empty($_GET['tag_name'])) {
        
        require('../Model/select_tag_name.php');

        if(!empty($resultat)) {

            require('../Model/delete_tag_name.php');

        } else {

            echo "Étiquette inconnue";

        }

    } else {

        echo "Étiquette inconnue";

    }
    
} else {

    echo "Étiquette non-définie";

}
