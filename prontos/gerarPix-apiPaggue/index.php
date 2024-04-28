<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://ms.paggue.io/payments/api/simulator',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "fee_payer": "me",
    "amount": "10000"
}',
  CURLOPT_HTTPHEADER => array(
    'X-Company-ID: '
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
