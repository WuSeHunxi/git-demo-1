<?php //在php中属于表单的逻辑代码

//要将表单的逻辑处理放在HTML之前，为了控制HTML的输出

//判断请求的方式，从而决定是否执行对数据的处理 
if($_SERVER['REQUEST_METHOD']==='POST'){
    //这句话只有当点击了提交按钮才会执行
    var_dump($_POST); //当页面进行了post请求的时候（）才能执行这句话
}

//注意客户端  服务端


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
    <!-- 一般为了便于维护，我们将表单提交给当前页面本身 -->
    <!-- 鲁棒性：程序应对变化的能力 -->
    <!-- <form action="表单.php" method="post"> -->
    <!-- 由于文件重命名会导致代码修改，鲁棒性不强 -->
    <form action="<?php echo $_SERVER['PHP_SELF'];//PHP_SELF: 获取当前路径 ?>" method="post"></form>
        <div>
            <label for="username">用户名</label>
            <input type="text" id="username" name="username">
        </div>
        <div>
            <label for="password">密码</label>
            <input type="password" id="password" name="password">
        </div>
        <button type="submit">登录</button>
    </form>
</body>
</html>