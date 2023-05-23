<?php
    require 'includes/conexao.php';
    require 'includes/returnUser.php';

    $gadget = $_POST['gadget'];

    $sql = "SELECT * FROM gadget WHERE id_gadget = '$gadget'";
    foreach($pdo->query($sql) as $key => $value){
        $type = $value['type'];
        $visual = $value['in_it'];
    }

    $user = "UPDATE profile SET ";
?>