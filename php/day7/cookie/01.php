<?php

// cookie 通过响应报文的响应头从服务端得到（post）
// cookie 通过请求豹纹的请求头从客户端拿出（get）

// http的一个特点：无状态

// 一个参数是删除cookie

// 两个参数是设置cookie
setcookie('key','value');

// 三个参数是设置时间
setcookie('key2','value2',time()+1 * 24 * 60 * 60);

// 七个参数的cookie
setcookie('ket3','values',time()+1*24*60*60,'','',false,true); // 表示只能通过http访问

setcookie('ket3','values',time()+1*24*60*60,'','',false,false); // 即可以通过http进行访问也可以使用js访问

var_dump($_COOKIE);