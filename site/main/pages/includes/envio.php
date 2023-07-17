<?php

    function mandarEmail($subject, $body, $email){

        $url = "https://script.google.com/macros/s/AKfycbxju8ZwCcBEeOJEgfQ2W5-gVtOr1RIaBNlFg2A1XkOoq4X2BuWHs5MN3bSpsI7TNgU/exec";
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_POSTFIELDS => http_build_query([
                    "recipient" => $email,
                    "subject"   => "$subject",
                    "body"      => "$body"
                ])
            
            ]
        );

        $result = curl_exec($ch);

        return $result;
    }
?>