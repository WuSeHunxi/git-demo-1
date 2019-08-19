<?php

$name=$password=$email='';
$nameErr=$passwordErr=$emailErr='';

function login(){

    if(empty($_POST['name'])){
        $GLOBALS['nameErr']='请输入用户名';
        return ;
    }

    if(empty($_POST['password'])){
        $GLOBALS['passwordErr']='请输入密码';
        return;
    }

    if(empty($_POST['email'])){
        $GLOBALS['email']='请输入邮箱';
        return;
    }

    $name=text_input($_POST['name']);
    $password=text_input($_POST['password']);
    $email=text_input($_POST['email']);
}

function text_input($data){

    $data=trim($data);
    $data=stripcslashes($data);
    $data=htmlspecialchars($data);
    return $data;
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
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        Name: <input type="text" name="name" ><span>*<?php echo $nameErr;?></span>
        <br>
        密码：<input type="password" name="password" ><span>*<?php echo $passwordErr;?></span>
        <br>
        邮箱：<input type="email" name="email" ><span>*<?php echo $emailErr;?></span>
        <br>
        <button type="submit">登录</button>
    </form>
</body>
</html>