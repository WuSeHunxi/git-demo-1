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
        //将文本文件中的内容呈现在一个表格中
        //读取文件中的内容  --->包含文本内容的字符串数组
        $contents=file_get_contents('names.txt');
        //按照特定的规则解析文件内容  --->数组
        $data=array();//用来存放的到的数据
            //按照换行拆分
        $lines=explode("\n",$contents); //因为\n是转义字符，所以需要使用双引号，其余情况就是用''即可
            //按照遍历每一行分别解析每一行中的数据
        foreach ($lines as $item ) {
            //使用竖线进行分割
            $cols=explode('|',$item);//将得到的数据存起来，存到一个数组中 
            $data[]=$cols;//添加到数组中
            
        }
        //通过混编的方式将数据呈现在表格中

    ?>
</body>
</html>