<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://89.213.142.66:1997/api/fetch');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"data": {"sk":"sk_live_mQTsTTv0Y3qgPFT6YQvJhApKSZC6CdvavqPFnptHmK", "value": 35.20, "action": "buildPix", "name": "Luan", "email": "Fernandxo@gmail.com", "doc":"18339662368"},"realm":"CashPayAPI"}');

$response = curl_exec($ch);

curl_close($ch);
var_dump($response);