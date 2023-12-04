<?php

/** 
 * Script de création d'un artiste

 * Ajout d'une ligne pour un nouvel artiste dans la table "artist"
 * Ajout dans la table "track"
 * Ajout dans la table "assoc_tag_artist"
 */

if (isset($_GET['tag_name']) 
 && isset($_GET['track_name']) 
 && isset($_GET['url_ytb']) 
 && isset($_GET['artist_name'])) {

    if (!empty($_GET['tag_name']) 
     && !empty($_GET['track_name']) 
     && !empty($_GET['url_ytb']) 
     && !empty($_GET['artist_name'])) {

        require('id.php');

        $url_ytb     = (string) $_GET['url_ytb'];
        $tag_name    = (string) $_GET['tag_name'];
        $track_name  = (string) $_GET['track_name'];
        $artist_name = (string) $_GET['artist_name'];
    
        require('../Model/select_artist_name.php');
                
        if(empty($artist_id)){
           
            $url_ytb   = (string) $_GET['url_ytb'];
            $check_url = preg_match("/^((?:https?:)?\/\/)?((?:www|m)\.)?((?:youtube\.com|youtu.be))(\/(?:[\w\-]+\?v=|embed\/|v\/)?)([\w\-]+)(\S+)?$/", $url_ytb);

            if($check_url === 1) {

                require('../Model/insert_new_artist.php');
                require('../Model/select_artist_name.php');
                require('../Model/select_tag_name.php');
        
                if(!empty($resultat)) {

                    $id_tag   = $resultat['tag_id'];

                        require('../Model/insert_new_assoc.php');
                        require('../Model/insert_new_track.php');
                        
                } else {
                    echo "Étiquette inconnue";
                } 
            } else {
                echo "Merci de renseigner une URL valide";
            }
        } else {
            echo "Cet artiste existe déjà";
        }
    } else {
        echo "Il manque des informations";
    }
} else {
    echo "Il manque des informations";
}
