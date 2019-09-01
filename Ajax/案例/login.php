<?php

if(empty($_POST["name"])||empty($_POST["password"])){
    exit("请输入用户名和密码");
}

if($_POST["name"]=="haha"&&$_POST["password"]==123){
   exit("登陆成功");
}else{
    exit("登陆失败");
}