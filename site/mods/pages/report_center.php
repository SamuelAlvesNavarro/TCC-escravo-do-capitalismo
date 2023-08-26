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
    <title>Centro de Denúncias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/f2389f6c39.js" crossorigin="anonymous"></script>
</head>
<body class="p-5"  data-bs-theme="dark">
    <?php
        require "includes/menu.php";
    ?>
    <div class="container text-center mb-3">
        <div class="row align-items-start">
            <h1 align="center-2" class="col" style="margin-bottom: 50px;">Denúncia de Perfil</h1>
            <!--<a href="index.php" class="p-2 col-2"><button type="button" class="btn-close" disabled aria-label="Close"></button></a>-->
        
            <table align="center" class="col-3 table table-striped border border-black border-1 p-2" style="width: 1200px;">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Código do denunciado</th>
                        <th scope="col">Código do denunciador</th>
                        <th scope="col">Razão</th>
                        <th scope="col">Código</th>
                        <th scope="col">Perfil do Denunciado</th>
                        <th scope="col">Perfil do Denunciador</th>
                        <th scope="col">Resolvido</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                        require "includes/conexao.php";

                        $sql = "SELECT * FROM report_profile where code = 1";

                        foreach ($pdo->query($sql) as $key => $value) {
                            
                            if($value['code'] == 1) $cd = "Em Aberto";
                            if($value['code'] == 2) $cd = "Automática";
                            if($value['code'] == 3) $cd = "Resolvido";

                            if($value['fk_id_reporter'] != 666){
                                $x = "<td><a href='user.php?profile=". $value['fk_id_reporter']."'><button class='btn btn-danger'>Investigar</button></a></td>";
                                
                                if($value['fk_id_reporter'] == 0){
                                    $x = "<td>Deletado</td>";
                                }

                            }else{
                                $x = "<td>Historito</td>";
                            }
                            

                            if($value['fk_id_reported'] != 666){
                                $y = "<td><a href='user.php?profile=". $value['fk_id_reported']."'><button class='btn btn-danger'>Investigar</button></a></td>";
                                
                                if($value['fk_id_reported'] == 0){
                                    $y = "<td>Deletado</td>";
                                }

                            }else{
                                $y = "<td>Historito</td>";
                            }

                            echo "<tr scope='row'>";
                            echo "<td>".$value['id_report']."</td>";
                            echo "<td>".$value['fk_id_reported']."</td>";
                            echo "<td>".$value['fk_id_reporter']."</td>";
                            echo "<td>".$value['reason']."</td>";
                            echo "<td>".$cd."</td>";
                            echo "$y";
                            echo "$x";
                            echo "<td><a href='resolvido?id_report=". $value['id_report'] ."'><button class='btn btn-success'>Resolvido</button></a></td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="container text-center mb-3">
        <div class="row align-items-start">
            <h1 align="center-2" class="col" style="margin-bottom: 50px;">Denúncia de História</h1>
            <!--<a href="index.php" class="p-2 col-2"><button type="button" class="btn-close" disabled aria-label="Close"></button></a>-->
        
            <table align="center" class="col-3 table table-striped border border-black border-1 p-2" style="width: 1200px;">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Código da história denunciada</th>
                        <th scope="col">Código do denunciador</th>
                        <th scope="col">Razão</th>
                        <th scope="col">Código</th>
                        <th scope="col">Resolvido</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require "includes/conexao.php";

                        $sql = "SELECT * FROM report_story where code = 1";

                        foreach ($pdo->query($sql) as $key => $value) {
                            
                            if($value['code'] == 1) $cd = "Em Aberto";
                            if($value['code'] == 2) $cd = "Automática";
                            if($value['code'] == 3) $cd = "Resolvido";

                            if($value['fk_id_reporter'] == 0){
                                $value['fk_id_reporter'] = "Deletado";
                            }

                            echo "<tr scope='row'>";
                            echo "<td>".$value['id_report']."</td>";
                            echo "<td><a href='mod-story.php?input_1=".$value['fk_id_reported_story']."'>História</a></td>";
                            echo "<td>".$value['fk_id_reporter']."</td>";
                            echo "<td>".$value['reason']."</td>";
                            echo "<td>".$cd."</td>";
                            echo "<td><a href='resolvido?id_report=". $value['id_report'] ."'><button class='btn btn-success'>Resolvido</button></a></td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>