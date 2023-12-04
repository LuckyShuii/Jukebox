<?php

try {

    $url_ytb = str_replace('watch', 'embed', $url_ytb); 
    $url_ytb = str_replace('?v=', '/', $url_ytb); 

    $sql_track = "INSERT INTO track(track_name, track_url, artist_id) VALUES(:track_name, :url_ytb , :artist_id)";

    $req_track = $bdd->prepare($sql_track);
    $req_track->execute([
        ':track_name' => $track_name,
        ':url_ytb'    => $url_ytb,
        ':artist_id'  => $artist_id
    ]);

    echo "Création effectuée avec succès";

} catch (PDOException $e) {

    echo "Failed_INSERT_TRACK: " . $e->getMessage();    

}