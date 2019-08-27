<?php


// 接收用户提交的数据，并保存到文件中
function add_update(){

    $data=array();
    $data['id']=uniqid();

    //提交标题
    if(empty($_POST['title'])){
        $GLOBALS['error']='请填写标题';
        return;
    }

    //提交歌手
    if(empty($_POST['artist'])){
        $GLOBALS['artist']='请输入歌手名';
        return;
    }

    // 成功接收
    $data['title']=$_POST['title'];
    $data['artist']=$_POST['artist'];

    // 检测文件

    // 检查海报文件
    if(empty($_FILES['images'])){
      $GLOBALS['error']='请正常使用表单';
      return;
    }

    $images=$_FILES['images'];
    // 因为要保存的海报文件是多个，所以需要用户组来保存，而音乐文件时单独的，不需要数组来保存
    $data['images']=array(); // 用来保存海报文件的路径

    for($i=0;$i<count($images['name']);$i++){
      // 判断能否上传成功
      if($images['error'][$i]===UPLOAD_ERR_OK){
        $GLOBALS['error']='上传海报文件失败';
        return;
      }

      // 文件类型的校验
      if(strpos($images['type'][$i],'images/')!==0){
        $GLOBALS['error']='上传文件的格式错误';
        return;
      }

      // 文件大小判断
      if($images['size'][$i]>1*1024*1024){
        $GLOBALS['error']='上传的文件过大';
        return;
      }

      // 移动文件
      $dest='./uploads/'.uniqid().iconv('GBK','UTF-8',$images['name']);
      if(!move_uploaded_file($images['tmp_name'][$i],$dest)){
        $GLOBALS['error']='上传文件海报失败';
        return;
      }

      $data['images'][]=iconv('GBK','UTF-8',substr($dest,2));
    }


    // 音乐文件
    if(empty($_FILES('source'))){
        $GLOBALS['error']='请正常使用表单';
        return;
    }
    $source=$_FILES['source'];

    // 判断文件是否上传成功
    if($source['error']!==UPLOAD_ERR_OK){
        $GLOBALS['error']='上传音乐文件失败';
        return;
    }

    // 判断文件类型
    $source_allowed_types=array('audio/mp3','audio/wma');
    // 判断文件类型是否在这个数组中
    if(!array_in($source['type'],$source_allowed_types)){
      $GLOBALS['error']='文件类型上传失败';
      return;
    }

    // 判断文件大小
    if($source['size']<1*1024*1024){
        $GLOBALS['error']='上传的文件音乐过小';
        return;
    }
    if($source['size']>10*1024*1024){
        $GLOBALS['error']='上传的文件音乐过大';
        return;
    }

    // 移动文件
    $target='./uploads/'.uniqid().'-'.iconv('UTF-8','GBK',$source['name']);
    if(!move_uploaded_file($source['tmp_name'],$target)){
        $GLOBALS['error']='上传音乐文件失败';
        return;
    }

    //上传成功，将数据保存起来
    $data['source']=icovn('GBK','UTF-8',substr($target,2));

    //替换数据
    $json=file_get_contents('data.json'); //打开文件
    $old=json_decode($json,true); //得到原数据
    array_push($old,$data);
    $new_json=json_encode($old);
    file_put_contents('data.json',$new_json);

    // 跳转
    header('Location:list.php');
}

if($_POST['REQUEST_METHOD']==='POST'){
    add_update();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>添加新音乐</title>
  <link rel="stylesheet" href="bootstrap.css">
</head>
<body>
  <div class="container py-5">
    <h1 class="display-4">添加新音乐</h1>
    <hr>

    <?php if (isset($error_message)): ?>
    <div class="alert alert-danger">
      <?php echo $error_message; ?>
    </div>
    <?php endif ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="title">标题</label>
        <input type="text" class="form-control" id="title" name="title">
      </div>
      <div class="form-group">
        <label for="artist">歌手</label>
        <input type="text" class="form-control" id="artist" name="artist">
      </div>
      <div class="form-group">
        <label for="images">海报</label>
        <!-- multiple 可以让一个文件域多选 -->
        <input type="file" class="form-control" id="images" name="images[]" accept="image/*" multiple>
      </div>
      <div class="form-group">
        <label for="source">音乐</label>
        <!-- accept 可以设置两种值分别为  MIME Type / 文件扩展名 -->
        <input type="file" class="form-control" id="source" name="source" accept="audio/*">
      </div>
      <button class="btn btn-primary btn-block">保存</button>
    </form>
  </div>
</body>
</html>
