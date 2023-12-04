<?php 
require('id.php');

if (isset($_POST['email']) && isset($_POST['password'])) {

    $password = (string) $_POST['password'];

    require('../Model/select_user_mail.php');

    $isPasswordCorrect = password_verify($password, $resultat['password']);

    if ($isPasswordCorrect && isset($password) && isset($email) && ($resultat['role'] === "admin")) {

        include("inc_session.php");    
        sessionInit();

        $_SESSION["check"] = true;
        $_SESSION["email"] = $resultat['email'];

        header('Location: ../View/admin.php');

    } else if(empty($email) && empty($password)) {
        header('Location: ../View/login.php#empty');

    } else if (empty($email)) { 
        header('Location: ../View/login.php#emptyMail');

    }  else if (empty($password)) {
        header('Location: ../View/login.php#emptyPassword');

    } else if (!$resultat || $resultat['role'] === "user") {
        header('Location: ../View/login.php#notFound');
        
    } else {
        header('Location: ../View/login.php#notFound');
    }   
}
?>


