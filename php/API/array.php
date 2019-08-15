<?php

    //数组的处理
    //数组的类型：索引数组 关联数组
    //创建数组的方式：1.array()  2.[]

    $dict=array(
        'hello'=>'你好',
        'hello1'=>'你好'
    );
    var_dump(array_keys($dict)); //--->得到的是数组的键
    echo '<br>';
    var_dump(array_values($dict)); //--->得到的是数组的值 

    echo '<br>';

    //判断数组中是否有某个键
    var_dump(array_key_exists('hello',$dict));

    // isset也可以判断数组中是否有指定的键
    //isset：用于检测变量是否已设置并且非 NULL。
    if(isset($dict['hello'])){
        echo $dict['hello'];  //你好;
    }else{
        echo "没有";
    }

    //empty()：判断变量是否为空
    //empty($dict['foo'])===!isset($dict['foo'])||$dict['foo']==false
    if(empty($dict['foo'])){ //判断数组中的某个键是否为空，当为空的时候执行的是if
        echo '没有';
    }else{
        echo $dict['foo'];
    }

    echo '<br>';

    //数组去重
    $arr1=[1,1,2,4];
    $arr2=array_unique($arr1);
    var_dump($arr2); //---> 1 2 4

    echo '<br>';

    //删除数组中最后一个元素
    $arr=[1,2,3,4];
    echo array_pop($arr); //得到的是删除的那个元素