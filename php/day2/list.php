<?php
$contents=file_get_contents("names.txt");
// var_dump($contents);
$lines = explode("\n", $contents);
// var_dump($lines);
foreach ($lines as $item ) {
    if(!$item){
        continue;
    }
    $cols=explode("|",$item);
    $data[]=$cols;
    // var_dump($data);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <tr>
        <thead>
            <th>编号</th>
            <th>姓名</th>
            <th>年龄</th>
            <th>邮箱</th>
            <th>网址</th>
        </thead>
        <tbody>
            <?php foreach ($data as $item ) { ?>
                <tr>
                    <?php foreach ($item as $col ) {
                        $col=trim($col);
                        if(strpos($col,"http://")===0){?>
                        <td><a href="<?php echo strtolower($col);?>"><?php echo substr($col,7);?></a></td>
                        <?php }else{?>
                            <td><?php echo $col;?></td>   
                        <?php }?> 
                    <?php }?>
                </tr>                
            <?php }?>
        </tbody>
    </tr>
</body>
</html>