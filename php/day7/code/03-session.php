<?php

// 给当前用户找一个属于他的箱子（没有箱子开箱子，有箱子找已有的箱子）
session_start();

// Session对象是在客户端第一次请求服务器的时候创建的。Session保存在服务器端。为了获得更高的存取速度，服务器一般把Session放在内存里。每个用户都会有一个独立的Session。这样完美可以解决我们的需求


// 设置session
$_SESSION['key1'] = 'value1';
