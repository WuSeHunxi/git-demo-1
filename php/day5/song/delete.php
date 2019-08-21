<?php

// 如何知道客户端想要删除哪一个？？？
// 通过客户端在URL地址中的问号参数的不同来辨别要删除的数据


//没有表单照样可以使用$_GET来获取参数
// 接收 URL 中的不同的 ID
if (empty($_GET['id'])) {  //需要判断客户端是否传了id
  // 没有传递必要的参数
  //想结束程序 但是不在函数中，则使用exit()
  exit('<h1>必须指定参数</h1>'); // 参数是响应体
}

//获取id
$id = $_GET['id'];

// 找到要删除的数据 $item 

//先解码得到关联数组
$data = json_decode(file_get_contents('data.json'), true);
//遍历数组
foreach ($data as $item) {
  // 不是我们要的，直接 找下一条
  if ($item['id'] !== $id) continue;
  // $item => 我们要删除的那一条数据

  // 从原有数据中移除
  $index = array_search($item, $data);
  array_splice($data, $index, 1);

  // 保存删除指定数据过后的内容
  // echo '<pre>';
  // var_dump($data);
  // echo '</pre>';
  //重新编码存数据
  $json = json_encode($data);
  file_put_contents('data.json', $json);

  // 跳转回列表页
  header('Location: list.php');
}

