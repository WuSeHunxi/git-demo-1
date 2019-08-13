<?php
	$info=array(
		"user"=>array(
			array(1,"laoshan",18,"male"),
			array(2,"laoxie",10,"male"),
			array(3,"xiaod",30,"female"),
		),
		"score"=>array(
			array(1,60,90,13),
			array(2,50,80,20),
			array(3,90,98,87),
		)
	);
	
	
	foreach($info as $key=>$val){
	echo "<table align='center' border='1' width='800'>";
	
		echo "<caption><h3>".$key."</h3></caption>";
		foreach($val as $v){
			echo "<tr>";
			foreach($v as $row){
				echo "<td>".$row."</td>";
			}
			
			echo "</tr>";
		}
	echo "</table>";
	}


	/*
	$user=array(
		array(1,"laoshan",18,"male"),
		array(2,"laoxie",10,"male"),
		array(3,"xiaod",30,"female"),
	);
	
	echo "<pre>";
	print_r($user);
	echo "</pre>";
	
	unset($user[1][1]);
	
	echo "<br />";
	
	echo "<pre>";
	print_r($user);
	echo "</pre>";*/
	
	


?>