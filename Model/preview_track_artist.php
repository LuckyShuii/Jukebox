<?php

try {

    $track_id = secure_SQL_XSS($_GET['track_id']);
    
    $sql_delete = "SELECT track_url FROM track WHERE track_id = $track_id";
    $req = $bdd->prepare($sql_delete);
    $req->execute();
    $resultat = $req->fetch();
    
    echo "<iframe src=" . $resultat['track_url'] . "></iframe>";

} catch (PDOException $e) {

    echo "Failed_TO_PREVIEW_track: " . $e->getMessage();

}