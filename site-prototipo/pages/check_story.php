<?php
    require 'includes/conexao.php';
    require 'includes/online.php';
    require 'includes/returnUser.php';
    $email = $_SESSION['email'];
    $profile = returnProfileId($email);
    $id_story = $_GET['input_1'];
    global $pdo;

    $story = "SELECT * FROM story WHERE id_story = '$id_story'";
    foreach($pdo->query($story) as $key => $value){
        $title = $value['nome'];
    }

    function returnIdPage($id_story, $type){
        global $pdo;
        $page = "SELECT * FROM page WHERE fk_id_story = '$id_story' AND type = '$type'";
        foreach($pdo->query($page) as $key => $value){
            $id_page = $value['id_page'];
            return $id_page;
        }
    }

    //history
    $id_page = returnIdPage($id_story, 0);
    $history = "SELECT * FROM history WHERE fk_id_page = '$id_page'";
    foreach($pdo->query($history) as $key => $value){
        $text = $value['texto'];
    }

    //image
    $id_page = returnIdPage($id_story, 1);
    $image = "SELECT * FROM images WHERE fk_id_page = '$id_page'";

    $prepare = $pdo->prepare($image);
    $prepare->execute();
    $qtndImage = $prepare->rowCount();

    foreach($pdo->query($image) as $key => $value){
        $path = array();
        $path = $value['path'];
    }

    //reference
    $id_page = returnIdPage($id_story, 2);
    $refence = "SELECT * FROM reference WHERE fk_id_page = '$id_page'";

    $prepare = $pdo->prepare($refence);
    $prepare->execute();
    $qtndReference = $prepare->rowCount();

    foreach($pdo->query($refence) as $key => $value){
        $reference = array();
        $refence = $value['path'];
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo "<h1>$title</h1>";
    ?>

    <?php
        echo "<p>$text</p>";
    ?>

    <?php
        for($i = 0; $i < $qtndImage; $i++){
            $exibir = $path[$i];
            echo "<img src='$exibir'>";
        }
    ?>

    <?php
        for($x = 0; $x < $qtndReference; $x++){
            $exibir = $reference[$x];
            echo "<p>$exibir</p>";
        }
    ?>
    <form method="post" action="check_story.php">
        <button type="submit" name="button" value="<?php echo $id_story; ?>">Aprovar</button>
    </form>

    <?php
        if(isset($_POST['button'])){
            echo $id_story = $_POST['button'];
            $status = "UPDATE story SET status = 3 WHERE id_story = '$id_story'";
            $prepare = $pdo->prepare($status);
            $prepare->execute();
            echo $prepare->rowCount();

            //header("Location:historias-postadas.php");
        }
    ?>
</body>
</html>