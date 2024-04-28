<?php
$host = 'localhost';
$dbname = 'detran-mg';
$user = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}

// Buscar lista de domínios
$stmt = $pdo->query("SELECT id, url FROM dominios");
$dominios = $stmt->fetchAll(PDO::FETCH_ASSOC);

$statusDominios = [];

foreach ($dominios as $dominio) {
    $url = $dominio['url'];
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_exec($ch);
    $codigoResposta = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    // Considera o domínio como online se o código de resposta for 200-299
    $statusDominios[] = [
        'url' => $url,
        'status' => ($codigoResposta >= 200 && $codigoResposta < 300) ? 'Online' : 'Offline'
    ];
}

// Retorna os resultados em formato JSON
header('Content-Type: application/json');
echo json_encode($statusDominios);
?>