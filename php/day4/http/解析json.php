<?php

$contents=file_get_contents('strorage.json');
//$contents是JSON格式的字符串


//json_decode() JSON的解码方式
//解析成标准格式的对象，是php中类型为stdClass的对象
//但是如果在json_decode()中加入第二个参数（true）的话，那就可以解析成关联数组了
$arr=json_decode($contents);
var_dump($arr);

$arr1=json_decode($contents,true);
var_dump($arr1);