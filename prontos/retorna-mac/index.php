<?php

//Verifica o Proxy e retorna o ip real
function getRealIPAddress(){

    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
    //check ip from share internet
    $ip = $_SERVER['HTTP_CLIENT_IP'];
    }else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
    //to check ip is pass from proxy
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
    $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
    
    }
    
    //retorna nome da máquina remota pelo IP
    function NomeMaquinaRem(){
    
    $Nome = gethostbyaddr(getRealIPAddress());
    return $Nome;
    
    }
    
    //Mac da Máquina remota conectada
    function MacAdressByWindows(){
    
    $ipAddress = getRealIPAddress();
    
    #run the external command, break output into lines
    exec("arp -a $ipAddress", $output);
    $IpMac = explode(" ", trim($output[3]));
    return $IpMac[11];
    
    }


    echo MacAdressByWindows();