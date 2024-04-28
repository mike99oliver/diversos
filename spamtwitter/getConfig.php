<?php
include("config.php");

$query = "SELECT * FROM `config` WHERE id = 1 LIMIT 1";
$query = $sql->prepare($query);
if($query->execute()){
    $result = $query->get_result();
    $obj = mysqli_fetch_assoc($result);
    echo(json_encode($obj));
}