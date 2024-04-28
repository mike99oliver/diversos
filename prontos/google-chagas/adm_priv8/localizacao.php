<?php
session_start();

require_once "../cod3rconfig/registro.php";
require_once "../cod3rconfig/conexao.php";
require_once "../cod3rconfig/data.php";

date_default_timezone_set('America/Sao_Paulo');

$dados = DBRead('visitas', 'ORDER BY id DESC');

echo"<style>td{color:white;}</style><br><table class='table table-striped table-bordered m-0'>
<thead class='thead-dark'>
<tr>
<th style='width: 180px;'>#ID</th>
<th style='width: 120px;'>CAMPANHA</th>
<th style='width: 80px; color: red;'>IP</th>
<th style='width: 100px; color: red;'>Localização</th>
<th style='width: 100px; color: red;'>Dispositivo</th>
<th style='width: 120px;'>Navegador</th>
<th style='width: 120px;'>Acessou</th>
<th style='width: 120px;'>Data</th>

</tr></thead><tbody>"; ?>

<?php
if (is_array($dados) || is_object($dados)) {
	foreach ($dados as $info) {
		$tempo        = time();
		$id           = $info['id'];
		$ip           = $info['ip'];		
		//
		$local        = $info['cidade_estado'];
		$Dispositivo        = $info['dispositivo'];
		$navegador        = $info['navegador'];
		$data        = $info['data'];
		$acessos        = $info['acessou'];
		$camp        = $info['campanha'];
			
		
	

?>
		<tr>
			

		     
		<td ><?=$id?></td>
		<td><?=$camp ?></td> 
		<td ><?=$ip?></td>
		<td ><?=$local?></td>
		<td ><?=$Dispositivo?></td>
		<td ><?=$navegador?></td>
		<td ><?=$acessos?></td>
		<td ><?=$data?></td>
		
		
		
	
	

	
	</tr>
	
<?php	}
	}else{
		echo "";
	}
?>

