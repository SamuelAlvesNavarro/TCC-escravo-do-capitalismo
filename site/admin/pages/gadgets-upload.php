<?php
    require "includes/conexao.php";
    require "includes/online.php";

    $name = $_POST['name'];
    $preco = $_POST['preco'];
    $type = $_POST['type'];
    
    $name_image = str_replace(" ", "", $name);
    $name_image = $_FILES[$name_image];
    $extensao = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);

    if($type == 0){
        $path = "background-image: url(../profile-gadgets/pc-profile/$name_image.$extensao";
        //main
        move_uploaded_file($name_image['tmp_name'], "../../main/profile-gadgets/pc-profile/");

        //mod
        move_uploaded_file($name_image['tmp_name'], "../../mods/profile-gadgets/pc-profile/");
    }else{
        $path = "background-image: url(../profile-gadgets/bc-profile/$name_image.$extensao";
        //main
        move_uploaded_file($name_image['tmp_name'], "../../main/profile-gadgets/bc-profile/");

        //mod
        move_uploaded_file($name_image['tmp_name'], "../../mods/profile-gadgets/bc-profile/");
    }

    $image = "INSERT INTO gadgets values(NULL, '$type', '$preco', 1, '$path')";
    $prepare = $pdo->prepare($image);
    $prepare->execute();

    header("Location:gadgets.php");
?>