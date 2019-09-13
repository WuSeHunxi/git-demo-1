<?php


function login(){
    //判断
    if(empty($_POST['name'])){
        $GLOBALS['message']="请输入用户名";
        return;
    }
    if(empty($_POST['word'])){
        $GLOBALS['message']='请输入密码';
        return;
    }

    //  有问题
    // ||strpos($_POST['email'],'@')!=0)
    if(empty($_POST['email'])){
        $GLOBALS['message']="请输入邮箱地址";
        return;
    }
     if(!(isset($_POST['sex'])&&$_POST['sex']!=='-1')){
        $GLOBALS['message']="请输入性别";
        return;
    }
    $name=$_POST['name'];
    $word=$_POST['word'];
    $email=$_POST['email'];
    $sex=$_POST['sex'];
    echo "用户名".$name;
    echo "<br>";
    echo "密码".$word;
    echo "<br>";
    echo "邮箱".$email;
    echo "<br>";
    echo "性别".$sex;
}


if($_SERVER['REQUEST_METHOD']==="POST"){
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
            font-weight:bolder;
            margin-bottom:30px;
            display:block;
        }
    </style>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <?php if (isset($message)) {?>
            <span><?php echo $message;?></span>
        <?php }?>
        <br>
        用户名：<input type="text" name="name" id="name">
        <br>
        密码：<input type="password" name="word" id="word">
        <br>
        邮箱：<input type="email" name="email" id="email">
        <br>
        性别：<select name="sex" id="sex">
            <option value="-1">请选择性别</option>
            <option value="0">男</option>
            <option value="1">女</option>
        </select>
        <br>
        <button>登录</button>
    </form>
</body>
</html>