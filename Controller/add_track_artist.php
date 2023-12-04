<?php
include('id.php');

if (isset($_GET['artist_id'])) {

    require('../Model/select_artist_id.php');

    if(!empty($resultat)) {

        if(isset($_GET['track_name'])) {

            if(isset($_GET['track_url'])) {

                $track_name = secure_SQL_XSS($_GET['track_name']);
                $url_ytb = secure_SQL_XSS($_GET['track_url']);

                if(!empty($track_name)
                && !empty($url_ytb)) {

                    $check_url = preg_match("/^((?:https?:)?\/\/)?((?:www|m)\.)?((?:youtube\.com|youtu.be))(\/(?:[\w\-]+\?v=|embed\/|v\/)?)([\w\-]+)(\S+)?$/", $url_ytb);

                    if($check_url === 1) {

                        require('../Model/insert_new_track.php');

                    } else {

                        echo "Merci de renseigner une URL valide";

                    }


                } else {

                    echo "Merci de renseigner tous les champs";

                }
                
            } else {

                echo "URL youtube du morceau non définie";

            }

        } else {

            echo "Nom du morceau non défini";

        }

    } else {

        echo "Artiste inconnu";

    }

} else {

    echo "Artiste inconnu";

}



