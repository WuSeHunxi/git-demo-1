<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <!-- require的缺点：一旦载入的文件不存在就会报一个致命错误，当前文件就不会再往下执 -->
    <?php
        include 'aside.php'; 
        //include：多次在入会重复执行，但是include_once不会
        /**
         * 当文件需要多次载入的时候需要用到的是include，而且她一般和html用在一起,
         * 单独的想在php中载入脚本文件的话需要用到的是require_once(一般情况下)。
         */
        //include：载入文件不存在时不会报错(但是会有警告，文件依然会执行)
        include 'aside1.php';
        echo 'hahha';// 没有受到影响，依然可以执行
    ?>
</body>
</html>