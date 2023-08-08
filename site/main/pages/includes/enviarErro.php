<?php
    function sendToError($num){
        
        /*if(!isset($num)){
            header("Location: ../central.php");
            exit;
        }*/

        echo
        '<form id="form" action="error.php" method="post">
            <input type="hidden" name="erro" value="'.$num.'">
        </form>
        <script>
            var form = document.getElementById("form");
            form.submit();
        </script>'
        ;

    }
    
?>