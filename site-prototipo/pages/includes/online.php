<?php
    function isOnline(){
      session_cache_expire(3);
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