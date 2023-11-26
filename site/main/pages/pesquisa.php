<?php
    require "includes/conexao.php";
    require "includes/online.php";
    require "includes/returnUser.php";

    $pesquisa = '';
    if(isset($_GET['busca']))$pesquisa = $_GET['busca'];

    $perfil = returnProfileId($_SESSION['email']);

    if($pesquisa == "novo"){
        $pesquisa = "#";
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa</title>
    <link rel="shortcut icon" href="../svg/logo.svg" type="image/x-icon">
    <script src="https://kit.fontawesome.com/f2389f6c39.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/pesquisa.css?v=1.013<?php echo rand(0,1000)?>2">
    <link rel="stylesheet" href="../css/menu.css?v=1.01">
    <link rel="stylesheet" href="../css/scroll.css?v=1.09">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <?php
        require "includes/loading.php";
    ?>
    <div class="all" id="all">
        <?php
            require "includes/menu.php";
        ?>
        <div class="nav">
            <div>
                <div class="go-back" onclick="acentral()">
                    <i class="fa-solid fa-chevron-left"></i>
                </div>
            </div>
            <div class="bar">
                <div class="search-box-s">
                    <input id="query" required type="text" name="busca" class="input-search-page" placeholder="Pesquisar história........" value="<?php echo $pesquisa; ?>">
                    <button class="btn" onclick="buscar()"><i class="fas fa-search"></i></button>
                </div>
            </div>
            <div class="go-menu" onclick="menu_appear()">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>
        <div class="bc" id="bc">
            <div class="lines" id="lines">
                    
                
                <div class="main">
                    <div class="results">
                        <div class="res" id="results">

                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>

    <?php
    
        include "includes/footer.php";
        
    ?>

    <script src="../js/pesquisa.js?v=1.0123<?php echo rand(0,1000)?>"></script>
    <script src="../js/menu.js"></script>
</body>
</html>
    
