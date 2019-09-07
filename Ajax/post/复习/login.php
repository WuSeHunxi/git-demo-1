<?php

$id=array();
$id['1000']=arrat(
    "info"=>"小王的快递",
    "status"=>"配送中"
);

$id['1001']=arrat(
    "info"=>"小孙的快递",
    "status"=>"配送中"
);

$id['1002']=arrat(
    "info"=>"小李的快递",
    "status"=>"已配送"
);

if(!empty($_GET['id'])){
    if(empty($_GET['callback'])){
        echo json_encode($id[$_GET['id']]);
    }else{
        echo $_GET['callback']."(".json_encode($id[$_GET['id']]).")";
    }
}