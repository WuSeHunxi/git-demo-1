<?php
	$n=5;
	$arr=array();
	$w=0;
	
	while($w<$n){
		$num=rand(1,9);
		$arr[]=$num;
		$arr1=array_unique($arr);
		$w=count($arr1);
	}
	
	/*
	
	for($i=0;$i<$n;$i++){
		$num=rand(1,9);
		$arr[$i]=$num;
		if(count($arr) != count(array_unique($arr))){
			$i--;
		}
	}*/
	
	echo "<pre>";
	print_r($arr1);
	echo "</pre>";
	
	


?>