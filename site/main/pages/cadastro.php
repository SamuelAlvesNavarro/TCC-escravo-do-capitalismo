<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/f2389f6c39.js" crossorigin="anonymous"></script>

    <meta http-equiv="cache-control" content="no-cache, must-revalidate, post-check=0, pre-check=0" />
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />

    <link rel="shortcut icon" href="../svg/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="../css/cadastro.css?v=1.0922">
    <link rel="stylesheet" href="../css/scroll.css?v=1.09">
    <title>Cadastro</title>
</head>
<body>
    <div class="all" id="all">
        <div class="fixed">
            <div class="chv-left chv" id="chv-left" onclick="toLast()">
                <i class="fa-solid fa-chevron-left"></i>
            </div>
            <div class="chv-right chv" id="chv-right" onclick="toNext()">
                <i class="fa-solid fa-chevron-right"></i>
            </div>
            <div class="controls">

            </div>
        </div>
        <div class="prev-cont" id="prev-cont" style="display: none;">

        </div>
        <div class="slides">
            <form action="cadastro_exe.php" method="post">
                <button type="submit" disabled style="display: none" aria-hidden="true"></button>
                <div class="slide">
                   <div class="essInfo info">
                         Muita gente visitará sua conta
                   </div>
                   <div class="inputArea">
                        <div class="prev"></div>
                        <div class="label">Nome:</div>
                        <input type="text" required name="name" id="nome" class='inp-text' maxLength="50" placeholder="Escreva aqui seu nome">
                        <!--<div class="res">
                            mpty
                        </div>-->
                   </div>
                   <div class="pc-info info">
                        Use a tecla Enter e as Flechas para navegar pelo cadastro
                   </div>
                </div>
                <div class="slide">
                    <div class="essInfo info">
                        Seu apelido irá aparecer para outros usuários
                   </div>
                   <div class="inputArea">
                        <div class="prev"></div>
                        <div class="label">Apelido: </div>
                        <input type="text" required name="apelido" id="apelido" class='inp-text' maxLength="15" placeholder="Escreva aqui seu apelido">
                        <!--<div class="res">
                            mpty
                        </div>-->
                   </div>
                   <div class="pc-info info don">
                        Use a tecla M para abrir o menu
                  </div>
                </div>
                <div class="slide">
                    <div class="essInfo info">
                        Você receberá e-mails importantes, tenha certeza de escolher o melhor de todos
                   </div>
                   <div class="inputArea">
                        <div class="prev"></div>
                        <div class="label">Seu melhor email: </div>
                        <input type="email" required name="email" id="email" class='inp-text' maxLength="50" placeholder="Escreva aqui seu email">
                        <!--<div class="res">
                            mpty
                        </div>-->
                   </div>
                   <div class="pc-info info">
                        Use a tecla " " para " "
                  </div>
                </div>
                <div class="slide">
                    <div class="essInfo info">
                        " "
                   </div>
                   <div class="inputArea">
                        <div class="prev"></div>
                        <div class="label">Sua senha: </div>
                        <input type="password" required name="senha" id="senha" class='inp-text' maxLength="20" placeholder="Escreva aqui sua senha">
                        <!--<div class="res">
                            mpty
                        </div>-->
                   </div>
                   <div class="pc-info info">
                        Coloque o mouse sobre a senha para vê-la
                  </div>
                </div>
                <div class="slide ">
                    <div class="essInfo info">
                        Se o sangue te atrapalhar, atualize a página
                   </div>
                   <div class="inputArea">
                        <div class="prev"></div>
                        <div class="label">Confirme sua senha: </div>
                        <input type="password" required name="confirmarsenha" id="Confsenha" class='inp-text' maxLength="50" placeholder="Confirmar senha">
                        <!--<div class="res">
                            mpty
                        </div>-->
                   </div>
                   <div class="pc-info info">
                        Use a tecla " " para " "
                  </div>
                </div>
                <div class="slide bt-slide ">
                    <div class="prev"></div>
                    <input id="send" type="submit">Terminar Cadastro</input>
                </div>
            </form>
        </div>
    </div>
    <script src="../js/cadastro.js?v=1.01245"></script>
</body>
</html>
