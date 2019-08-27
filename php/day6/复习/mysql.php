<?php

// 建立连接

$connection = mysqli_connect('127.0.0.1', 'root', '', 'test'); //本机的密码为空
// var_dump($connection);
if (!$connection) { //值为false
  // 连接数据库失败
  exit('<h1>连接数据库失败</h1>');
}


// 查询
$query=mysqli_query($connection,'select * from users;');
// 删除
$dele=mysqli_query($connection,'delete from users where id=2;');


// 得到一个关联数组
// mysqli_fetch_assoc() 函数从结果集中取得一行作为关联数组。
$row = mysqli_fetch_assoc($dele);
// while ($row) { //每循环一次$row都会发生改变
//   var_dump($row);
//   $row = mysqli_fetch_assoc($query);
// }
// var_dump($row);


// 遍历结果集
while($row=mysqli_fetch_assoc($query)){
    var_dump($row);
}

// 释放结果集
mysqli_free_result($connection);


// 关闭连接
mysqli_close($connection);