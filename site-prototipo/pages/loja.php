<?php
    require "includes/conexao.php";
    require "includes/online.php";
    require "includes/returnUser.php";
    $perfil = -1;
    $email = $_SESSION['email'];
    $perfil = returnProfileId($email);

    //$compra = null;
    //$compra = $_SESSION['loja'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/loja.css?v=1.01">
    <link rel="stylesheet" href="../css/menu.css?v=1.01">
    <link rel="shortcut icon" href="../svg/logo.svg" type="image/x-icon">
    <script src="https://kit.fontawesome.com/f2389f6c39.js" crossorigin="anonymous"></script>
    <title>Loja</title>
</head>
<body>
<div id="all-menu" class="all_menu disappear">
        <div id="chevron-menu" class="close-menu chevron-phases" onclick="menu_appear()">
            <i class="fa-sharp fa-solid fa-xmark"></i>
        </div>
        <div id="menu" class="menu off">
            <div class="lamp">
                <div class="wire">
                    
                </div>
                <i onclick="switchMenu(1)" class="fa-solid fa-lightbulb"></i>
            </div>
            <div class="lamp-area" onclick="switchMenu(2)">
            </div> 
            <div class="content">
                <ul>
                    <li><a href="central.php" target="_blank" rel="noopener noreferrer">Central</a></li>
                    <li><a href="profile.php?profile=<?php echo $perfil?>" target="_blank" rel="noopener noreferrer">Perfil</a></li>
                    <li><a href="loja.php" target="_blank" rel="noopener noreferrer">Loja</a></li>
                    <li><a href="writerHub.php" target="_blank" rel="noopener noreferrer">Criação</a></li>
                    <div class="search-menu">
                        <form action="pesquisa.php" method="get">
                            <div class="search-box">
                                <button class="btn-search"><i class="fas fa-search"></i></button>
                                <input required type="text" name="busca" class="input-search" placeholder="Pesquisar história........">
                            </div>
                        </form>
                    </div>
                </ul>
                <!--<img src="https://clipart-library.com/images/rcLoyAzKi.png" alt="" srcset="">-->
            </div>
        </div>
    </div>
    <div class="nav">
        <div class="logo-pic">
            <svg id="eBYGrpvxAe61" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 500 500" shape-rendering="geometricPrecision" text-rendering="geometricPrecision"><path d="M40.1,467.1l-11.2,9c-3.2,2.5-7.1,3.9-11.1,3.9C8,480,0,472,0,462.2L0,192C0,86,86,0,192,0s192,86,192,192v270.2c0,9.8-8,17.8-17.8,17.8-4,0-7.9-1.4-11.1-3.9l-11.2-9c-13.4-10.7-32.8-9-44.1,3.9l-30.5,35c-3.3,3.8-8.2,6-13.3,6s-9.9-2.2-13.3-6l-26.6-30.5c-12.7-14.6-35.4-14.6-48.2,0L141.3,506c-3.3,3.8-8.2,6-13.3,6s-9.9-2.2-13.3-6L84.2,471c-11.3-12.9-30.7-14.6-44.1-3.9ZM160,192c0-17.673112-14.326888-32-32-32s-32,14.326888-32,32s14.326888,32,32,32s32-14.326888,32-32Zm96,32c17.673112,0,32-14.326888,32-32s-14.326888-32-32-32-32,14.326888-32,32s14.326888,32,32,32Z" transform="matrix(.707107 0.707107-.707107 0.707107 180.411309 35.439723)"/></svg>
        </div>
        <div class="go-menu" onclick="menu_appear()">
            <i class="fa-solid fa-bars"></i>
        </div>
    </div>
    <div id="myModal" class="modal">
        <div class="modal-card">
            <div class="inf-div">
                <span class="inf-price"><span id="priceConf">10000</span><i class='fa-solid fa-coins'></i></span>
                <span class="close"><i class="fa-solid fa-xmark"></i></span>
            </div>
            <div id="img-compra">

            </div>
            <form action="compra.php" method="post">
                <input id="buy-gadget" type="hidden" name="gadget" value="0">
                <input id='conf-compra' type="submit" value="Comprar">
            </form>
        </div>
    </div>
    <div class="all">
        <div class="header section">
            <div class="background-header">
                
            </div>
            <div class="bc-letters">
                <div class="portal" onclick="acentral()">
                    <h2>Central</h2>
                </div>
                <h1>Loja</h1>
            </div>
        </div>
        <div class="container">
            <section class="bcs">
                <h1 style="color:white;">Fundos de Perfil</h1>
                <div class="itens">
                    <?php
                        $gadget = "SELECT * FROM gadget WHERE g_status = 1 and type = 1";
                        foreach($pdo->query($gadget) as $key => $value){
                            $item = $value['in_it'];
                            $preco = $value['preco'];
                            $code = $value['id_gadget'];

                            $check = "SELECT * FROM compra WHERE fk_id_gadget = '$code' and fk_id_profile = '$perfil'";
                            $prepare = $pdo->prepare($check);
                            $prepare->execute();

                            $rows = $prepare->rowCount();

                            if($rows == 0){
                                echo "<div class='card  reveal' onclick='generate(".$code.")'>
                                    <div class='card-pic' id=".$code." style='$item' value='$preco'></div>
                                    <div id='".$code."p' class='price'>$preco<i class='fa-solid fa-coins'></i></div>
                                </div>";
                            } 
                        }
                    ?>
                </div>
            </section>
            <section class="pc">
                <h1>Fotos de Perfil</h1>
                <div class="itens">
                    <?php
                        $gadget = "SELECT * FROM gadget WHERE g_status = 1 and type = 0";
                        foreach($pdo->query($gadget) as $key => $value){
                            $item = $value['in_it'];
                            $preco = $value['preco'];
                            $code = $value['id_gadget'];

                            $check = "SELECT * FROM compra WHERE fk_id_gadget = '$code' and fk_id_profile = '$perfil'";
                            $prepare = $pdo->prepare($check);
                            $prepare->execute();

                            $rows = $prepare->rowCount();

                            if($rows == 0){
                                echo "<div class='card  reveal' onclick='generate(".$code.")'>
                                    <div class='card-pic' id=".$code." style='$item' value='$preco'></div>
                                    <div id='".$code."p' class='price'>$preco<i class='fa-solid fa-coins'></i></div>
                                </div>";
                            } 
                        }
                    ?>
                </div>
            </section>
        </div>
    </div>
<script src="../js/loja.js?v=1.01"></script>
<script src="../js/menu.js?v=1.01"></script>
<script>

      var modal = document.getElementById("myModal");

      function generate(ImgId){
      var img = document.getElementById(ImgId);
     
      var modalImg = document.getElementById("img-compra");
        modal.style.display = "block";
        id_price = ImgId+"p";
        modalImg.style.backgroundImage = img.style.backgroundImage;
        document.getElementById('buy-gadget').value = ImgId;
        document.getElementById('priceConf').innerText = document.getElementById(id_price).innerText;
      }
      
      var span = document.getElementsByClassName("close")[0];

      span.onclick = function() {
        var modalImg = document.getElementById("img-compra");
        modal.style.display = "none";
        modalImg.innerHTML = " ";
        document.getElementById('buy-gadget').value = 0;
        document.getElementById('priceConf').innerText = 0;
      }

  </script>
</body>
</html>