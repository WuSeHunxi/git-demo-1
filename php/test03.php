<?php

	if(isset($_GET['name'])){
		$name=$_GET['name'];
		switch($name){
			case 'add':
				echo "<script>alert('添加文章')</script>";
		}
	}


?>

<meta charset="utf-8">
<a href="test03.php?name=add">添加文章</a>
<a href="test03.php?name=del">删除文章</a>
<a href="test03.php?name=update">修改文章</a>
<a href="test03.php?name=select">查询文章</a>