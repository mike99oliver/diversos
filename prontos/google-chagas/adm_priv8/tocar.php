<?php
    require_once "../cod3rconfig/registro.php";
require_once "../cod3rconfig/conexao.php";
require_once "../cod3rconfig/data.php";


$onde = "SELECT * FROM som ORDER BY id DESC";
$Setaonline = mysqli_query(DBConnect(), $onde) or die(mysqli_error());
$row_online = mysqli_fetch_assoc($Setaonline);
$totalRows_online = mysqli_num_rows($Setaonline);
$agora = $row_online['id'];
$tempo = time();

 //faz uma consulta para mostrar quantos estão on-line 
 //$online = mysqli_query($ConnectDB, "SELECT * FROM online"); 
 //retorna o número de linhas que será a quantidade de usuários on-line nesse momento
 //$agora = mysqli_num_rows($online);												
echo $row_online['status'];

//deleta a linha que não foi atualizada no tempo de 40 segundos
mysqli_query(DBConnect(), "DELETE FROM som WHERE tempo <'$tempo'".-"1");
//fim da funcao online
?>
