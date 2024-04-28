<?php

session_start();

$pagina = $_GET["pagina"];

$titulo = "Mercearia Neto LTDA";
$email = "contato@mercearianetoletda.com.br";
$telefone = "+55 85 98871-3006";
$cnpj = "23.908.946/0001-56";


include("include/header.php");

switch ($pagina) {
    case "home":
        include("paginas/home.php");
      break;
    case "sobre":
        include("paginas/sobre.php");
      break;
    case "contato":
        include("paginas/contato.php");
      break;
    case "politica-privacidade":
        include("paginas/politica-privacidade.php");
      break;
    case "termo-uso":
        include("paginas/termo-uso.php");
      break;
    case "politica-cookie":
        include("paginas/politica-cookie.php");
      break;
    default:
        include("paginas/home.php");
      break;
  }

  include("include/footer.php");
?>