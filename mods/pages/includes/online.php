<?php
    function isOnline(){
      session_cache_expire(720);
        session_start();
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