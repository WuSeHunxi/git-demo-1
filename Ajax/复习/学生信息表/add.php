<?php

function add_user(){
    if(empty($_GET['name'])){
        $GLOBALS['message']='请输入姓名';
        return;
    }
    if(!(isset($_GET['gender'])&&$_GET['gender']!=='-1')){
        $GLOBALS['message']='请选择性别';
        return;
    }
    if(empty($_GET['birthday'])){
        $GLOBALS['message']='请输入出生日期';
        return;
    }
    $name=$_GET['name'];
    $gender=$_GET['gender'];
    $birthday=$_GET['birthday'];
    if(empty($_FILES['avatar'])){
        $GLOBALS['message']='请选择图片文件';
        return;
    }

    $target='./uploads/'.uniqid().$FILES['avatar']['name'];
    if(!move_uploaded_file($_FILES['avatar']['tmp_name'],$target)){
        $GLOBALS['message']='头像上传失败';
        return;
    }
    $avatar=substr($target,2);

    $connect=mysqli_content('127.0.0.1','root','','test');
    if(!$connect){
        $GLOBALS['message']='连接数据库失败';
        return;
    }

    $query=mysqli_query($connect,'select * from users');
    if(!$query){
        $GLOBALS['message']='数据库查询失败';
        return;
    }

    $affect_rows=mysqli_affect_rows($connect);
    if($affect_rows!==1){
        $GLOBALS['message']="添加数据库失败";
        return;
    }

    header('Location:list.php');

}

if($_SERVER['REQUEST_METHOD']==='GET'){
    add_user();
}

?>