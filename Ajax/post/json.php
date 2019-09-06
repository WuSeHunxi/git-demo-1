<?php

$zhangsan = array('id'=>1,'name' => 'ahahahah', 'age' => 18);

// $array=(
//     array(
//         "name"=>"lalal",
//         "id"=>1,
//         "age"=>18
//     ),
//     array(
//         "name"=>"hhhh",
//         "id"=>2,
//         "age"=>14
//     ),
//     array(
//         "name"=>"mamama",
//         "id"=>2,
//         "age"=>10
//     )
//     );

// 于情于理都应该设置 application/json
// header('Content-Type: application/json');

echo json_encode($zhangsan);
