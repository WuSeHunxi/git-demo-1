<?php

function upload(){
    if(!isset($_FILES['avatar'])){
        $GLOBALS['message']='你玩我呢？';
        return;
    }    

    $avatar=$_FILES['avatar'];

    echo $avatar['error'];

    if($avatar['error']!==UPLOAD_ERR_OK){
        $GLOBALS['message']='上传失败';
        return ;
    }

    $source=$avatar['tmp_name'];
    $target='./uploads/'.$avatar['name'];
    $move=move_uploaded_file($source,$target);
    if(!$move){
        $GLOBALS['message']='上传失败';
        return ;
    }
}
if($_SERVER["REQUEST_METHOD"]==="POST"){
    upload();
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
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="avatar">
        <button>上传</button>
        <?php if(isset($message)): ?>
        <p><?php echo $message; ?></p>
        <?php endif ?>
    </form>
</body>
</html>