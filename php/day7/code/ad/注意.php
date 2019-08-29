<?php

// 在隐藏小广告这个案例中，有两种解决方法

// 第一种：在close.php页面中 设置完之后在跳转回原来的页面
//  setcookie('hide_ad', '1');  
//  header('Location: index.php'); 



// 第二种：直接在index.php页面中进行参数设置和判断，因为在访问和点击删除的操作时都是在同一个页面进行的

