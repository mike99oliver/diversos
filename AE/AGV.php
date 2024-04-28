<?php

if( !isset($_REQUEST['cpf']) || !isset($_REQUEST['uc']) ){
    die('Invalid Params!');
}

$uc = $_REQUEST['uc'];
$cpf = $_REQUEST['cpf'];

// exit;
set_time_limit(610);

require(__DIR__ . '/capsolver/src/autoloader.php');

$solver = new \CapSolver\CapSolver('CAP-817F8FD539F92CA661B8C4BA92784C5B');

try {
    $solution = $solver->recaptchav2([
        'websiteKey'    => '6Lef6jIpAAAAAGt7wya2LN7OdTt1RwMlEh-oszLX',
        'websiteURL'    => 'https://aeservicosonline.com.br/fatura/segunda-via-rapida',
        'proxy'         => 'http:b25293b203d6c0e9.byi.na.pyproxy.io:16666:mikeslave01-zone-resi-region-br:mikeslave01',

    ]);
} catch (\Exception $e) {
    die($e->getMessage());
}


// var_dump($solution);
// exit;


$ch = curl_init();

// https://aegea-api-manager-01.azure-api.net/external/agv/v1/conta/segunda-via-rapida/consulta/rioweb/400941177/29919917000176
curl_setopt($ch, CURLOPT_URL, 'https://aegea-api-manager-01.azure-api.net/external/agv/v1/conta/segunda-via-rapida/consulta/rioweb/'.$uc.'/'.$cpf);
curl_setopt($ch, CURLOPT_PROXY, 'http://b25293b203d6c0e9.byi.na.pyproxy.io:16666');
curl_setopt($ch, CURLOPT_PROXYUSERPWD, 'mikeslave01-zone-resi-region-br:mikeslave01');    
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Accept: application/json, text/plain, */*',
    'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7',
    'Api-Token: eyJhbGciOiJIUzUxMiJ9.eyJpc3MiOiJici5jb20uYWVnZWEuc2VydmljZXMiLCJzdWIiOiJmNzBmMjE2ZDJkZGRkYWE2MWM2NDIzNzA0MGM0YmVjZGQyZTFmNWZiYTQxNDExOGY1YzE5MjRjNzQ5NzExMzQ0MmQ3YWY2MGUzMTIxMmJlMzNiYjNmODBmMDg4MTg5YjAwZjEyNDRmMTE2YzMyNmUwZDgyMTBhMzBjOWIxMGE2ZiIsImF1ZGllbmNlIjoiQVVUT19BVEVORElNRU5UT19XRUIifQ.ZlNRosb55SwRI3YdRC0ks7y8ZnariMewRXeD05CfWE7Veupj-G36ChS9W9AUjaaLaN-0atil28zEI_Txhw-WfQ',
    'Validation-Id: '.$solution->gRecaptchaResponse,
    'Cache-Control: no-cache',
    'Connection: keep-alive',
    'Origin: https://aeservicosonline.com.br',
    'Host: aegea-api-manager-01.azure-api.net',
    'Pragma: no-cache',
    'Referer: https://aeservicosonline.com.br/',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: cross-site',
    'User-Agent: '.$solution->userAgent,
    'sec-ch-ua: "Not_A Brand";v="99", "Google Chrome";v="109", "Chromium";v="109"',
    'sec-ch-ua-mobile: ?0',
    'sec-ch-ua-platform: "Windows"',
    'Accept-Encoding: gzip',
    'Version: 238'
]);

$response = curl_exec($ch);



curl_close($ch);
$info = curl_getinfo($ch); 
if( $info["http_code"] == 428 ){
    die('Dados inválidos!');
}

if( $info["http_code"] == 204 ){
    die('Sem faturas!');
}

header('Content-Type: application/json; charset=utf-8');

echo $response;
exit;

