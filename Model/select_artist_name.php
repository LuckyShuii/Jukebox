<?php

try {

    $artist_name = secure_SQL_XSS($_GET['artist_name']);

    $sql_artist = "SELECT artist_id, artist_name FROM artist WHERE artist_name = :artist_name";

    $req = $bdd->prepare($sql_artist);
    $req->execute([
        ':artist_name'=> $artist_name,
    ]);
    $artist_id = $req->fetch();
    $artist_id = secure_SQL_XSS($artist_id['artist_id']);

} catch (PDOException $e) {

    echo "Failed_SELECT_ARTIST: " . $e->getMessage();

}