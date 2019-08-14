<?php

$arr1=[1,2,3,4];
$arr2=array(
    '1'=>'hello',
    '2'=>'world'
);
var_dump($arr1);
echo '<br>';
var_dump($arr2);


echo '<br>';

//长度
echo count($arr1);

echo '<br>';

//添加 删除

array_push($arr1,2);
var_dump($arr1);

echo '<br>';

echo '删除的最后一项是：'.array_pop($arr1).' ';
var_dump($arr1);