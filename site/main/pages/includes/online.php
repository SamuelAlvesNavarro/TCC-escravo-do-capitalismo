<?php
    function isOnline(){
        require "criasession.php";
          if(isset($_SESSION['email'])){
              return true;
            }
         return false;
     }

     if(!isOnline()){
        header("Location: acesso.html");
        exit;
     }
?>