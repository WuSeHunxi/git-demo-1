<?php
	table(2,3);
	function table($rows,$cols){
		echo "<table align='center' border='1' width='800'>";
		echo "<caption><h3>sleep</h3></caption>";
		$color="";
		for($i=1;$i<=$rows;$i++){
			if($i%2==0){
				$color="red";
			}else{
				$color="green";
			}
			echo "<tr bgColor=".$color.">";
			for($j=1;$j<=$cols;$j++){
				echo "<td>".$j."</td>";
			}
			
			
			echo "</tr>";
		}
		
		echo "</table>";
	}
	
	
	table(4,5);
	
	


?>