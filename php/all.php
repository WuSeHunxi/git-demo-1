<?php
	include "conn.php";
	
	//给访问率加1
	if(isset($_GET['bid'])){
		$bid=$_GET['bid'];
		$sql="update blog set hits=hits+1 where bid='$bid'";
		
		$query=mysqli_query($link,$sql);
		if($query){
			//显示当前页
			$sql="select * from blog where bid='$bid'";
			$query=mysqli_query($link,$sql);
			$arr=mysqli_fetch_array($query);
		}
	}
	
	

?>

<h3>标题:<?php echo $arr['title']?></h3>
<li>时间:<?php echo $arr['time']?></li>
<span>访问率:<?php echo $arr['hits']?></span>
<p>内容:<?php echo $arr['content']?></p>
<hr />
