<?php
    require "includes/conexao.php";
    require "includes/online.php";
    require "includes/returnUser.php";
    $perfil = -1;
    $email = $_SESSION['email'];
    $perfil = returnProfileId($email);

    $moedas = "SELECT * FROM user_common WHERE fk_id_profile = '$perfil'";
    foreach($pdo->query($moedas) as $key => $value){
        $moedas = $value['moedas'];
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja</title>
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/loja.css?v=10.12<?php echo rand(0,1000)?>">
    <script src="https://kit.fontawesome.com/f2389f6c39.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="../svg/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="../css/scroll.css?v=1.092">
    <link rel="stylesheet" href="../css/variable.css">
</head>
<body>
    <div class="logo-back">
        <svg id="eBYGrpvxAe61" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 500 500" shape-rendering="geometricPrecision" text-rendering="geometricPrecision"><path d="M40.1,467.1l-11.2,9c-3.2,2.5-7.1,3.9-11.1,3.9C8,480,0,472,0,462.2L0,192C0,86,86,0,192,0s192,86,192,192v270.2c0,9.8-8,17.8-17.8,17.8-4,0-7.9-1.4-11.1-3.9l-11.2-9c-13.4-10.7-32.8-9-44.1,3.9l-30.5,35c-3.3,3.8-8.2,6-13.3,6s-9.9-2.2-13.3-6l-26.6-30.5c-12.7-14.6-35.4-14.6-48.2,0L141.3,506c-3.3,3.8-8.2,6-13.3,6s-9.9-2.2-13.3-6L84.2,471c-11.3-12.9-30.7-14.6-44.1-3.9ZM160,192c0-17.673112-14.326888-32-32-32s-32,14.326888-32,32s14.326888,32,32,32s32-14.326888,32-32Zm96,32c17.673112,0,32-14.326888,32-32s-14.326888-32-32-32-32,14.326888-32,32s14.326888,32,32,32Z" transform="matrix(.707107 0.707107-.707107 0.707107 180.411309 35.439723)"/></svg>
    </div>
    <?php
        require "includes/menu.php";
    ?>
    <div class="info">
        <div class="coins">
            <?php echo $moedas; ?><i class="fa-solid fa-coins"></i>
        </div>
    </div>
    <div class="menuCall" onclick="menu_appear()">
        <i class="fa-solid fa-bars"></i>
    </div>
    <div class="all">
        <div class="section main-s">
            <div class="content-in">
                <div class="title">
                    <h1>Loja</h1>
                </div>
                <div class="phrase">
                    <strong>"Comprar preenche o vazio da alma"</strong>
                </div>
                <div class="to-places">
                    <div class="bt-fotos bt-to-div">
                        <button class="to-bt" onclick="to(1)">
                            <strong>Às fotos</strong>
                        </button>
                    </div>
                    <div class="bt-fundos bt-to-div" onclick="to(2)">
                        <button class="to-bt">
                            <strong>Aos fundos</strong>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="section sec-store display_none sumir-section">
            <div class="content-store">
                <div class="go-back" onclick="to(0)">
                    <div class="back-main">
                        <i class="fa-sharp fa-solid fa-chevron-left"></i>
                    </div>
                </div>
                <div class="store">
                    <div class="display-items">
                        <div class="all-display-items">
                            <div class="img-display"></div>
                            <div class="nome-display"></div>
                            <div class="price-display">
                                0
                            </div>
                            <div class="button-buy">
                                <button value="0" class="buy" onclick="buy(0)">Comprar</button>
                            </div>  
                        </div>
                    </div>
                    <div class="items">
                        <h1>Fotos</h1>
                        <div class="items-div">
                            <?php
                                $gadget = "SELECT * FROM gadget WHERE g_status = 1 and type = 0";
                                $z = 0;
                                foreach($pdo->query($gadget) as $key => $value){
                                    $nome = $value['nome'];
                                    $item = $value['in_it'];
                                    $preco = $value['preco'];
                                    $code = $value['id_gadget'];
        
                                    $check = "SELECT * FROM compra WHERE fk_id_gadget = '$code' and fk_id_profile = '$perfil'";
                                    $prepare = $pdo->prepare($check);
                                    $prepare->execute();
        
                                    $rows = $prepare->rowCount();
        
                                    if($rows == 0){
                                        $z++;
                                            echo "<div  class='item' onclick='show_item(0, $code)'>
                                            <div class='img' id='$code' style='$item'>

                                            </div>
                                            <hr>
                                            <div id='".$code."n'>$nome</div>
                                            <div class='price' id='".$code."p'>
                                                $preco<i class='fa-solid fa-coins'></i>
                                            </div>
                                        </div>";
                                    } 
                                }
                                if($z == 0){
                                    echo "<h3>Você já comprou todos os itens dessa sessão da loja. Parabéns!</h3>";
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section sec-store display_none sumir-section">
            <div class="content-store">
                <div class="go-back" onclick="to(0)">
                    <div class="back-main">
                        <i class="fa-sharp fa-solid fa-chevron-left"></i>
                    </div>
                </div>
                <div class="store">
                    <div class="display-items">
                        <div class="all-display-items bc-display">
                            <div class="img-display"></div>
                            <div class="nome-display"></div>
                            <div class="price-display">
                                0
                            </div>
                            <div class="button-buy">
                                <button value="0" class="buy" onclick="buy(1)">Comprar</button>
                            </div>  
                        </div>
                    </div>
                    <div class="items">
                        <h1>Fundos</h1>
                        <div class="items-div">
                            <?php
                                $gadget = "SELECT * FROM gadget WHERE g_status = 1 and type = 3";
                                $i = 0;
                                foreach($pdo->query($gadget) as $key => $value){
                                    $nome = $value['nome'];
                                    $item = $value['in_it'];
                                    $preco = $value['preco'];
                                    $code = $value['id_gadget'];
        
                                    $check = "SELECT * FROM compra WHERE fk_id_gadget = '$code' and fk_id_profile = '$perfil'";
                                    $prepare = $pdo->prepare($check);
                                    $prepare->execute();
        
                                    $rows = $prepare->rowCount();
        
                                    if($rows == 0){
                                        $i++;
                                        echo "<div  class='item' onclick='show_item(1, $code)'>
                                            <div class='img' id='$code' style='$item'>

                                            </div>
                                            <hr>
                                            <div id='".$code."n'>$nome</div>
                                            <div class='price' id='".$code."p'>
                                                $preco<i class='fa-solid fa-coins'></i>
                                            </div>
                                        </div>";
                                    }
                                }
                                if($i == 0){
                                    echo "<h3>Você já comprou todos os itens dessa sessão da loja. Parabéns!</h3>";
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="hidden_form_container" style="display:none;"></div>

    <script>
        function buy(numB) {

            var buttons_buy = document.getElementsByClassName("buy");
            n = buttons_buy[numB].value;

            if(n == "xxxx") return;
            var theForm, input_cod;
            theForm = document.createElement('form');
            theForm.action = 'compra.php';
            theForm.method = 'post';
            input_cod = document.createElement('input');
            input_cod.type = 'hidden';
            input_cod.name = 'gadget';
            input_cod.value = n;
            theForm.appendChild(input_cod);
            document.getElementById('hidden_form_container').appendChild(theForm);
            theForm.submit();
        }
    </script>
    <script src="../js/menu.js?v=1.01"></script>
    <script src="../js/loja.js?v=1.<?php echo rand(0,1000)?>"></script>
    <script src="../js/darkmode.js"></script>
</body>
</html>