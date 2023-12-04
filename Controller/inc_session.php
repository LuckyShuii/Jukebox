<?php

  function sessionInit() {

    @ini_set("session.cookie_httponly", 1);
    $userFingerprint = substr(sha1(@$_SERVER["HTTP_USER_AGENT"] . @$_SERVER["HTTP_ACCEPT"] . @$_SERVER["HTTP_ACCEPT_LANGUAGE"] . "Une petite phrase aléatoire pour faire plaisir ! =)"), 0, 30);
    session_name("jukebox-" . $userFingerprint);
    session_start();
    session_regenerate_id();

  }

  function sessionValid() {

    return (isset($_SESSION["check"]) AND !empty($_SESSION["check"]));

  }

  function sessionBye() {

    if (!empty($_SESSION)) $_SESSION = [];
    if (isset($_COOKIE[session_name()])) setcookie(session_name(), "", time()-1, "/");
    session_destroy();
    
  }

?>