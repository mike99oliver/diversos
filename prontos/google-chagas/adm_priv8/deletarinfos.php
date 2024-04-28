<?php
require_once "../cod3rconfig/registro.php";
require_once "../cod3rconfig/conexao.php";
require_once "../cod3rconfig/data.php";
   
 $deletar = DBDelete('infos');

 if($deletar){
echo "INFOS DELETAS";
 }else{
  echo "ERROR";
 }

?>