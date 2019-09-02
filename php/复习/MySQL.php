<?php

// 建立连接
$connect=mysqli_connect('127.0.0.1','root','','test');

// 判断连接是否成功
if(!$connect){
    exit("数据库连接失败");
}

// 查询数据库
$query=mysqli_query($connect,'select * from users;');

// 判断查询是否成功
if(!$query){
    exit("数据库查询失败");
}

// 获取数据
$data=mysqli_fetch_assoc($query);

var_dump($data);