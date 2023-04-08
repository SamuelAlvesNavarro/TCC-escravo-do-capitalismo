<!DOCTYPE html>
<html lang="pt-br" class="transi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/f2389f6c39.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/home.css">
    <title>Home Page</title>
</head>
<body>
    <div id="all" class="all transi">
        <nav class="menu">
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
                    <div class="home-col1 col">
                        <div id="frow" class="home-frow">
                            <div class="home-titleh1">
                                Olá, esse é o <br>Histórias <br>Assombrosas
                            </div>
                        </div>
                        <div id="srow" class="home-srow">
                            <div class="phrase">
                                "O site perfeito para a leitura de histórias de terror"<br>(Donald Trump, 1995)
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section exp-sec" id="exp-sec"> <!-- segunda -->
                    <div class="exp-col1 col">
                       
                    </div>
                    <div class="exp-col2 col">
                        No nosso Site, oferecemos.....
                    </div>
                </div>
                <div class="section beh-sec home-section" id="beh-sec"> <!-- terceira -->
                    <div class="beh-col1 col">
                        CU
                    </div>
                </div>
                <div class="section home-section" id="wys-sec"> <!--Quarta-->
                    <div class="col1 col">
                        <div id="frow" class="frow">
                            <div class="titleh1">
                                No nosso Site, ooferecemos.....
                            </div>
                        </div>
                        <div id="srow" class="srow">
                            <div class="phrase">
                                "O site perfeito para a leitura de histórias de terror"<br>(Donald Trump, 1995)
                            </div>
                        </div>
                    </div>
                    <div class="col2 col">
                        <div class="it1">ST</div>
                    </div>
                </div>
                <div class="section exp-sec" id="rank-sec"> <!--Quinta-->
                    <div class="exp-col1 col">
                       
                    </div>
                    <div class="exp-col2 col">
                        No nosso Site, oferecemos.....
                    </div>
                </div>
                <div class="section home-section" id="prem-sec"><!--Sexta-->
                    <div class="col1 col">
                        <div id="frow" class="frow">
                            <div class="titleh1">
                                No nosso Site, ooferecemos.....
                            </div>
                        </div>
                        <div id="srow" class="srow">
                            <div class="phrase">
                                "O site perfeito para a leitura de histórias de terror"<br>(Donald Trump, 1995)
                            </div>
                        </div>
                    </div>
                    <div class="col2 col">
                        <div class="it1">ST</div>
                    </div>
                </div>
                <div class="section home-section" id="last-sec"> <!--Sétima-->
                    <div class="col1 col">
                        <div id="frow" class="frow">
                            <div class="titleh1">
                                No nosso Site, ooferecemos.....
                            </div>
                        </div>
                        <div id="srow" class="srow">
                            <div class="phrase">
                                "O site perfeito para a leitura de histórias de terror"<br>(Donald Trump, 1995)
                            </div>
                        </div>
                    </div>
                    <div class="col2 col">
                        <div class="it1">ST</div>
                    </div>
                </div>
            </div>
            <script type="text/javascript" src="js/home.js"></script>
            <div id="bestreaders" class="bestreaders">
                <div id="bereaders" class="bereaders">
                    <div class="betitle">Os maiores leitores do site</div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Rank</th>
                                <th>User</th>
                                <th>Pontunação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $pdo = new PDO('mysql:host=localhost;dbname=id20545858_pi', 'id20545858_samuel', 'S@muel11223344');
                                $sql = 'select pontos_leitor, nome from user_common order by pontos_leitor desc limit 5';
                                $rank = 1;
                                foreach ($pdo->query($sql) as $key => $value) {

                                    if($rank % 2 == 0){
                                        echo '<tr class="table"><th class="rankum">Rank: ' . $rank++ . '</th>' . '<td class="bename"> Nome: ' . $value['nome'] . '</td>' . '<td class="bepoints"> Pontuação: '. $value['pontos_leitor'] . '</td>'. '<tr>';
                                    }else{
                                        echo '<tr class="table-dark"><th class="rankum">Rank: ' . $rank++ . '</th>' . '<td class="bename"> Nome: ' . $value['nome'] . '</td>' . '<td class="bepoints"> Pontuação: '. $value['pontos_leitor'] . '</td>'. '<tr>';
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>