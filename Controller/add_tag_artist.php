<?php
include('id.php');

if(isset($_GET['tag_name'])) {

    if (!empty($_GET['tag_name'])) {
        
        require('../Model/select_tag_name.php');

        $id_tag = secure_SQL_XSS($resultat['tag_id']);

        if(!empty($resultat)) {

            $artist_id = secure_SQL_XSS($_GET['artist_id_for_tag']);

            require('../Model/select_artist_id.php');

            if(!empty($resultat)) {

                require('../Model/select_tag_artist_id.php');
    
                if(empty($resultat_tag_artist)) {
        
                    require('../Model/insert_tag_artist_id.php');

                    echo "Étiquette attribuée avec succès";
    
                } else {
    
                    echo "Étiquette déjà attribuée";
    
                }

            }
            
        } else {

            echo "Étiquette inconnue";

        }

    } else {

        echo "Impossible de trouver l'étiquette";

    }
    
} else {

    echo "Impossible de trouver l'étiquette";

}