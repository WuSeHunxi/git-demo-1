<?php

$contents=file_get_contents("name.txt");
$lines=explode("\n",$contents);
foreach ($lines as $item) {
    if(!$item) continue;
    $cols=explode("|",$item);
    $data[]=$cols;
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
    <table>
        <thead>
        <tr>
            <th>编号</th>
            <th>姓名</th>
            <th>年龄</th>
            <th>邮箱</th>
            <th>网址</th>
        </tr>
        </thead>
    <tbody>
        <?php foreach ($data as $item ) {
            foreach ($item as $col ) {
                $col=trim($col);
                if(strpos($col,'http://')===0){?>
                    <td><a href="<?php echo strtolower($col); ?>"<?php echo substr($col,7); ?>></a></td>
                <?php }else{ ?>
                    <td><?php echo  $col; ?></td>
            <?php }
            }
        }?>

    </tbody>
    </table>
</body>
</html>