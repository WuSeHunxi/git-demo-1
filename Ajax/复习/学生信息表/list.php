<?php

$content=mysqli_content('127.0.0.1','root','','test');
if(!$content){
    exit("数据库连接失败");
}

$query=mysqli_query($content,'select * from users;');
if(!$query){
    exit("数据库读取失败");
}

// $data=mysqli_fetch_assoc($content);


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
    <tbody>
        <?php while ($item=mysqli_fetch_assoc($query)) {?>
           <tr>
               <th><?php echo $item['id']; ?></th>
               <td><img src="<?php echo $item['avatar']; ?>" alt="<?php echo $item['naeme'];?>"></td>
               <td><?php echo $item['name']; ?></td>
               <td><?php echo $item['gender']; ?></td>
               <td><?php echo $item['birthday']; ?></td>
               <td>
                    <a href="add.php?id="<?php echo $item['id']; ?>>编辑</a>
                    <a href="delete.php?id="<?php echo $item['id']; ?>>删除</a>
                </td>
           </tr> 
        <?php } ?>
    </tbody>
</body>
</html>