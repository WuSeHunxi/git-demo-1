<?php
	//系统函数
	//1:copy   bool copy  ( string $source  , string $dest)
	
	//function aa(){}   function bb($a){}
	
	//2:bool chown  ( string $filename  , mixed  $user  )
	//带有mixed 任意类型都可以
	
	//3.bool arsort  ( array &$array  [, int $sort_flags  = SORT_REGULAR  ] )
	//带有&  引用赋值
	//[]里面的参数 表示可选
	
	//4.array array_map  ( callable  $callback  , array $arr1  [, array $...  ] )
	//...的参数函数 可以传递任意多个参数 
	//callback回调函数
	
	
	function demo(){
		$args=func_get_args();
		$sum=0;
		for($i=0;$i<count($args);$i++){
			$sum+=$args[$i];
		}
		
		return $sum;
		//print_r($args);
	}
	
	echo demo(1,2,3,4,5,6,7,8,9);



?>






