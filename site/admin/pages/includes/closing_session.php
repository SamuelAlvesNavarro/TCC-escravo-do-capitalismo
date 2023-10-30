<?php
    require 'online.php';
    session_unset();
    session_destroy();
    header("Location: ../index.php");
?>