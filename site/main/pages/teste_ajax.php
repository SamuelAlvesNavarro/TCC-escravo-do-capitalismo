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
    <link rel="stylesheet" href="../css/pesquisa.css?v=1.0132">
    <link rel="stylesheet" href="../css/menu.css?v=1.01">
    <link rel="stylesheet" href="../css/scroll.css?v=1.09">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <div class="all">
        <?php
            require "includes/menu.php";
        ?>
        <div class="nav">
            <div class="go-back" onclick="acentral()">
                <i class="fa-solid fa-chevron-left"></i>
            </div>
            <i class="fa-solid go-menu fa-sun mode"></i>
            <div class="go-menu" onclick="menu_appear()">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>
        <div class="lines">
                <div class="bar">
                    <div class="search-box">
                        <input id="query" required type="text" name="busca" class="input-search-page" placeholder="Pesquisar história........" value="<?php echo $pesquisa; ?>">
                        <button class="btn" onclick="busca()"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            
            <div class="main">
                <div class="results">
                    <div class="title-r">
                        <h1>Resultados<h1>
                    </div>
                    <div class="res" id="results">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    
        include "includes/footer.php";
        
    ?>

    <script src="../js/pesquisa2.js?v=1.012"></script>
    <script src="../js/menu.js"></script>
    <script>
        function busca(){
            query = document.getElementById("query").value;

            console.log(query);

            function _0x5f24(){var _0x57e07b=['659292mtVZAq','184072SXkQsQ','104139afeTzv','innerHTML','test.php','2582811yiBcne','getElementById','GET','results','891039hVkjHE','1DrdMHR','356840rntmPG','ajax','4XPntoa','4668620CTwZAC','10jiLSVu'];_0x5f24=function(){return _0x57e07b;};return _0x5f24();}var _0x1af624=_0x1d51;function _0x1d51(_0x29c686,_0x27b5b2){var _0x5f246c=_0x5f24();return _0x1d51=function(_0x1d51d7,_0x2637bd){_0x1d51d7=_0x1d51d7-0xa9;var _0x3bd735=_0x5f246c[_0x1d51d7];return _0x3bd735;},_0x1d51(_0x29c686,_0x27b5b2);}(function(_0x1f9965,_0x4d12b7){var _0x5a6387=_0x1d51,_0x30e06c=_0x1f9965();while(!![]){try{var _0x14ed2f=parseInt(_0x5a6387(0xb6))/0x1*(-parseInt(_0x5a6387(0xb7))/0x2)+-parseInt(_0x5a6387(0xb5))/0x3*(-parseInt(_0x5a6387(0xa9))/0x4)+-parseInt(_0x5a6387(0xab))/0x5*(-parseInt(_0x5a6387(0xac))/0x6)+parseInt(_0x5a6387(0xae))/0x7+-parseInt(_0x5a6387(0xad))/0x8+parseInt(_0x5a6387(0xb1))/0x9+-parseInt(_0x5a6387(0xaa))/0xa;if(_0x14ed2f===_0x4d12b7)break;else _0x30e06c['push'](_0x30e06c['shift']());}catch(_0x1d7f8c){_0x30e06c['push'](_0x30e06c['shift']());}}}(_0x5f24,0x24b46),$[_0x1af624(0xb8)]({'type':_0x1af624(0xb3),'url':_0x1af624(0xb0),'data':{'busca':query},'success':function(_0x2ef13f){var _0x37e99e=_0x1af624;document[_0x37e99e(0xb2)](_0x37e99e(0xb4))[_0x37e99e(0xaf)]=_0x2ef13f;}}));

            /* $.ajax({  
                type: 'GET',
                url: 'test.php', 
                data: { busca: query },
                success: function(response) {
                    document.getElementById("results").innerHTML = response;
                }
            }); */
        }
        
    </script>
</body>
</html>
    
