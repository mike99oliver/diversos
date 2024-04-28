<?php
require_once "../cod3rconfig/registro.php";
require_once "../cod3rconfig/conexao.php";
require_once "../cod3rconfig/data.php";
if($_POST['usuario']) {
   $user = $_POST['usuario'];
   $pass = $_POST['senha'];
   $tipo = $_POST['tipo_user_add'];

   $status = array(
   
   'nome' => $user,
   'senha' => $pass,
   'tipo' =>  $tipo,
   'niveis_acesso_id' => '2'   
   );

   DBCreate('usuarios', $status);

   echo "Usuário Adicionado!";  
   }else{
    echo "Error ao Adicionar!";
   }

?>