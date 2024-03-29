<?php

// $_GET['num'] 拿到的是请求报文里面的东西
if (empty($_COOKIE['num']) || empty($_GET['num'])) {
  // 在游戏开始时执行生成随机数（每get请求一次就会生成一个随机数，一次游戏只能够有一个随机数）
  $num = rand(0, 100);  // 产生的随机数是一个变量
  // 不能存在文件中，因为有可能同时有多个用户使用，这样会造成生成的随机数文件发生覆盖（其他用户把当前这个用户正在猜的数据覆盖）的情况
  // file_put_contents('number.txt', $num);
  // 因为 cookie 是每个用户自己保存，每个用户存的是属于自己的要猜的数字
  setcookie('num', $num); // 给响应报文设置了cookie值
} else {
  // 用户来试一试 猜了一次
  // 还是通过cookie记录之前输入的内容
  $count = empty($_COOKIE['count']) ? 0 : (int)$_COOKIE['count'];

  if ($count < 10) {
    // 对比用户提交的数字和用户 Cookie 中存放的被猜的数字
    // $_GET['num'] => 用户试一试的数字
    // $_COOKIE['num'] => 被猜的数字

    // 通过URL获取得到
    $result = (int)$_GET['num'] - (int)$_COOKIE['num'];
    if ($result == 0) {
      $message = '猜对了';
      // 重新开始，删除cookie即可
      setcookie('num');
      setcookie('count');
    } elseif ($result > 0) {
      $message = '太大了';
    } else {
      $message = '太小了';
    }

    setcookie('count', $count + 1); // 每请求一次都需要把count的+1
  } else {
    // 游戏结束
    $message = 'looooooooooooow!';

    // 删除cookie
    setcookie('num');
    setcookie('count');
  }
}

// ============== 判断 请求方式 辨别是第几次请求 ====================================
// if ($_SERVER['REQUEST_METHOD'] === 'GET') {
//   // 在游戏开始时执行生成随机数
//   $num = rand(0, 100);
//   // 不能存在文件中，因为有可能同时有多个用户使用
//   // file_put_contents('number.txt', $num);
//   // 因为 cookie 是每个用户自己保存，每个用户存的是属于自己的要猜的数字
//   setcookie('num', $num);
// } else {
//   // 用户来试一试
//   // 对比用户提交的数字和用户 Cookie 中存放的被猜的数字
//   // $_POST['num'] => 用户试一试的数字
//   // $_COOKIE['num'] => 被猜的数字
//   $result = (int)$_POST['num'] - (int)$_COOKIE['num']; // 转成数字的形式
//   if ($result == 0) {
//     echo '猜对了';
//   } elseif ($result > 0) {
//     echo '太大了';
//   } else {
//     echo '太小了';
//   }
// }


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>猜数字</title>
  <style>
    body {
      padding: 100px 0;
      background-color: #2b3b49;
      color: #fff;
      text-align: center;
      font-size: 2.5em;
    }
    input {
      padding: 5px 20px;
      height: 50px;
      background-color: #3b4b59;
      border: 1px solid #c0c0c0;
      box-sizing: border-box;
      color: #fff;
      font-size: 20px;
    }
    button {
      padding: 5px 20px;
      height: 50px;
      font-size: 16px;
    }
  </style>
</head>
<body>
  <h1>猜数字游戏</h1>
  <p>Hi，我已经准备了一个0~100的数字，你需要在仅有的10机会之内猜对它。</p>
  <?php if (isset($message)): ?>
  <p><?php echo $message; ?></p>
  <?php endif ?>
  <form action="index.php" method="get">
    <input type="number" min="0" max="100" name="num" placeholder="随便猜">
    <button type="submit">试一试</button>
  </form>
</body>
</html>
