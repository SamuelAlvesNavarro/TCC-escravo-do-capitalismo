<?php
    require "includes/conexao.php";
    require "includes/online.php";
?>
<!DOCTYPE html>
<html lang="en">
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
    <link rel="stylesheet" href="../css/criacao.css">
    <title>Criação de Histórias</title>
</head>
<body id="body">
    <?php
        require "includes/menu.php";
    ?>
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
                        <input type="submit" value="Enviar">
                    </div>
                    <div class="manual opp" id="manual-bt">
                        <a target="_blank" href="manual.php#historia"><i id="manual-icon" class="far fa-sticky-note"></i></a>
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
                    <h1>Título:</h1><input id='title-input' class="text-input" type="text" name="titulo" maxLength="40" placeholder="seu título"><h2 id="title-all">Título</h2>
                </div>
                <div class="history" id="history-div">
                    <div class="title">
                        <h1>Ocorrido:</h1>
                    </div>
                    <div class="input-history">
                        <pre id="pre-history" maxlength="12000" class="historyArea"></pre>
                        <textarea name="story" oninput='this.style.height = "";this.style.height = this.scrollHeight + "px"' id="textarea-history" maxlength="12000" class="historyArea"></textarea>
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
                        <div class="opp" id="spreadBt" onclick="spread()">
                            <i class="fa-solid fa-arrows-rotate op-icon"></i>
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
                                <input class="input-file" type="file" id="imagem1" name="imagem1" accept=".jpg, .jpeg, .png" id="" ondragstart="return false" draggable="false" ondragenter="event.dataTransfer.dropEffect='none'; event.stopPropagation(); event.preventDefault();" ondragover="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();" ondrop="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();"><br>
                                <button id="bt-first" type="button" class="bt-input-img" onclick="inputimgchangeval(-1)">Remover</button>
                            </div>
                            <div class="input-file-unit">
                                <div class="join">
                                    <i class="fa-solid fa-image"></i>
                                    <label class="imagem-label" id="imagem2-label" for="imagem2">Imagem 2</label>
                                </div>
                                <input class="input-file" type="file" id="imagem2" name="imagem2" accept=".jpg, .jpeg, .png" id="" ondragstart="return false" draggable="false" ondragenter="event.dataTransfer.dropEffect='none'; event.stopPropagation(); event.preventDefault();" ondragover="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();" ondrop="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();"><br>
                                <button type="button" class="bt-input-img" onclick="inputimgchangeval(-2)">Remover</button>
                            </div>
                            <div class="input-file-unit">
                                <div class="join">
                                    <i class="fa-solid fa-image"></i>
                                    <label class="imagem-label" id="imagem3-label" for="imagem3">Imagem 3</label>
                                </div>
                                <input class="input-file" type="file" id="imagem3" name="imagem3" accept=".jpg, .jpeg, .png" id="" ondragstart="return false" draggable="false" ondragenter="event.dataTransfer.dropEffect='none'; event.stopPropagation(); event.preventDefault();" ondragover="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();" ondrop="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();"><br>
                                <button type="button" class="bt-input-img" onclick="inputimgchangeval(-3)">Remover</button>
                            </div>
                            <div class="input-file-unit">
                                <div class="join">
                                    <i class="fa-solid fa-image"></i>
                                    <label class="imagem-label" id="imagem4-label" for="imagem4">Imagem 4</label>
                                </div>
                                <input class="input-file" type="file" id="imagem4" name="imagem4" accept=".jpg, .jpeg, .png" id="" ondragstart="return false" draggable="false" ondragenter="event.dataTransfer.dropEffect='none'; event.stopPropagation(); event.preventDefault();" ondragover="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();" ondrop="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();"><br>
                                <button type="button" class="bt-input-img" onclick="inputimgchangeval(-4)">Remover</button>
                            </div>
                            <div class="input-file-unit">
                                <div class="join">
                                    <i class="fa-solid fa-image"></i>
                                    <label class="imagem-label" id="imagem5-label" for="imagem5">Imagem 5</label>
                                </div>
                                <input class="input-file" type="file" id="imagem5" name="imagem5" accept=".jpg, .jpeg, .png" id="" ondragstart="return false" draggable="false" ondragenter="event.dataTransfer.dropEffect='none'; event.stopPropagation(); event.preventDefault();" ondragover="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();" ondrop="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();"><br>
                                <button type="button" class="bt-input-img" onclick="inputimgchangeval(-5)">Remover</button>
                            </div>
                            <div class="input-file-unit">
                                <div class="join">
                                    <i class="fa-solid fa-image"></i>
                                    <label class="imagem-label" id="imagem6-label" for="imagem6">Imagem 6</label>
                                </div>
                                <input class="input-file" type="file" id="imagem6" name="imagem6" accept=".jpg, .jpeg, .png" id="" ondragstart="return false" draggable="false" ondragenter="event.dataTransfer.dropEffect='none'; event.stopPropagation(); event.preventDefault();" ondragover="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();" ondrop="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();"><br>
                                <button type="button" class="bt-input-img" onclick="inputimgchangeval(-6)">Remover</button>
                            </div>
                            <div class="input-file-unit">
                                <div class="join">
                                    <i class="fa-solid fa-image"></i>
                                    <label class="imagem-label" id="imagem7-label" for="imagem7">Imagem 7</label>
                                </div>
                                <input class="input-file" type="file" id="imagem7" name="imagem7" accept=".jpg, .jpeg, .png" id="" ondragstart="return false" draggable="false" ondragenter="event.dataTransfer.dropEffect='none'; event.stopPropagation(); event.preventDefault();" ondragover="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();" ondrop="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();"><br>
                                <button type="button" class="bt-input-img" onclick="inputimgchangeval(-7)">Remover</button>
                            </div>
                            <div class="input-file-unit">
                                <div class="join">
                                    <i class="fa-solid fa-image"></i>
                                    <label class="imagem-label" id="imagem8-label" for="imagem8">Imagem 8</label>
                                </div>
                                <input class="input-file" type="file" id="imagem8" name="imagem8" accept=".jpg, .jpeg, .png" id="" ondragstart="return false" draggable="false" ondragenter="event.dataTransfer.dropEffect='none'; event.stopPropagation(); event.preventDefault();" ondragover="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();" ondrop="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();"><br>
                                <button type="button" class="bt-input-img" onclick="inputimgchangeval(-8)">Remover</button>
                            </div>
                            <div class="input-file-unit">
                                <div class="join">
                                    <i class="fa-solid fa-image"></i>
                                    <label class="imagem-label" id="imagem9-label" for="imagem9">Imagem 9</label>
                                </div>
                                <input class="input-file" type="file" id="imagem9" name="imagem9" accept=".jpg, .jpeg, .png" id="" ondragstart="return false" draggable="false" ondragenter="event.dataTransfer.dropEffect='none'; event.stopPropagation(); event.preventDefault();" ondragover="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();" ondrop="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();"><br>
                                <button type="button" class="bt-input-img" onclick="inputimgchangeval(-9)">Remover</button></div>
                            <div class="input-file-unit">
                                <div class="join">
                                    <i class="fa-solid fa-image"></i>
                                    <label class="imagem-label" id="imagem10-label" for="imagem10">Imagem 10</label>
                                </div>
                                <input class="input-file" type="file" id="imagem10" name="imagem10" accept=".jpg, .jpeg, .png" id="" ondragstart="return false" draggable="false" ondragenter="event.dataTransfer.dropEffect='none'; event.stopPropagation(); event.preventDefault();" ondragover="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();" ondrop="event.dataTransfer.dropEffect='none';event.stopPropagation(); event.preventDefault();"><br>
                                <button id="bt-last" class="bt-input-img" type="button" onclick="inputimgchangeval(-10)">Remover</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="references layout-padding" id="refs">
                <div class="title">
                    <h1>Referências:</h1>
                </div>
                <div class="appear-refs" id="appear-refs">

                </div>
                <div class="ref-inputs">
                    <div class="ref-input">
                        <label for="ref1">1: </label><input class="ref-input-input" type="url" name="ref1" id="">
                    </div>
                    <div class="ref-input">
                        <label for="ref1">2: </label><input class="ref-input-input" type="url" name="ref2" id="">
                    </div>
                    <div class="ref-input">
                        <label for="ref1">3: </label><input class="ref-input-input" type="url" name="ref3" id="">
                    </div>
                    <div class="ref-input">
                        <label for="ref1">4: </label><input class="ref-input-input" type="url" name="ref4" id="">
                    </div>
                    <div class="ref-input">
                        <label for="ref1">5: </label><input class="ref-input-input" type="url" name="ref5" id="">
                    </div>
                    <div class="ref-input">
                        <label for="ref1">6: </label><input class="ref-input-input" type="url" name="ref6" id="">
                    </div>
                    <div class="ref-input">
                        <label for="ref1">7: </label><input class="ref-input-input" type="url" name="ref7" id="">
                    </div>
                    <div class="ref-input">
                        <label for="ref1">8: </label><input class="ref-input-input" type="url" name="ref8" id="">
                    </div>
                    <div class="ref-input">
                        <label for="ref1">9: </label><input class="ref-input-input" type="url" name="ref9" id="">
                    </div>
                    <div class="ref-input">
                        <label for="ref1">10: </label><input class="ref-input-input" type="url" name="ref10" id="">
                    </div>
                </div>
            </div>
            <div class="question layout-padding" id="quest">
                <div class="title">
                    <h1>Questão:</h1>
                </div>
                <div class="text-question">
                    <p id="question_text"></p>
                    <input type="text" name="question" class="input-question-text">
                </div>
                <div class="question-container">
                    <input id='certa' type="hidden" name="certa">
                    <div id="opa" class="option" onclick="setAsRight(1)">
                        <p class="opps_text"></p>
                        <input type="text" name="a" class="input-op-text">
                    </div>
                    <div id="opb" class="option" onclick="setAsRight(2)">
                        <p class="opps_text"></p>
                        <input type="text" name="b" class="input-op-text">
                    </div>
                    <div id="opc" class="option" onclick="setAsRight(3)">
                        <p class="opps_text"></p>
                        <input type="text" name="c" class="input-op-text">
                    </div>
                    <div id="opd" class="option" onclick="setAsRight(4)">
                        <p class="opps_text"></p>
                        <input type="text" name="d" class="input-op-text">
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="outer">
        <div class="containerImg" onclick="callModal(1)">
            <img class="empty-img-input img-input" alt="">
        </div>
        <div class="containerImg" onclick="callModal(2)">
            <img class="empty-img-input img-input" alt="">
        </div>
        <div class="containerImg" onclick="callModal(3)">
            <img class="empty-img-input img-input" alt="">
        </div>
        <div class="containerImg" onclick="callModal(4)">
            <img class="empty-img-input img-input" alt="">
        </div>
        <div class="containerImg" onclick="callModal(5)">
            <img class="empty-img-input img-input" alt="">
        </div>
        <div class="containerImg" onclick="callModal(6)">
            <img class="empty-img-input img-input" alt="">
        </div>
        <div class="containerImg" onclick="callModal(7)">
            <img class="empty-img-input img-input" alt="">
        </div>
        <div class="containerImg" onclick="callModal(8)">
            <img class="empty-img-input img-input" alt="">
        </div>
        <div class="containerImg" onclick="callModal(9)">
            <img class="empty-img-input img-input" alt="">
        </div>
        <div class="containerImg" onclick="callModal(10)">
            <img class="empty-img-input img-input" alt="">
        </div>
    </div>
    <script src="../js/criacao.js?v=1.01"></script>
    <script src="../js/menu.js?v=1.01"></script>
</body>
</html>