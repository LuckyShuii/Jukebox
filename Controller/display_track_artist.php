<?php

require('id.php');


if(isset($_GET['id_artist'])) {

    if (!empty($_GET['id_artist'])) {
        
        require('../Model/display_track_artist.php');

    } else {

        echo "Artiste inconnu";

    }
    
} else {

    echo "Artiste non-défini";

}
