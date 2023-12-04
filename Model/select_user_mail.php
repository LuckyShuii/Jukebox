<?php

try {

    $email = secure_SQL_XSS($_POST['email']);

    $req = $bdd->prepare("SELECT id, email, password, role FROM user WHERE email = :email");
    $req->execute([
        ':email'=>$email,
    ]);
    $resultat = $req->fetch();

} catch (PDOException $e) {

    echo "Failed to find user : " . $e;

}