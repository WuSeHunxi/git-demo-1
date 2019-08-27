<?php

// 删除数据其实就是通过get请求得到id值，再根据id的值去寻找要删除的数据
if(empty($_GET['id'])){
    exit('<h1>必须指定参数</h1>');
}

$id=$GET['id'];

$data=json_decode(file_get_contents('data.json'),true);
foreach($data as $item){
    // 没有找到
    if($item['id']!=$_GET['id']){
        continue;
    }
    
    // 找到了
    $index=array_search($item,$data);
    array_splice($data,$index,1);

    // 重新保存数据
    $json=json_encode($data);
    file_put_contents('data.json',$json);

    header('Location:list.php');
}