<?php
    //字符串
    $txt='hello'; //单引号 
    $txt2="world"; //双引号
    //字符串的连接：'.'
    $txt3=$txt.' '.$txt2;
    echo $txt3.'<br>';
    //访问字符串中的字符(利用索引)
    echo $txt3[4];
    //得到字符串的长度
    echo strlen($txt3);
    //找到子串的位置
    echo strpos($txt3,'he');
?>