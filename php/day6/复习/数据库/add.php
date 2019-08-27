<?php

function add_etst(){

    // 为空的判断
    if(empty($_POST['name'])){
        $GLOBALS['error_message']='请输入姓名';
        return;
    }
    if(!(isset($_POST['gender'])&&$_POST['gender']=='-1')){
        $GLOBALS['error_message']='请输入性别';
        return;
    }
    if(empty($_POST['birthday'])){
        $GLOBALS['error_message']='请输入生日';
        return;
    }

    // 成功取值
    $name=$_POST['name'];
    $gender=$_POST['gender'];
    $birthday=$_POST['birthday'];


    // 文件的判断
    if(empty($_FILES['avatar'])){
        $GLOBALS['error_message']='请上传头像';
        return;
    }

    if($_FILES['error']===UPLOAD_ERR_OK){
        $GLOBALS['errro_message']='上传文件失败';
        return;
    }

    // 移动
    // 后缀   $_FILE['avatar']得到的是文件整体的参数
    $ext=pathinfo($_FILES['avatar']['name'],PATHINFO_EXTENSION);
    //目标地址
    $target='./uploads/avatar-'.uniqid().'.'.$ext;

    if(!move_uploaded_file($_FILES['avatar']['tmp_name'],$target)){
        $GLOBALS['error_message']='上传头像失败';
        return;
    }

    // 得到绝对路径
    $avatar=substr($target,2);

    // 连接数据库
    $connect=mysqli_connect('127.0.0.1','root','','test');
    if(!$connect){
        $GLOBALS['error_message']='连接数据库失败';
        return;
    }

    // 开始查询
    $query=mysqli_query($connect,'select * from users;');

    if(!$query){
        $GLOBALS['error_message']='查询过程失败';
        return;
    }

    // 跳转
    header('Location:index.php');
}

if($_POST['REQUEST_METHOD']==='POST'){
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
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="form-group">
        <label for="avatar">头像</label>
        <input type="file" class="form-control" id="avatar" name="avatar">
      </div>
      <div class="form-group">
        <label for="name">姓名</label>
        <input type="text" class="form-control" id="name" name="name">
      </div>
      <div class="form-group">
        <label for="gender">性别</label>
        <select class="form-control" id="gender" name="gender">
          <option value="-1">请选择性别</option>
          <option value="1">男</option>
          <option value="0">女</option>
        </select>
      </div>
      <div class="form-group">
        <label for="birthday">生日</label>
        <input type="date" class="form-control" id="birthday" name="birthday">
      </div>
      <button class="btn btn-primary">保存</button>
    </form>
  </main>
</body>
</html>
