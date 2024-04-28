<?php

define('TOKEN_HIPER', 'FHRV6CMJIHVJN9KS03CSHHAJ8RIBJBZR1MMM5G91TJ5W');
define('APIKY_HIPER', 'apk_46651087-PHzPCZRmYfntVjlrbpzLmlQyjtkzHHjX');



function buildPix($args=[]){
  $curl = curl_init();

  curl_setopt_array($curl, [
    CURLOPT_URL => "https://pix.paghiper.com/invoice/create/",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => json_encode([
      'apiKey' => APIKY_HIPER,
      'order_id' => rand(0000,9999),
      'payer_email' => $args['email'],
      'payer_name' => $args['name'],
      'payer_cpf_cnpj' => $args['doc'],
      'payer_phone' => $args['phone'],
      'days_due_date' => 1,
      'items' => [
          [
                  'item_id' => '1',
                  'description' => 'Sel',
                  'price_cents' => $args['val']*100,
                  'quantity' => 1
          ]
      ]
    ]),
    CURLOPT_HTTPHEADER => [
      "accept: application/json",
      "content-type: application/json"
    ],
  ]);

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    return json_decode($response);
  }  
}


function chkPix($tid){

  $curl = curl_init();

  curl_setopt_array($curl, [
    CURLOPT_URL => "https://pix.paghiper.com/invoice/status/",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => json_encode([
      'token' => TOKEN_HIPER,
      'apiKey' => APIKY_HIPER,
      'transaction_id' => $tid
    ]),
    CURLOPT_HTTPHEADER => [
      "accept: application/json",
      "content-type: application/json"
    ],
  ]);

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    $t = json_decode($response);

    return $t->status_request->status_request;
  }  
}