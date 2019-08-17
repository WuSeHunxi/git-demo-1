<?php

//并不是每一项都需要错误提示
$nameErr=$emailErr=$genderErr=$websiteErr="";
$name=$email=$gender=$comment=$website="";

function getback(){
    if(empty($_POST['name'])){
        $GLOBALS['nameErr']='Name is required';
        return ;
    }

    if(empty($_POST['email'])){
        $GLOBALS['emailErr']='Email is required';
    }

    if(empty($_POST['website'])){
        $GLOBALS['website']='';
    }

    if(empty($_POST['comment'])){
        $GLOBALS['comment']='';
    }

    if(empty($_POST['gender'])){
        $GLOBALS['genderErr']='Gender is required';
        return ;
    }
    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    $website = test_input($_POST["website"]);
    $comment = test_input($_POST["comment"]);
    $gender = test_input($_POST["gender"]);
}

if($_SERVER['REQUEST_METHOD']==='POST'){
    getback();
}

function test_input($data){
    $data=trim($data);
    $data=stripcslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        Name: <input type="text" name="name">
        <span class="error">*<?php echo $nameErr;?></span>
        <br>
        E-mail:
        <input type="text" name="email">
        <span class="error" style="color:red">*<?php echo $emailErr;?></span>
        <br>
        Website:
        <input type="text" name="website">
        <span class="error"><?php echo $websiteErr;?></span>
        <br>
        <label>Comment: <textarea name="comment" cols="40" rows="5"></textarea></label>
        <br>
        Gender:
        <input type="radio" name="gender" value="female">Female
        <input type="radio" name="gender" value="male">Male
        <span class="error">*<?php echo $genderErr;?></span>
        <br>
        <input type="submit" value="Submit" name="submit">
    </form>
</body>
</html>