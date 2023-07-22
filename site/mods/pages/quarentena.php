<?php
    require "includes/conexao.php";
    require "includes/online.php"; 

    function RetornarIdPage($id_story, $type){
        global $pdo;
        $page = "SELECT id_page from page where fk_id_story = $id_story and type = $type";
        foreach ($pdo->query($page) as $key => $value) {
            $id_page = $value['id_page'];
            return $id_page;
        }
    }

    $id_story = $_GET['story'];

    $sql = "SELECT * from story where id_story = ".$id_story;
    foreach ($pdo->query($sql) as $key => $value) {
        $title = $value['nome'];
    }


    $id_page = RetornarIdPage($id_story, 0);
    $sql = "SELECT texto from history where fk_id_page='$id_page'";
    foreach ($pdo->query($sql) as $key => $value) {
        $text = stripslashes($value["texto"]);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/corrigir.css">
    <title>Na Quarentena</title>
</head>
<body>
    <form id="hidden_form_container" method="post">

        <div class="container-fluid">
            <div class="row">
                <div class="col-6" style="padding-left: 0"><h1><?php echo $title;?></h1></div>
                <div class="col-6 pull-right">
                    <button onclick="send(1, <?php echo $id_story; ?>, 0)" type="button" class="btn btn-primary">Corrigir Novamente</button>
                    <button onclick="send(2, <?php echo $id_story; ?>, 0)" type="button" class="btn btn-danger">Deletar</button>
                </div>
            </div>
        </div>
        <hr>
        <br><br>
        <div class="text container">
            <div class="row">
                <div style="width: 100%" class="to-show col-12">
                    <pre id="pre-history">
                        <?php echo $text; ?>
                    </pre>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table table-dark">
                        <?php
                            $id_page = RetornarIdPage($id_story, 1);
                            $sql = "SELECT * FROM images WHERE fk_id_page='$id_page'";
                        
                            $prepare = $pdo->prepare($sql);
                            $prepare -> execute();
                        
                            if($prepare -> rowCount() > 0){
                                
                                echo "
                                    <thead>
                                        <tr>
                                            <th>Imagens</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    ";

                                foreach ($pdo->query($sql) as $key => $value) {
                                    echo "<tr>
                                            <td>
                                                <img class='img-story' src='../../main/pages/". $value['path'] ."'>
                                            </td>
                                          </tr>";
                                }
                                    
                                echo "</tbody>";
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table table-dark">
                        <?php
                            $id_page = RetornarIdPage($id_story, 2);
                            $sql = "SELECT * FROM reference WHERE fk_id_page='$id_page'";
                        
                            $prepare = $pdo->prepare($sql);
                            $prepare -> execute();
                        
                            if($prepare -> rowCount() > 0){
                                
                                echo "
                                    <thead>
                                        <tr>
                                            <th>Referencia</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    ";

                                foreach ($pdo->query($sql) as $key => $value) {
                                    echo "<tr>
                                            <td>
                                                ". $value['path'] ."
                                            </td>
                                          </tr>";
                                }
                                    
                                echo "</tbody>";
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <?php
            $sql = "select * from question where fk_id_story = ".$id_story;
            foreach ($pdo->query($sql) as $key => $value) {
               $question = $value['quest_itself'];
               $id_question = $value['id_question'];
            }
        ?>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Pergunta</h1><br>
                    <h4><?php echo $question; ?></h4>
                </div>
                <br>
                <table class="table table-dark">
                        <thead>
                            <tr>
                                <th>Alternativa</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 1;
                                $answer = "SELECT * FROM answer WHERE fk_id_question = '$id_question'";
                                foreach($pdo->query($answer) as $key => $value){
                                    echo "
                                    
                                        <tr>
                                            <td><h6>".$value['text']."</h6></td>
                                            <td><h6>".$value['status']."</h6></td>
                                        </tr>
                                    
                                    
                                    ";
                                    $i++;
                                }
                            ?>
                        </tbody>
                </table>
            </div>
        </div>
    </form>
    <form id="img_form" method="post"></form>
    <form id="ref_form" method="post"></form>

    <script>

        var textarea = document.getElementById('textarea-story')
        var preH = document.getElementById('pre-history')

        textarea.addEventListener("change", () => {
            preH.innerHTML = textarea.value;
        })

        function send(type, id, n){

            var theForm = document.getElementById("hidden_form_container")
            
            if(type == 1) theForm.action = 'programaticos/recorrigir.php';
            if(type == 2) theForm.action = 'programaticos/deletar_historia.php';

            newInput1 = document.createElement('input');
            newInput1.type = 'hidden';
            newInput1.name = 'id_story';
            newInput1.value = id;
            theForm.appendChild(newInput1);
            theForm.submit();

        }
    </script> 
</body>
</html>