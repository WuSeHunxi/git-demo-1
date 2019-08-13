<?php
	//http  get post put delete
	//全局变量 $_POST  $_GET  $_COOKIE  $_SESSION $_SERVER -->array
	// [REQUEST_URI] => /pswu/day2/test02.php
	
	//form ajax curl -->post
	//url form a标签 ajax
	
	//http://www.xxx.com/1.php
	//jpg  css  js
	//<img src="http://img.163.com/1.jpg">
	
	/*
	echo "<pre>";
	print_r($_SERVER);
	echo "</pre>";*/
	
	//laoshan laoxie  wd=laoshan%2dlaoxie
	//http://localhost/s?wd=javascript
	
	$str=$_SERVER['REQUEST_URI'];
	$arr=explode("?", $str);
	//var_dump($arr);
	$len=count($arr)-1;
	echo $arr[$len];
	
	echo "<br />";
	//echo $str;
	
	//js underscore
	
	$str="0123456789abcdefghijklmnopqrstuvwxyz";
	$temp=strlen($str)-1;
	$rstr="";
	for($i=0;$i<8;$i++){
		$rstr.=substr($str,rand(0,$temp),1);
	}
	
	echo $rstr;
	


?>











