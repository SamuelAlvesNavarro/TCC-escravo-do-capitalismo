<?php   
    require 'includes/conexao.php';
    require "includes/report_profile.php";

    if(!isset($_GET['erro'])) $erro = 667;
    else $erro = $_GET['erro']; 

    $sql = "SELECT * FROM error WHERE id_error='$erro'";
    $prepare = $pdo->prepare($sql);
    $prepare->execute();

    $rows = $prepare->rowCount();
    if($rows != 0){
        foreach($pdo->query($sql) as $key => $value){
            $id_error = $value['id_error'];
            $cod_error = $value['cod_error'];
            $desc = $value['description'];
        }

    }else{
        $id_error = 'Não existe';
        $cod_error = 1;
        $desc = "Esse erro não existe. Por favor, tenha cuidado ao editar o link de uma página";
    }

    if($cod_error == 0 || $cod_error == 4)$to_show = "e0";
    if($cod_error == 1)$to_show = "e1";

    if($cod_error == 2){

        $perfil = -1;
        $email = $_SESSION['email'];
        $perfil = returnProfileId($email);
        if($perfil == -1 || !isset($perfil)){
            header("Location: central.php");  
            exit;
        }

        $to_show = "e2";
        generateReport($perfil, 666, "AUTO - aos esgotos: ".date("d/m/y h:i:s")." - $id_error - OBS", 2);
    }
    if($cod_error == 3){

        $to_show = "e3";
        $perfil = -1;
        $email = $_SESSION['email'];
        $perfil = returnProfileId($email);
        if($perfil == -1 || !isset($perfil)){
            header("Location: central.php");  
            exit;
        }

        generateReport($perfil, 666, "AUTO - aos esgotos: ".date("d/m/y h:i:s")." - $id_error - BAN", 1);
    }
    // resumo, vc vai ter que colocar em todos os links de página de erro (no final), isso: ?erro=(codigo que vc escolher)
    // os códigos 4,7,13,42,666 é reservado 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/f2389f6c39.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="../svg/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="../css/erro.css?v=1.01">
</head>
<body>
    <div class="bc erro <?php echo $to_show;?>">
        <div class="title">
            <strong>
                <?php
                    echo "
                    ERROR: ". $id_error;
                ?>
            </strong>
        </div>
        <div class="main">
            <?php
                echo $desc;
            ?>

            <div class="to-central">
                <a href="index.php"><button>Volte</button></a>
            </div>
        </div>
        <div class="class-show">
            <div class="l1 l">
                Esse erro é considerado do tipo simples.
            </div>
            <div class="l2 l">
                Esse erro é considerado do tipo severo.
            </div>
            <div class="l3 l">
                Esse erro é considerado do tipo banimento automático.
            </div>
        </div>
    </div>
</body>
</html>