<?php
	//类型：int float string bool /  array object  /  resource  null
	//mysql(MyISM  Innodb)  phpinfo(mysqli pdo)
	//php常用函数 isset()  settype  gettype
	//js const 
	//define('la', 13)
	
	/*
	$a=10;
	var_dump($a);
	//int ->string
	echo "<br />";
	$b='$a';   // ""  ''
	var_dump($b);
	echo "<br />";*/
	
	//string -> int bool float
	/*
	if(isset($_GET['sub'])){
		$num=$_GET['num'];
		$aa=settype($num,'int');
		if($aa==true){
			var_dump($num);
		}
		
		//select * from user where name='$name' and pass='$pass'
		//var_dump($num);
		//die();
		//echo "123";
		//$a=(bool)$num;
		//var_dump($a);
	}*/
	
	//string -> array  'abcdef'  '2017-05-07'  '192.168.0.1'
	$str="abcdef";  //js array/string  .length  php  
	$arr=array();
	//php array->count string->strlen
	for($i=0;$i<strlen($str);$i++){
		$arr[$i]=$str[$i];
	}
	
	echo "<pre>";
	print_r($arr);
	echo "</pre>";
	
	
	echo "<br />";
	//php 输出函数 echo var_dump print_r  直接输出 源码输出
	
	//array->string  
	$arr=array('l','a','o');
	$str="";
	for($i=0;$i<count($arr);$i++){
		$str.=$arr[$i];
		//php 拼字符串用.
	}
	
	echo $str;
	
	//js  string->object  object->string  序列化 反序列化
	//serialize  unserialize 
	//string -> json  json_encode  json_decode  h5  parse stringfy
	//var aa="{'id':1,'name':'laoshan'}";
	//eval('('+aa+')')
	
	//php虽然可以嵌入script  php的变量在php内部不能传递给js进行运算
	//$a=234;
	//echo "<script>var b=$a+1</script>";
	
	
	
	
	

?>

<meta charset="utf-8">
<form action="test01.php">
	数字:<input type="text" name="num">
	<input type="submit" name="sub" value="提交">
</form>

<script>
	alert(b);
</script>







