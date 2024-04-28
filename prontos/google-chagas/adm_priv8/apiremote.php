<?php
require_once "../cod3rconfig/registro.php";
require_once "../cod3rconfig/conexao.php";
require_once "../cod3rconfig/data.php";

if($_POST['idUsuario']) {
	$id = $_POST['idUsuario'];
  $op = $_POST['usuarioop'];
    $sql = "SELECT * FROM infos WHERE id='$id'";
	$resultset = mysqli_query(DBConnect(), $sql) or die("database error:". mysqli_error(DBConnect()));    
    $data = array();
    while( $rows = mysqli_fetch_assoc($resultset) ) {
        
			$data = $rows;
    }
  
   echo json_encode($data);
   

   
$atualiza = mysqli_query(DBCOnnect(), "UPDATE infos SET op='$op' WHERE id='$id'");
  
} else {
    echo 0;    
}
?>