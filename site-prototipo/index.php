<!DOCTYPE html>
<html lang="pt-br" class="transi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/f2389f6c39.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/home.css?v=1">
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

                    </div>
                </div>
                <div class="container-slider">
                    <div class="slidernav transi">
                        <a id="home-link" href="#home-section" onclick="SwitchColor(1)"></a>
                        <a id="exp-link" href="#exp-sec" onclick="SwitchColor(2)"></a>
                        <a id="beh-link" href="#beh-sec" onclick="SwitchColor(3)"></a>
                        <a id="wys-link" href="#wys-sec" onclick="SwitchColor(4)"></a>
                        <a id="rank-link" href="#rank-sec" onclick="SwitchColor(5)"></a>
                        <a id="prem-link" href="#prem-sec" onclick="SwitchColor(6)"></a>
                        <a id="last-link" href="#last-sec" onclick="SwitchColor(7)"></a>
                    </div>
                </div>
                <div class="piece"><i id="mode" class="fa-solid fa-sun transi"></i></div>
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
                                    "O site perfeito para a leitura de histórias de terror"<br>(Donald Trump, 1995)
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section exp-sec" id="exp-sec"> <!-- segunda -->
                    <div class="exp-col1 col">
                       <div class="img-exp-col1">

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
                                Acompanhe o rank do leitores em tempo real
                            </div>
                            <div class="exp-rank-test">
                                No Histórias Assombrosas, os leitores são incentivados a ler e escrever histórias.
                                Para isso, criamos um rank que fica exposto no site e é atualizado em tempo real.
                                Além disso, os leitores recebem prêmios por aparecerem nos rankings.
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
                                        <!--<?php /*
                                            $pdo = new PDO('mysql:host=localhost;dbname=id20545858_pi', 'id20545858_samuel', 'Agx3((dO5ze*n-]Y');
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
                                            }*/
                                        ?>-->
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
                <script type="text/javascript" src="js/home.js?v=1"></script>
            </div>
        </div>
    </div>
</body>
</html>