<?php

try {
    
    $sql_delete = "DELETE FROM assoc_tag_artist
    WHERE artist_id = :artist_id;
    
    DELETE FROM track
    WHERE artist_id = :artist_id;

    DELETE FROM artist
    WHERE artist_id = :artist_id";

    $req = $bdd->prepare($sql_delete);
    $req->execute([
        ':artist_id' => $artist_id
    ]);

    echo "Artiste supprimé avec succès";

} catch (PDOException $e) {

    echo "Failed to delete artist : " . $e->getMessage();

}