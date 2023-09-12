<?php
    require "includes/conexao.php";
    require "includes/online.php";
 
    $perfildono = -1;
    $perfildono = $_GET['profile'];

    if($perfildono == 0 || $perfildono == 666){
        header("Location: central.php");
        exit;
    }


    $check = "SELECT * FROM user_common WHERE fk_id_profile = '$perfildono'";
    $prepare = $pdo->prepare($check);
    $prepare->execute();

    $rows = $prepare->rowCount();

    if($rows != 1){
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

    $perfilEntrando = -1;

    /* GET RANK */

    $sql = "SELECT * FROM user_common order by pontos_leitor desc, moedas desc Limit 3";
    $rank = 1;

    foreach($pdo->query($sql) as $key => $value){
        if($value["id_user"] == $id_dono){
            break;
        }
        $rank++;
    }

    if($rank < 4) $to_show_rank = "prem";
    else $to_show_rank = "norm";




    $email = $_SESSION['email'];
    $sql = "SELECT fk_id_profile FROM user_common WHERE email = '$email'";
    foreach($pdo->query($sql) as $key => $value){
        $perfilEntrando = $value['fk_id_profile'];
    }

    if($perfildono == -1 || $perfilEntrando == -1) header("Location: error.php?erro=10");

    //Foto
    $sql = "SELECT in_it FROM gadget WHERE id_gadget = $foto and type = 0";
    $prepare = $pdo->prepare($sql);
    foreach($pdo->query($sql) as $key => $value){
        $foto = $value['in_it'];
    }
    $prepare->execute();
    if($prepare->rowCount() == 0){
        $sql = "SELECT in_it FROM gadget WHERE id_gadget = 1 and type = 0";
        foreach($pdo->query($sql) as $key => $value){
            $foto = $value['in_it'];
        }
    }

    //Fundo
    $sql = "SELECT in_it FROM gadget WHERE id_gadget = $fundo and type = 3";
    $prepare = $pdo->prepare($sql);
    foreach($pdo->query($sql) as $key => $value){
        $fundo = $value['in_it'];
    }
    $prepare->execute();
    if($prepare->rowCount() == 0){
        $sql = "SELECT in_it FROM gadget WHERE id_gadget = 2 and type = 3";
        foreach($pdo->query($sql) as $key => $value){
            $fundo = $value['in_it'];
        }
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/f2389f6c39.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="../svg/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/perfil.css?v=1.0123">
    <link rel="stylesheet" href="../css/scroll.css?v=1.09">
    <title>Perfil</title>
</head>
<body>
    <?php 
        require "includes/menu.php";
    ?>
    <div class="all">
        <div class="denuncia-container" id="dcont">
            <div class="denuncia">
                <div class="head">
                    <div class="icon" onclick="showDe()">
                        <i class="fa-solid fa-xmark"></i>
                    </div>
                    <div class="text">
                        Motivo da Denúncia
                    </div>
                </div>
                <div class="reason">
                    <form action="generateReportProfile.php" method="post">
                        <input type="hidden" name="reported" value="<?php echo $perfildono; ?>">
                        <textarea name="reason" id="" cols="30" rows="10" maxlength="255"></textarea>
                        <input type="submit" class="bt-save save-rep" value="Registrar">
                    </form>
                </div>
            </div>
        </div>
        <div class="acess-menu menu-dis" id="acmenu">
            <div class="point" onclick="menu_appear()">
                <div class="icon">
                    <i class="fa-solid fa-bars"></i>
                </div>
                <div class="text">
                    Menu
                </div>
            </div>
            <div class="point" onclick="showDe()">
                <div class="icon">
                    <i class="fas fa-exclamation"></i>
                </div>
                <div class="text">
                    Denunciar<!--<br>Perfil-->
                </div>
            </div>
        </div>
        <div class="main">
            <div class="info">
                <div class="main-info">
                    <div class="suspect-info">
                        <h1 class="formal">Informações Básicas (<?php echo rand(0, 9); echo $perfildono; echo rand(0, 9);?>)</h1>
                        <div class="suspect-info-going">
                            <div class="info-div">
                                <h2>Nome: </h2><span class="written"><?php echo $nome?></span>
                            </div>
                            <div class="info-div">
                                <h2>Moedas: </h2><span class="written"><?php echo $moedas?></span>
                            </div>
                            <div class="info-div">
                                <h2>Pontos de Leitor: </h2><span class="written"><?php echo $pontos_leitor?></span>
                            </div>
                            <div class="info-div">
                                <h2>Posição no ranking: </h2><span class="written"><?php echo $rank?>º</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header">
                <img style="<?php echo $fundo?>" alt="" class="bc">
                <div class="pc">
                    <div class="profile-photo" style="<?php echo $foto?>"></div>
                </div>
            </div>
        </div>
        <div class="split">
            <hr>
        </div>
        <div class="second-info">
            <div class="stories-title">
                <h1 class="formal">Histórias</h1>
            </div>
            <div class="stories-bet">
                <div class="stories">
             
                        <?php
                            $i = 0;
                            $sql = "SELECT * FROM story WHERE fk_id_profile = '$perfildono' AND status = 3";
                            foreach($pdo->query($sql) as $key => $value){
                                $i++;
                                echo "

                                <a href='story.php?input_1=".$value['id_story']."'>
                                    <p>
                                        ". $value['nome']."
                                    </p>
                                </a>

                                ";
                            }
                            
                            if($i == 0) echo "<p>Esse usuário não postou nenhuma história até o momento</p>";
                        ?>
                
                </div>
                <div class="bet-container">
                    <div class="writings">
                        <!---Essa fonte só tem os números 2 e 9. affssss-->
                        Recompensa: <div class="span-nums"><?php echo $rank; echo rand(0, 1000000)?></div> <i class="fa-solid fa-coins"></i>
                    </div>
                </div>
            </div>
        </div>
        <?php

            if($perfildono == $perfilEntrando){

                echo '
                <div class="split">
                    <hr>
                </div>
                <div class="second-info edit">
                    <div class="stories-title">
                        <h1 class="formal">Edição Avançada</h1>
                    </div>
                    <div class="all-data-change">
                        <div class="user-data">
                            <form action="editar_usuario.php" method="post" class="change">
                                <table class="formal">
                                    <thead>
                                        <tr>
                                            <th>Dado</th>
                                            <th>Valor</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Apelido:</td>
                                            <td class="input">
                                                <input type="text" name="apelido" id="" value="'.$apelido.'">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Email:</td>
                                            <td class="input">
                                                <input type="email" name="email" id="" value="'.$email.'">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nome:</td>
                                            <td class="input">
                                                <input type="text" name="nome" id="" value="'.$nome.'">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Senha:</td>
                                            <td class="input">
                                                <input id="senha" type="password" name="senha" id="" value="'.$senha.'">
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>
                                                Salvar Mudanças: 
                                            </td>
                                            <td class="input">
                                                <input class="bt-save" type="submit" value="Salvar">
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </form>
                        </div>
                        <div class="header-change">
                            <img style="'.$fundo.'?>" alt="" class="bc">
                            <div class="pc-change">
                                <div class="profile-photo-change" style="'.$foto.'"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="second-info">
                    <div class="stories-title">
                        <h1 class="formal">Fotos</h1>
                    </div>
                    <div class="pics">
                    ';
                 
                            if($perfildono == $perfilEntrando){
                                $perfil = $perfilEntrando;
                                $gadget = "SELECT * FROM gadget WHERE type = 0";
                                foreach($pdo->query($gadget) as $key => $value){
                                    $item = $value['in_it'];
                                    $preco = $value['preco'];
                                    $code = $value['id_gadget'];

                                    $check = "SELECT * FROM compra WHERE fk_id_gadget = '$code' and fk_id_profile = '$perfil'";
                                    $prepare = $pdo->prepare($check);
                                    $prepare->execute();

                                    $rows = $prepare->rowCount();

                                    if($rows == 1){
                                        echo "<div class='card card-foto' onclick='switchP(".$code.")'>
                                            <div class='card-pic' id=".$code." style='$item'></div>
                                        </div>";
                                    } 
                                }
                            }
                            
                        echo'
                    
                    </div>
                    <div class="stories-title">
                        <h1 class="formal">Fundos</h1>
                    </div>
                    <div class="backs">
                    ';
                        
                            if($perfildono == $perfilEntrando){
                                $gadget = "SELECT * FROM gadget WHERE type = 3";
                                foreach($pdo->query($gadget) as $key => $value){
                                    $item = $value['in_it'];
                                    $preco = $value['preco'];
                                    $code = $value['id_gadget'];

                                    $check = "SELECT * FROM compra WHERE fk_id_gadget = '$code' and fk_id_profile = '$perfil'";
                                    $prepare = $pdo->prepare($check);
                                    $prepare->execute();

                                    $rows = $prepare->rowCount();

                                    if($rows == 1){
                                        echo "<div class='card-fundo-back' onclick='switchP(".$code.")'>
                                            <div class='card-fundo' id=".$code." style='$item'></div>
                                        </div>";
                                    } 
                                }
                            }
                        
                            echo '
                    </div>
                </div>
                
                ';
            }
            
        ?>
    </div>
    <div id="f-cont"></div>
    <script src="../js/menu.js"></script>
    <script src="../js/perfil.js?v=1.01"></script>
    <?php
    if($perfildono == $perfilEntrando){

        echo '<script> 

        function switchP(n) {
            var theForm, newInput1;
            theForm = document.createElement("form");
            theForm.action = "alter_design.php";
            theForm.method = "post";
            newInput1 = document.createElement("input");
            newInput1.type = "hidden";
            newInput1.name = "gadget";
            newInput1.value = n;
            theForm.appendChild(newInput1);
            document.getElementById("f-cont").appendChild(theForm);
            theForm.submit();
        }

        </script>';
    }
    
?>
</body>
</html>