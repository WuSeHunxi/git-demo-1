<?php

function login_success(){
    // 开始检验
    if(empty($_POST['name'])){
        $GLOBALS['message']='请输入用户名';
        return;
    }
    if(empty($_POST['password'])){
        $GLOBALS['message']='请输入密码';
        return;
    }
    if(empty($_POST['confirm'])){
        $GLOBALS['message']='请输入确认密码';
        retrun;
    }
    if($_POST['passqord']!==$_POST['confirm']){
        $GLOBALS['message']='两次输入的密码不一致';
        rteurn;
    }
    if(!(isset($_POST['check'])&&$_POST['check']=="on")){
        $GLOBALS['message']='必须同意注册协议';
        return;
    }
    $name=$_POST['name'];
    $password=$_POST['password'];
    $confirm=$_POST['confirm'];
}

if($_SERVER['REQUEST_METHOD']==='POST'){
    login_success();
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
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
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
            <td>确认密码</td>
            <td><input type="password" name="confirm" id="confirm"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="checkbox" name="check" value="on">同意注册协议</td>
        </tr>
        <tr>
            <td><button>登录</button></td>
            <td></td>
        </tr>
        <?php if(isset($message)){ ?>
        <p><?php echo $message; ?></p>
        <?php }?>
    </table>
    </form>
</body>
</html>