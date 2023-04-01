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
        <nav>
            <ul class="menu transi bc">
                <li><a href="#exp-sec">Acesso</a></li>
                <li><i id="mode" class="fa-solid fa-sun transi"></i></li>
            </ul>
            <div class="vertmenu">
                <div class="slidernav transi">
                    <a href="#home-section"></a>
                    <a href="#exp-sec"></a>
                </div>
            </div>
        </nav>
        <div id="main" class="main transi bc">
            <div id="sections" class="sections">
                <div class="section home-section" id="home-section">
                    <div class="col1 col">
                        <div id="frow" class="frow">
                            <div class="titleh1">
                                Olá, esse é o Histórias Assombrosas
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

                    <div class="arrowdiv">

                    </div>
                </div>
                <div class="section home-section" id="exp-sec">
                    <div class="col1 col">
                        <div id="frow" class="frow">
                            <div class="titleh1">
                                Olá, esse é o HistóCUsas
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
            <!--<div id="bestreaders" class="bestreaders">
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
                                $pdo = new PDO('host:localhost;dbname=pi', 'root', '');
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
            </div>-->
        </div>
    </div>
</body>
</html>