<?php

try {

    $tag_name = secure_SQL_XSS($_GET['tag_name']);

    $sql_check = "SELECT tag_id, tag_name FROM tag WHERE tag_name = :tag_name";

    $req_check = $bdd->prepare($sql_check);
    $req_check->execute([
        ':tag_name' => $tag_name
    ]);
    $resultat = $req_check->fetch();


} catch (PDOException $e) {

    echo "Failed_SELECT_TAG: " . $e->getMessage();

}