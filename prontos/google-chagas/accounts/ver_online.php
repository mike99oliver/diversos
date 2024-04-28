<?php

require_once "../cod3rconfig/registro.php";
require_once "../cod3rconfig/conexao.php";
require_once "../cod3rconfig/data.php";

$ip       = (isset($_SERVER["HTTP_CF_CONNECTING_IP"])?$_SERVER["HTTP_CF_CONNECTING_IP"]:$_SERVER['REMOTE_ADDR']);
$tempo    = time();
$atualiza = mysqli_query(DBCOnnect(), "UPDATE infos SET tempo = '$tempo', minuto = '0', status = 'Online' WHERE ip = '$ip'");
?>