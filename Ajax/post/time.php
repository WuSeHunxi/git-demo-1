
<?php
$username=$_POST["name"];
$password=$_POST["password"];
echo "用户名: ".$username;
echo "<br>";
echo "密码: ".$password;



// function login(){
//     if(empty($_POST['name'])){
//         $GLOBALS['message']="请输入姓名";
//         return;
//     }
//     if(empty($_POST['possword'])){
//         $GLOBALS['message']='请输入密码';
//         return;
//     }
//     $name=$_POST['name'];
//     $password=$_POST['password'];
// }

// if($_SERVER['REQUEST_METHOD']==='POST'){
//     login();
// }

?>