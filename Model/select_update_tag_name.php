<?php

$tag_update_name = secure_SQL_XSS($_GET['tag_update_name']);

try {

    $sql_check = "SELECT tag_id, tag_name FROM tag WHERE tag_name = :tag_update_name";

    $req_check = $bdd->prepare($sql_check);
    $req_check->execute([
        ':tag_update_name' => $tag_update_name
    ]);
    $resultat_tag = $req_check->fetch();

} catch (PDOException $e) {

    echo "Failed_SELECT_TAG: " . $e->getMessage();

}