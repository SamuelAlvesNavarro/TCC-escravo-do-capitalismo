<?php
    include "includes/conexao.php";
    include "includes/online.php";
    include "includes/returnUser.php";

    $perfil = -1;
    $email = $_SESSION['email'];
    $perfil = returnProfileId($email);
    if($perfil == -1 || !isset($perfil)){
        header("Location: acesso.html");  
        exit;
    }

    if($_SERVER["REQUEST_METHOD"] == "GET"){
        $titulos = array();
        $i = 0;

        if(isset($_GET['busca']) && $_GET['busca'] != ""){

            $pesquisa = $_GET['busca'];
            $sql = "SELECT * FROM story where status = 3 order by id_story desc ";
            $prepare = $pdo->prepare($sql);
            $prepare->execute();

            if($prepare->rowCount() == 0){
                echo "<div class='no-res-title'>Não há resultados.</div>";
                exit;
            }

            foreach($pdo->query($sql) as $key => $value){
                $titulos[$i][0] = $value["nome"];
                $sim = similar_text($titulos[$i][0], $pesquisa, $perc);
                $titulos[$i][1] = $perc;

                $titulos[$i][2] = $value["id_story"];
                
                $sql = "SELECT id_page FROM page where type = 1 and fk_id_story = ".$titulos[$i][2];
                $prepare = $pdo->prepare($sql);
                $prepare->execute();

                if($prepare->rowCount() != 0){

                    foreach($pdo->query($sql) as $key => $value){
                        $page = $value['id_page'];

                        $sql = "select path from images where fk_id_page = $page and fundo = 1";
                        
                        $prepare = $pdo->prepare($sql);
                        $prepare->execute();

                        if($prepare->rowCount() != 0){

                            foreach($pdo->query($sql) as $key => $value){
                                $titulos[$i][3] = "url(".$value['path'].")";
                            }

                        }else{

                            $titulos[$i][3] = "linear-gradient(rgb(50,50,50), rgb(0,0,0));";
                        }
                    }

                }else{

                    $titulos[$i][3] = "linear-gradient(rgb(50,50,50), rgb(0,0,0));";
                }

                $i++;
            }

            $key_values = array_column($titulos, 1); 
            array_multisort($key_values, SORT_DESC, $titulos);

            if($titulos[0][1] == 0){ 

                echo "<div class='no-res-title'>Não há resultados para essa pesquisa. Tente novamente considerando que a pesquisa diferencia letras maiúsculas e minúsculas. <br>Conteúdos Relacionados:</div>";
                
                echo "<div class='resultsAll'>";

                for($i = 0; $i < sizeof($titulos); $i++){

                    if($i == 10)break;

                    $check = "SELECT * FROM question_user, question, story WHERE question_user.fk_id_profile = $perfil and story.id_story = question.fk_id_story and question.id_question = question_user.fk_id_question and story.id_story = ".$titulos[$i][2];
                    $prepare = $pdo->prepare($check);
                    $prepare->execute();

                    if($prepare->rowCount() == 0){

                        $check = "SELECT * FROM error_user WHERE fk_id_profile = $perfil and fk_id_story = ".$titulos[$i][2];
                        $prepare = $pdo->prepare($check);
                        $prepare->execute();

                        if($prepare->rowCount() == 0){

                            $titulos[$i][4] = "<i class='fa-brands fa-readme readqm readme'></i>";
                            
                        }
                        else{
                            $titulos[$i][4] = "<i class='fa-solid fa-xmark readqm wrong'></i>";
                        }
                    }
                    else{

                        $titulos[$i][4] = "<i class='fa-solid fa-check readqm read'></i>";

                        $check = "SELECT * FROM score WHERE fk_id_story = ".$titulos[$i][2]." and fk_id_profile = ".$perfil;
                        $prepare = $pdo->prepare($check);
                        $prepare->execute();

                        if($prepare->rowCount() == 0){

                            $titulos[$i][4] = "<i class='fa-solid fa-check readqm read'></i>";
                            
                        }
                        else{
                            $titulos[$i][4] = "<i class='fa-solid readqm fa-star'></i>";
                        }
                    }

                    echo "<div class='action' onclick='story(".$titulos[$i][2].")'>

                            <div class='square' style='background-image: ". $titulos[$i][3]."'>
                                <h3>". $titulos[$i][0] ."</h3>
                                    ".$titulos[$i][4].
                            "</div>
                        
                        </div>";
                }  

                echo "</div>";

            }else{

                echo "<div class='resultsAll'>";
            
                for($i = 0; $i < sizeof($titulos); $i++){

                    if($titulos[$i][1] == 0) break;
                    if($i == 10)break;

                    $check = "SELECT * FROM question_user, question, story WHERE question_user.fk_id_profile = $perfil and story.id_story = question.fk_id_story and question.id_question = question_user.fk_id_question and story.id_story = ".$titulos[$i][2];
                    $prepare = $pdo->prepare($check);
                    $prepare->execute();

                    if($prepare->rowCount() == 0){

                        $check = "SELECT * FROM error_user WHERE fk_id_profile = $perfil and fk_id_story = ".$titulos[$i][2];
                        $prepare = $pdo->prepare($check);
                        $prepare->execute();

                        if($prepare->rowCount() == 0){

                            $titulos[$i][4] = "<i class='fa-brands fa-readme readqm readme'></i>";
                            
                        }
                        else{
                            $titulos[$i][4] = "<i class='fa-solid fa-xmark readqm wrong'></i>";
                        }
                    }
                    else{

                        $titulos[$i][4] = "<i class='fa-solid fa-check readqm read'></i>";

                        $check = "SELECT * FROM score WHERE fk_id_story = ".$titulos[$i][2]." and fk_id_profile = ".$perfil;
                        $prepare = $pdo->prepare($check);
                        $prepare->execute();

                        if($prepare->rowCount() == 0){

                            $titulos[$i][4] = "<i class='fa-solid fa-check readqm read'></i>";
                            
                        }
                        else{
                            $titulos[$i][4] = "<i class='fa-solid readqm fa-star'></i>";
                        }
                    }

                    echo "<div class='action' onclick='story(".$titulos[$i][2].")'>

                            <div class='square' style='background-image: ". $titulos[$i][3]."'>
                                <h3>". $titulos[$i][0] ."</h3>
                                    ".$titulos[$i][4].
                            "</div>
                        
                        </div>";

                }  

                echo "</div>";
            } 

        }else{
            echo "Sua pesquisa está vazia! Tente novamente";
        }
    }
?>