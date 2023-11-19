<?php
    require "includes/report_profile.php";
    
    function RetornarIdPage($id_story, $type){
        global $pdo;
        $page = "SELECT id_page from page where fk_id_story = $id_story and type = $type";
        foreach ($pdo->query($page) as $key => $value) {
            $id_page = $value['id_page'];
            return $id_page;
        }
    }

    $id_story = $_POST['story'];
    if(!isset($_POST['story']))header("Location: central.php");
    $perfil = -1;
    $email = $_SESSION['email'];
    $perfil = returnProfileId($email);
    if($perfil == -1 || !isset($perfil)){
        header("Location: error.php");  
        exit;
    }
    
    $sql = "SELECT * FROM story WHERE id_story = $id_story and fk_id_profile = $perfil and status = 2";
    $prepare = $pdo->prepare($sql);
    $prepare->execute();
    
    if($prepare->rowCount() != 1){
        header("Location: error.php?erro=18");
        exit;
    }

    /* CASO ESTEJA TUDO CERTO */

    foreach($pdo->query($sql) as $key => $value){
        $title = $value['nome'];
    }

    $id_page = RetornarIdPage($id_story, 0);
    $sql = "select texto from history where fk_id_page='$id_page'";
    foreach ($pdo->query($sql) as $key => $value) {
        $text = stripslashes($value["texto"]);
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/f2389f6c39.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/aprovacao.css">
    <link rel="shortcut icon" href="../svg/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="../css/scroll.css?v=1.09">
    <title>Aprovação</title>
</head>
<body>
    <?php
        require "includes/menu.php";
    ?>
    <div class="all">
        <div class="nav">
            <div class="go-back" onclick="aohub()">
                <i class="fa-solid fa-chevron-left"></i>
            </div>
            <div class="go-menu" onclick="switchTheme()">
                <i id="mode" onclick="switchTheme()" class="fa-solid fa-sun"></i>
            </div>
            <div class="logo-pic">
                <svg id="eBYGrpvxAe61" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 500 500" shape-rendering="geometricPrecision" text-rendering="geometricPrecision"><path d="M40.1,467.1l-11.2,9c-3.2,2.5-7.1,3.9-11.1,3.9C8,480,0,472,0,462.2L0,192C0,86,86,0,192,0s192,86,192,192v270.2c0,9.8-8,17.8-17.8,17.8-4,0-7.9-1.4-11.1-3.9l-11.2-9c-13.4-10.7-32.8-9-44.1,3.9l-30.5,35c-3.3,3.8-8.2,6-13.3,6s-9.9-2.2-13.3-6l-26.6-30.5c-12.7-14.6-35.4-14.6-48.2,0L141.3,506c-3.3,3.8-8.2,6-13.3,6s-9.9-2.2-13.3-6L84.2,471c-11.3-12.9-30.7-14.6-44.1-3.9ZM160,192c0-17.673112-14.326888-32-32-32s-32,14.326888-32,32s14.326888,32,32,32s32-14.326888,32-32Zm96,32c17.673112,0,32-14.326888,32-32s-14.326888-32-32-32-32,14.326888-32,32s14.326888,32,32,32Z" transform="matrix(.707107 0.707107-.707107 0.707107 180.411309 35.439723)"/></svg>
            </div>
            <div class="go-menu" onclick="menu_appear()">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>
        <div class="title">
            <h1>Aprovação</h1>
        </div>
        <div class="main">
            <div class="parts p1">
                <div class="history">
                    <h1><?php echo $title;?></h1>
                    <div class="lines">
                        <div class="text"> <!-- contenteditable -->
                            <?php
                                echo "<pre style='font-family: 'Indie Flower''>".$text."</pre>";
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                $id_page = RetornarIdPage($id_story, 1);
                $sql = "SELECT path FROM images WHERE fk_id_page='$id_page'";
    
                $prepare = $pdo->prepare($sql);
                $prepare -> execute();
    
                if($prepare -> rowCount() > 0){
                    echo '
                    <div class="parts">
                        <div class="images">
                            <h1>Imagens</h1>
                            <div class="lines">
                                <div class="text">';
                                        
                                        foreach ($pdo->query($sql) as $key => $value) {
                                            echo "<img src='". $value['path'] ."'><br><br>";
                                        }
                                    echo 

                                '</div>
                            </div>
                        </div>
                    </div>';
                }






                $id_page = RetornarIdPage($id_story, 2);
                $sql = "SELECT path FROM reference WHERE fk_id_page='$id_page'";
                $prepare = $pdo->prepare($sql);
                $prepare -> execute();
    
                if($prepare -> rowCount() > 0){
                    echo '
                    <div class="parts">
                        <div class="refs">
                            <h1>Referências</h1>
                            <div class="lines">
                                <div class="text">';
                                        
                                foreach ($pdo->query($sql) as $key => $value) {
                                    echo "<a href ='". $value['path'] ."'>". $value['path'] ."</a>";
                                }
                                
                                echo 
                                '</div>
                            </div>
                        </div>
                    </div>';
                }
            ?>
            <div class="parts quesP">
                <h1>Pergunta</h1>
                <div class="question">
                    <?php
                        $sql = "select * from question where fk_id_story = ".$id_story;
                        foreach ($pdo->query($sql) as $key => $value) {
                            echo $value['quest_itself'];
                            $id_question = $value['id_question'];
                        }
                    ?>
                </div>
                <div class="answers">
                    <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th>Alternativa</th>
                                    <th>Correspondência</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 1;
                                    $answer = "SELECT * FROM answer WHERE fk_id_question = '$id_question'";
                                    foreach($pdo->query($answer) as $key => $value){

                                        if($value['status'] == 1) $to_show = "fa-check";

                                        else $to_show = "fa-xmark";
                                        echo "
                                        
                                            <tr>
                                                <td>".$value['text']."
                                                <td><i class='fa-solid ".$to_show."'>
                                            </tr>
                                        
                                        
                                        ";
                                        $i++;
                                    }
                                ?>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="navBottom">
            <div class="go-menu check-bt" onclick="aceitar(<?php echo $id_story;?>)">
                <i class="fa-solid fa-check"></i>
            </div>
            <div class="go-menu xmark-bt" onclick="rejeitar(<?php echo $id_story;?>)">
                <i class="fa-solid fa-xmark"></i>
            </div>
        </div>
    </div>
    <script src="../js/menu.js"></script>
    <script src="../js/aprovacao.js"></script>

    <div id="hidden_form_container" style="display:none;"></div>

<script>
    function aceitar(n) {
        var theForm, newInput1;
        theForm = document.createElement('form');
        theForm.action = 'aprovar.php';
        theForm.method = 'post';
        newInput1 = document.createElement('input');
        newInput1.type = 'hidden';
        newInput1.name = 'id_story';
        newInput1.value = n;
        theForm.appendChild(newInput1);
        document.getElementById('hidden_form_container').appendChild(theForm);
        theForm.submit();
    }
    function rejeitar(n){
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