<?php

try {

    $tag_name = secure_SQL_XSS($_GET['tag_name']);

    $sql_delete = "DELETE FROM tag WHERE tag_name = :tag_name";
    $req = $bdd->prepare($sql_delete);
    $req->execute([
        ':tag_name' => $tag_name
    ]);

    echo "Étiquette supprimée avec succès";

} catch (PDOException $e) {

    echo "Failed_DELETE_TAG: " . $e->getMessage();

}