<?php
    require "../../site-prototipo/pages/includes/conexao.php";
    $user = 2;

    $sql = "SELECT * FROM user_common ORDER BY pontos_leitor DESC LIMIT 10";
    $rank = 0;
    foreach($pdo->query($sql) as $key => $value){
        $rank++;
        $perfil = $value['fk_id_profile'];

        if($perfil == $user){
            echo "perfil = $perfil, rank = $rank<br>"; 
        }
    }

?>