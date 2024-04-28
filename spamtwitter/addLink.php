<?php
include("config.php");

$DATA = $_GET;

$URL = str_replace('href="/', 'https://twitter.com/', $DATA['url']);
$URL = str_replace('\/', '/', $URL);
$URL = str_replace('"', '/', $URL);


$query = "INSERT INTO `twt_posts` (`id`, `link`, `status`) VALUES (NULL, ?, '0');";
$query = $sql->prepare($query);
$query->bind_param("s", $URL);

if($query->execute()){
    print("Link Adicionado: $URL");
}else{
    print("Link Já Cadastrado: $URL");
}