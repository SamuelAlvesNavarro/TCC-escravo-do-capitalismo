<?php
    function isOnline(){
        include "criasession.php";
          if(isset($_SESSION['emailMod'])){
              return true;
            }
         return false;
     }

     if(!isOnline()){
        header("Location: index.php");
        exit;
     }
?>