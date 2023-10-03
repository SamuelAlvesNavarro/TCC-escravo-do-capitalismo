<?php
    require "includes/conexao.php";
    require "includes/online.php";

    $name = $_POST['name'];
    $preco = $_POST['preco'];
    $type = $_POST['type'];
    $mostrado = $_POST['mostrado'];
    
    $extensao = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);

    $name_image = str_replace(" ", "", $name);
    //MAIN
    if($type == 0){
        $path = "background-image: url(../profile-gadgets/pc-profile/$name_image.$extensao);";
        move_uploaded_file($_FILES['image']['tmp_name'], "../../main/profile-gadgets/pc-profile/$name_image.$extensao");

        //mod
        copy("../../main/profile-gadgets/pc-profile/$name_image.$extensao", "../../mods/profile-gadgets/pc-profile/$name_image.$extensao");
        copy("../../main/profile-gadgets/pc-profile/$name_image.$extensao", "../../admin/profile-gadgets/pc-profile/$name_image.$extensao");
    }else{
        $path = "background-image: url(../profile-gadgets/bc-profile/$name_image.$extensao);";
        move_uploaded_file($_FILES['image']['tmp_name'], "../../main/profile-gadgets/bc-profile/$name_image.$extensao");

        //mod
        copy("../../main/profile-gadgets/bc-profile/$name_image.$extensao", "../../mods/profile-gadgets/bc-profile/$name_image.$extensao");
        copy("../../main/profile-gadgets/bc-profile/$name_image.$extensao", "../../admin/profile-gadgets/bc-profile/$name_image.$extensao");
    }

    $image = "INSERT INTO gadget values(NULL, '$type', '$preco', 1, '$mostrado', '$path')";
    $prepare = $pdo->prepare($image);
    $prepare->execute();


    header("Location: adicionar-gadgets.php");
?>