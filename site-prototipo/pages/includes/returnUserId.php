<?php
    require "online.php";
    require "conexao.php";

    function returnProfileId(){
        
        $sql = "SELECT fk_id_profile FROM user_common WHERE email = '$email'";
        foreach($pdo->query($sql) as $key => $value){
            $perfil = $value['fk_id_profile'];
        }

        return $perfil;
    }
