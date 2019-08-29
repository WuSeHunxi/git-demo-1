<?php

// 防止超时的一个方法可以使用参数
// 在PHP中判断是否设置了这个action参数
if (isset($_GET['action']) && $_GET['action'] === 'close-ad') {
  // 不想看到广告
  setcookie('hide_ad', '1'); // 此时只是设置了cookie，但是没有取出cookie的值，在HTML中需要用到，因此需要下面那行代码

  // ==='1' 表示取出cookie标志
  $_COOKIE['hide_ad'] === '1'; // 这行必须得有，当设置完cookie之后
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <style>
    .ad {
      height: 200px;
      background-color: #ff0;
    }

    .ad a {
      float: right;
    }
  </style>
</head>
<body>
  <!-- cookie的值设置为1，等于1就是存在的意思 -->
  <?php if (empty($_COOKIE['hide_ad']) || $_COOKIE['hide_ad'] !== '1'): ?>
  <div class="ad">
    <!-- <a href="close.php">不再显示</a> -->
    <!-- 设置一个参数 -->
    <a href="index.php?action=close-ad">不再显示</a>
  </div>
  <?php endif ?>
</body>
</html>
