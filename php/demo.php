<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <!-- 输出：echo print
          echo：可以同时出输出多个（一般是简单的变量，像对象就不行）
          print：只能够输出一个
          var_dump('xxx')：一般应与调试的时候，输出的是像对象这样的复杂的数据 -->
    <?php
        echo 'vaulue','bbb';
        print 'ooo';
        var_dump('ll');
    ?>

    <!-- 普通模式 -->
    <h1><?php echo 'kkk';  ?></h1>

    <!-- 混写模式 -->
    <?php if (true): ?>
        <p>hhh</p>
    <?php else: ?>
        <p>ooo</p>
    <?php endif ?>


    <?php
        //线性数组
        $arr=[1,2,3,4];
        foreach($arr as $value){
            echo $value.' ';
        }

        //关联数组
        $assoc=['name'=>'kk','age'=>19];
        foreach ($assoc as $key => $value) {
            echo $key.' '.$value.' ';
        }

        
    ?>
</body>
</html>