<?php
    require "online.php";
    session_destroy();
    header("Location: ../acesso.html");

    require 'online.php';
    session_unset();
    session_destroy();
    header("Location: ../acesso.html");
?>