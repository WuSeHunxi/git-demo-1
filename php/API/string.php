<?php
    //获取字符串长度
    $str="llll";
    echo strlen($str);

    //字符串中都是全局函数

    echo '<br>';
    //获取中文字符串的长度
    echo strlen('你好'); //strlen()只能获取英文字母的长度，无法获取中文字符长度

    //php中的宽字符集api，这些API不在内置函数中，而是在一个模块中，模块成员必须通过配置文件载入模块后才能使用
    echo mb_strlen('你好');


    //宽字符集配置文件:
        // 1. 在 PHP 的安装目录去创建一个 php.in
        // 2. extension_dir
        // 3. ;extension=php_mbstring.dll
        // 4. 默认Apache加载的php.ini 是去 Windows目录找的
        // 5. 可以通过 Apache 的配置文件修改默认加载路径 PHPIniDir

    phpinfo();
?>