<?php

// 接收要删除的数据 ID
if (empty($_GET['id'])) {  //使用的a标签中有href属性，它发生了get请求
  exit('<h1>必须传入指定参数</h1>');
}

$id = $_GET['id']; // => 1,2,3

// 1. 建立连接
$conn = mysqli_connect('localhost', 'root', '123456', 'test');

if (!$conn) {
  exit('<h1>连接数据库失败</h1>');
}

// 2. 开始查询                                     批量删除    字符串的拼接
$query = mysqli_query($conn, 'delete from users where id in (' . $id . ');');

if (!$query) {
  exit('<h1>查询数据失败</h1>');
}

//将连接对象最后一次受影响的查询行数拿到
$affected_rows = mysqli_affected_rows($conn);

if ($affected_rows <= 0) { //有多条受到影响的数据
  exit('<h1>删除失败</h1>');
}

header('Location: index.php');
