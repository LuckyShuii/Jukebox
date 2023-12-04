<?php

  // on s'occupe toujours en premier lieu de la session
  // car un visiteur sans session valide n'a rien à faire ici
  include("inc_session.php"); 
  sessionInit();
  sessionBye(); // c'est une fonction perso

  header("Location: ../View/login.php#logout_ok");
  exit; // sécurité, toujours mettre un exit après un header de redirection

?> 