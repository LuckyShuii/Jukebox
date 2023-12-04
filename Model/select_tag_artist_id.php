<?php


try {

    $sql_tag= "SELECT assoc_id FROM assoc_tag_artist WHERE tag_id = :id_tag AND artist_id = :artist_id";
    
    $req_tag = $bdd->prepare($sql_tag);
    $req_tag->execute([
        ':id_tag' => $id_tag,
        ':artist_id' => $artist_id
    ]);

    $resultat_tag_artist = $req_tag->fetch();

} catch (PDOException $e) {

    echo "Failed_INSERT_TRACK: " . $e->getMessage();

}

