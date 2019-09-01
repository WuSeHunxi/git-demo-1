<?php

header("Content-Type:application")

// 二维数组
$array=array(
    array("id"=>11,"name":"ll"),
    array("id"=>22,"name":"l2"),
    array("id"=>33,"name":"l3"),
    array("id"=>44,"name":"l4"),
);

if(empty($_GET["id"])){
    $json=json_encode($array);
    echo $json;
}else{
    foreach ($array as $item) {
        if($item["id"]==$_GET["id"]){
            continue;
        }
        $json=json_encode($item);
        echo $json;
    }
}

