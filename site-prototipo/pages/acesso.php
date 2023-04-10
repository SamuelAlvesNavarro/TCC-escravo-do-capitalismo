<?php
    if(isset($_POST['email'])){

    }else{

    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/acesso.css">
    <script src="https://kit.fontawesome.com/f2389f6c39.js" crossorigin="anonymous"></script>
    <title>Cadastro</title>
</head>
<body>
    <div class="all" id="all">
        <div class="homebt">
            <a href="../index.php"><button>Home Page</button></a>
        </div>
        <div class="container-login" id="container-login">
            <div class="login" id="login">
                <div class="logo-container">
                    <div class="logo">
                        <button onclick="toBlack()">trocar</button>
                    </div>
                </div>
                <form autocomplete="off" class="login-form" id="login-form" name="login" method="post" action="login.php">
                    <label for="email">Email:</label><br>
                    <input id="input-email" autocomplete="false" class="input" type="email" id="email" name="email" placeholder="Email"><br>
                    <label for="senha">Senha:</label><br>
                    <input id="input-senha" autocomplete="false" class="input senha-login" type="password" id="senha" name="senha" placeholder="Senha"><br>
                    <div class="after" id="after">
                        <input class="login-submit" id="submit-login" type="button" value="Login">
                        <div id="arrowthing" class="arrowthing"><i class="fa-solid fa-arrow-right"></i></div>
                    </div>
                    <br><br>
                    <div class="link-new">
                        <a class="new-user" href="#" onclick="showCadastro()">Sou novo</a>
                    </div>
                </form>
            </div>
        </div>
        <div class="container-cadastro" id="container-cadastro">
            <div class="logo-container">
                <div class="logo">
                </div>
            </div>
            <div class="cadastro">
                <form class="cadastro-form" name="cadastro" method="post" action="cadastro.php">
                    <label class="signup-label" for="apelido">Apelido:</label><br>
                    <input class="input-text" type="text" id="apelido" name="apelido" required><br>
            
                    <label class="signup-label" for="name">Nome:</label><br>
                    <input class="input-text" type="text" id="name" name="name" required><br>
            
                    <label class="signup-label" for="email">Email:</label><br>
                    <input class="input-text" type="email" id="email" name="email" required><br>
            
                    <label class="signup-label" for="senha">Senha:</label><br>
                    <input class="input-text" type="password" id="senha" name="senha" required><br>
            
                    <label class="signup-label" for="confirmarsenha">Confirmar senha:</label><br>
                    <input class="input-text" type="password" name="confirmarsenha" id="confirmarsenha" required><br>
                    
                    <div class="div-cadastro-submit">
                        <input class="submit-cadastro-bt" type="submit" name="cadastrar" value="Cadastrar">
                    </div>
                </form>
                <a href="#" class="toLoginbt" onclick="showCadastro()">Já possuo conta</a>
            </div>
        </div>
    </div>
    <script src="../js/acesso.js"></script>
</body>
</html>