
<table border='1' cellspacing="0" width="500">
	<tr>
		<th>ID</th>
		<th>NAME</th>
	</tr>
<?php
	//插入120条数据
	/*
	for($i=0;$i<120;$i++){
		$name="name".$i;
		$sql="insert into fenye1(id,name) values(null,'$name')";
		$query=mysqli_query($link,$sql);
	}
	
	if($query){
		echo "true";
	}else{
		echo "false";
	}*/
	http://localhost/fenye.php?p=1
	//分页  每页显示多少条 $pagenum=10 当前页 $page = $_GET['p']  
	//每页第一条索引的值是多少  (当前页-1)*$pagenum
	//  limit 20,10
	
	
	
	include "conn.php";
	
	//定义用到的变量
	$page=$_GET['p']<1 ? 1 : $_GET['p'];
	$pagenum=10;
	$showpage=5;
	$pageoffset=($showpage-1)/2;
	
	//展示列表数据
	$sql="select * from fenye1 limit ".(($page-1)*$pagenum).",$pagenum";
	
	$query=mysqli_query($link,$sql);
	
	
	while($arr=mysqli_fetch_array($query)){

?>
<tr>
	<td><?php echo $arr['id']?></td>
	<td><?php echo $arr['name']?></td>
</tr>

<?php
	}	
?>
</table>

<?php
	//输出总条数
	$sql="select count(*) from fenye1";
	$query=mysqli_query($link,$sql);
	$arr=mysqli_fetch_array($query);
	$all=$arr[0];
	
	//echo $page_all;
	//输出总页数
	$page_all=ceil($all/$pagenum);
	
	//echo $page_all;
	
	$str="";
	$spage=$page-1;
	$xpage=$page+1;
	$str.="<a href='".$_SERVER['PHPSELF']."?p=1'>首页</a>";
	if($page>1){
		$str.="<a href='".$_SERVER['PHPSELF']."?p=$spage'>上一页</a>";
	}else{
		$str.="<a href='javascript:void(0)' disabled = 'true' style='opacity: 0.2'>上一页</a>";
	}
	
	
	$start=1;
	$end=$page_all;  
	if($page_all>$showpage){
		if($page>$pageoffset+1){
			$str.="...";
		}
		
		if($page>$pageoffset){
			$start=$page-$pageoffset;
			$end=$page_all>$page+$pageoffset ? $page+$pageoffset : $page_all;
			
		}else{
			$start=1;
			$end=$page_all>$showpage ? $showpage : $page_all;
		}
		
		if($page+$pageoffset > $page_all){
			$start=$start-($page+$pageoffset-$page_all);
			$end=$page_all;
		}
		
		
	}
	
	for($i=$start;$i<=$end;$i++){
		$str.="<a href='".$_SERVER['PHPSELF']."?p=$i'>$i</a>";
	}
	if($page_all>$showpage && $page_all>$page+$pageoffset){
		$str.="...";
	}
	
	
	
	
	
	//12345  ...56789...  89101112
	
	if($page<$page_all){
		$str.="<a href='".$_SERVER['PHPSELF']."?p=$xpage'>下一页</a>";
	}else{
		$str.="<a href='javascript:void(0)' disabled = 'true' style='opacity: 0.2'>下一页</a>";
	}
	
	$str.="<a href='".$_SERVER['PHPSELF']."?p=$page_all'>末页</a>";
	
	echo $str;
?>


每页的内容
1:通过$_GET['p'] 获取到页数  页数<=0   页数 大于 总页数

2:当前页的第一个索引是几  ($page-1)*$pagenum

3:select * from fenye limit (($page-1)*$pagenum),$pagenum

----------------------------------------------------------
分页A标签条码
1：总条数  count(*)  
2:总页数 ceil(总条数/$pagenum)
3:显示的标签数 $pageshow
4:显示偏移量 $pageoffset=($pageshow-1)/2
5:判断条件  $page大于$pageoffset+1  $page大于$pageoffset 
         $page小于$pageoffset  $page+$pageoffset大于count(*)
         //$page_all>$showpage && $page_all>$page+$pageoffset



















