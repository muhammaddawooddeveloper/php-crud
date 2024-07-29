

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post" enctype="multipart/form-data" >
        <input type="file" name="uploadfile"  >
        <input type="submit" name="submit" value="upload" >
    </form>
</body>
</html>

<?php


$host = 'localhost';
$username = 'root';
$password = '';
$database = 'crud-operation';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if(isset($_POST['submit'])){
    $filename = $_FILES['uploadfile']['name'];
    $tempname = $_FILES["uploadfile"]['tmp_name'];

    $folder = "img/".$filename;
    echo $folder;
    move_uploaded_file($tempname , $folder);

   echo "<img src='$folder' alt=''  height='100px' >";
}

?>

