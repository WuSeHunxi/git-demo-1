<?php


function login(){
    if(empty($_GET['name'])){
        $GLOBALS['message']="请输入姓名";
        return;
    }
    if(empty($_GET['possword'])){
        $GLOBALS['message']='请输入密码';
        return;
    }
    $name=$_GTE['name'];
    $password=$_GET['password'];
}

if($_SERVER['REQUEST_METHOD']==='GET'){
    login();
}