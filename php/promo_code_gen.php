<?php

header("Access-Control-Allow-Origin: *");

    $randomString = "";
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $length = 5;
    
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, 61)];
    }

echo $randomString;

?>