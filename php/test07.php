<?php
	if(isset($_POST['sub'])){
		$sfile=$_FILES['sfile'];
		//$sfile1=$_FILES['sfile1'];
		
		echo "<pre>";
		var_dump($sfile);
		echo "</pre>";
		
		
	}


?>
<meta charset="utf-8">
<form action="test07.php" method="post" enctype="multipart/form-data">
	上传文件:<input type="file" name="sfile[]">
	      <input type="file" name="sfile[]">
	<input type="submit" name="sub" value="上传">
</form>