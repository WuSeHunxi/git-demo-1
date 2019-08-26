<?php

//通过php代码执行一个SQL语句得到查询的结果
//类似于之前的宽字符集函数问题，mysqli是一个额外的扩展
//如果想要使用这个扩展提供的函数，必须开启扩展
//如果需要在调用函数时忽略错误或者警告可以在函数名之前加上@


//建立与数据库服务器之间的连接

$connect=@mysqli_connect('127.0.0.1','root','demo2'); // 本机  用户名  密码  要连接的数据库  

if(!$connect){
    //数据库连接失败
    // exit('<h1>连接数据库失败</h1>');
}

// 查询语句 
// 基于刚才创建的连接对象得到一个查询对象，这个查询对象可以用来再到数据一行一行拿数据
$query=mysqli_query($connect,'select * from users;'); // 建立的连接 SQL语句
var_dump($query);

//去取数据
$row=mysqli_fetch_assoc($query);
var_dump($row);

//当在数据库中取数据时，通常利用while循环
while($row=mysqli_fetch_assoc($query);){
    var_dump($row);
}