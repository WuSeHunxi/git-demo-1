<?php

function add_test(){

    //检验非空
    // 姓名
    if(empty($_POST['name'])){
        $GLOBALS['error']='请输入姓名';
        return ;
    }

    //性别
    if(!(isset($_POST['gender'])&&$_POST['gender']!=='-1')){
        $GLOBALS['error']='请选择性别';
        return;
    }

    //生日
    if(empty($_POST['birthday'])){
        $GLOBALS['error']='请输入出生日期';
        return;
    }

    // 检验成功
    $name=$_POST['name'];
    $gender=$_POST['gender'];
    $birthday=$_POST['birthday'];


    // 检验文件
    if(empty($_FILES['avatar'])){
        $GLOBALS['error']='请上传头像';
        return;
    }

    if($_FILES['avatar']['error']===UPLOAD_ERR_OK){
        $GLOBALS['error']='上传成功';
    }

    $ext=pathinfo($_FILES['avatar']['name'],PATHINFO_EXTENSION);
    $target='./upload/avatar-'.uniqid().'.'.$ext;

    // 移动
    if(!move_uploaded_file($_FILE['avatar']['tmp_name'],$target)){
        $GLOBALS['error']='上传图片失败';
        return;
    }

    $avatar=substr($target,2);


    // 连接数据库
    $connect=mysqli_query('127.0.0.1','root','','test');
    if(!$connect){
        $GLOBALS['error']='数据库连接失败';
        return;
    }

    // 查询
    $query=mysqli_query($connect,"inset into users values(null,'{$name}', {$gender}, '{$birthday}', '{$avatar}');");

    if(!$query){
        $GLOBALS['error']='数据库查询过程失败';
        return;
    }

    $affected_rows=mysqli_affected_rows($connect);

    if($affected_rows!==1){
        $GLOBALS['error']="数据库添加失败";
        return;
    }

    // 响应头响应跳转
    header('Location:index.php');

}


// 判断是否为post提交方式
if($_SERVER['REQUEST_METHOD']==='POST'){
    add_test();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>XXX管理系统</title>
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <nav class="navbar navbar-expand navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">XXX管理系统</a>
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.html">用户管理</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">商品管理</a>
      </li>
    </ul>
  </nav>
  <main class="container">
    <h1 class="heading">添加用户</h1>
    <?php if (isset($error_message)): ?>
    <div class="alert alert-warning">
      <?php echo $error_message; ?>
    </div>
    <?php endif ?>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="form-group">
            <label for="avatar">头像</label>
            <input type="file" class="form-control" id="avatar" name="avatar">
        </div>
        <div class="form-group">
            <label for="name">姓名</label>
            <input type="text" class="from-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="gender">性别</label>
            <select name="gender" id="gender"  class="form-control">
                <option value="-1">请选择性别</option>
                <option value="1">男</option>
                <option value="0">女</option>
            </select>
        </div>
        <div class="form-group">
            <label for="birthday">生日</label>
            <input type="text" class="form-control" id="birthday" name="birthday">
        </div>
        <button class="btn btn-primary">保存</button>
    </form>
  </main>
</body>
</html>