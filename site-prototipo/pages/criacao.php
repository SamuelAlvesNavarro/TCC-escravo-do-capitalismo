<?php
    require "includes/conexao.php";
    require "includes/online.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/f2389f6c39.js" crossorigin="anonymous"></script>
    <title>Criação de Histórias</title>
    <link rel="stylesheet" href="../css/criacao.css?v=1">
</head>
<body>
<form id="form-criacao" method="post" action="upload.php" enctype="multipart/form-data">
    <div class="all">
        <a href="central.php"><div class="toogle section">
            <i class="fa-solid fa-arrow-left"></i>
        </div></a>
        <div class="title section">
            <h1>Criação de Histórias</h1>
        </div>
        <div class="story-title section">
            <input type="text" name="titulo" id="title-story" required placeholder="Título">
        </div>
        <div class="story section">
            <h1>Páginas</h1>
            <div class="page-all story-page section">
                <div class="page-title">
                    <h1>História</h1>
                    <div class="page-expl">
                        <ul>
                            <li>Limite de 12000 caracteres;</li>
                            <li>Lembre-se da página de conclusão. Se não quer que sua página de história passe do limite de linhas, use-as sabiamente.</li>
                        </ul>
                    </div>
                </div>
                <div class="page-content">
                    <textarea name="story" id="conteudo-historia" rows="1" cols="30" max="12000" required></textarea>
                </div>
            </div>
            <div class="page-all pics-page section">
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
                        <div class="input-file-unit">
                            <i class="fa-solid fa-image"></i><label class="imagem-label" id="imagem1-label" for="imagem1">Imagem 1</label><input multiple class="input-file" type="file" id="imagem1" name="imagem1" accept=".jpg, .jpeg, .png" id="" ondragstart="return false" draggable="false" ondragenter="event.dataTransfer.dropEffect='none'; event.stopPropagation(); event.preventDefault();" ondragover="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();" ondrop="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();"><br>
                            <button id="bt-first" type="button" class="bt-input-img" onclick="inputimgchangeval(-1)">Remover</button>
                        </div>
                        <div class="input-file-unit">
                            <i class="fa-solid fa-image"></i><label class="imagem-label" id="imagem2-label" for="imagem2">Imagem 2</label><input class="input-file" type="file" id="imagem2" name="imagem2" accept=".jpg, .jpeg, .png" id="" ondragstart="return false" draggable="false" ondragenter="event.dataTransfer.dropEffect='none'; event.stopPropagation(); event.preventDefault();" ondragover="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();" ondrop="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();"><br>
                            <button type="button" class="bt-input-img" onclick="inputimgchangeval(-2)">Remover</button>
                        </div>
                        <div class="input-file-unit">
                            <i class="fa-solid fa-image"></i><label class="imagem-label" id="imagem3-label" for="imagem3">Imagem 3</label><input class="input-file" type="file" id="imagem3" name="imagem3" accept=".jpg, .jpeg, .png" id="" ondragstart="return false" draggable="false" ondragenter="event.dataTransfer.dropEffect='none'; event.stopPropagation(); event.preventDefault();" ondragover="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();" ondrop="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();"><br>
                            <button type="button" class="bt-input-img" onclick="inputimgchangeval(-3)">Remover</button>
                        </div>
                        <div class="input-file-unit">
                            <i class="fa-solid fa-image"></i><label class="imagem-label" id="imagem4-label" for="imagem4">Imagem 4</label><input class="input-file" type="file" id="imagem4" name="imagem4" accept=".jpg, .jpeg, .png" id="" ondragstart="return false" draggable="false" ondragenter="event.dataTransfer.dropEffect='none'; event.stopPropagation(); event.preventDefault();" ondragover="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();" ondrop="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();"><br>
                            <button type="button" class="bt-input-img" onclick="inputimgchangeval(-4)">Remover</button>
                        </div>
                        <div class="input-file-unit">
                            <i class="fa-solid fa-image"></i><label class="imagem-label" id="imagem5-label" for="imagem5">Imagem 5</label><input class="input-file" type="file" id="imagem5" name="imagem5" accept=".jpg, .jpeg, .png" id="" ondragstart="return false" draggable="false" ondragenter="event.dataTransfer.dropEffect='none'; event.stopPropagation(); event.preventDefault();" ondragover="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();" ondrop="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();"><br>
                            <button type="button" class="bt-input-img" onclick="inputimgchangeval(-5)">Remover</button>
                        </div>
                        <div class="input-file-unit">
                            <i class="fa-solid fa-image"></i><label class="imagem-label" id="imagem6-label" for="imagem6">Imagem 6</label><input class="input-file" type="file" id="imagem6" name="imagem6" accept=".jpg, .jpeg, .png" id="" ondragstart="return false" draggable="false" ondragenter="event.dataTransfer.dropEffect='none'; event.stopPropagation(); event.preventDefault();" ondragover="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();" ondrop="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();"><br>
                            <button type="button" class="bt-input-img" onclick="inputimgchangeval(-6)">Remover</button>
                        </div>
                        <div class="input-file-unit">
                            <i class="fa-solid fa-image"></i><label class="imagem-label" id="imagem7-label" for="imagem7">Imagem 7</label><input class="input-file" type="file" id="imagem7" name="imagem7" accept=".jpg, .jpeg, .png" id="" ondragstart="return false" draggable="false" ondragenter="event.dataTransfer.dropEffect='none'; event.stopPropagation(); event.preventDefault();" ondragover="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();" ondrop="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();"><br>
                            <button type="button" class="bt-input-img" onclick="inputimgchangeval(-7)">Remover</button>
                        </div>
                        <div class="input-file-unit">
                            <i class="fa-solid fa-image"></i><label class="imagem-label" id="imagem8-label" for="imagem8">Imagem 8</label><input class="input-file" type="file" id="imagem8" name="imagem8" accept=".jpg, .jpeg, .png" id="" ondragstart="return false" draggable="false" ondragenter="event.dataTransfer.dropEffect='none'; event.stopPropagation(); event.preventDefault();" ondragover="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();" ondrop="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();"><br>
                            <button type="button" class="bt-input-img" onclick="inputimgchangeval(-8)">Remover</button>
                        </div>
                        <div class="input-file-unit">
                            <i class="fa-solid fa-image"></i><label class="imagem-label" id="imagem9-label" for="imagem9">Imagem 9</label><input class="input-file" type="file" id="imagem9" name="imagem9" accept=".jpg, .jpeg, .png" id="" ondragstart="return false" draggable="false" ondragenter="event.dataTransfer.dropEffect='none'; event.stopPropagation(); event.preventDefault();" ondragover="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();" ondrop="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();"><br>
                            <button type="button" class="bt-input-img" onclick="inputimgchangeval(-9)">Remover</button>
                        </div>
                        <div class="input-file-unit">
                            <i class="fa-solid fa-image"></i><label class="imagem-label" id="imagem10-label" for="imagem10">Imagem 10</label><input class="input-file" type="file" id="imagem10" name="imagem10" accept=".jpg, .jpeg, .png" id="" ondragstart="return false" draggable="false" ondragenter="event.dataTransfer.dropEffect='none'; event.stopPropagation(); event.preventDefault();" ondragover="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();" ondrop="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();"><br>
                            <button id="bt-last" class="bt-input-img" type="button" onclick="inputimgchangeval(-10)">Remover</button>
                        </div>
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
        <div class="col2">
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
                        <div class="subref">Pode causar rejeição da história</div>
                        <li>Declarar autoria de uma história que não o pertence</li>
                        <div class="subref">Causará rejeição da história</div>
                    </ol>
                </ul>
            </div>
            <div class="preview section">
                <input id="preview-bt" onclick="preview()" type="button" value="Preview">
            </div>
            <div class="uploads section">
                <input id="upload" type="submit" value="Mandar para Revisão">
            </div>
        </div>
    </div>
</form>
<div id="preview-div" onclick="preview()" class="preview-div"></div>
<script src="../js/criacao.js"></script>
</body>
</html>