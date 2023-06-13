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

    $id_page = RetornarIdPage($id_story, 0);
    $sql = "select texto from history where fk_id_page='$id_page'";
    foreach ($pdo->query($sql) as $key => $value) {
        $text = stripslashes($value["texto"]);
        echo "<pre style='font-family: 'Indie Flower''>".$text."</pre>";
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
    <link rel="stylesheet" href="style.css">
    <title>Corrigir</title>
</head>
<body>
    
</body>
</html>