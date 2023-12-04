<?php

try {

    $track_id = secure_SQL_XSS($_GET['track_id']);

    $sql_delete = "DELETE FROM track
                   WHERE track_id = :track_id";
    $req = $bdd->prepare($sql_delete);
    $req->execute([
        ':track_id' => $track_id
    ]);

    echo "Morceau supprimé avec succès";

} catch (PDOException $e) {

    echo "Failed to delete track: " . $e->getMessage();

}
