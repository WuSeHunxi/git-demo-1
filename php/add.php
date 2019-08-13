<?php

	include "conn.php";
	if(isset($_POST['sub'])){
		$title=$_POST['title'];
		$con=$_POST['con'];
		
		//time()  mktime() date()
		//echo $title."||".$con;
		//拼SQL语句
		$sql="insert into blog(bid,title,content,time) values(null,'$title','$con',now())";
		//echo $sql;
		//发送SQL语句到数据库
		$query=mysqli_query($link,$sql);
		if($query){
			echo "<script>location='index.php'</script>";
		}else{
			echo "<script>alert('插入失败')</script>";
			echo "<script>location='add.php'</script>";
		}
	}

?>

<meta charset="utf-8">
<form action="add.php" method="post">
	标题:<input type="text" name="title"><br />
	内容:<textarea rows="10" cols="20" name="con"></textarea><br />
	<input type="submit" name="sub" value="添加文章">
</form>