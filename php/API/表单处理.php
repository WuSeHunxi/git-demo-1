<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <!-- 
        何时使用get？当表单发送的内容对所有人来说是可见的。
        何时使用post？当表单发送的信息对其他人是不可见的。
        method 默认值是get
        action 默认值是的当前页面 
        表单元素（表单域:input）必须得有name(如果希望被提交)
        必须得有一个提交按钮（input--submit/image  button--submit/image）
    -->
    <form action="11-foo.php" method="get">
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