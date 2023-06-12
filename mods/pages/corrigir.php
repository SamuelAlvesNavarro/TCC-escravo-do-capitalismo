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
                echo '
                <div class="page slide">
                    <div>
                        <div class="writing images-page">
                            <div id="title-container" class="story-title-container">
                                <div class="story-title transi">
                                    <h1 class="transi">Imagens</h1>
                                </div>
                                <div onclick = "checkStuff(1)" class="bt-open-close">
                                    <div class="bt">
                                        <i style="font-size: 30px;" class="exp-min fa-solid fa-expand"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="images" spellcheck="false">';
                                    
                                    foreach ($pdo->query($sql) as $key => $value) {
                                        echo "<img src='../../site-prototipo/pages/". $value['path'] ."'><br><br>";
                                    }
                                echo 
                            '</div>
                        </div>
                    </div>
                </div>';
            }

?>