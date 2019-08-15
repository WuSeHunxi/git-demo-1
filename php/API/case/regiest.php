<?php

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
        <?php if (isset($message)): ?>
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