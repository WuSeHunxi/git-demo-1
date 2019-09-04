<?php

function upload_success(){
    if(empty($_FILES['file'])){
        $GLOBALS['message']='文件上传失败';
        return;
    }
    $file=$_FILES['file'];
    $target='./uploads/'.uniqid().$file['name'];
    if(!move_uploaded_file($file['tmp_name'],$target)){
        $GLOBALS['message']='文件上传失败';
        return;
    }
    
}

if($_SERVER['REQUEST_METHOD']==='POST'){
    upload_success();
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
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="mulitype/form-data">
        <input type="file" name="file" id="file">
    </form>
</body>
</html>
