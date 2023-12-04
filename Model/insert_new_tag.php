<?php
        
try {

    $tag_name = secure_SQL_XSS($_GET['tag_name']);

    $sql= "INSERT INTO `tag`(`tag_name`) VALUES(:tag_name)";

    $req = $bdd->prepare($sql);
    $req->execute([
        ':tag_name' => $tag_name
    ]);

    echo "Étiquette créée avec succès";

} catch (PDOException $e) {

    echo "Failed_INSERT_TAG: " . $e->getMessage();

}    