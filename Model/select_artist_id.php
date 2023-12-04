<?php

if(isset($_GET['id'])) {

    $artist_id = secure_SQL_XSS($_GET['id']);

} else if (isset($_GET['artist_id'])) {
    
    $artist_id = secure_SQL_XSS($_GET['artist_id']);

}

try {

    $sql_check = "SELECT artist_name FROM artist WHERE artist_id = :artist_id";

    $req_check = $bdd->prepare($sql_check);
    $req_check->execute([
        ':artist_id' => $artist_id
    ]);
    $resultat = $req_check->fetch();

} catch (PDOException $e) {

    echo "Failed: " . $e->getMessage();

}