<?php

$zhangsan = array(
    array('id'=>1,'name' => 'ahahahah', 'age' => 18),
    array('id'=>2,'name' => 'ahahahah', 'age' => 13),
    array('id'=>3,'name' => 'ahahahah', 'age' => 14)
);


foreach ($zhangsan as $key) {
    foreach ($key as $col) {
        if($_GET['id']==2){
            $data=json_encode($key);
        }
    }
}

// echo json_encode($zhangsan);
