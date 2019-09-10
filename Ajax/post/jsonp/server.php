<?php

// echo time();

// $conn = mysqli_connect('localhost', 'root', '', 'demo');

// $query = mysqli_query($conn, 'select * from users');

// while ($row = mysqli_fetch_assoc($query)) {
//   $data[] = $row;
// }


// HTML5中可以直接解决Ajax跨域的问题
// header("Content-Type:application/json");
// header("Access-Control-Allow-Origin:*");

$arr = array('id'=>2,'name' => 'ahahahah', 'age' => 18);

// 判断是否传递了回调函数
if (empty($_GET['callback'])) {
  header('Content-Type: application/json');
  echo json_encode($arr);
  exit();
}


// 正常来说，该php文件返回的是json文件，但是跨域之后（客户端采用script标记对它发生请求）返回的就是js文件，因此必须设置响应头

// 如果客户端采用的是 script 标记对我发送的请求
// 一定要返回一段 JavaScript
header('Content-Type: application/javascript');
$result = json_encode($arr);


$callback_name = $_GET['callback'];

//   判断callback是不是函数                         回调函数的调用   参数
echo "typeof {$callback_name} === 'function' && {$callback_name}({$result})";
