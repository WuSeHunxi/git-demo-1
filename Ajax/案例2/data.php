<?php

header("Content-Type:application/json");

$data=array(
    array(
        "id"=>11,
        "name"=>"haha",
        
        "age"=>141
    ),
    array(
        "id"=>12,
        "name"=>"xiaoxiao",
        "age"=>115
    ),
    array(
        "id"=>13,
        "name"=>"lala",
        
        "age"=>116
    ),
    array(
        "id"=>14,
        "name"=>"mumu",
        
        "age"=>117
    )
);

if(empty($_GET['id'])){
    $json=json_encode($data);
    echo $json;
}else{
    foreach ($data as $item) {
        if($item['id'] != $_GET['id']){
            continue;
        }
        $json=json_encode($item);
        echo $json;
    }
}
