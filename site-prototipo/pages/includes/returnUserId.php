<?php
    require "includes/conexao.php";

    function returnProfileId($email){
        
        global $pdo;
        $sql = "SELECT fk_id_profile FROM user_common WHERE email = '$email'";
        foreach($pdo->query($sql) as $key => $value){
            $perfil = $value['fk_id_profile'];
        }

        return $perfil;
    }
