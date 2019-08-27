<?php

// 删除数据其实就是通过get请求得到id值，再根据id的值去寻找要删除的数据
if(empty($_GET['id'])){
    exit('<h1>必须指定参数</h1>');
}

$id=$GET['id'];

$data=json_decode(file_get_contents('data.json'),true);
