<?php

// 连接数据库
$connect=mysqli_connect('127.0.0.1','root','','test');

// 检查连接横岗与否
if(!$connect){
    $GLOBALS['error']='数据库连接失败';
}

$query=mysqli_query($connect,'select * from test;');

if(!$query){
    $GLOBALS['error']='查询失败';
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
    <h1 class="heading">用户管理 <a class="btn btn-link btn-sm" href="add.php">添加</a></h1>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>头像</th>
          <th>姓名</th>
          <th>性别</th>
          <th>年龄</th>
          <th class="text-center" width="140">操作</th>
        </tr>
      </thead>
      <tbody>
      <?php while($item=mysqli_fetch_assoc($query)){ ?>
      </tr>
      <td><?php echo $item['name'];?></td>
      <td><img src="<?php echo $item['avatar'];?>"></td>
      <td><?php echo $item['gender']==== 0 ? '♀' : '♂';?></td>
      <td><?php echo $item['birtday'];?></td>
      <td>
        <a class="btn btn-info btn-sm" href="edit.php?id=<?php echo $item['id']; ?>">编辑</a>
        <a class="btn btn-danger btn-sm" href="delete.php?id=<?php echo $item['id'];?>">删除</a>
      </td>
      </tr>
      </tbody>
    </table>
    <ul class="pagination justify-content-center">
      <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
    </ul>
  </main>
</body>
</html>