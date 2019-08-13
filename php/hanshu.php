<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        //如果想要访问全局变量的话需要用global声明
        $arr='hahah';
        function foo(){
            global $arr;
            echo $arr;
            $str='sssp';
            function f(){
                global $str;
                echo $str; //什么都拿不到，因为str不是全局变量，使用global不好使
            }
            f();
        }
        foo();
    ?>
</body>
</html>