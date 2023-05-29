<?php
<<<<<<< HEAD
=======
    require "online.php";
    session_destroy();
    header("Location: ../acesso.html");

>>>>>>> bc23f1b84d3bd0a44986842cada1c571fcfb0c1d
    require 'online.php';
    session_unset();
    session_destroy();
    header("Location: ../acesso.html");
?>