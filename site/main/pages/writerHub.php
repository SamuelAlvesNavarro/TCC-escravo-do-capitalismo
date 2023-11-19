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

    $topProfs = array();
    $topUsers = array();
    $i =  0;
    $sql = "select count(*) as amount, story.fk_id_profile, user_common.apelido from story, user_common where story.fk_id_profile = user_common.fk_id_profile and story.status = 3 group by story.fk_id_profile order by amount desc limit 3;";
    foreach($pdo->query($sql) as $key => $value){
        $topProfs[$i] = $value['fk_id_profile'];
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
    <title>Área do Escritor</title>
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/scroll.css">
    <link rel="stylesheet" href="../css/variable.css?v=1.01">
    <link rel="stylesheet" href="../css/wh.css?v=1.01222">
    <script src="https://kit.fontawesome.com/f2389f6c39.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="../svg/logo.svg" type="image/x-icon">
</head>
<body>
    <?php
        include "includes/menu.php";
    ?>
    <div class="all" id="all">
        <div class="header layout-padding">
            <div class="acess">
                <a href="central.php"><i class="fa-solid fa-chevron-left"></i></a>
            </div>
            <div class="acess-menu" onclick="menu_appear()">
                <i class="fa-solid fa-bars"></i>
            </div>
            <div class="acess">
                <a href="criacao.php"><i class="fa-solid fa-pencil"></i></a>
            </div>
            <div class="logo">
                <div class="logo-pic">
                    <svg id="eBYGrpvxAe61" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 500 500" shape-rendering="geometricPrecision" text-rendering="geometricPrecision"><path d="M40.1,467.1l-11.2,9c-3.2,2.5-7.1,3.9-11.1,3.9C8,480,0,472,0,462.2L0,192C0,86,86,0,192,0s192,86,192,192v270.2c0,9.8-8,17.8-17.8,17.8-4,0-7.9-1.4-11.1-3.9l-11.2-9c-13.4-10.7-32.8-9-44.1,3.9l-30.5,35c-3.3,3.8-8.2,6-13.3,6s-9.9-2.2-13.3-6l-26.6-30.5c-12.7-14.6-35.4-14.6-48.2,0L141.3,506c-3.3,3.8-8.2,6-13.3,6s-9.9-2.2-13.3-6L84.2,471c-11.3-12.9-30.7-14.6-44.1-3.9ZM160,192c0-17.673112-14.326888-32-32-32s-32,14.326888-32,32s14.326888,32,32,32s32-14.326888,32-32Zm96,32c17.673112,0,32-14.326888,32-32s-14.326888-32-32-32-32,14.326888-32,32s14.326888,32,32,32Z" transform="matrix(.707107 0.707107-.707107 0.707107 180.411309 35.439723)"/></svg>
                </div>
            </div>
        </div>
        <div class="banner-parts">
            <?php
                $answer = "SELECT * FROM story WHERE fk_id_profile = '$perfil' and status = 3";
                $prepare = $pdo->prepare($answer);
                $prepare->execute();

                if($prepare->rowCount() > 0):
                
            ?>
                    <div class="table-sect">
                        <div class="title t-table">Controle de Histórias <i id="del" class="fa-solid fa-plus" onclick="switchDetails()"></i></div>
                        <div class="ta">
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th>História</th>
                                        <th class="detail dis">Pontuação</th>
                                        <th class="detail dis">Quantidade de Comentários</th>
                                        <th>SECRET</th>
                                        <th>Deletar</th>
                                    </tr>
                                </thead>
                                <tbody>
           
            
                                    <?php 
                                    $answer = "
                                        SELECT * FROM story WHERE 
                                        fk_id_profile = $perfil and 
                                        status = 3;
                                    ";

                                    foreach($pdo->query($answer) as $key => $value):
                                    
                                    ?>
                                        
                                        <?php 

                                            $answer = "
                                            SELECT count(*) as Cam FROM comment WHERE 
                                            fk_id_story = ".$value['id_story']."
                                            ";

                                            foreach($pdo->query($answer) as $key => $comment):
                                        ?>
                                        
                                            <tr>
                                                <td><?php echo $value['nome']; ?></td>
                                                <td class='detail dis'><?php echo $value['rating']; ?></td>
                                                <td class='detail dis'><?php echo $comment['Cam']; ?></td>
                                                <td><button class='keep' onclick='keep("<?php echo $value["id_story"]; ?>")'>Anonimar</button></td>
                                                <td><button class='del' onclick='deleteH("<?php echo $value["id_story"]; ?>")'>Deletar</button></td>
                                            </tr>
                                        
                                            <?php endforeach; ?>
                                            
                                    <?php endforeach; ?>
                              
                                </tbody>
                            </table>
                        </div>
                    </div>

                <?php endif; ?>
            
            
        </div>
        <div class="main">
            <div class="manage">
                <div class="approve pg">
                    <div class="title">
                        Histórias para aprovar
                    </div>
                    <ul>
                        <?php
                            $sql = "SELECT * FROM story where fk_id_profile = $perfil and status = 2";
                            $prepare = $pdo->prepare($sql);
                            $prepare->execute();
                            $pmandar = 0;
                            if($prepare->rowCount() == 0){
                                echo "<li>→ Você não tem histórias para aprovar</li>";
                            }
                            foreach($pdo->query($sql) as $key => $value){
                                echo "<li onclick='aprovar(".$value['id_story'].")'>→ <a href='#'>".$value['nome']."</a></li>";
                                $pmandar++;
                            }
                        ?>
                    </ul>
                </div>
                <div class="correct pg">
                    <div class="title">
                        Histórias na correção
                    </div>
                    <ul>
                        <?php
                            $sql = "SELECT * FROM story where fk_id_profile = $perfil and status = 1";
                            $prepare = $pdo->prepare($sql);
                            $prepare->execute();
                            
                            if($prepare->rowCount() == 0){
                                echo "<li>→ Você não tem histórias a serem corrigidas</li>";
                            }

                            foreach($pdo->query($sql) as $key => $value){
                                echo "<li>→ ".$value['nome']."</li>";
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="top-writers">
                <div class="title">
                    Ranking de Escritores
                </div>
                <div class="tops">
                    
                    <div class="user">
                        <div class="info">
                            <?php 
                                $t = 0;
                                if(!isset($topProfs[$t])){
                                    $to_show_id = '<a href="#">';
                                }
                                else{
                                    $to_show_id = '<a target="_blank" href="profile.php?profile='.$topProfs[ $t].'">';
                                }

                                echo $to_show_id;
                                    if(isset($topUsers[$t])) echo ''.$topUsers[$t].' - '.$amounts[$t].' história(s) '; 
                                    else echo "Ninguém";
                                echo '</a>';

                                $t++;
                            ?>
                        </div>
                        <div class="bar">

                        </div>
                    </div>
                    <div class="user">
                        <div class="info">
                            <?php 
                                if(!isset($topProfs[$t])){
                                    $to_show_id = '<a href="#">';
                                }
                                else{
                                    $to_show_id = '<a target="_blank" href="profile.php?profile='.$topProfs[ $t].'">';
                                }

                                echo $to_show_id;
                                    if(isset($topUsers[$t])) echo ''.$topUsers[$t].' - '.$amounts[$t].' história(s) '; 
                                    else echo "Ninguém";
                                echo '</a>';

                                $t++;
                            ?>
                        </div>
                        <div class="bar">
                            
                        </div>
                    </div>
                    <div class="user">
                        <div class="info">
                            <?php 
                                if(!isset($topProfs[$t])){
                                    $to_show_id = '<a href="#">';
                                }
                                else{
                                    $to_show_id = '<a target="_blank" href="profile.php?profile='.$topProfs[ $t].'">';
                                }

                                echo $to_show_id;
                                    if(isset($topUsers[$t])) echo ''.$topUsers[$t].' - '.$amounts[$t].' história(s) '; 
                                    else echo "Ninguém";
                                echo '</a>';

                                $t++;
                            ?>
                        </div>
                        <div class="bar">
                            
                        </div>
                    </div>
                    
                </div>
        </div>
    </div>
    <script src="../js/wh.js?v=1.012"></script>
    <script src="../js/menu.js"></script>
<script src="../js/darkmode.js"></script>

    <?php
    
        include "includes/footer.php";
        
    ?>

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