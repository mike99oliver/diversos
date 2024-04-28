<?php
include("config.php");

$query = "SELECT * FROM `twt_posts` WHERE status = 0 ORDER BY `twt_posts`.`id` DESC LIMIT 1";
$query = $sql->prepare($query);

if($query->execute()){

    $result = $query->get_result();
    if($result->num_rows != 0){
        $link = mysqli_fetch_assoc(($result));        

        $query = "UPDATE `twt_posts` SET `status` = '1' WHERE `twt_posts`.`id` = ?;";
        $query = $sql->prepare($query);
        $query->bind_param("i", $link['id']);
        
        if($query->execute()){
            $RESPONSE['url'] = $link['link'];
            echo(json_encode($RESPONSE));
        }else{
            $RESPONSE['url'] = "https://twitter.com/";
            echo(json_encode($RESPONSE));
        }

    }else{
        $RESPONSE['url'] = "https://twitter.com/";
        echo(json_encode($RESPONSE));
    }

}else{
    $RESPONSE['url'] = "https://twitter.com/";
    echo(json_encode($RESPONSE));
}