<?php

if(empty($_GET['id'])){
    exit('<h1>必须要传入指定的参数</h1>');
}

$id=$_GET['id'];

$connect=mysqli_connect('127.0.0.1','root','','test');
if(!$connect){
    $GLOBALS['error_message']='连接数据库失败';
    return;
}

// 开始查询
$query=mysqli_query($connect,"select * from users where id={$id};");

if(!$query){
    $GLOBALS['error_message']='数据库查询失败';
    return ;
}

function edit(){
    global $query;
    if(empty($_POST['name'])){
        $GLOBALS['error_message']='请输入姓名';
        return;
    }

    // 性别判断
    if(!(asset($_POST['gender'])&&$_POST['gender']!=='-1')){
        $GLOBALS['error_message']='请输入性别';
        return;
    }

    if(empty($_POST['birthday'])){
        $GLOBALS['error_message']='请选择你的生日';
        return ;
    }

    // 取值
    $query['name']=$_POST['name'];
    $query['gender']=$_POST['gender'];
    $query['birthday']=$_POST['birthday'];

    // 文件上传
    if($_FILES['avatar']['error']===UPLOAD_ERR_OK){
      $ext=pathinfo($_FILES['avatar']['name'],PATHINFO_EXTENSION);
      $target='./uploads/avatar-'.uniqid().'.'.$ext;
      if(!move_uploaded_file($_FILES['tmp_name'],$target)){
        $GLOBALS['error_message']='上传头像失败';
        return;
      }
      $query['avatar']=substr($target,2);
    }

    $data=[];
    $old=file_get_contents('data.json');
    $json=json_decode($data,true);
    array_push($json,$data);
    $new_json=json_encode($json);
    file_put_contents('data.json',$new_json);

}

if($_POST['REQUEST_METHOD']==='POST'){
    edit();
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
    <!-- 页面题目 -->
    <h1 class="heading">编辑“<?php echo $user['name']; ?>”</h1>
    <!-- 表单 -->                     <!-- 表单进行了get请求 -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $user['id']; ?>" method="post" enctype="multipart/form-data">
      <!-- <input type="hidden" id="id" value="<?php echo $user['id']; ?>"> -->
      <img src="<?php echo $user['avatar']; ?>" alt="">
      <div class="form-group">
        <label for="avatar">头像</label>
        <!-- 文件域不能设置默认值 -->
        <input type="file" class="form-control" id="avatar" name="avatar">
      </div>
      <div class="form-group">
        <label for="name">姓名</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo $user['name']; ?>">
      </div>
      <div class="form-group">
        <label for="gender">性别</label>
        <select class="form-control" id="gender" name="gender">
          <option value="-1">请选择性别</option>
          <!-- 特殊的输入框的默认值一般用select来表示 -->        <!-- 为了保持正常的距离，需要加上空格 -->
          <option value="1"<?php echo $user['gender'] === '1' ? ' selected': ''; ?>>男</option>
          <option value="0"<?php echo $user['gender'] === '0' ? ' selected': ''; ?>>女</option>
        </select>
      </div>
      <div class="form-group">
        <label for="birthday">生日</label>
        <input type="date" class="form-control" id="birthday" name="birthday" value="<?php echo $user['birthday']; ?>">
      </div>
      <button class="btn btn-primary">保存</button>
    </form>
  </main>
</body>
</html>
