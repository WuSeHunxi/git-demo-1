<?php


$name="lalala";
$password=$_POST['password'];
if($_POST['name']===$name&&$_POST['password']===$password){
    echo "登陆成功";
}else{
    echo "登陆失败";
}

// echo "Username".$name;
// echo "password".$password;

?>
