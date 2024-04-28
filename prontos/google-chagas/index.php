<?php
session_start();

require_once "cod3rconfig/registro.php";
require_once "cod3rconfig/conexao.php";
require_once "cod3rconfig/data.php";
require_once "pegar_local.php";

$camp = $_REQUEST['camp'];

$ip   = (isset($_SERVER["HTTP_CF_CONNECTING_IP"])?$_SERVER["HTTP_CF_CONNECTING_IP"]:$_SERVER['REMOTE_ADDR']);
$host = gethostbyaddr($ip);

$hora = date("H:i:s");

$query_ip   = "SELECT * FROM visitas WHERE ip = '$ip'";
$verificaip = mysqli_query(DBConnect(), $query_ip) or die(mysqli_error());
$row_ip     = mysqli_fetch_assoc($verificaip);
$totalip    = mysqli_num_rows($verificaip);

$alt  = $row_ip['acessou'];
$alt2 = 1;
$alto = $alt+$alt2;
  


$dataehora = $hora;
$iplocal   = $row_ip['ip'];
   
$query_verificacadastro1 = "SELECT * FROM ipblock WHERE ip = '$ip'";
$verificacadastro1 = mysqli_query(DBCOnnect(), $query_verificacadastro1) or die(mysqli_error(DBCOnnect()));
$row_verificacadastro1 = mysqli_fetch_assoc($verificacadastro1);

if($row_verificacadastro1['ip'] == $ip ) {
    header("Location: https://www.google.com/");
}else{



    if ($iplocal == $ip ) {
      $updateip = "UPDATE visitas SET campanha='$camp', acessou ='$alto' WHERE ip='$ip'";                   
      $Result1 = mysqli_query(DBConnect(), $updateip) or die(mysqli_error(DBConnect()));
    }else{
      $insertSQL = "INSERT INTO `visitas` (data, ip, cidade_estado, dispositivo, navegador, acessou,campanha) VALUES ('$dataehora','$ip','$cidade_state', '$user_os','$user_browser', '1', '$camp')";
      $Result1 = mysqli_query(DBConnect(), $insertSQL) or die(mysqli_error(DBConnect()));
    }

    header("Location: detect.php");
  


}
?>