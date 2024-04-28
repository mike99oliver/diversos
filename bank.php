<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.4devs.com.br/ferramentas_online.php');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    // 'authority: www.4devs.com.br',
    'accept: */*',
    'accept-language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
    'cache-control: no-cache',
    'content-type: application/x-www-form-urlencoded; charset=UTF-8',
    'origin: https://www.4devs.com.br',
    'pragma: no-cache',
    'referer: https://www.4devs.com.br/validador_conta_bancaria',
    'sec-ch-ua: "Not_A Brand";v="99", "Google Chrome";v="109", "Chromium";v="109"',
    'sec-ch-ua-mobile: ?0',
    'sec-ch-ua-platform: "Windows"',
    'sec-fetch-dest: empty',
    'sec-fetch-mode: cors',
    'sec-fetch-site: same-origin',
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36',
    'x-requested-with: XMLHttpRequest',
]);

curl_setopt($ch, CURLOPT_POSTFIELDS, 'acao=validar_conta_bancaria&banco=2&agencia='.$_REQUEST['ag'].'&conta='.$_REQUEST['cc'].'');

$response = curl_exec($ch);

curl_close($ch);

echo $response;