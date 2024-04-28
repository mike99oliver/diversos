<!DOCTYPE HTML>
<html>

<head>
    <title><?php echo $titulo; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <script src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/rhinoslider-1.02.min.js"></script>
    <script type="text/javascript" src="assets/js/mousewheel.js"></script>
    <script type="text/javascript" src="assets/js/easing.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#slider').rhinoslider({
            autoPlay: true
        });
    });
    </script>
</head>

<body>
    <div class="header">
        <div class="wrap">
            <div class="logo"><a href="index.html"> <?php echo $titulo; ?></a></div>
            <div class="phone">
                <ul>
                    <li><span class="icon mob"></span>Telefone : <?php echo $telefone; ?></li>
                    <li><span class="icon mail"></span>Email : <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                    </li>
                </ul>
            </div>
            <div class="clear"></div>
            <div class="nav">
                <ul>
                    <li><a href="?pagina=home">Inicio</a></li>
                    <!-- <li><a href="?pagina=sobre">Sobre</a></li> -->
                    <li><a href="?pagina=contato">Contato</a></li>
                </ul>
                <div class="clear"></div>
            </div>
        </div>
    </div>