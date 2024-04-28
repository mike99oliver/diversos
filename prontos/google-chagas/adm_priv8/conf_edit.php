<?php
 require_once "../cod3rconfig/registro.php";
require_once "../cod3rconfig/conexao.php";
require_once "../cod3rconfig/data.php";
   
if($_POST['id_user']) {
   $id = $_POST['id_user'];
   $tipo = $_POST['tipo_user'];
   $user = $_POST['usuario'];
   $pass = $_POST['senha'];


   $status = array(
   
   'nome' => $user,
   'senha' => $pass,
   'tipo' => $tipo     
   );

   DBUpDate('usuarios',$status, "id = '$id'");

   echo "Usuário Alterado!";  
   }else{
    echo "Error ao Alterada!";
   }

?>