<?php

// 响应的是js代码
header('Content-Type: application/javascript');

// echo json_encode(array(
//   'time' => time()
// ));

// => {"time":153142321}

// echo 'foo({"time":153142321})';

// => foo({"time":153142321})


$json = json_encode(array(
  'time' => time()
));

// 在 JSON 格式的字符串外面包裹了一个函数的调用，
// 返回的结果就变成了一段 JS 代码
echo "foo({$json})";

//响应内容不能是直接的一段json数据，而是直接执行一个js函数，也就是cb的参数名 
