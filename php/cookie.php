<?php
	//setcookie('name','laoshan');
	setcookie('name','laoshan',time()-1);
	
	if(isset($_COOKIE['name'])){
		echo "true";
	}else{
		echo "false";
	}

?>