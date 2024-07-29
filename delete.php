<?php

session_start();
$profile = $_SESSION['user_name'];
if ($profile){

}
else{
    header('Location: http://localhost/php_project/login.php');
}
include("connection.php");
$id = $_GET["id"];
$dl = "DELETE FROM form WHERE id = $id ";
$delete = mysqli_query($conn, $dl);

if ($delete) {
    header("Location: http://localhost/php_project/display.php");
    exit();
}

// echo $_GET['id'];
