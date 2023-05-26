<?php
<<<<<<< HEAD
    require "online.php";
    session_destroy();
    header("Location:acesso.html");
=======
    require 'online.php';
    session_unset();
    session_destroy();
    header("Location:../acesso.html");
>>>>>>> b6221b422d3bc6af44f96e2f0c25c020a600a2e0
?>