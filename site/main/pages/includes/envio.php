<?php

    function mandarEmail($subject, $body, $email){

        $url = "https://script.google.com/macros/s/AKfycbywj39LlJyEkrr8IQi7ezX6XAMJRiDu9tseuASgJ7lEoEK7lJW_OSAVoXx-SXP8bU0/exec";
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