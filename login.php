<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> lohin page  </title>
    <link rel="stylesheet" href="login_style.css">
    <style>
        hr{
            border: 2px solid gray;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="center">
        <form action="#" class="form" method="post" enctype="multipart/form-data" autocomplete="off">
            <h2>Login</h2>
            <hr style="margin-top: 20px;">
            <input type="text" name="useremail" class="" placeholder="Email">
            <input type="password" name="password" class="" placeholder="password">
            <div class="forgetpass" onclick = 'check()' style="margin-top: 10px;" ><a href="#" >forget password</a></div>
            <input type="submit" name="login" value="login" class="btn">
            <div class="forgetpass"  style="margin-top: 10px;" >click here for   <a href="form.php" class="enter" >  Registration</a></div>

        </form>
    </div>
</body>
</html>

<?php

include("connection.php");
session_start();

if(isset($_POST['login'])){
    $useremail = $_POST['useremail'];
    $pwd = $_POST['password'];

    $query = "SELECT * FROM form WHERE email = '$useremail' && password = '$pwd' ";
    $data = mysqli_query($conn , $query);
    $total = mysqli_num_rows($data);

    // echo $total;
    if($total > 0){
        // start here
        $_SESSION['user_name'] = $useremail ;
        header('location: http://localhost/php_project/display.php');
    }
    else{
        
        echo "<script> alert('please enter correct Email or password') </script>";
    }
}
?>

<script>
    function check(){
       alert("bhai jan password yad kr k ao");
    }
</script>