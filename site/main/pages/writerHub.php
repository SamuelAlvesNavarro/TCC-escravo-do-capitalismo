<?php
    require "includes/conexao.php";
    require "includes/online.php";
    include "includes/returnUser.php";

    $perfil = -1;
    $email = $_SESSION['email'];
    $perfil = returnProfileId($email);
    if($perfil == -1 || !isset($perfil)){
        header("Location: error.php");  
        exit;
    }
    
    $sql = "SELECT * FROM user_common WHERE fk_id_profile = $perfil";
    foreach($pdo->query($sql) as $key => $value){
        $nome = $value['nome'];
        $apelido = $value['apelido'];
        $id_user = $value['id_user'];
        $moedas = $value['moedas'];
        $pontos = $value['pontos_leitor'];
    }

    /* PEGANDO TOP */

    $topUsers = array();
    $i =  0;
    $sql = "select count(*) as amount, story.fk_id_profile, user_common.apelido from story, user_common where story.fk_id_profile = user_common.fk_id_profile and story.status = 3 group by story.fk_id_profile order by amount desc limit 3;";
    foreach($pdo->query($sql) as $key => $value){
        $topUsers[$i] = $value['apelido'];
        $amounts[$i] = $value['amount'];
        $i++;
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/f2389f6c39.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/writerHub.css">
    <link rel="shortcut icon" href="../svg/logo.svg" type="image/x-icon">
    <title>Área do escritor</title>
</head>
<body>
    <div class="all">
        <div id="all-menu" class="all_menu disappear">
            <div id="chevron-menu" class="close-menu chevron-phases" onclick="menu_appear()">
                <i class="fa-sharp fa-solid fa-xmark"></i>
            </div>
            <div id="menu" class="menu off">
                <div class="lamp">
                    <div class="wire">
                        
                    </div>
                    <i onclick="switchMenu(1)" class="fa-solid fa-lightbulb"></i>
                </div>
                <div class="lamp-area" onclick="switchMenu(2)">
                </div> 
                <div class="content">
                    <ul>
                        <li><a href="central.php" target="_blank" rel="noopener noreferrer">Central</a></li>
                        <li><a href="profile.php?profile=<?php echo $perfil?>" target="_blank" rel="noopener noreferrer">Perfil</a></li>
                        <li><a href="loja.php" target="_blank" rel="noopener noreferrer">Loja</a></li>
                        <li><a href="writerHub.php" target="_blank" rel="noopener noreferrer">Criação</a></li>
                        <div class="search">
                            <form action="pesquisa.php" method="get">
                                <div class="search-box">
                                    <button class="btn-search"><i class="fas fa-search"></i></button>
                                    <input required type="text" name="busca" class="input-search" placeholder="Pesquisar história........">
                                </div>
                            </form>
                        </div>
                    </ul>
                    <!--<img src="https://clipart-library.com/images/rcLoyAzKi.png" alt="" srcset="">-->
                </div>
            </div>
        </div>
        <div class="nav">
            <div class="go-back" onclick="acentral()">
                <i class="fa-solid fa-chevron-left"></i>
            </div>
            <div class="go-menu" onclick="switchTheme()">
                <i id="mode" onclick="switchTheme()" class="fa-solid fa-sun"></i>
            </div>
            <div class="logo-pic">
                <svg id="eBYGrpvxAe61" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 500 500" shape-rendering="geometricPrecision" text-rendering="geometricPrecision"><path d="M40.1,467.1l-11.2,9c-3.2,2.5-7.1,3.9-11.1,3.9C8,480,0,472,0,462.2L0,192C0,86,86,0,192,0s192,86,192,192v270.2c0,9.8-8,17.8-17.8,17.8-4,0-7.9-1.4-11.1-3.9l-11.2-9c-13.4-10.7-32.8-9-44.1,3.9l-30.5,35c-3.3,3.8-8.2,6-13.3,6s-9.9-2.2-13.3-6l-26.6-30.5c-12.7-14.6-35.4-14.6-48.2,0L141.3,506c-3.3,3.8-8.2,6-13.3,6s-9.9-2.2-13.3-6L84.2,471c-11.3-12.9-30.7-14.6-44.1-3.9ZM160,192c0-17.673112-14.326888-32-32-32s-32,14.326888-32,32s14.326888,32,32,32s32-14.326888,32-32Zm96,32c17.673112,0,32-14.326888,32-32s-14.326888-32-32-32-32,14.326888-32,32s14.326888,32,32,32Z" transform="matrix(.707107 0.707107-.707107 0.707107 180.411309 35.439723)"/></svg>
            </div>
            <div class="go-menu" onclick="acriacao()">
                <i class="fa-solid fa-pencil"></i>
            </div>
            <div class="go-menu" onclick="menu_appear()">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>
        <div class="main">
            <div class="main_section">
                <div class="img-div" style="
                            background-image: url(https://images.unsplash.com/photo-1613051884057-d9130a00a5f4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aG9ycm9yfGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60); 
                            background-position: 0% 20%;"
                >
                </div>
                <h1>
                    Correção
                </h1>
                <ul>
                    <?php
                        $sql = "SELECT * FROM story where fk_id_profile = $perfil and status = 1";
                        $prepare = $pdo->prepare($sql);
                        $prepare->execute();
                        
                        if($prepare->rowCount() == 0){
                            echo "<li>Você não tem histórias a serem corrigidas</li>";
                        }

                        foreach($pdo->query($sql) as $key => $value){
                            echo "<li>".$value['nome']."</li>";
                        }
                    ?>
                </ul>
            </div>
            <div class="main_section">
                <div class="img-div" style="
                            background-image: url(https://images.unsplash.com/photo-1509248961158-e54f6934749c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTF8fGhvcnJvcnxlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=500&q=60); 
                            background-position: 0% 30%;"
                >

                </div>
                <h1>
                    Aprovação
                </h1>
                <ul>
                    <?php
                        $sql = "SELECT * FROM story where fk_id_profile = $perfil and status = 2";
                        $prepare = $pdo->prepare($sql);
                        $prepare->execute();
                        $pmandar = 0;
                        if($prepare->rowCount() == 0){
                            echo "<li>Você não tem histórias para aprovar</li>";
                        }
                        foreach($pdo->query($sql) as $key => $value){
                            echo "<li onclick='aprovar(".$value['id_story'].")'>".$value['nome']."</li>";
                            $pmandar++;
                        }
                    ?>
                </ul>
            </div>
            <?php
                $answer = "SELECT * FROM story WHERE fk_id_profile = '$perfil' and status = 3";
                $prepare = $pdo->prepare($answer);
                $prepare->execute();

                if($prepare->rowCount() > 0){
                    echo '<div class="main_section big-section">
                    <div class="rank">
                        <h1>Controle de Histórias</h1>
                        <div class="ta">
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th>História</th>
                                        <th>SECRET</th>
                                        <th>Deletar</th>
                                    </tr>
                                </thead>
                                <tbody>';
           
            
                         
                                    $answer = "SELECT * FROM story WHERE fk_id_profile = '$perfil' and status = 3";
                                    foreach($pdo->query($answer) as $key => $value){
                                        echo "
                                        
                                            <tr>
                                                <td>".$value['nome']."</td>
                                                <td><button class='keep' onclick='keep(".$value['id_story'].")'>SECRET</button></td>
                                                <td><button class='del' onclick='deleteH(".$value['id_story'].")'>Deletar</button></td>
                                            </tr>
                                        
                                        
                                        ";
                                    }
                              
                            echo'</tbody>
                        </table>
                    </div>
                </div>
            </div> ';

                                }
            
            ?>
            <div class="main_section big-section">
                <div class="rank">
                    <h1>Top Escritores</h1>
                    <div class="ranks-container">
                        <div class="top top1">
                            <div class="line-div ld1">
                                <div class="line line1"></div>
                            </div>
                            <div class="name name1">
                                <?php if(isset($topUsers[0])) echo ''.$topUsers[0].' ('.$amounts[0].')'; else echo "Ninguém";?>
                            </div>
                        </div>
                        <div class="top top1">
                            <div class="line-div ld2">
                                <div class="line line2"></div>
                            </div>
                            <div class="name name2">
                                <?php if(isset($topUsers[1])) echo ''.$topUsers[1].' ('.$amounts[1].')'; else echo "Ninguém";?>
                            </div>
                        </div>
                        <div class="top top1 ld3">
                            <div class="line-div">
                                <div class="line line3"></div>
                            </div>
                            <div class="name name3">
                                <?php if(isset($topUsers[2])) echo ''.$topUsers[2].' ('.$amounts[2].')'; else echo "Ninguém";?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="../js/menu.js"></script>
<script src="../js/writerHub.js"></script>
<div id="hidden_form_container" style="display:none;"></div>

<script>
    function aprovar(n) {
        var theForm, newInput1;
        theForm = document.createElement('form');
        theForm.action = 'aprovacao.php';
        theForm.method = 'post';
        newInput1 = document.createElement('input');
        newInput1.type = 'hidden';
        newInput1.name = 'story';
        newInput1.value = n;
        theForm.appendChild(newInput1);
        document.getElementById('hidden_form_container').appendChild(theForm);
        theForm.submit();
    }
    function keep(n){
        var theForm, newInput1;
        theForm = document.createElement('form');
        theForm.action = 'manterH.php';
        theForm.method = 'post';
        newInput1 = document.createElement('input');
        newInput1.type = 'hidden';
        newInput1.name = 'story';
        newInput1.value = n;
        theForm.appendChild(newInput1);
        document.getElementById('hidden_form_container').appendChild(theForm);
        theForm.submit();
    }
    function deleteH(n){
        var theForm, newInput1;
        theForm = document.createElement('form');
        theForm.action = 'deletar_historia.php';
        theForm.method = 'post';
        newInput1 = document.createElement('input');
        newInput1.type = 'hidden';
        newInput1.name = 'story';
        newInput1.value = n;
        theForm.appendChild(newInput1);
        document.getElementById('hidden_form_container').appendChild(theForm);
        theForm.submit();
    }
</script>
</body>
</html>