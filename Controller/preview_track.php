<?php
include('id.php');

if(isset($_GET['track_id'])) {

    if (!empty($_GET['track_id'])) {
        
        require('../Model/preview_track_artist.php');

    } else {

        echo "Morceau inconnu";

    }
    
} else {

    echo "Morceau non-défini";

}
