<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/home.css">
    <title>Home Page</title>
</head>
<body>
    <div id="all" class="all">
        <div class="menu" id="menu">
            <div class="menudiv" id="menudiv">
               <div class="switch-mode"></div>
            </div>
        </div>
        <div id="main" class="main">
            <!-- <div id="sections" class="sections">
                <div class="section home-section">
                    <div id="frow" class="frow row">
                        <div class="titleh1 col-9">
                            Olá, <strong>esse</strong> é o Histórias Assombrosas
                        </div>
                        <div class="bt col-3">
                            <button type="button" class="btn-acess btn btn-outline-dark btn-lg rounded">Acesso</button>
                        </div>
                    </div>
                    <div id="srow" class="srow row">
                        <div class="phrase">
                            "O site perfeito para a leitura de histórias de terror"
                        </div>
                    </div>
                </div>
                <div class="section exp">

                </div>
            </div> -->
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
                                $pdo = new PDO('mysql:host=localhost;dbname=pi', 'root', '');
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