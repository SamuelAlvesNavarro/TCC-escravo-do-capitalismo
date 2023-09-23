<?php 
    require "includes/online.php";
    require "includes/conexao.php";
    require "includes/returnUser.php";
    require "includes/enviarErro.php";

    $profile = returnProfileId($_SESSION['email']);

    $id_comment = $_POST['id_comment'];

    $sql = "SELECT * FROM comment WHERE id_comment = $id_comment";

    foreach($pdo->query($sql) as $key => $value){
        $profile_dono = $value['fk_id_profile'];
        $id_story = $value['fk_id_story'];
    }

    if($profile == $profile_dono){

        $delete = "DELETE FROM comment WHERE id_comment = $id_comment";
        $prepare = $pdo->prepare($delete);
        $prepare->execute();

    }else{
        sendToError(8); // Criar um erro de banimento (tentou apagar o comentário de outro usuário)
        exit;
    }

    header("Location:story2.php?story=$id_story");
?>