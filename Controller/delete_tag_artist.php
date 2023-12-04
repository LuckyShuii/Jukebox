<?php
include('id.php');

if (isset($_GET['tag_id']) && isset($_GET['artist_id'])) {

    $tag_id = secure_SQL_XSS($_GET['tag_id']);
    $artist_id = secure_SQL_XSS($_GET['artist_id']);

    if (!empty($_GET['tag_id']) && !empty($_GET['artist_id'])) {

        require('../Model/select_tag_id.php');

        if (!empty($resultat)) {

            require('../Model/delete_tag_artist.php');
        } else {

            echo "Étiquette inconnue";
        }
    } else {

        echo "Étiquette inconnue";
    }
} else {

    echo "Étiquette inconnue";
}
