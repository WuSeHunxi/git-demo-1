<?php
    
    //时间处理函数
    echo time(); //--->返回的是时间戳，秒数

    //格式化时间戳，可以接受两个参数：（时间格式,时间戳）

    //修改时区
    date_default_timezone_set('PRC');
    //得到的是默认的时间戳，是格林威治时间,修改的方法：修改时区 修改配置文件
    echo date('Y-m-d H:i:s',time()); //默认情况第二个参数就是当前时间

    echo '<br>';

    // 格式化时间
    $str='2018-08-15 08:18:55';
    $timestep=strtotime($str);//将有格式的时间字符串转化成时间戳
    echo date('Y年m月d日 H:i:s',$timestep);

    echo '<br>';

    //在当前情况下换行显示时分秒  利用转义字符使用<br>换行符
    echo date('Y年m月d日<b\r>H:i:s',$timestep);//只能使用单引号，如果使用了双引号的话那就回让\r在一起直接表示回车符的意思
