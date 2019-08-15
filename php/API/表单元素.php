<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    var_dump($_POST);
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
        <!-- 当表单中使用了radio一定要为相同name的radio设置不同的value，从而让服务端辨别 -->

        性别
        <label ><input type="radio" name="gender" id="" value="male">男</label>
        <label ><input type="radio" name="gender" id="" value="female">女</label>

        <!-- checkbox如果没有被选中的话不会提交(需要设置一个value="true")，不设置value的话如果选中了那就是on -->

        <label><input type="checkbox" name="funs[]" value="football"> 足球</label>
        <label><input type="checkbox" name="funs[]" value="basketball"> 篮球</label>
        <label><input type="checkbox" name="funs[]" value="earth"> 地球</label>
    
        <br>

        <!-- 下拉选择 -->
        <!-- 默认提交的是选中项的value 如果没有value的话则提交的是值 -->

        <select name="status">
            <option value="3">激活</option>
            <option value="2">未激活</option>
            <option value="1">待激活</option>
        </select>

        <button>提交</button>
    </form>
</body>
</html>