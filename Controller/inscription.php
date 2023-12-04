<?php
include('id.php');

$password = password_hash("lucas", PASSWORD_DEFAULT);
// requête SQL préparée
$req = $bdd->prepare("INSERT INTO user(email, password, role) VALUES('lucas@gmail.com', '$password', 'admin')");

// Exécution requête SQL
$req->execute();