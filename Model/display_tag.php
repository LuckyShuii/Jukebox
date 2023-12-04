<?php

try {

    $sql_tag = "SELECT tag_id, tag_name FROM `tag` ORDER BY lower(tag_name)";
    $req_tag = $bdd->prepare($sql_tag);
    $req_tag->execute();
    $resultat = $req_tag->fetchAll();

    foreach ($resultat as $row) { 
        echo "<option class='option_tag'>" . htmlspecialchars(strip_tags($row['tag_name'])) . "</option>";
    } 

} catch (PDOException $e) {

    echo "Failed to load tag: " . $e->getMessage();

}