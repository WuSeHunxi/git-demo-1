<?php

$json=file_get_contents("data.json");
$data=json_decode($json,true);
if(!$data){
    exit("数据文件异常");
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
    <div class="container py-5">
        <h1 class="display-4">音乐列表</h1>
        <hr>
        <div class="mb-3">
            <a href="add.php" class="btn btn-secondary btn-sm">添加</a>
        </div>
        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center">标题</th>
                    <th class="text-center">歌手</th>
                    <th class="text-center">海报</th>
                    <th class="text-center">音乐</th>
                    <th class="text-center">操作</th>
                </tr>
                <thead class="text-center">
                    <?php if(isset($data)){ ?>
                        <?php foreach($data as $item){?>
                        <tr>
                            <td class="align-middle"><?php echo $item['title'];?></td>
                            <td class="align-middle"><?php echo $item['artist'];?></td>
                            <td class="align-middle"><?php echo $item['title'];?></td>
                            <td class="align-middle"><?php echo $item['source'];?></td>
                            <td class="align-middle"><a href="delete.php?id=<?php echo  $item['id']; ?>"></a><?php echo $item['title'];?></td>
                        </tr>
                        <?php } ?>
                    <?php } ?>
                </thead>
            </thead>
        </table>
    </div>
</body>
</html>