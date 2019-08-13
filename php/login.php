<?php
	include "conn.php";
	if(isset($_POST['sub'])){
		$uname=$_POST['uname'];
		$pass=$_POST['pass'];
		
		$sql="select * from user where uname='$uname' and pass='$pass'";
		$query=mysqli_query($link,$sql);
		$result=mysqli_fetch_array($query);
		if($result){
			setcookie('uid',$result['uid'],time()+180);
			setcookie('uname',$result['uname'],time()+180);
			echo "<script>location='index.php'</script>";
			/*
			cookie  存储在本地缓存文件中 不能跨域 session_id
			session 存储在服务器上
			本地要向服务器提交你的私匙*/
		}else{
			echo "<script>location='login.php'</script>";
		}
		
	}

?>

<meta charset="utf-8">
<form action="login.php" method="post">
	用户名:<input type="text" name="uname"><br />
	密码:<input type="password" name="pass"><br />
	<input type="submit" name="sub" value="登录">	

</form>