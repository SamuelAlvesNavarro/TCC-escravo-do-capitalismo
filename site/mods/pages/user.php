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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="shortcut icon" href="../svg/logo.svg" type="image/x-icon">
    <title>Perfil</title>
    <script src="https://kit.fontawesome.com/f2389f6c39.js" crossorigin="anonymous"></script>
    <style>
        .to-center{
            padding: 20px;
            position: fixed;
            top: 0;
            right: 50px;
            font-size: 30px;
            background: #121212;
            z-index: 1000;
        }
        .to-center a{
            color: white;
        }
    </style>
</head>
<body style='<?php echo $fundo ?>'>
    <div class="to-center">
        <a href="esgotos.php"><i class="fa-solid fa-home"></i></a>
    </div>
    <div class="main">
        <div class="fc foto" style='<?php echo $foto ?>; margin-bottom: 30px;'></div>
        <ul class="list-group">
            <li class="list-group-item">Perfil: <?php echo $perfildono ?></li>
            <li class="list-group-item">ID Usuário: <?php echo $id_dono ?></li>
            <li class="list-group-item">Nome Completo: <?php echo $nome ?></li>
            <li class="list-group-item">Apelido: <?php echo $apelido ?></li>
            <li class="list-group-item">Email: <?php echo $email ?></li>
            <li class="list-group-item">Senha: <?php echo $senha ?></li>
            <li class="list-group-item">Pontos: <?php echo $pontos_leitor ?> <i class="fa-solid fa-book"></i></li>
            <li class="list-group-item">Moedas: <?php echo $moedas ?> <i class="fa-solid fa-coins"></i></li>
        </ul>
    </div>
    <div class="main2">
        <form action="programaticos/ban.php" method="post">
            <input type="hidden" name="emailUser" value="<?php echo $email ?>">
            <input type="submit" class="op ban" value="Banir">
        </form>
    </div>
    <div class="main container text-center mb-3 ">
        <div class="row align-items-start">
            <h1 align="center-2" class="col" style="margin-bottom: 50px;">Denúncia de Perfil</h1>
                <?php
                    require "includes/conexao.php";

                    $sql = "SELECT * FROM report_profile where fk_id_reported = $perfildono or fk_id_reporter = $perfildono";
                ?>
            <!--<a href="index.php" class="p-2 col-2"><button type="button" class="btn-close" disabled aria-label="Close"></button></a>-->
        
            <table align="center" class="col-3 table table-striped border border-black border-1 p-2" style="width: 1200px;">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Código do denunciado</th>
                        <th scope="col">Código do denunciador</th>
                        <th scope="col">Razão</th>
                        <th scope="col">Código</th>
                        <th scope="col">Perfil do Denunciado</th>
                        <th scope="col">Perfil do Denunciador</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($pdo->query($sql) as $key => $value) {

                            if($value['code'] == 1) $cd = "Em Aberto";
                            if($value['code'] == 2) $cd = "Automática";
                            if($value['code'] == 3) $cd = "Resolvido";

                            if($value['fk_id_reporter'] != 666){
                                $x = "<td><a href='user.php?profile=". $value['fk_id_reporter']."'><button class='btn btn-danger'>Investigar</button></a></td>";
                            }else{
                                $x = "<td>Historito</td>";
                            }

                            if($value['fk_id_reported'] != 666){
                                $y = "<td><a href='user.php?profile=". $value['fk_id_reported']."'><button class='btn btn-danger'>Investigar</button></a></td>";
                            }else{
                                $y = "<td>Historito</td>";
                            }

                            echo "<tr scope='row'>";
                            echo "<td>".$value['id_report']."</td>";
                            echo "<td>".$value['fk_id_reported']."</td>";
                            echo "<td>".$value['fk_id_reporter']."</td>";
                            echo "<td>".$value['reason']."</td>";
                            echo "<td>".$cd."</td>";
                            echo "$y";
                            echo "$x";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="main container text-center mb-3 ">
        <div class="row align-items-start">
            <h1 align="center-2" class="col" style="margin-bottom: 50px;">Denúncia de História</h1>
                <?php
                    require "includes/conexao.php";

                    $sql = "SELECT * FROM report_story where fk_id_reporter = $perfildono";
                ?>
            <!--<a href="index.php" class="p-2 col-2"><button type="button" class="btn-close" disabled aria-label="Close"></button></a>-->
        
            <table align="center" class="col-3 table table-striped border border-black border-1 p-2" style="width: 1200px;">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Código da história denunciada</th>
                        <th scope="col">Código do denunciador</th>
                        <th scope="col">Razão</th>
                        <th scope="col">Código</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($pdo->query($sql) as $key => $value) {
                            
                            if($value['code'] == 1) $cd = "Em Aberto";
                            if($value['code'] == 2) $cd = "Automática";
                            if($value['code'] == 3) $cd = "Resolvido";

                            echo "<tr scope='row'>";
                            echo "<td>".$value['id_report']."</td>";
                            echo "<td><a href='mod-story.php?input_1=".$value['fk_id_reported_story']."'>História</a></td>";
                            echo "<td>".$value['fk_id_reporter']."</td>";
                            echo "<td>".$value['reason']."</td>";
                            echo "<td>".$cd."</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>