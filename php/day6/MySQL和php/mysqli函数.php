<?php

//通过php代码执行一个SQL语句得到查询的结果
//类似于之前的宽字符集函数问题，mysqli是一个额外的扩展
//如果想要使用这个扩展提供的函数，必须开启扩展
//如果需要在调用函数时忽略错误或者警告可以在函数名之前加上@


//建立与数据库服务器之间的连接

$connect=@mysqli_connect('127.0.0.1','root','demo2'); // 本机  用户名  密码  要连接的数据库  

if(!$connect){
    exit('<h1>连接数据库失败</h1>');
}