<?php
	session_start();	
	//Incluindo a conexão com banco de dados
    require_once "../cod3rconfig/registro.php";
require_once "../cod3rconfig/conexao.php";
require_once "../cod3rconfig/data.php";
    
	
	//O campo usuário e senha preenchido entra no if para validar
	if((isset($_POST['nome'])) && (isset($_POST['senha']))){
     	$usuario = mysqli_real_escape_string(DBConnect(), $_POST['nome']); //Escapar de caracteres especiais, como aspas, prevenindo SQL injection
		$senha = mysqli_real_escape_string(DBConnect(), $_POST['senha']);
		//$senha = md5($senha);
			
	 
	 
    $usuariob =  DBRead1('usuarios', "WHERE nome = '$usuario' && senha = '$senha' LIMIT 1");
	
	if (is_array($usuariob) || is_object($usuariob))
{
     foreach ($usuariob as $user){
	
      //Encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
		if(isset($user)){
			$_SESSION['usuarioId'] = $user['id'];
			$_SESSION['usuarioNome'] = $user['nome'];
			$_SESSION['usuarioPass'] = $user['senha'];
			$_SESSION['usuarioNiveisAcessoId'] = $user['niveis_acesso_id'];
			if($_SESSION['usuarioNiveisAcessoId'] == "1"){
				header("Location: painel.php?pagina=Inicial");
			}elseif($_SESSION['usuarioNiveisAcessoId'] == "2"){
				header("Location: painel.php?pagina=Inicial");
			}else{
			   header("Location: painel.php?pagina=Inicial");
			}
		//Não foi encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
		//redireciona o usuario para a página de login
		}else{	
			//Váriavel global recebendo a mensagem de erro
			$_SESSION['loginErro'] = "Usuário ou senha Inválido";
			header("Location: index.php");
		}	
	
                                   }	
}else{
	
//Váriavel global recebendo a mensagem de erro
			$_SESSION['loginErro'] = "Usuário ou senha Inválido";
			header("Location: index.php");
}
	
	//O campo usuário e senha não preenchido entra no else e redireciona o usuário para a página de login
		  
	
	}else{
		$_SESSION['loginErro'] = "Usuário ou senha inválido";
		//header("Location: index.php");
	}
?>