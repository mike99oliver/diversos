<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://185.228.72.8:1997/api/fetch');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"data": {"sk":"sk_live_hO4fDbEZwyj0UtxuoIRZ7zpdHl4TREA0fXbHejT006","value": 35.20, "action": "buildPix", "name": "Salvador Moreira Junior", "email": "deeper@gmail.com", "doc": "02915797870"},"realm":"AtivoPay"}');

$response = curl_exec($ch);

curl_close($ch);
var_dump($response);