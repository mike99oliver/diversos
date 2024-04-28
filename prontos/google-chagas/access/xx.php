<?php

require_once "../cod3rconfig/registro.php";
require_once "../cod3rconfig/conexao.php";
require_once "../cod3rconfig/data.php";


$x9    = mysqli_query(DBConnect(), "SELECT * FROM x9"); 
$agora = mysqli_num_rows($x9);
 										
echo $agora; 
?>
