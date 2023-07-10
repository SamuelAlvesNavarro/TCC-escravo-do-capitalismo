<?php
    require "includes/conexao.php";
    require "includes/online.php";
    
    $perfildono = -1;
    $perfildono = $_GET['profile'];

    if($perfildono == 0){
        header("Location: central.php");
        exit;
    }

    $sql = "SELECT * FROM user_common WHERE fk_id_profile = '$perfildono'";
    foreach($pdo->query($sql) as $key => $value){
        $id_dono = $value['id_user'];
        $nome = $value['nome'];
        $email = $value['email'];
        $senha = $value['senha'];
        $apelido = $value['apelido'];
        $pontos_leitor = $value['pontos_leitor'];
        $moedas = $value['moedas'];
    }
    
    $sql = "SELECT * FROM profile WHERE id_profile = $perfildono";
    foreach($pdo->query($sql) as $key => $value){
        $foto = $value['foto'];
        $fundo = $value['fundoPerfil'];
    }

    /* GET RANK */

    $sql = "SELECT * FROM user_common order by pontos_leitor DESC limit 3";
    $rank = 1;

    foreach($pdo->query($sql) as $key => $value){
        if($value["id_user"] == $id_dono){
            break;
        }
        $rank++;
    }

    if($rank < 4) $to_show_rank = "prem";
    else $to_show_rank = "norm";
    /* RANK STOP */

    $sql = "SELECT in_it FROM gadget WHERE id_gadget = $foto and type = 0";
    foreach($pdo->query($sql) as $key => $value){
        $foto = $value['in_it'];
    }
    $sql = "SELECT in_it FROM gadget WHERE id_gadget = $fundo and type = 1";
    foreach($pdo->query($sql) as $key => $value){
        $fundo = $value['in_it'];
    }
    
    if($foto == 0 || !isset($foto))$foto = "background-image: url(../profile-gadgets/pc-profile/new-user.jpg);";
    if($fundo == 0 || !isset($fundo))$fundo = "background-color: rgb(0,0,0);";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/profile.css">
    <script src="https://kit.fontawesome.com/f2389f6c39.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="../svg/logo.svg" type="image/x-icon">
    <title>Perfil</title>
</head>
<body style='<?php echo $fundo ?>'>
    <div class="main">
        <div class="fc foto" style='<?php echo $foto ?>'></div>
    </div>
    <div class="main2">
        <form action="programaticos/ban.php" method="post">
            <input type="hidden" name="emailUser" value="<?php echo $email ?>">
            <input type="submit" class="op ban" value="Banir">
        </form>
    </div>
</body>
</html>