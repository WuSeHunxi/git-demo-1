<?php

    //接收用户提交的数据，将其保存到文件中
    //1.接收并校验表单数据
    //2.持久化(保存到文件中)
    //3.响应(服务端的反馈)

    //接收用户提交的数据，保存到文件中

    //empty用来判断是否为空
    if(empty($_POST['username'])){
        //这种情况是 没有提交 或者 用户名为空--->一个empty就可以都完成判断
        $GLOBALS '请输入用户名';
    }else{
            if(empty($_POST['password'])){
            $GLOBALS '请输入密码';
        }else{
            if(empty($_POST['confirm'])){
                $GLOBALS '请输入确认密码';
            }else{
                if($_POST['password']!=$_POST['confirm']){
                    $GLOBALS '两次输入的密码不一致';
                }else{
                    //isset用来判断是否定义
                    if(!(isset($_POST['agree'])&&$_POST['agree']==='on')){
                        $GLOBALS '必须同意注册协议';
                    }else{
                        //所有条件都OK
                        $username=$_POST['username'];
                        $password=$_POST['password'];

                        //将用户名 密码保存到文本文件中
                        file_put_contents('users.txt',$username.'|'.$password. "\n", FILE_APPEND);
                        $GLOBALS='注册成功';
                    }
                }
            }
        }
        
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
        <table border="1">
        <tr>
            <!-- 必须加label：用来解释说明input -->
            <td><label for="username">用户名</label></td>
            <td><input type="text" name="username" id="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>"></td>
        </tr>
        <tr>
            <td><label for="password">密码</label></td>
            <td><input type="password" name="password" id="password"></td>
        </tr>
        <tr>
            <td><label for="confirm">确认密码</label></td>
            <td><input type="password" name="confirm" id="confirm"></td>
        </tr>
        <tr>
            <td></td>
            <td><label><input type="checkbox" name="agree" value="on"> 同意注册协议</label></td>
        </tr>
        <?php if (isset($message)):?>
        <tr>
            <td></td>
            <td><?php echo $message; ?></td>
        </tr>
        <?php endif ?>
        <tr>
            <td></td>
            <td><button>注册</button></td>
        </tr>
        </table>
    </form>
</body>
</html>