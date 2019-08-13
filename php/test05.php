<?php
	if(isset($_POST['sub'])){
		$oval=$_POST['cq'];
		//echo $oval;
		$rnum=rand(0,2);
		if($oval==$rnum){
			echo "平局";
		}else if($oval-$rnum=-1){
			echo "输";
		}
	}


?>

<meta charset="utf-8">
<form action="test05.php" method="post">
请出拳
<select name="cq" id="s1" onclick=change(this)>
	<option value=0>拳头</option>
	<option value=1>布</option>
	<option value=2>剪刀</option>
</select>
<img src="cq.jpg" id="image">
<input type="submit" name="sub" value="提交">
</form>

<script>
	function change(obj){
		var val=obj.value;
		var oImg=document.getElementById('image');
		if(val==0){
			oImg.src="qt.jpg";
		}else if(val==1){
			oImg.src="b.jpg";
		}else if(val==2){
			oImg.src="jz.jpg";
		}else{
			oImg.src="cq.jpg";
		}
	}
</script>







