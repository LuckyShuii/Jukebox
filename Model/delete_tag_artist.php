<?php

try {

    $sql_delete = "DELETE FROM assoc_tag_artist
                   WHERE tag_id = :tag_id
                   AND artist_id = :artist_id";
    $req = $bdd->prepare($sql_delete);
    $req->execute([
        ':tag_id' => $tag_id,
        ':artist_id' => $artist_id
    ]);

    echo "Étiquette supprimée avec succès";

} catch (PDOException $e) {

    echo "Failed to delete tag: " . $e->getMessage();

}
