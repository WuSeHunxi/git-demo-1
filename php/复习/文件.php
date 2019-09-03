<?php

function login(){
    // 判断每一项上传的元素是否为空
    if(empty($_GET['name'])){
        $GLOBALS['message']='请输入姓名';
        return;
    }
    if(empty($_GET['password'])){
        $GLOBALS['message']="请输入密码";
        return;
    }
    $name=$_GET['name'];
    $password=$_GET['password'];

    // 判断文件
    if(empty($_FILES['images'])){
        $GLOBALS['message']="文件操作失败";
        return;
    }
    if($_FILES['images']['error']!=0){
        $GLOBALS['message']='文件上传失败';
        return;
    }
    $arr=array(".jpg",".png");
    if(!in_array($_FILES['images']['type'], $arr)){
        $GLOBALS['message']='文件上传失败';
        return;
    }
    if($_FILES['images']['size']<1*1024*1024){
        $GLOBALS['message']='上传文件过小';
        return;
    }
    $target='./uploads/'.uniqid().$_FILES['images']['name'];
    if(!move_uploaded_file($_FILES['images']['tmp_name'],$target)){
        $GLOBALS['message']='文件上传失败'
        return;
    }

}

// 表单的提交需要判断是否请求成功
if($_SERVER['REQUEST_METHOD']==='POST'){
    login();
    echo "kk";
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
            <?php if(isset($message)) {?>
                <p><?php echo $message; ?></p>    
            <?php } ?> 
        </table>
    </form>
</body>
</html>