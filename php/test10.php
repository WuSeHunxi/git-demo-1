<?php
	$arr_all=array();
	for($i=1;$i<=5;$i++){
		echo "第".$i."注";
		$arr_all[$i]=array();
		for($j=0;$j<7;$j++){
			$random=mt_rand(0,30);
			if(in_array($random,$arr_all[$i])){
				$j--;
				continue;
			}else{
				$arr_all[$i][$j]=$random;
				if($j<7){
					echo $arr_all[$i][$j].",";
				}else{
					echo $arr_all[$i][$j];
				}
				
			}
		}
		
		echo "<br />";
	}

	/*
	$user=array(
		'id'=>1,
		'name'=>'zhangsan',
		'age'=>10,
		'gender'=>'male',
	);
	
	
	//list函数  
	$str="192.168.0.1";
	
	list($a,$b,$c,$d)=explode('.',$str);
	echo $a."||".$b."||".$c."||".$d;*/
	
	//192.168.0.1 
	
	/*
	while($arr=each($user)){
		echo $arr[0]."=>".$arr[1]."<br />";
	}*/
	
	//next() prev() end() reset() each()
	/*
	$a=each($user);
	next($user);
	next($user);
	$b=reset($user);
	
	$a=each($user);
	$b=next($user);
	
	print_r($b);*/
	
	//print_r($a);
	
	


?>