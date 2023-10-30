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

    $v = 0;
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
    <?php
        require "includes/menu.php";
    ?>
    <div class="befAll">

    <div class="all">
        <section class="header">
            <div class="enter-menu" onclick="menu_appear()">
                <i class="fa-solid fa-bars"></i>
            </div>
            <div class="title">
                Loja
            </div>
            <div class="historito">
                <svg id="eBYGrpvxAe61" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 500 500" shape-rendering="geometricPrecision" text-rendering="geometricPrecision"><path d="M40.1,467.1l-11.2,9c-3.2,2.5-7.1,3.9-11.1,3.9C8,480,0,472,0,462.2L0,192C0,86,86,0,192,0s192,86,192,192v270.2c0,9.8-8,17.8-17.8,17.8-4,0-7.9-1.4-11.1-3.9l-11.2-9c-13.4-10.7-32.8-9-44.1,3.9l-30.5,35c-3.3,3.8-8.2,6-13.3,6s-9.9-2.2-13.3-6l-26.6-30.5c-12.7-14.6-35.4-14.6-48.2,0L141.3,506c-3.3,3.8-8.2,6-13.3,6s-9.9-2.2-13.3-6L84.2,471c-11.3-12.9-30.7-14.6-44.1-3.9ZM160,192c0-17.673112-14.326888-32-32-32s-32,14.326888-32,32s14.326888,32,32,32s32-14.326888,32-32Zm96,32c17.673112,0,32-14.326888,32-32s-14.326888-32-32-32-32,14.326888-32,32s14.326888,32,32,32Z" transform="matrix(.707107 0.707107-.707107 0.707107 180.411309 35.439723)"/></svg>
            </div>
        </section>
        <section class="phrase">
            Nesse momento, você tem <?php echo $moedas; ?> <i class="fa-solid fa-coins"></i>.
        </section>
        <section class="main">
            <section class="selection">
                <div class="selection2">
                    <div class="opp" onclick="check(0)">
                        <input type="radio" name="itens-sort" class="check-item">
                        <label for="fotos">Foto</label>
                    </div>
                    <div class="opp" onclick="check(1)">
                        <input type="radio" name="itens-sort" class="check-item">
                        <label for="fundo">Fundo</label>
                    </div>
                </div>
                <div class="search-bar-cont">
                    <input id="search_text" class="search-bar" type="text" name="itens-sort" class="check-item" onchange="search()" placeholder="Pesquisar....">
                    <i class="fa-solid fa-search"></i>
                </div>
            </section>
            <section class="items-all">
                <div id="foto" class="type">
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

                            if($rows == 0):
                                $z++;

                                $item_image = explode("(", $item)[1];
                                $item = explode(")", $item_image)[0];
                            ?>
                                
                                <div  class="item size<?php echo rand(1,5);?>" onclick='show_item(<?php echo $v; $v++;?>, 0, <?php echo $code;?>)'>
                                    <div class="exp_img">
                                        <img class="item_img" id='<?php echo $nome;?>' src='<?php echo $item;?>'>
                                    </div>
                                    
                                    <div class="rest-item">
                                        <div class="item-name" id='<?php echo $code;?>n'><?php echo $nome;?></div>
                                        <div class='price' id='<?php echo $code;?>p'>
                                            $<?php echo $preco;?>.00 (<i class="fa-solid fa-coins"></i>)
                                        </div>
                                    </div>

                                </div>

                            <?php endif;
                        }
                        if($z == 0): ?>
                            <h3>Você já comprou todos os itens dessa sessão da loja. Parabéns!</h3>;
                        <?php endif; ?>
                </div>
                <div id="fundo" class="type">
                    <?php
                        $gadget = "SELECT * FROM gadget WHERE g_status = 1 and type = 3";
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

                            if($rows == 0):
                                $z++;

                                
                                $item_image = explode("(", $item)[1];
                                $item = explode(")", $item_image)[0];
                            ?>
                                
                                <div  class="item size<?php echo rand(1,5);?>" onclick='show_item(<?php echo $v; $v++;?>, 1, <?php echo $code;?>)'>
                                    <div class="exp_img">
                                        <img class="item_img" id='<?php echo $nome;?>' src='<?php echo $item;?>'>
                                    </div>
                                    <div class="rest-item">
                                        <div class="item-name" id='<?php echo $code;?>n'><?php echo $nome;?></div>
                                        <div class='price' id='<?php echo $code;?>p'>
                                            $<?php echo $preco;?>.00 (<i class="fa-solid fa-coins"></i>)
                                        </div>
                                    </div>
                                
                                </div>

                            <?php endif;
                        }
                        if($z == 0): ?>
                            <h3>Você já comprou todos os itens dessa sessão da loja. Parabéns!</h3>;
                        <?php endif; ?>
                </div>
                <div id="item_display">
                    <div class="photo">
                        <img id="item_display_photo" src="" alt="" srcset="">
                    </div>
                    <div class="info">
                        <h1 id="item_nome_title"></h1>
                        <h2 id="sub">Foto</h2>

                        <div id="price_display"></div>

                        <div class="comprar" onclick="buy()">
                            <button class="buy">Comprar</button>
                        </div>
                    </div>
                    
                </div>
            </section>
        </section>
    </div>

    </div>

    <div id="hidden_form_container" style="display:none;"></div>

    <script src="../js/menu.js?v=1.01"></script>
    <script src="../js/loja.js?v=1.<?php echo rand(0,1000)?>"></script>
    <script src="../js/darkmode.js"></script>
</body>
</html>