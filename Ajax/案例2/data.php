<?php

header("Content-Type","application/json");

$data=array(
    array("name"=>"haha","id"=>11,"age":141),
    array("name"=>"xiaoxiao","id"=>12,"age":115),
    array("name"=>"lala","id"=>13,"age":116),
    array("name"=>"mumu","id"=>14,"age":117)
);

if(empty($_GET["REQUEST_METHOD"])){

}

if(empty($_GET['id'])){
    $json=json_encode($data);
    echo $json;
}else{
    foreach ($data as $item) {
        if($_GET['id']==$item['id']){
            $json=json_encode($item);
            echo $json;
        }
    }
}
