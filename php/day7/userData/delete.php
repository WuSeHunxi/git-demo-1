<?php

if(empty($_GET['id'])){
    exit('<h1>请传入指定的参数</h1>');
}

$id=$_GET['id'];

// 建立连接
$connect=mysqli_connect('localhost','root','','test');
if(!$connect){
    exit('<h1>数据库连接失败</h1>');
}

// 把id值放在括号里因为可能会根据多个id删除多个数据
$query=mysqli_query($connect,'delete from users where id in ('.$id.');');

if(!$query){
    exit('<h1>查询数据库失败</h1>');
}

$affected_rows=mysqli_affected_rows($connect);

// 判断影响的行数
if($affected_rows<=0){
    exit('<h1>数据删除失败</h1>');
}

header('Location:index.php');