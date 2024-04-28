<?php
   session_start();
require_once "../cod3rconfig/registro.php";
require_once "../cod3rconfig/conexao.php";
require_once "../cod3rconfig/data.php";
       
    //Consultando banco de dados
	$dados = DBRead('usuarios', 'ORDER BY id DESC');
    // $qryLista = mysqli_query(DBConnect(), "SELECT * FROM infos ORDER BY id DESC");    
	// $retornos = mysqli_num_rows($qryLista); //Coloquei $con aqui como parâmetro, mas não tenho certeza se é necessário.
    // $dados = mysqli_fetch_assoc($qryLista);
  //  while($resultado = mysqli_fetch_assoc($qryLista)){
    //    $vetor[] = array_map('utf8_encode', $resultado); 
    //}    
    
    //Passando vetor em forma de json
    //$json =  json_encode($vetor);
    
	
	
	
	     echo"   

	     <br> <table class='table table-striped table-bordered m-0'>
                    <thead class='thead-dark'>
                        <tr>
                            <th>#ID</th>                           	
							<th>Login</th>
                            <th>Senha</th>
                            <th style='width: 120px;'>#TIPO/LAN</th>                            
                            <th style='width: 120px;'></th>
                        </tr>
                    </thead>
					

                    <tbody >
					";
					
					?>
					<?php
					if (is_array($dados) || is_object($dados))
												{


										foreach ($dados as $info){
											$tempo = time();
	
	$id = $info['id'];		
    $user = $info['nome'];
	$senha = $info['senha'];
    $tipo = $info['tipo'];
	

					echo "
					 <tr class='font-weight-bold border-bottom border-dark ' id='0832'>
					 <td width='250px'> 
					 <font size='5' color='red' ># $id </font>
					 </td>
					 <td width='250px'> 
					 $user
					 </td>
					  <td width='250px'> 
					$senha
					</td>
					 <td> 
					  <font color='red'>$tipo</tipo>
					 </td>
					  				  					 
					  <td class='text-center'>
					  <ul class='list-inline m-0'>
					 
					  <li>
					 
					  <a href='javascript:void(0)'' class='nav-link' data-toggle='modal' data-target='#edituser-remote' role='button' id='ver_user' data-id=$id title='Alterar Senha'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-lock'><rect x='3' y='11' width='18' height='11' rx='2' ry='2'></rect><path d='M7 11V7a5 5 0 0 1 10 0v4'></path></svg>

					  </a>
					  <a href='painel.php?ExcluirD=$id' class='small text-danger' data-toggle='tooltip' data-placement='top' title='Remover'>
					  <i class='fas fa-trash fa-fw'></i></a>
					  </li>
					  </ul>
					
					 </td>
					 </tr>
                    
		";	

}}		
?>