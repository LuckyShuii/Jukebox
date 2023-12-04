<?php

try {

    $tag_name = secure_SQL_XSS($_GET['tag_name']);
    $artist_id = secure_SQL_XSS($_GET['artist_id_for_tag']);

    $sql_tag= "INSERT INTO assoc_tag_artist(tag_id, artist_id) VALUES(:id_tag, :artist_id)";
    
    $req_tag = $bdd->prepare($sql_tag);
    $req_tag->execute([
        ':id_tag' => $id_tag,
        ':artist_id' => $artist_id
    ]);

} catch (PDOException $e) {

    echo "Failed_INSERT_TRACK: " . $e->getMessage();

}

