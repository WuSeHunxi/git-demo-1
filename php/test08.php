<?php
	//$arr=array(1,2,3,4);
	
	//索引数组
	/*
	$arr1[]=1;
	$arr1[9]="zhangsan";
	$arr1[]=10;
	$arr1[5]="male";
	$arr1[2]="jian@163.com";
	$arr1[]=array(2,3);
	
	echo "<pre>";
	
	print_r($arr1);
	echo "</pre>";
	
	echo "<br />";*/
	
	//关联数组
	/*
	$arr1['id']=1;
	//$arr1[]=66;
	$arr1['name']="zhangsan";
	$arr1['age']=10;
	$arr1['gender']="male";
	//$arr1[]=77;
	$arr1['mail']="jian@163.com";
	$arr1['other']=array(2,3);
	
	echo "<pre>";
	print_r($arr1);
	echo "</pre>";*/
	
	//.= =>  ? : -> :: @
	
	$arr=array(
		'id'=>1,
		'name'=>'zhangsan',
		'age'=>19,
		'gender'=>'male',
	);
	
	foreach($arr as $key=>$value){
		//echo $key."=>".$value."<br />";
		echo "\$arr[{$key}]"."=>".$value."<br />";
	}
	
	for($i=0;$i<20;$i++){
		$user[$i]=$i;
	}
	
	var_dump($user);
	
	//$arr[id]=>1
	
	
	/*
	foreach(数组变量名 as $key(键名)=>$value(键值)){
		
	}*/
	
	
	
	//int a[] id name pass hits


?>