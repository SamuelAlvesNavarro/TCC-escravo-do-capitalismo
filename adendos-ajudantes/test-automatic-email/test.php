<!DOCTYPE html>
<html>
<head>
    <title>Gmail Sender</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="wrapper">
        <form method="post" action="test.php">
            <h2>Gmail Sender App</h2><br>
            Email To :<br>
            <input type="text" name="email"><br>
            Subject :<br>
            <input type="text" name="subject"><br>
            Body :<br>
            <textarea name="body"></textarea><br>
            <input type="submit" value="SEND" name="submit">            
        </form>
        <?php

        if(isset($_POST['submit'])){
            $url = "https://script.google.com/macros/s/AKfycbyyK6zGK6Z6GapHt-l3fiWxCQGWT5lYT9SZZ-TVJLSKK6kL2I2LDIRyiKgRtbWzWL62mg/exec";
            $ch = curl_init($url);
            curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_POSTFIELDS => http_build_query([
                "recipient" => $_POST['email'],
                "subject"   => $_POST['subject'],
                "body"      => $_POST['body']
            ])
            ]);
            $result = curl_exec($ch);
            echo $result;
        }
        ?>

        <!-- 
            Google script
            
            function doGet(e) {
                return ContentService.createTextOutput("method get not allowed.")
            }
            function doPost(e){
                return gsender.sendGmail(e);
            }
        -->
    </div>
        
</body>
</html>