<?php
    require "includes/conexao.php";
    require "includes/online.php";

    $id_gadget = $_GET['id'];

    $sql = "SELECT compra.*, gadget.* FROM compra, gadget WHERE compra.fk_id_gadget = '$id_gadget' and gadget.id_gadget = '$id_gadget'";
    foreach($pdo->query($sql) as $key => $value){
        $moedas = $value['preco'];
        $id_profile = $value['fk_id_profile'];
    }

    if($id_profile != ''){
        $user = "SELECT * FROM user_common WHERE fk_id_profile = '$id_profile'";
        foreach($pdo->query($user) as $key => $value){
            $user_moedas = $value['moedas'];
        }
        $nuser_moedas = $user_moedas + $moedas;

        $user = "UPDATE user_common SET moedas = '$nuser_moedas' WHERE fk_id_profile = '$id_profile'";
        $prepare = $pdo->prepare($user);
        $prepare->execute();
    }

    $path = "SELECT in_it FROM gadget WHERE id_gadget = '$id_gadget'";
    foreach($pdo->query($path) as $key => $value){
        $caminho = $value['int_it'];
    } 

    $caminho_parts = explode("/", $caminho);
    unset($caminho_parts[0]);
    $caminho = implode("/", $caminho_parts);
    $caminhoAdmin = '../'.$caminho;
    $caminhoMod = '../../mods/'.$caminho;
    $caminhoMain = '../../main/'.$caminho;

    unlink($caminhoAdmin);
    unlink($caminhoMod);
    unlink($caminhoMain);

    $excluir = "DELETE FROM gadget WHERE id_gadget = '$id_gadget'";
    $prepare = $pdo->prepare($excluir);
    $prepare->execute();

    header("Location:gadgets.php");
?>