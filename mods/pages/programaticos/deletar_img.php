<?php
    $img = $_POST['id_img'];
    $id_story = $_POST['id_story'];

    $page = "SELECT id_page from page where fk_id_story = $id_story and type = 0";
    foreach ($pdo->query($page) as $key => $value){
        $id_page = $value['id_page'];
    }

    $count = "SELECT COUNT(*) FROM images WHERE fk_id_page = '$id_page'";
    $num = $pdo->query($count);

    if($num == 1){
        
        $path = "SELECT path FROM images WHERE fk_id_page = '$id_page'";
        foreach($pdo->query($path) as $key => $value){
            $caminho = $value['path'];
        }

        function delTree($dir) { 
            $files = array_diff(scandir($dir), array('.','..')); 
            foreach ($files as $file) { 
              (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file"); 
            } 
            return rmdir($dir); 
          }
          delTree($caminho);

          $del = "DELETE * FROM images WHERE fk_id_page = '$id_page'";

    }else{
        $path = "SELECT path FROM images WHERE fk_id_page = '$id_page'";
        foreach($pdo->query($path) as $key => $value){
            $caminho = $value['path'];
        }
        unlink($caminho);
    }

    header("Location:../corrigir.php");
?>