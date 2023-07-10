<?php 
    Header("Cache-Control: max-age=3000, must-revalidate");
    include "pages/includes/criasession.php";
    session_unset();
    session_destroy();
?>
<!DOCTYPE html>
<html lang="pt-br" class="transi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/f2389f6c39.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/home.css?v=1.01">
    <link rel="shortcut icon" href="svg/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="css/bt.css?v=1"></link>
    <title>Home Page</title>
</head>
<body>
    <div id="all" class="all transi">
        <nav class="menu" id="menu">
            <div class="fpart transi bc">
                <div id="acess"><a href="pages/acesso.html">Acesso</a></div>
                <div class="piece logo-piece">
                    <div class="logo">
                        <svg id="eBYGrpvxAe61" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 500 500" shape-rendering="geometricPrecision" text-rendering="geometricPrecision"><path d="M40.1,467.1l-11.2,9c-3.2,2.5-7.1,3.9-11.1,3.9C8,480,0,472,0,462.2L0,192C0,86,86,0,192,0s192,86,192,192v270.2c0,9.8-8,17.8-17.8,17.8-4,0-7.9-1.4-11.1-3.9l-11.2-9c-13.4-10.7-32.8-9-44.1,3.9l-30.5,35c-3.3,3.8-8.2,6-13.3,6s-9.9-2.2-13.3-6l-26.6-30.5c-12.7-14.6-35.4-14.6-48.2,0L141.3,506c-3.3,3.8-8.2,6-13.3,6s-9.9-2.2-13.3-6L84.2,471c-11.3-12.9-30.7-14.6-44.1-3.9ZM160,192c0-17.673112-14.326888-32-32-32s-32,14.326888-32,32s14.326888,32,32,32s32-14.326888,32-32Zm96,32c17.673112,0,32-14.326888,32-32s-14.326888-32-32-32-32,14.326888-32,32s14.326888,32,32,32Z" transform="matrix(.707107 0.707107-.707107 0.707107 180.411309 35.439723)"/></svg>
                    </div>
                </div>
                <div class="container-links">
                    <div id="home-link-expl" class="home-link-expl link-expl">
                        Início da Página
                    </div>
                    <div id="exp-link-expl" class="exp-link-expl link-expl">
                        O que é o Histórias Assombrosas?
                    </div>
                    <div id="beh-link-expl" class="home-link-expl link-expl">
                        Temos as melhores histórias!
                    </div>
                    <div id="wys-link-expl" class="exp-link-expl link-expl">
                        Escreva suas histórias
                    </div>
                    <div id="rank-link-expl" class="home-link-expl link-expl">
                        Rank ao vivo
                    </div>
                    <div id="prem-link-expl" class="exp-link-expl link-expl">
                        Prêmios para os leitores
                    </div>
                    <div id="last-link-expl" class="home-link-expl link-expl">
                        ...
                    </div>
                </div>
                <div class="container-link-exp-menu">
                    <div class="container-slider">
                        <div class="slidernav transi">
                            <a id="home-link" onmouseenter="showexpl(1)" onmouseleave="showexpl(0)" href="#home-section" onclick="SwitchColor(1)"></a>
                            <a id="exp-link" onmouseenter="showexpl(2)" onmouseleave="showexpl(0)"href="#exp-sec" onclick="SwitchColor(2)"></a>
                            <a id="beh-link" onmouseenter="showexpl(3)" onmouseleave="showexpl(0)" href="#beh-sec" onclick="SwitchColor(3)"></a>
                            <a id="wys-link" onmouseenter="showexpl(4)" onmouseleave="showexpl(0)" href="#wys-sec" onclick="SwitchColor(4)"></a>
                            <a id="rank-link" onmouseenter="showexpl(5)" onmouseleave="showexpl(0)" href="#rank-sec" onclick="SwitchColor(5)"></a>
                            <a id="prem-link" onmouseenter="showexpl(6)" onmouseleave="showexpl(0)" href="#prem-sec" onclick="SwitchColor(6)"></a>
                            <a id="last-link" onmouseenter="showexpl(7)" onmouseleave="showexpl(0)" href="#last-sec" onclick="SwitchColor(7)"></a>
                        </div>
                    </div>
                </div>
                <div class="piece"><i id="mode" class="far fa-sun transi"></i></div>
            </div>
        </nav>
        <div id="main" class="main transi bc">
            <div id="sections" class="sections">
                <div class="section home-section" id="home-section">
                    <div id="home-background" class="home-background"></div>
                    <div id="home-background-day" class="home-background-day"></div>
                    <div class="home-col1 col">
                        <div class="home-col">
                            <div id="frow" class="home-frow">
                                <div class="home-titleh1">
                                    <span class="hist">Histórias Assombrosas</span>
                                </div>
                            </div>
                            <div id="srow" class="home-srow">
                                <div class="phrase">
                                    "O site perfeito para a leitura de histórias de terror"
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section exp-sec" id="exp-sec"> <!-- segunda -->
                    <div class="exp-col1 col">
                        <div class="blur">
                            
                        </div>
                    </div>
                    <div class="exp-col2 col">
                        <div class="line1-exp-sec line1">
                            O que é o Histórias Assombrosas?
                        </div>
                        <div class="line2-exp-sec line2">
                            O Histórias Assombrosas é um site dedicado à postagem e interação com histórias de terror.
                        </div>
                    </div>
                </div>
                <div class="section beh-sec" id="beh-sec"> <!-- terceira -->
                    <div class="beh-col1 col">
                        <div class="line1-beh-sec line1">
                            Temos as melhores histórias
                        </div>
                        <div class="line2-beh-sec line2">
                            As histórias postadas pelos usuários são originais e chequadas, visando que apenas as melhores cheguem aos nossos assíduos leitores.
                        </div>
                    </div>
                    <div class="beh-col2 col">
                       <div class="img-beh-col2">

                       </div>
                    </div>
                </div>
                <div class="section wys-sec" id="wys-sec"> <!--Quarta-->
                </div>
                <div class="section rank-sec" id="rank-sec"> <!--Quinta-->
                    <div class="col1-rank">
                        <div class="col1-rank-text">
                            <div class="title-rank-test">
                                Acompanhe o rank do leitores
                            </div>
                            <div class="exp-rank-test">
                                No Histórias Assombrosas, os leitores são incentivados a ler e escrever histórias.
                                Para isso, criamos um rank que fica exposto no site e é atualizado em tempo real.
                                Todos querem aparecer no rank, mas só os melhores conseguem esse feito.
                            </div>
                        </div>
                    </div>
                    <div class="col2-rank">
                        <div id="bestreaders" class="bestreaders">
                            <div id="bereaders" class="bereaders">
                                <table>
                                    <thead>
                                        <tr>
                                            <th scope="col">Rank</th>
                                            <th scope="col">User</th>
                                            <th scope="col">Pontunação</th>
                                        </tr>
                                    </thead>
     
                                    <tbody>
                                        <?php
                                            require "pages/includes/conexao.php";
                                            $sql = 'select pontos_leitor, nome from user_common order by pontos_leitor desc limit 5';
                                            $rank = 1;
                                            foreach ($pdo->query($sql) as $key => $value) {

                                                echo
                                                '<tr>
                                                    <th scope="row">' 
                                                        .$rank++. 
                                                    '</th>'. 
                                                    '<td>' 
                                                        .$value['nome']. 
                                                    '</td>'. 
                                                    '<td> '
                                                        .$value['pontos_leitor'].
                                                    '</td>'. 
                                                '</tr>';
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col3-rank">

                    </div>
                </div>
                <div class="section home-section" id="prem-sec"><!--Sexta-->
                </div>
                <div class="section home-section" id="last-sec"> <!--Sétima-->

                    <a id="goback" href="" class="">
                        <div  class="goback" onclick="SwitchColor(0)">
                            <i class="fa-solid fa-arrow-up"></i>
                        </div>
                    </a>

                    <div class="div-bt-enter">
                    <a href="pages/acesso.html?v=1"><button id="bt-enter" class='glowing-btn'><span class='glowing-txt'>PARTICIPAR</span></button></a>
                    </div>
                    <img id="img-cat-paw" src="img/monster-finger-png.png" alt="">
                </div>
                <script type="text/javascript" src="js/home.js?v=1.01"></script>
            </div>
        </div>
    </div>
</body>
</html>