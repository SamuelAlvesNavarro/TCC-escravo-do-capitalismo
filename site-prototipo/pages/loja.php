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
    <script src="https://kit.fontawesome.com/f2389f6c39.js" crossorigin="anonymous"></script>
    <title>Loja</title>
</head>
<body>
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
                <h1>Fundos de Perfil</h1>
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
      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];

      // When the user clicks on <span> (x), close the modal
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