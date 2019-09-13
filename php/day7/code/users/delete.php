<?php

// 接收要删除的数据 ID
if (empty($_GET['id'])) {
  exit('<h1>必须传入指定参数</h1>');
}

$id = $_GET['id']; // => 1,2,3

// 1. 建立连接
$conn = mysqli_connect('localhost', 'root', '', 'test');

if (!$conn) {
  exit('<h1>连接数据库失败</h1>');
}

// 2. 开始查询
$query = mysqli_query($conn, 'delete from users where id in (' . $id . ');');

if (!$query) {
  exit('<h1>查询数据失败</h1>');
}

// 得到受影响的行数
$affected_rows = mysqli_affected_rows($conn);

// 判断是否有受影响的行
if ($affected_rows <= 0) {
  exit('<h1>删除失败</h1>');
}

// 跳转回原页面
header('Location: index.php');
