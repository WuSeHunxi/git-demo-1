<?php

// cookie 通过响应报文的响应头从服务端得到（post）
// cookie 通过请求豹纹的请求头从客户端拿出（get）

// 如果设置了响应头，那么服务端就会发出一个cookie，但是是否保存要看客户端的

// header()函数在设置同一个键时会覆盖，没有办法设置多个cookie
header('Set-Cookie:foo=bar');
// header('Set-Cookie:foo1=bar2');

// http的一个特点：无状态

// setcookie是专门设置cookie的函数


// 两个参数是设置cookie
setcookie('key','value');

setcookie('key'); // 一个参数是删除cookie

// 三个参数是设置cookie的过期时间
setcookie('key2','value2',time()+1 * 24 * 60 * 60);
setcookie('key2'); // 删除key2

// 七个参数的cookie
setcookie('ket3','values',time()+1*24*60*60,'','',false,true); // 表示只能通过http访问

setcookie('ket3','values',time()+1*24*60*60,'','',false,false); // 即可以通过http进行访问也可以使用js访问

var_dump($_COOKIE);

session_start();
$_SESSION['key']='value';

// path：只要在文件所在的根目录下的cookie就能够被访问
// domain：设置访问域名，可以自设置参数字符串

// var date=new Date; 当获取日期不加参数的时候括号可加可不加
