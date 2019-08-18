<?php

//响应头设置响应文件类型
header('Content-Type:text/css; charset=UTF-8');  // --->css
// header('Content-Type:application/javascript;charset=UTF-8');  // ---> javascript


//响应头的重定向
//在响应头重添加了一个Location属性实现页面跳转
// header('Location:text.css');



//不能跳转本页面或者循环重定向，会造成响应失败的结果（01.php 和02.php是例子）
// header('Location:响应头的应用场景.php'); //会显示页面错误


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <!-- 在响应头中的得到的 ===> Content-Type: text/html; charset=UTF-8 
    这是默认情况下的，要想改变响应文件类型可以在php中添加header('Content-Type:xxx');    
    -->
    
    <h1>这是一个网页</h1>
</body>
</html>