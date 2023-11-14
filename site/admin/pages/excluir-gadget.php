<?php
    require "includes/conexao.php";
    require "includes/online.php";

    $id_gadget = $_GET['id'];

    $sql = "select profile.id_profile, gadget.preco from profile, compra, gadget where profile.id_profile = compra.fk_id_profile and compra.fk_id_gadget = '$id_gadget' and gadget.id_gadget = '$id_gadget'";
    foreach($pdo->query($sql) as $key => $value){
        $moedas = $value['preco'];

        $user = "
        update user_common
        set moedas = moedas + $moedas
        where 
        user_common.fk_id_profile = '".$value['id_profile']."'
        ";

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

    $excluir = "DELETE FROM evento WHERE script = 'darGadget(".$id_gadget.")'";
    $prepare = $pdo->prepare($excluir);
    $prepare->execute();

    header("Location:gadgets.php");
?>