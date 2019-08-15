<?php
/**
 * 1.请求方式不同
 * 2.传参方式不同：get用url传参  post用请求体传参（更安全）
 * get不能用来发送密码或其他敏感信息，此时必须要使用post
 */
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
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
        <table border="1">
            <tr>
                <td>用户名</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>密码</td>
                <td><input type="text" name="password"></td>
            </tr>
            <tr>
                <td></td>
                <!-- type="image"的时候也表示表单提交，表示的是图片按钮提交 -->
                <td><input type="submit" value="登录"></td>
            </tr>
        </table>
    </form>
</body>
</html>