<?php

if($_SERVER['REQUEST_METHOD']==='POST'){
    // 接收文件需要使用$_FILES（超全局变量）
    var_dump($_FILES);
}

//文件上传：在客户端中查找，上传到服务端，此时文件中存放的临时地址是服务端的地址

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
    <!-- 如果表单中有文件域（文件上传），必须将表单的method的方法设置为post，enctype设置为multipart/form-data -->
    <!-- enctype的默认是urlencoded，格式是 key1=value1&key2=value2 -->
    <!-- 当enctype是下面的那个时，它的格式就是带有分割线的一大段 -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        
        <!-- 提交文件的input元素 -->
        <input type="file" name="img">

        <button>提交</button>
    </form>
</body>
</html>
