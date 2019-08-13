<?php
	if(isset($_POST['sub'])){
		$sfile=$_FILES['sfile'];
		
		
		
		$name=$sfile['name'];
		$arr=explode('.',$name);
		//echo $arr[1];
		$len=count($arr)-1;
		//echo $arr[$len];
		$newarr=array('txt','md','exe');
		$flag=true;
		for($i=0;$i<count($newarr);$i++){
			if($newarr[$i]==$arr[$len]){
				$flag=false;
			}
		}
		
		
		if($flag==false){
			echo "<script>alert('上传文件非法')</script>";
		}else{
			//echo "文件OK";
			$imgname=time();
			$img=$imgname.'.'.$arr[$len];
			//echo $img;
			
			本地流信息  网络源信息
			
			
			$baseurl=getcwd();
			//echo $baseurl;
			//die();
			$bb=move_uploaded_file($sfile['tmp_name'],$baseurl.'\upload'.$img);
			if($bb){
				echo "success";
			}else{
				echo "fail";
			}
			
			
			
			//C:\xampp\tmp\php8690.tmp
			//C:\xampp\htdocs\pswu\day2\upload\xxx.gif
			//md5(md5(pass).$salt)
		}
		
		
		
		//php77D6.tmp  -->1.jpg
		
		//（1）要把图片上传到指定文件夹
		//（2）上传图片改名 
		//（3）过滤文件后缀名
		
		
	}

?>

<meta charset="utf-8">
<form action="test06.php" method="post" enctype="multipart/form-data">
	上传文件:<input type="file" name="sfile">
	      <input type="file" name="sfile1">
	<input type="submit" name="sub" value="上传">
</form>










