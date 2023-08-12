<?php
    function menu(){
    echo "
        <div class='to-center'>
            <a href='esgotos.php'><i class='fa-solid fa-home'></i></a>
        </div>";
    }
    function cssMenu(){
        echo "
        .to-center{
            padding: 20px;
            position: fixed;
            top: 0;
            right: 50px;
            font-size: 30px;
            background: #121212;
            z-index: 1000;
        }
        .to-center a{
            color: white;
        }
        ";
    }
    
?>