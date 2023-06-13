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

    $sql = "select * from story where id_story = ".$id_story;
    foreach ($pdo->query($sql) as $key => $value) {
        $title = $value['nome'];
    }


    $id_page = RetornarIdPage($id_story, 0);
    $sql = "select texto from history where fk_id_page='$id_page'";
    foreach ($pdo->query($sql) as $key => $value) {
        $text = stripslashes($value["texto"]);
    }


    $id_page = RetornarIdPage($id_story, 1);
    $sql = "SELECT path FROM images WHERE fk_id_page='$id_page'";

    $prepare = $pdo->prepare($sql);
    $prepare -> execute();

    if($prepare -> rowCount() > 0){
                            
        foreach ($pdo->query($sql) as $key => $value) {
            echo "<img class='img-story' src='../../site-prototipo/pages/". $value['path'] ."'><br><br>";
        }
                    
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-6" style="padding-left: 0"><h1>Correção de História</h1></div>
            <div class="col-6 pull-right">
                <button type="button" class="btn btn-primary">Deixar correção</button>
                <button type="button" class="btn btn-secondary">Corrigido</button>
                <button type="button" class="btn btn-success">Deletar</button>
            </div>
        </div>
    </div>
    <hr>
    <br><br>
    <h2><?php echo $title;?></h2>
    <br><br>
    <div class="text container">
        <div class="row">
            <?php echo "<textarea id='textarea-story' class='text-area-story col-6'>".$text."</textarea>"; ?>
            <div class="to-show col-6">
                <pre id="pre-history">
                    <?php echo $text; ?>
                </pre>
            </div>
        </div>
    </div>
    <script>
        var textarea = document.getElementById('textarea-story')
        var preH = document.getElementById('pre-history')

        textarea.addEventListener("change", () => {
            preH.innerHTML = textarea.value;
        })
    </script> 
</body>
</html>