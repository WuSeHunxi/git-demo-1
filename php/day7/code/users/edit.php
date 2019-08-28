<?php

// 编辑的话需要从数据库中得到，然后再进行修改，即：先进行的是get请求，在进行的是post请求
// 编辑要实现的就是讲文本域的value值都能够动态修改

// 接收要修改的数据 ID
if (empty($_GET['id'])) {
  exit('<h1>必须传入指定参数</h1>');
}

$id = $_GET['id'];

// 1. 建立连接
$conn = mysqli_connect('localhost', 'root', '', 'test');

if (!$conn) {
  exit('<h1>连接数据库失败</h1>');
}

// 2. 开始查询
// 因为 ID 是唯一的 那么找到第一个满足条件的就不用再继续了 limit 1
$query = mysqli_query($conn, "select * from users where id = {$id} limit 1;");

if (!$query) {
  exit('<h1>查询数据失败</h1>');
}

// 已经查询到的当前数据
$user = mysqli_fetch_assoc($query);

if (!$user) {
  exit('<h1>找不到你要编辑的数据</h1>');
}

function edit () {
  global $user; //php的语法：全局变量在函数中的使用

  // 验证非空
  if (empty($_POST['name'])) {
    $GLOBALS['error_message'] = '请输入姓名';
    return;
  }

  if (!(isset($_POST['gender']) && $_POST['gender'] !== '-1')) {
    $GLOBALS['error_message'] = '请选择性别';
    return;
  }

  if (empty($_POST['birthday'])) {
    $GLOBALS['error_message'] = '请输入日期';
    return;
  }

  // 取值
  $user['name'] = $_POST['name'];
  $user['gender'] = $_POST['gender'];
  $user['birthday'] = $_POST['birthday'];

  // 有上传就修改
  if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
    // 用户上传了新头像 -> 用户希望修改头像
    // pathinfo() 以数组的形式返回文件路径的信息。 
    // PATHINFO_EXTENSION：表示后缀名
    $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
    //                            以字符串的形式返回唯一标识符
    // 移动目标的地址自行创建 
    $target = '../uploads/avatar-' . uniqid() . '.' . $ext;
    if (!move_uploaded_file($_FILES['avatar']['tmp_name'], $target)) {
      $GLOBALS['error_message'] = '上传头像失败';
      return;
    }
    $user['avatar'] = substr($target, 2);
  }

  // $user => 修改过后的信息
  // TODO: 将数据更新回数据库
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
      <!-- 默认头像 -->
      <img src="<?php echo $user['avatar']; ?>" alt="">
      <!-- 重新设置头像 -->
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
          <!-- 性别的默认情况，即option中有select的时候为 男 -->
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
