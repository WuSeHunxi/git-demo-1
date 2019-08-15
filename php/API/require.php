<?php

//应用公共文件 ===> 类似于CSS的import导入文件

require 'config.php';
echo SYSTEM_NAME;

require 'config.php';
echo DB_HOST;  //会警告，不能够重复定义

echo '<br>';

//require 用于载入在当前脚本中载入别的脚本文件，每调用一次时都会载入对应的文件

//require_once 如果之前载入过，不再执行（只执行一次）
//由于类似于定义常量定义函数这样的操作不能执行多次，所以require_once更加适合载入文件
require_once 'config.php';
echo SYSTEM_NAME;

echo '<br>';

require_once 'config.php'; //之前载入过，因此不再执行
echo SYSTEM_NAME;
