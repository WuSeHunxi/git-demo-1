<?php
	$arr=array(1,2,3,4,-5,-9,8,7,-1);
	$arr1=array_filter($arr,"myfun");
	
	function myfun($n){
		if($n<0){
			return true;
		}else{
			return false;
		}
	}
	
	echo "<pre>";
	print_r($arr1);
	echo "</pre>";
	
	
	$arr2=array(
		'id'=>1,
		'name'=>'laoshan',
	);
	
	foreach($arr2 as $key=>$val){
		$key=$val;
		echo $key."<br />";
	}
	
	echo "<br />";
	
	$lamp=array(
		"os"=>"linux",
		"wb"=>"apache",
		"db"=>"mysql",
		"language"=>"php",
	);
	
	$arr=array_map("myfun1",$lamp);
	
	function myfun1($n){
		return "lao".$n."shan";
	}
	
	print_r($arr);
	
	echo "<br />";
	
	$lp=array(
		"os"=>"linux",
		"wb"=>"apache",
		"db"=>"mysql",
		"language"=>"php",
	);
	
	
	//$lamp $lp两个数组是否相同
	$arrnew=array_map('myfun2',$lamp,$lp);
	function myfun2($n,$t){
		if($n==$t){
			return 'same';
		}else{
			return 'diff';
		}
	}
	
	print_r($arrnew);
	
	echo "<br />";
	
	
	$arr=array(1,2,11,22);
	arsort($arr);
	
	print_r($arr);
	//192.168.0.1~192.168.0.23
	//177.78.0.9~177.78.1.91
	
	
	//print_r($arr2);
	
	//print_r(array_flip($arr2)); 
	
	
	
	

?>