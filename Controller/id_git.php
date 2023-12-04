<?php

/**
 * [EN]
 * Once you've put the good values into variables below
 * Change the name of this file into "id.php" instead of "id_git.php"
 
 * [FR]
 * Une fois que tu as mis les bonne valeurs dans les variables en dessous
 * Change le nom de ce fichier en "id.php" à la place de "id_git.php"
 */

$pass = "password";
$id = "name";
$localhost = "localhost";
$dbname = "dataBase_name";

try{

    $bdd = new PDO('mysql:host=' . $localhost . ';dbname=' . $dbname . ';charset=UTF8MB4', $id, $pass);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {

    echo "Failed PDO connection: " . $e->getMessage();

}

function secure_SQL_XSS($variable) {

    return htmlspecialchars(strip_tags($variable));
    
}