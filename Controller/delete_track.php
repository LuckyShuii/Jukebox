<?php

include('id.php');

if(isset($_GET['track_id'])) {

    if (!empty($_GET['track_id'])) {
        
        require('../Model/select_track_id.php');

        if(!empty($resultat)) {

            require('../Model/delete_track_id.php');

        } else {

            echo "Morceau inconnu";

        }

    } else {

        echo "Morceau inconnu";

    }
    
} else {

    echo "Morceau non-défini";

}
