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
    if(empty($_POST['email'])||strpos($_POST['email'],'@')!=0){
        $GLOBALS['message']="请输入邮箱地址";
        return;
    }
    if($_POST['sex']!=-1){
        
    }
    $name=$_POST['name'];
    $word=$_POST['name'];
    $email=$_POST['email'];
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
        性别：<select>
            <option value="-1"></option>
            <option value="0"></option>
            <option value="1"></option>
        </select>
        <br>
        <button>登录</button>
    </form>
</body>
</html>