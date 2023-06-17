<?php
    require "includes/conexao.php"; 

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
    <title>Corrigir</title>
</head>
<body>
    <form id="hidden_form_container" method="post">

        <div class="container-fluid">
            <div class="row">
                <div class="col-6" style="padding-left: 0"><h1>Correção de História</h1></div>
                <div class="col-6 pull-right">
                    <button onclick="send(0, <?php echo $id_story; ?>)" type="button" class="btn btn-primary">Deixar correção</button>
                    <button onclick="send(1, <?php echo $id_story; ?>)" type="button" class="btn btn-success">Corrigido</button>
                    <button onclick="send(2, <?php echo $id_story; ?>)" type="button" class="btn btn-danger">Deletar</button>
                </div>
            </div>
        </div>
        <hr>
        <br><br>
        <h2><input class='input-title' type="text" name="nome" value="<?php echo $title;?>"></h2>
        <br><br>
        <div class="text container">
            <div class="row">
                <?php echo "<textarea name='story' id='textarea-story' class='text-area-story col-6'>".$text."</textarea>"; ?>
                <div class="to-show col-6">
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
                                            <th>Remover</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    ";

                                foreach ($pdo->query($sql) as $key => $value) {
                                    echo "<tr>
                                            <td>
                                                <img class='img-story' src='../../site-prototipo/pages/". $value['path'] ."'>
                                            </td>
                                            <td>
                                                <button type='button' class='btn btn-danger' onclick='deleteImg(". $value['id_image'] .",".$id_story.")'>Deletar</button>
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
                                            <th>Remover</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    ";

                                foreach ($pdo->query($sql) as $key => $value) {
                                    echo "<tr>
                                            <td>
                                                ". $value['path'] ."
                                            </td>
                                            <td>
                                                <button type='button' class='btn btn-danger' onclick='deleteRef(". $value['id_reference'] .",".$id_story.")'>Deletar</button>
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
    </form>
    <form id="img_form" method="post"></form>

    <script>

        var textarea = document.getElementById('textarea-story')
        var preH = document.getElementById('pre-history')

        textarea.addEventListener("change", () => {
            preH.innerHTML = textarea.value;
        })

        function send(n, id){

            var theForm = document.getElementById("hidden_form_container")
            
            if(n == 0) theForm.action = 'programaticos/deixar_correcao.php';
            if(n == 1) theForm.action = 'programaticos/corrigido.php';
            if(n == 2) theForm.action = 'programaticos/deletar_historia.php';

            newInput1 = document.createElement('input');
            newInput1.type = 'hidden';
            newInput1.name = 'id_story';
            newInput1.value = id;
            theForm.appendChild(newInput1);
            theForm.submit();

        }

        function deleteImg(n, id){

            var imgForm = document.getElementById("img_form")

            imgForm.action = 'programaticos/deletar_img.php';

            newInput1 = document.createElement('input');
            newInput1.type = 'hidden';
            newInput1.name = 'id_img';
            newInput1.value = n;
            newInput2 = document.createElement('input');
            newInput2.type = 'hidden';
            newInput2.name = 'id_story';
            newInput2.value = id;
            imgForm.appendChild(newInput1);
            imgForm.appendChild(newInput2);

            imgForm.submit();

        }

    </script> 
</body>
</html>