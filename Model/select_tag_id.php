<?php

try {

    $tag_id = secure_SQL_XSS($_GET['tag_id']);

    $sql_check = "SELECT tag_id, tag_id FROM tag WHERE tag_id = :tag_id";

    $req_check = $bdd->prepare($sql_check);
    $req_check->execute([
        ':tag_id' => $tag_id
    ]);
    $resultat = $req_check->fetch();


} catch (PDOException $e) {

    echo "Failed_SELECT_TAG: " . $e->getMessage();

}