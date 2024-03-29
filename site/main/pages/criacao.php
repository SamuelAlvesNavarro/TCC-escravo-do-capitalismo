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

    <meta http-equiv="cache-control" content="no-cache, must-revalidate, post-check=0, pre-check=0" />
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />

    <link rel="shortcut icon" href="../svg/logo.svg" type="image/x-icon">
    <script src="https://kit.fontawesome.com/f2389f6c39.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/menu.css?v=1.01">
    <link rel="stylesheet" href="../css/criacao.css?v=1.09121<?php echo rand(0,100)?>">
    <link rel="stylesheet" href="../css/scroll.css?v=1.09">
    <title>Criação de Histórias</title>
</head>
<body id="body">
<?php
        require "includes/loading.php";
    ?>
    <?php
        require "includes/menu.php";
    ?>
    <div class="floating-bar" id="floating-bar">
        <button type="button" onclick="strong()"><strong>B</strong></button>
        <button type="button" onclick="italic()"><i>B</i></button>
        <button type="button" onclick="underline()"><u>B</u></button>
        <button type="button" onclick="small()"><small>B</small></button>
        <button type="button" onclick="h('1')"><h1>B</h1></button>
        <button type="button" onclick="h('2')"><h2>B</h2></button>
        <button type="button" onclick="h('3')"><h3>B</h3></button>
        <button type="button" onclick="h('4')"><h4>B</h4></button>
        <button type="button" onclick="h('5')"><h5>B</h5></button>
        <button type="button" onclick="h('6')"><h6>B</h6></button>
        <button id="hr-bt" type="button" onclick="hr()"><hr></hr></button>
        <button class="img-bt-bar" id="img-bt-1" type="button" onclick="addImg(1)"><i class="fa-solid fa-image"></i> (1)</button>
        <button class="img-bt-bar" id="img-bt-2" type="button" onclick="addImg(2)"><i class="fa-solid fa-image"></i> (2)</button>
        <button class="img-bt-bar" id="img-bt-3" type="button" onclick="addImg(3)"><i class="fa-solid fa-image"></i> (3)</button>
        <button class="img-bt-bar" id="img-bt-4" type="button" onclick="addImg(4)"><i class="fa-solid fa-image"></i> (4)</button>
        <button class="img-bt-bar" id="img-bt-5" type="button" onclick="addImg(5)"><i class="fa-solid fa-image"></i> (5)</button>
        <button class="img-bt-bar" id="img-bt-6" type="button" onclick="addImg(6)"><i class="fa-solid fa-image"></i> (6)</button>
        <button class="img-bt-bar" id="img-bt-7" type="button" onclick="addImg(7)"><i class="fa-solid fa-image"></i> (7)</button>
        <button class="img-bt-bar" id="img-bt-8" type="button" onclick="addImg(8)"><i class="fa-solid fa-image"></i> (8)</button>
        <button class="img-bt-bar" id="img-bt-9" type="button" onclick="addImg(9)"><i class="fa-solid fa-image"></i> (9)</button>
        <button class="img-bt-bar" id="img-bt-10" type="button" onclick="addImg(10)"><i class="fa-solid fa-image"></i> (10)</button>
    </div>
    <div class="deco">

    </div>
    <div class="modal" id="modal">
        <div class="modal-xmark" onclick="appearModal()">
           <i class="fa-solid fa-xmark"></i> 
        </div>
        <div class="center">
            <div class="chevron chev-l" onclick="toLast()">
                <i class="fa-solid fa-chevron-left"></i>
            </div>
            <div class="container-img-sub">
                <img alt="" id='img-container' class="img-container">
            </div>
            <div class="chevron chev-r" onclick="toNext()">
                <i class="fa-solid fa-chevron-right"></i>
            </div>
        </div>
    </div>
    <form action="upload.php" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="all" id="all">
            <div class="header layout-padding">
                <div class="acess-menu" onclick="menu_appear()">
                    <i class="fa-solid fa-bars"></i>
                </div>
                <div class="logo">
                    <div class="logo-pic">
                        <svg id="eBYGrpvxAe61" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 500 500" shape-rendering="geometricPrecision" text-rendering="geometricPrecision"><path d="M40.1,467.1l-11.2,9c-3.2,2.5-7.1,3.9-11.1,3.9C8,480,0,472,0,462.2L0,192C0,86,86,0,192,0s192,86,192,192v270.2c0,9.8-8,17.8-17.8,17.8-4,0-7.9-1.4-11.1-3.9l-11.2-9c-13.4-10.7-32.8-9-44.1,3.9l-30.5,35c-3.3,3.8-8.2,6-13.3,6s-9.9-2.2-13.3-6l-26.6-30.5c-12.7-14.6-35.4-14.6-48.2,0L141.3,506c-3.3,3.8-8.2,6-13.3,6s-9.9-2.2-13.3-6L84.2,471c-11.3-12.9-30.7-14.6-44.1-3.9ZM160,192c0-17.673112-14.326888-32-32-32s-32,14.326888-32,32s14.326888,32,32,32s32-14.326888,32-32Zm96,32c17.673112,0,32-14.326888,32-32s-14.326888-32-32-32-32,14.326888-32,32s14.326888,32,32,32Z" transform="matrix(.707107 0.707107-.707107 0.707107 180.411309 35.439723)"/></svg>
                    </div>
                </div>
                <div class="controls">
                    <div class="submit-bt">
                        <input type="submit" onclick="botar()" value="Enviar">
                    </div>
                    <div class="manual opp" id="manual-bt">
                        <a target="_blank" href="manual.php#criacao-historia"><i id="manual-icon" class="far fa-sticky-note"></i></a>
                    </div>
                    <div class="edit opp" id="edit-bt">
                        <i id="edit-icon" class="fa-solid fa-pencil op-icon"></i>
                    </div>
                    <div class="mode opp" id="mode-bt">
                        <i id="mode-icon" class="fa-solid fa-sun op-icon"></i>
                    </div>
                </div>
            </div>
            <div class="main layout-padding" id="main">
                <div class="title" id="titleEnter">
                    <h1>Título:</h1><input onfocus="IsOutFocus()" id='title-input' required class="text-input" type="text" name="titulo" maxLength="40" placeholder="seu título" value="Fins diversos"><h2 id="title-all">Título</h2>
                </div>
                <div class="history" id="history-div">
                    <div class="title">
                        <h1 for="story">Ocorrido:</h1>
                    </div>
                    <div class="input-history">
                        <div class="edit-part" id="edit-part-d">
                            <button type="button" onclick="strong()"><strong>B</strong></button>
                            <button type="button" onclick="italic()"><i>B</i></button>
                            <button type="button" onclick="underline()"><u>B</u></button>
                            <button type="button" onclick="small()"><small>B</small></button>
                            <button type="button" onclick="h('1')"><h1>B</h1></button>
                            <button type="button" onclick="h('2')"><h2>B</h2></button>
                            <button type="button" onclick="h('3')"><h3>B</h3></button>
                            <button type="button" onclick="h('4')"><h4>B</h4></button>
                            <button type="button" onclick="h('5')"><h5>B</h5></button>
                            <button type="button" onclick="h('6')"><h6>B</h6></button>
                            <button id="hr-bt" type="button" onclick="hr()"><hr></hr></button>
                            <button class="img-bt" id="img-bt-1" type="button" onclick="addImg(1)"><i class="fa-solid fa-image"></i> (1)</button>
                            <button class="img-bt" id="img-bt-2" type="button" onclick="addImg(2)"><i class="fa-solid fa-image"></i> (2)</button>
                            <button class="img-bt" id="img-bt-3" type="button" onclick="addImg(3)"><i class="fa-solid fa-image"></i> (3)</button>
                            <button class="img-bt" id="img-bt-4" type="button" onclick="addImg(4)"><i class="fa-solid fa-image"></i> (4)</button>
                            <button class="img-bt" id="img-bt-5" type="button" onclick="addImg(5)"><i class="fa-solid fa-image"></i> (5)</button>
                            <button class="img-bt" id="img-bt-6" type="button" onclick="addImg(6)"><i class="fa-solid fa-image"></i> (6)</button>
                            <button class="img-bt" id="img-bt-7" type="button" onclick="addImg(7)"><i class="fa-solid fa-image"></i> (7)</button>
                            <button class="img-bt" id="img-bt-8" type="button" onclick="addImg(8)"><i class="fa-solid fa-image"></i> (8)</button>
                            <button class="img-bt" id="img-bt-9" type="button" onclick="addImg(9)"><i class="fa-solid fa-image"></i> (9)</button>
                            <button class="img-bt" id="img-bt-10" type="button" onclick="addImg(10)"><i class="fa-solid fa-image"></i> (10)</button>
                        </div>
                        <pre id="pre-history" maxlength="12000" class="historyArea"></pre>
                        <textarea onfocus="IsFocus()" onchange="botar()" tabindex="10" id="story-input-b" required oninput='this.style.height = "";this.style.height = this.scrollHeight + "px"' id="textarea-history" maxlength="12000" class="historyArea">
    Era uma noite sombria e nebulosa, onde as sombras pareciam ganhar vida própria. Na pequena cidade de Ravenswood, cercada por densas florestas e montanhas imponentes, uma atmosfera de mistério pairava no ar. Os moradores locais sussurravam histórias sobre eventos estranhos e inexplicáveis que aconteciam na região, mas nenhuma história era tão temida quanto a lenda dos "Fins Diversos".
    A lenda contava que, uma vez a cada década, uma série de eventos macabros assolava a cidade. Esses eventos, conhecidos como "Fins Diversos", eram uma manifestação sobrenatural que trazia consigo um destino sombrio para aqueles que ousassem cruzar o caminho das forças desconhecidas que habitavam a área.
    Na noite em que a lenda previa o próximo ciclo dos Fins Diversos, um grupo de jovens intrépidos decidiu explorar a floresta proibida que cercava a cidade. O grupo era composto por quatro amigos: Julia, Marcos, Clara e Rafael. Eles acreditavam que as histórias eram apenas lendas urbanas, criadas para assustar os incautos. No entanto, estavam prestes a descobrir a verdade aterrorizante que se escondia nas sombras.
<img1>
    À medida que adentravam a floresta, a atmosfera ao redor se tornava mais densa, como se as árvores estivessem sussurrando segredos obscuros. O grupo caminhava cautelosamente, guiado apenas pela luz tênue da lua filtrada pelas copas das árvores. De repente, um murmúrio ecoou pelo ar, fazendo com que todos se detivessem. Parecia um sussurro distante, carregado de uma energia sinistra.
    Ignorando a sensação de apreensão, continuaram sua jornada. À medida que avançavam, as sombras pareciam ganhar vida, dançando ao redor do grupo como espectros famintos por suas almas. Então, um a um, começaram a experimentar visões horríveis, cada uma personalizada com seus medos mais profundos e sombrios.
    Marcos viu o rosto pálido de uma criança perdida na escuridão, enquanto Clara foi perseguida por sombras grotescas que se contorciam ao seu redor. Julia e Rafael ouviram sussurros que ecoavam seus segredos mais sombrios. O terror se intensificava a cada passo, e a floresta parecia se alimentar do medo que se espalhava entre eles.
    À medida que a noite avançava, a floresta se tornou um labirinto de pesadelos, e o grupo percebeu que não estavam sozinhos. Criaturas sinistras emergiam das sombras, movendo-se silenciosamente entre as árvores, olhos brilhando com uma luz maligna. Eram os guardiões dos Fins Diversos, os arautos de um destino inescapável.
    Em um frenesi de pânico, o grupo tentou encontrar uma saída, mas a floresta parecia se fechar ao seu redor. À medida que os Fins Diversos se aproximavam, os amigos compreenderam a verdade da lenda. Cada visão, cada suspiro, eram os prelúdios de um fim inevitável e terrível.
    O amanhecer revelou uma floresta silenciosa e aparentemente inofensiva. Não havia sinal do grupo intrépido, apenas a lembrança sombria dos Fins Diversos que, mais uma vez, haviam cumprido seu ciclo de terror. Ravenswood guardava seus segredos sobrenaturais, e as lendas se perpetuavam, alertando os incautos a evitar as sombras da floresta proibida.
<img2>
                        </textarea>
                    </div>
                </div>
            </div>
            <div class="container-imgs layout-padding" id="containerImgs">
                <div class="title title2">
                    <h1>Imagens:</h1>
                    <div class="controls">
                        <div class="opp chevD" onclick="tableEditToggle()">
                            <i class="fa-solid fa-chevron-down op-icon"></i>
                        </div>
                    </div>
                </div>
                <div class="to-show-images">
                    <img class="imgsToShow" alt="" srcset="" onclick="callModal(1)">
                    <img class="imgsToShow" alt="" srcset="" onclick="callModal(2)">
                    <img class="imgsToShow"  alt="" srcset="" onclick="callModal(3)">
                    <img class="imgsToShow"  alt="" srcset="" onclick="callModal(4)">
                    <img class="imgsToShow"  alt="" srcset="" onclick="callModal(5)">
                    <img class="imgsToShow"  alt="" srcset="" onclick="callModal(6)">
                    <img class="imgsToShow"  alt="" srcset="" onclick="callModal(7)">
                    <img class="imgsToShow"  alt="" srcset="" onclick="callModal(8)">
                    <img class="imgsToShow"  alt="" srcset="" onclick="callModal(9)">
                    <img class="imgsToShow"  alt="" srcset="" onclick="callModal(10)">
                </div>
                <div class="images">
                    <div class="carossel" id='carossel'>
                        <div class="table">
                            <div class="input-file-unit">
                                <div class="join">
                                    <i class="fa-solid fa-image"></i>
                                    <label class="imagem-label" id="imagem1-label" for="imagem1">Imagem 1</label>
                                </div>
                                <input onfocus="IsOutFocus()" class="input-file" type="file" id="imagem1" name="imagem1" accept=".jpg, .jpeg, .png" id="" ondragstart="return false" draggable="false" ondragenter="event.dataTransfer.dropEffect='none'; event.stopPropagation(); event.preventDefault();" ondragover="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();" ondrop="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();"><br>
                                <button id="bt-first" type="button" class="bt-input-img" onclick="inputimgchangeval(-1)">Remover</button>
                            </div>
                            <div class="input-file-unit">
                                <div class="join">
                                    <i class="fa-solid fa-image"></i>
                                    <label class="imagem-label" id="imagem2-label" for="imagem2">Imagem 2</label>
                                </div>
                                <input onfocus="IsOutFocus()" class="input-file" type="file" id="imagem2" name="imagem2" accept=".jpg, .jpeg, .png" id="" ondragstart="return false" draggable="false" ondragenter="event.dataTransfer.dropEffect='none'; event.stopPropagation(); event.preventDefault();" ondragover="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();" ondrop="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();"><br>
                                <button type="button" class="bt-input-img" onclick="inputimgchangeval(-2)">Remover</button>
                            </div>
                            <div class="input-file-unit">
                                <div class="join">
                                    <i class="fa-solid fa-image"></i>
                                    <label class="imagem-label" id="imagem3-label" for="imagem3">Imagem 3</label>
                                </div>
                                <input onfocus="IsOutFocus()" class="input-file" type="file" id="imagem3" name="imagem3" accept=".jpg, .jpeg, .png" id="" ondragstart="return false" draggable="false" ondragenter="event.dataTransfer.dropEffect='none'; event.stopPropagation(); event.preventDefault();" ondragover="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();" ondrop="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();"><br>
                                <button type="button" class="bt-input-img" onclick="inputimgchangeval(-3)">Remover</button>
                            </div>
                            <div class="input-file-unit">
                                <div class="join">
                                    <i class="fa-solid fa-image"></i>
                                    <label class="imagem-label" id="imagem4-label" for="imagem4">Imagem 4</label>
                                </div>
                                <input onfocus="IsOutFocus()" class="input-file" type="file" id="imagem4" name="imagem4" accept=".jpg, .jpeg, .png" id="" ondragstart="return false" draggable="false" ondragenter="event.dataTransfer.dropEffect='none'; event.stopPropagation(); event.preventDefault();" ondragover="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();" ondrop="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();"><br>
                                <button type="button" class="bt-input-img" onclick="inputimgchangeval(-4)">Remover</button>
                            </div>
                            <div class="input-file-unit">
                                <div class="join">
                                    <i class="fa-solid fa-image"></i>
                                    <label class="imagem-label" id="imagem5-label" for="imagem5">Imagem 5</label>
                                </div>
                                <input onfocus="IsOutFocus()" class="input-file" type="file" id="imagem5" name="imagem5" accept=".jpg, .jpeg, .png" id="" ondragstart="return false" draggable="false" ondragenter="event.dataTransfer.dropEffect='none'; event.stopPropagation(); event.preventDefault();" ondragover="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();" ondrop="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();"><br>
                                <button type="button" class="bt-input-img" onclick="inputimgchangeval(-5)">Remover</button>
                            </div>
                            <div class="input-file-unit">
                                <div class="join">
                                    <i class="fa-solid fa-image"></i>
                                    <label class="imagem-label" id="imagem6-label" for="imagem6">Imagem 6</label>
                                </div>
                                <input onfocus="IsOutFocus()" class="input-file" type="file" id="imagem6" name="imagem6" accept=".jpg, .jpeg, .png" id="" ondragstart="return false" draggable="false" ondragenter="event.dataTransfer.dropEffect='none'; event.stopPropagation(); event.preventDefault();" ondragover="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();" ondrop="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();"><br>
                                <button type="button" class="bt-input-img" onclick="inputimgchangeval(-6)">Remover</button>
                            </div>
                            <div class="input-file-unit">
                                <div class="join">
                                    <i class="fa-solid fa-image"></i>
                                    <label class="imagem-label" id="imagem7-label" for="imagem7">Imagem 7</label>
                                </div>
                                <input onfocus="IsOutFocus()" class="input-file" type="file" id="imagem7" name="imagem7" accept=".jpg, .jpeg, .png" id="" ondragstart="return false" draggable="false" ondragenter="event.dataTransfer.dropEffect='none'; event.stopPropagation(); event.preventDefault();" ondragover="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();" ondrop="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();"><br>
                                <button type="button" class="bt-input-img" onclick="inputimgchangeval(-7)">Remover</button>
                            </div>
                            <div class="input-file-unit">
                                <div class="join">
                                    <i class="fa-solid fa-image"></i>
                                    <label class="imagem-label" id="imagem8-label" for="imagem8">Imagem 8</label>
                                </div>
                                <input onfocus="IsOutFocus()" class="input-file" type="file" id="imagem8" name="imagem8" accept=".jpg, .jpeg, .png" id="" ondragstart="return false" draggable="false" ondragenter="event.dataTransfer.dropEffect='none'; event.stopPropagation(); event.preventDefault();" ondragover="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();" ondrop="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();"><br>
                                <button type="button" class="bt-input-img" onclick="inputimgchangeval(-8)">Remover</button>
                            </div>
                            <div class="input-file-unit">
                                <div class="join">
                                    <i class="fa-solid fa-image"></i>
                                    <label class="imagem-label" id="imagem9-label" for="imagem9">Imagem 9</label>
                                </div>
                                <input onfocus="IsOutFocus()" class="input-file" type="file" id="imagem9" name="imagem9" accept=".jpg, .jpeg, .png" id="" ondragstart="return false" draggable="false" ondragenter="event.dataTransfer.dropEffect='none'; event.stopPropagation(); event.preventDefault();" ondragover="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();" ondrop="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();"><br>
                                <button type="button" class="bt-input-img" onclick="inputimgchangeval(-9)">Remover</button></div>
                            <div class="input-file-unit">
                                <div class="join">
                                    <i class="fa-solid fa-image"></i>
                                    <label class="imagem-label" id="imagem10-label" for="imagem10">Imagem 10</label>
                                </div>
                                <input onfocus="IsOutFocus()" class="input-file" type="file" id="imagem10" name="imagem10" accept=".jpg, .jpeg, .png" id="" ondragstart="return false" draggable="false" ondragenter="event.dataTransfer.dropEffect='none'; event.stopPropagation(); event.preventDefault();" ondragover="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();" ondrop="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();"><br>
                                <button id="bt-last" class="bt-input-img" type="button" onclick="inputimgchangeval(-10)">Remover</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="references layout-padding" id="refs">
                <div class="title ref_t">
                    <h1>Referências: </h1>
                    <button type="button" id="copy_prof" onclick="copyPerfil()">COPIAR LINK DO PERFIL</button>
                </div>
                <div class="appear-refs" id="appear-refs">

                </div>
                <div class="ref-inputs">
                    <div class="ref-input">
                        <label for="ref1">1: </label><input onfocus="IsOutFocus()" required class="ref-input-input" type="url" name="ref1" id="" value="https://TCC-escravo-do-capitalismo/site/main/pages/profile.php?profile=667">
                    </div>
                    <div class="ref-input">
                        <label for="ref1">2: </label><input onfocus="IsOutFocus()" class="ref-input-input" type="url" name="ref2" id="">
                    </div>
                    <div class="ref-input">
                        <label for="ref1">3: </label><input onfocus="IsOutFocus()" class="ref-input-input" type="url" name="ref3" id="">
                    </div>
                    <div class="ref-input">
                        <label for="ref1">4: </label><input onfocus="IsOutFocus()" class="ref-input-input" type="url" name="ref4" id="">
                    </div>
                    <div class="ref-input">
                        <label for="ref1">5: </label><input onfocus="IsOutFocus()" class="ref-input-input" type="url" name="ref5" id="">
                    </div>
                    <div class="ref-input">
                        <label for="ref1">6: </label><input onfocus="IsOutFocus()" class="ref-input-input" type="url" name="ref6" id="">
                    </div>
                    <div class="ref-input">
                        <label for="ref1">7: </label><input onfocus="IsOutFocus()" class="ref-input-input" type="url" name="ref7" id="">
                    </div>
                    <div class="ref-input">
                        <label for="ref1">8: </label><input onfocus="IsOutFocus()" class="ref-input-input" type="url" name="ref8" id="">
                    </div>
                    <div class="ref-input">
                        <label for="ref1">9: </label><input onfocus="IsOutFocus()" class="ref-input-input" type="url" name="ref9" id="">
                    </div>
                    <div class="ref-input">
                        <label for="ref1">10: </label><input onfocus="IsOutFocus()" class="ref-input-input" type="url" name="ref10" id="">
                    </div>
                </div>
            </div>
            <div class="question layout-padding" id="quest">
                <div class="title">
                    <h1>Questão:</h1>
                </div>
                <div class="text-question">
                    <p id="question_text"></p>
                    <input onfocus="IsOutFocus()" type="text" name="question"  maxLength = '100' required class="input-question-text" value="Qual foi a visão de Marcos?">
                </div>
                <div class="question-container">
                    <input id='certa' type="hidden" name="certa">
                    <div id="opa" class="option correctOne" onclick="setAsRight(1)">
                        <p class="opps_text"></p>
                        <input onfocus="IsOutFocus()" type="text" name="a"  maxLength = '100' required class="input-op-text" value="uma criança perdida na escuridão">
                    </div>
                    <div id="opb" class="option" onclick="setAsRight(2)">
                        <p class="opps_text"></p>
                        <input onfocus="IsOutFocus()"  type="text" name="b"  maxLength = '100' required class="input-op-text" value="sombras grotescas">
                    </div>
                    <div id="opc" class="option" onclick="setAsRight(3)">
                        <p class="opps_text"></p>
                        <input onfocus="IsOutFocus()"  type="text" name="c"  maxLength = '100' required class="input-op-text" value="grandes olhos vermelhos">
                    </div>
                    <div id="opd" class="option" onclick="setAsRight(4)">
                        <p class="opps_text"></p>
                        <input onfocus="IsOutFocus()"  type="text" name="d" maxLength = '100' required class="input-op-text" value="terríveis morcegos">
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="story" id="code_s">
    </form>

    <script src="../js/criacao.js?v=1.0121<?php echo rand(0,1000);?>"></script>
    <script src="../js/menu.js?v=1.01"></script>

    <script>
        function copyPerfil(){
            navigator.clipboard.writeText("https://TCC-escravo-do-capitalismo/site/main/pages/profile.php?profile="+<?php 
                echo $perfil;
            ?>)
        }   
    </script>
</body>
</html>