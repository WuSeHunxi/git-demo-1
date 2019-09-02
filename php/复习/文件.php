<?php

function login(){
    // 判断每一项上传的元素是否为空
    if($_GET['name']){
        $GLOBALS['message']='请输入姓名';
        return;
    }
    if($_GET['password']){
        $GLOBALS['message']="请输入密码";
        return;
    }
    $name=$_GET['name'];
    $password=$_GET['password'];

    // 判断文件
    if(empty($_FILES)){
        $GLOBALS['message']="文件操作失败";
        return;
    }
    $target='./uploads/'.uniqid().$_FILES['name'];
    if(!move_uploaded_file($FILES['tmp_name'],$target)){
        $GLOBALS['message']='文件上传失败'
        return;
    }

}

// 表单的提交需要判断是否请求成功
if(empty($_SERVER['REQUEST_METHOD'])==="POST"){
    login();
}

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
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"  enctype="multipart/form-data">
        <table>
            <tr>
                <td>用户名</td>
                <td><input type="text" name="name" id="name"></td>
            </tr>
            <tr>
                <td>密码</td>
                <td><input type="password" name="password" id="password"></td>
            </tr>
            <tr>
                <td>上传文件</td>
                <td><input type="file" name="file" id="file"></td>
            </tr>
            <tr>
                <td><button>登录</button></td>
            </tr>
        </table>
    </form>
</body>
</html>