<?php

function login(){
    if(empty($_POST['name'])){
        $GLOBALS['message']='请输入用户名';
        return;
    }
    if(empty($_POST['passeord'])){
        $GLOBALS['message']="请输入密码";
        return;
    }
    $name=$_POST['name'];
    $password=$_POST['password'];
    if(empty($_FILES['file'])){
        $GLOBALS['message']="文件选择失败";
        return;
    }
    if($_FILES['size']<1*1024*1024){
        $GLOBALS['message']='文件过小';
        return;
    }
    // if($_FILES['type']){
    //     return;
    // }
    $target='./uploads'.uniqid().'$_FILES["name"]';
    if(!move_uploaded_file($_FILES['tmp_name'],$target)){
        $GLOBALS['message']='文件上传失败';
        return;
    }


}

if($_SERVER['REQUEST_METHOD']==='POST'){
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
    <style>
        span{
            color:red;
        }
    </style>
</head>
<body>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="mulitypart/form-data" >
        用户名：<input type="text" name="name" id="name">
        <?php if(isset($message)){?><span><?php echo $message; ?></span><?php } ?>
        <br>
        密码：<input type="password" name="password" id="password">
        <?php if(isset($message)){?><span><?php echo $message; ?></span><?php } ?>
        <br>
        请选择文件：<input type="file" name="file" id="file">
        <?php if(isset($message)){?><span><?php echo $message; ?></span><?php } ?>
        <br>
        <button>登录</button>
    </form>
</body>
</html>