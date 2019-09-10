<?php

// 响应的是js代码
// header('Content-Type: application/javascript');

// echo json_encode(array(
//   'time' => time()
// ));

// => {"time":153142321}

// echo 'foo({"time":153142321})';

$callback=$_GET['callback'];
$data=array('a','b','c');
echo $callback.'('.json_encode($data).'.';


// => foo({"time":153142321})


// $json = json_encode(array(
//   'time' => time()
// ));

// 在 JSON 格式的字符串外面包裹了一个函数的调用，
// 返回的结果就变成了一段 JS 代码
// echo "foo({$json})";

//响应内容不能是直接的一段json数据，而是直接执行一个js函数，也就是cb的参数名 




// echo time();

// $conn = mysqli_connect('localhost', 'root', '123456', 'demo');

// $query = mysqli_query($conn, 'select * from users');

// while ($row = mysqli_fetch_assoc($query)) {
//   $data[] = $row;
// }



// 判断是否传递了回调函数
// if (empty($_GET['callback'])) {
//   header('Content-Type: application/json');
//   echo json_encode($arr);
//   exit();
// }


// 正常来说，该php文件返回的是json文件，但是跨域之后（客户端采用script标记对它发生请求）返回的就是js文件，因此必须设置响应头

// 如果客户端采用的是 script 标记对我发送的请求
// 一定要返回一段 JavaScript

