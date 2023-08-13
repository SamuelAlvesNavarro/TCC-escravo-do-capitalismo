<?php
    require "includes/report_profile.php";

    $perfil = returnProfileId($_SESSION['email']);
    $reason = $_POST['reason'];
    $reported = $_POST['reported'];

    generateReport($perfil, $reported, $reason, 1);

    header("Location: profile.php?profile=$reported");
?>