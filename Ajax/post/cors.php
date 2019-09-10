<?php

// $conn = mysqli_connect('localhost', 'root', '123456', 'demo');

// $query = mysqli_query($conn, 'select * from users');

// while ($row = mysqli_fetch_assoc($query)) {
//   $data[] = $row;
// }
header('Content-Type: application/json');

// 一行代码搞定
// 允许跨域请求          *表示允许所有的源对这个文件进行请求

header('Access-Control-Allow-Origin: *');

$arr=array('id'=>1,'name'=>'lalala','age'=>10);

echo json_encode($arr);
