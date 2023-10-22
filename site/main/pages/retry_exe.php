<?php
    require "includes/returnUser.php";
    require "includes/online.php";

    $email = $_SESSION['email'];
    $perfil = -1;
    $perfil = returnProfileId($email);

    $quest = $_POST['__prof'];

    $getStory = "SELECT fk_id_story from question where id_question = '$quest'";

    foreach($pdo->query($getStory) as $key => $value){
        $id_story = $value['fk_id_story'];
    }

    $check = "SELECT * FROM error_user WHERE fk_id_profile = $perfil and fk_id_story = $id_story";
    $prepare = $pdo->prepare($check);
    $prepare->execute();

    if($prepare->rowCount() > 0){
        
        $delete = "delete from error_user where fk_id_story = $id_story and fk_id_profile = $perfil";
        $prepare = $pdo->prepare($delete);
        $prepare->execute();

    }
    

    if(isset($id_story)){
        header("Location: story.php?story=$id_story#quest_item");
    }
    else{
        header("Location: central.php");
    }
    
?>