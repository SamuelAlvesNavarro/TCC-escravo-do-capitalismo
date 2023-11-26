<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../svg/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="../css/manual.css?v=<?php echo rand(0,1000);?>">
    <link rel="stylesheet" href="../css/scroll.css?v=1.09">
    <title>Manual de Uso - Histórias Assombrosas</title>
</head>
<body>
    <?php
        require "includes/loading.php";
    ?>
    <div class="main">
        <div class="grandTitle" id="geral">
            Uso geral do site
        </div>
            <div class="title">
                
            </div>
                <div class="lines">
                    O site tem como objetivo permitir que os usuários escrevam histórias de terror para os demais usuários lerem e responderem uma pergunta
                    relacionada a história, recebendo pontos de leitor e moedas para gastar com os itens da loja para personalizar seu perfil.
                </div>

        <div class="split"></div>

        <div class="grandTitle" id="central">Central</div>

            <div class="lines">
                A central é a home page do site, onde o usuário terá acesso a página da loja, a área do escritor, ao perfil e a barra de pesquisa.
                Além disso, na parte inferior, estão o ranking de melhores autores, os eventos do site,
                as histórias mais recentes e as mais bem avaliadas.

            </div>

        <div class="split"></div>

        <div class="grandTitle" id="loja">Loja</div>

            <div class="lines">
                Na página da loja, você poderá comprar fotos e fundos para personalizar o seu perfil, caso possua a quantidade de moedas necessárias.

            </div>

        <div class="split"></div>

        <div class="grandTitle" id="perfil">Perfil</div>

            <div class="lines">
                    Na página do perfil será exibida as informações básicas do usuário dono do perfil, juntamente das histórias publicadas 
                por ele.
                <br>
                    Caso o usuário seja o dono do perfil, na parte inferior da página, aparecerá a seção "edição avançada", onde o usuário poderá 
                alterar suas informações pessoais e mudar sua foto e fundo do perfil.
                <br>
                    Ela só deverá ser utilizada caso o usuário em questão tenha quebrado alguma regra do site(Uma denúncia falsa poderá resultar em banimento). 
                Ao selecionar a opção, uma caixa de texto aparecerá, e o usuário que fez a denúncia deve escrever o motivo da denúncia nesta caixa e, após isso, selecionar
                a opção registrar, para concluir o envio da denúncia.
            </div>

        <div class="split"></div> 

        <div class="grandTitle" id="escritor">Área do escritor</div>

                <div class="lines">
                    Na área do escritor, o usuário terá acesso a página de criação de histórias. As suas histórias que devem ser corrigidas e aquelas que devem ser aprovadas também estarão nessa página.
                </div>

            <div class="title">Correção/Aprovação</div>

                <div class="lines">
                    Quando o usuário envia uma história para a correção, essa irá aparecer na lista de correção, o que significa que ela está na fila para ser corrigida.
                    <br>
                    Após ela ser corrigida por algum moderador, ela irá aparecer na lista de aprovação, onde o usuário, ao selecioná-la, poderá ver as alterações feitas 
                    pelo moderador e caso concorde com as correções e a aprove, a história ficará disponível para todos os usuários. Caso o dono da história discorde das alterações feitas 
                    pelo moderador, a história será apagada. 
                </div>

        <div class="split"></div>

        <div class="grandTitle" id="criacao-historia">
            Criação de histórias
        </div>
            <div class="title">
                Título
            </div>
                <div class="lines">
                    A aba de título é destinada ao título da história, deve-se seguir as seguintes condições:<br>
                    <ul>
                        <li>O título não pode estar em branco;</li>
                        <li>O conteúdo não deve conter nenhum código estranho;</li>
                        <li>O título deve ter relação com a história;</li>
                        <li>O título não pode conter mais de 40 caracteres;</li>
                        <li>O título não pode conter nenhum palavrão;</li>
                    </ul>
                </div>
            <div class="title">
                Conteúdo
            </div>
                <div class="lines">
                    A área de conteúdo é destinada ao texto da história, deve-se seguir as seguintes condições:
                    <ul>
                        <li>O conteúdo da história não pode estar em branco;</li>
                        <li>O conteúdo não deve conter nenhum código estranho;</li>
                    </ul>
                </div>
            <div class="title">
                Imagens
            </div>
                <div class="lines">
                    A área de imagens é destinada ao envio de imagens da história, deve-se seguir as seguintes condições:<br>
                    <ul>
                        <li>As imagens devem ter relação com a história;</li>
                        <li>O tamanho máximo da imagem é de 5 MB;</li>
                        <li>A extensão da imagem deve ser png, jpg ou jpeg;</li>
                    </ul>
                </div>
            <div class="title">
                Referências
            </div>
                <div class="lines">
                    A área de referências é destinada às fontes utilizadas para a construção da história, deve-se seguir as seguintes
                    condições:
                    <ul>
                        <li>A referência deve ser uma URL;</li>
                        <li>Não utilizar a URL de sites que não estão relacionados a história, assim como a de sites para maiores de 18 anos;</li>
                    </ul>
                </div>
            <div class="title">
                Questão
            </div>
                <div class="lines">
                    A área de questão é destinada para a pergunta da  história, deve-se seguir as seguintes condições:
                    <ul>
                        <li>Para escolher a alternativa correta, basta aperta a caixa da resposta selecionada para deixa-lá verde;</li>
                    </ul>
                </div>

        <div class="split"></div>

        <div class="grandTitle" id="story">Histórias</div>

            <div class="title">Questões</div>

                <div class="lines">
                    A área de questões está abaixo da história. Nela, o usuário deverá escolher a resposta correta. Caso erre, será retirada uma quantidade de moedas e ele poderá tentar novamente. Caso acerte, o usuário receberá moedas, pontos de leitor e vai liberar a opção de avaliar a história.
                </div>

            <div class="title">Avaliação</div>

                <div class="lines">
                    A área de avaliação substituirá a área de questões após o usuário respondê-la corretamente. Nela, o usuário poderá avaliar a história com uma nota de 1 a 5. Após a avaliação ser feita, a área de comentários irá substituí-la.
                </div>

            <div class="title">Comentários</div>

                <div class="lines">
                    A área de comentários substituirá a área de avaliação após o usuário avaliar a história. Nela, o usuário poderá ver os comentários de outras pessoas e enviar seus próprios comentários.<br>
                    Os comentários devem seguir as seguintes orientações:
                    <ul>
                        <li>É proibido comentários que fogem do tema da história;</li>
                        <li>É proibido o uso de palavrões nos comentários;</li>
                        <li>É proibido o uso de links nos comentários;</li>
                        <li>É proibida a disseminação de discurso de ódio nos comentários;</li>
                    </ul>
                </div>
    </div>
    <script>

const root = document.querySelector(":root");
var dark = false;
function switchmode(){
    root.classList.toggle('dark');

    if(dark){
        dark = false;
        setTheme("light");
    }else{
        dark = true;
        setTheme("dark");
    }
}
        function setTheme(theme){
            localStorage.setItem("Theme", JSON.stringify(theme));
        }
        function getTheme(){
            let theme = JSON.parse(localStorage.getItem("Theme"));

            if(theme == "dark"){
                switchmode();
            }
        }
        getTheme();
    </script>
</body>
</html>