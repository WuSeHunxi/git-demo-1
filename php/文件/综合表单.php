<?php

$nameErr=$passwordErr=$emailErr='';
$name=$password=$email='';

function login(){
    if(empty($_POST['name'])){
        $GLOBALS['nameErr']='请输入用户名';
        return;
    }
    if(empty($_POST['password'])){
        $GLOBALS['passwordErr']='请输入密码';
        return ;
    }
    if(empty($_POST['email'])){
        $GLOBALS['emailErr']='请输入邮箱';
        return ;
    }

    $name=text_input($_POST['name']);
    $password=text_input($_POST['password']);
    $email=text_input($_POST['email']);
}

function text_input($data){
    $data=trim($data);
    $data=stripslashes($data);
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
        *{
            padding:0;
            margin:0;
        }
        form{
            border:1px solid #ccc;
            height:400px;
            width:600px;
            margin:100px auto;
            padding-left:10px;
        }
        input{
            margin:20px;
            width:200px;
            height:20px;
            display:inline-block;
            /* padding-left:10px; */
        }
        button{
            margin-left:130px;
            background:#f40;
            border:1px solid #f40;
            border-radius:10px;
            color:#fff;
            width:50px;
            text-align:center;
            cursor:pointer;
        }
        span{
            color:red;
        }
    </style>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
        名字：<label for="name"> <input type="text" name="name" ><span>*<?php echo $nameErr;?></span></label>
        <br>
        密码：<label for="password"> <input type="text" name="password"><span>*<?php echo $passwordErr;?></span></label>
        <br>
        邮箱：<label for="email"> <input type="email" name="email"><span>*<?php echo $emailErr;?></span></label>
        <br>
        <button>登录</button>
        <!-- <input type="submit" value="Submit" name="submit"> -->
    </form>
</body>
</html>