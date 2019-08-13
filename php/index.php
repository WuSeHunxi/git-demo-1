

<a href="add.php">添加文章</a>&nbsp; 
<span>
	<?php
		if($_COOKIE['uid']){
			echo $_COOKIE['uname']." 已登录 ";
			echo "<a href='ulogin.php'>注销登录</a>";
		}else{
			echo "<a href='login.php'>未登录</a>";
		}
	?>
	
	
</span>

<form action="index.php" method="get">
	<input type="text" name="search">&nbsp;&nbsp;
	<input type="submit" name="sub" value="搜索">
</form>

<?php
	include "conn.php";
	
	if(isset($_GET['search'])){
		$se=$_GET['search'];
		$w="title like '%$se%'";
	}else{
		$w=1;
	}
	
	$sql="select * from blog where $w order by bid desc ";
	$query=mysqli_query($link,$sql);
	
	
	
	while($arr=mysqli_fetch_array($query)){
?>
<h3><a href="all.php?bid=<?php echo $arr['bid'];?>"><?php echo $arr['title']?></a> | <a href="del.php?bid=<?php echo $arr['bid']?>">删除</a> |<a href="edit.php?bid=<?php echo $arr['bid']?>">修改</a></h3>
<li><?php echo $arr['time']?></li>
<p><?php echo iconv_substr($arr['content'],0,4);?>...</p>
<hr />
<?php
	//substr
	}
?>