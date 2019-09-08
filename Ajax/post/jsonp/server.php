<?php

// $conn = mysqli_connect('localhost', 'root', '123456', 'demo');

// $query = mysqli_query($conn, 'select * from users');

// while ($row = mysqli_fetch_assoc($query)) {
//   $data[] = $row;
// }

$array=(
  array(
    'id'=>1,
    'name'=>'lalala',
    'age'=>11
  ),
  array(
    'id'=>2,
    'name'=>'oooo',
    'age'=>12
  ),
  array(
    'id'=>3,
    'name'=>'apapap',
    'age'=>13
  )
);


if (empty($_GET['callback'])) {
  header('Content-Type: application/json');
  echo json_encode($array);
  exit();
}


// 正常来说，该php文件返回的是json文件，但是跨域之后（客户端采用script标记对它发生请求）返回的就是js文件，因此必须设置响应头

// 如果客户端采用的是 script 标记对我发送的请求
// 一定要返回一段 JavaScript
header('Content-Type: application/javascript');
$result = json_encode($array);

$callback_name = $_GET['callback'];

echo "typeof {$callback_name} === 'function' && {$callback_name}({$result})";
