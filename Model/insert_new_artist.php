<?php

try {

    $sql_artist_create = "INSERT INTO `artist`(`artist_name`) VALUES (:artist_name)";
    $req = $bdd->prepare($sql_artist_create);
    $req->execute([
        ':artist_name'=> $artist_name,
    ]);

} catch (PDOException $e) {

    echo "Failed_INSERT_ARTIST: " . $e->getMessage();

}