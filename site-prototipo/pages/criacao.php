
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criação de Histórias</title>
    <link rel="stylesheet" href="../css/criacao.css">
</head>
<body>
    <div class="all">
        <div class="title section">
            <h1>Página de Criação de Histórias</h1>
        </div>
        <div class="story-title section">
            <input type="text" name="title-story" id="title-story" placeholder="Título">
        </div>
        <div class="story section">
            <div class="page-all story-page">
                <div class="page-title">
                    <h1>História</h1>
                    <div class="page-expl">
                        <ul>
                            <li>Escreva aqui sua história;</li>
                            <li>Lembre-se da página de conclusão. Se não quer que sua página de história passe do limite de linhas, use-as sabiamente.</li>
                        </ul>
                    </div>
                </div>
                <div class="page-content">
                    <textarea name="story" id="conteudo-historia" cols="30" rows="20"></textarea>
                </div>
            </div>
            <div class="page-all pics-page">
                <div class="page-title">
                    <h1>Fotos</h1>
                    <div class="page-expl">
                        <ul>
                            <li>Limite de 10 imagens;</li>
                            <li>Só serão aceitos os formatos: jpg, jpeg e png.</li>
                        </ul>
                    </div>
                </div>
                <div class="page-pics-inputs">
                    <div class="page-pics-input">
                        <input type="file" accept=".jpg, .jpeg, .png" id="" ondragstart="return false" draggable="false"
        ondragenter="event.dataTransfer.dropEffect='none'; event.stopPropagation(); event.preventDefault();"  
        ondragover="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();"  
        ondrop="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();">
                    </div>
                </div>
            </div>
            <div class="page-all ref-page">
                <div class="page-title">
                    <h1>Referências</h1>
                    <div class="page-expl">
                        <ul>
                            <li>Os links <strong>serão</strong> revisados, cuidado com o conteúdo sendo linkado.</li>
                        </ul>
                    </div>
                </div>
                <div class="page-content">
                    <input type="url" name="link-reference" id="">
                </div>
            </div>
        </div>
        <div class="warnings section">
            <h1>Avisos e Regras</h1>
            <ul>
                <li>Se não pretende escrever em uma página, deixe-a vazia.</li>
                <li>Nem todas as páginas são opcionais, algumas são obrigatórias. São obrigatórias as seguintes páginas: </li>
                <ol>
                    <li>História</li>
                    <li>Referências</li>
                    <div class="subref">Se a história for de sua autoria, escreva "De minha autoria" na página de referências</div>
                </ol>
                <li>Cuidado, todo o conteúdo fora das linhas especificadas aparecerá em uma página separada</li>
                <li>Não tente burlar as regras da postagem, isso não passará despercebido. <br>Evite:</li>
                <ol>
                    <li>Adicionar a mesma imagem mais de uma vez</li>
                    <li>Desrespeitar a categoria da página</li>
                    <div class="subref">Pode causar possivel rejeição da história</div>
                    <li>Declarar autoria de uma história que não o pertence</li>
                    <div class="subref">Pode causar possivel rejeição da história</div>
                </ol>
            </ul>
        </div>
    </div>
</body>
</html>