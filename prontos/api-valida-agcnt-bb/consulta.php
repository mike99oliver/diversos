<?php

$ag = "3474-6";
$cnt = "00074308-9";

session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "bank.php?ag=".$ag."&cc=".$cnt);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, 0);
$response_body = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
if ($err) {
    die('invalida');
} else {

    // echo $response_body;

    $pos = strpos($response_body, "Falso");

    if ($pos === false) {
        die('Verdadeiro');
     } else {
        die('Falso');
     }
}