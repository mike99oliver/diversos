<?php
$host = 'localhost';
$dbname = 'detran-mg';
$user = 'root';
$password = '';
function get_http_response_code($domain1) {
    $headers = get_headers($domain1);
    return substr($headers[0], 9, 3);
  }
function getDomainStatus($url) {

    if (0 !== strpos($url, 'http://') && 0 !== strpos($url, 'https://')) {
        $url = "https://{$url}";
     }
     $get_http_response_code = (int) filter_var(explode(' ', get_headers($url)[0])[1], FILTER_SANITIZE_NUMBER_INT);
 
    return ($get_http_response_code >= 200 && $get_http_response_code < 302) ? 'Online' : 'Offline';
}
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}

// Buscar lista de domínios
$stmt = $pdo->query("SELECT id, url FROM dominios");
$dominios = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Resultados dos domínios
$resultados = [];

foreach ($dominios as $dominio) {
    $url = $dominio['url'];


    $status = getDomainStatus($url);
    $resultados[] = [
        'url' => $url,
        'status' => $status
    ];
}

// Retorna os resultados em formato JSON
header('Content-Type: application/json');
echo json_encode($resultados);


?>
