<?php
var_dump($_GET);//用于接收URL地址中提交的数据(一般是GET参数)

var_dump($_REQUEST);//$_REQUEST=$_GET+$_POST

//用于接收请求体中提交的数据(一般是post)
var_dump($_POST);//因为是get请求所以POST请求不到