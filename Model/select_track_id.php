<?php

try {

    $track_id = secure_SQL_XSS($_GET['track_id']);

    $sql_check = "SELECT track_id, track_id FROM track WHERE track_id = :track_id";

    $req_check = $bdd->prepare($sql_check);
    $req_check->execute([
        ':track_id' => $track_id
    ]);
    $resultat = $req_check->fetch();


} catch (PDOException $e) {

    echo "Failed_SELECT_track: " . $e->getMessage();

}