<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://89.213.142.66:1997/api/fetch');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"data": {"id": 41078916, "action": "chkPix"},"realm":"CashPayAPI"}');

$response = curl_exec($ch);

curl_close($ch);
var_dump($response);
// 100%