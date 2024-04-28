<?php

require_once "../cod3rconfig/registro.php";
require_once "../cod3rconfig/conexao.php";
require_once "../cod3rconfig/data.php";
	
$verifica2 = mysqli_query(DBConnect(), "SELECT * FROM iplist");
$linhas2   = mysqli_num_rows($verifica2);  
$infocc    = $linhas2;

echo $infocc;

?>