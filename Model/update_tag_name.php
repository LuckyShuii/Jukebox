<?php

$tag_name = secure_SQL_XSS($_GET['tag_name']);
$tag_update_name = secure_SQL_XSS($_GET['tag_update_name']);             

try {

    $sql_update = "UPDATE tag SET tag_name = :tag_update_name WHERE tag_name = :tag_name";
    $req = $bdd->prepare($sql_update);
    $req->execute([
        ':tag_name' => $tag_name,
        ':tag_update_name' => $tag_update_name
    ]);

    echo "Étiquette mise à jour avec succès";

} catch (PDOException $e) {

    echo "Failed_DELETE_TAG: " . $e->getMessage();

}