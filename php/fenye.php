<?php 
	include "conn.php";
	
	$sql="select count(*) from blog";
	$query=mysqli_query($link,$sql);
	//var_dump($query);
	$arr=mysqli_fetch_array($query);
	echo $arr[0];



?>