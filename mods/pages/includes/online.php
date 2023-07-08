<?php
    function isOnline(){
      session_cache_expire(720);
        include "criasession.php";
          if(isset($_SESSION['email'])){
              return true;
            }
         return false;
     }

     if(!isOnline()){
        header("Location:acesso.html");
        exit;
     }
?>