<?php

session_start();

// echo  $_SESSION['user_name'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>displaye all record</title>
    <style>
        a{
            list-style: none;
            text-decoration: none;
            cursor: pointer;
        }
        input{
            border-radius: 5px;
            padding: 4px;
            cursor: pointer;
            border: none;
            font-size: medium;
            margin: 5px;
        }
        #btn1{
            background-color: green;
        }
        #btn2{
            background-color: red;
        }
    </style>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
</body>
</html>
<?php
include("connection.php");

$userprofile = $_SESSION['user_name'];
if ($userprofile){

}
else{
    header('location: http://localhost/php_project/login.php');
}
// limit of record per page
$limit = 2;
// $page = $_GET['page'];
// if page is not set, default page 1;
if(isset($_GET['page'])){
    $page = $_GET['page'];
}
else{
    $page = "1";
}
$offset = ($page - 1) * $limit;

$sql = "SELECT * FROM form limit $offset , $limit";
$data = mysqli_query($conn, $sql);
$total = mysqli_num_rows($data);
// echo $page;
if ($total != 0) {

?>

    <center>
    <a href="form.php"> <input type="submit" value="add new" ></input></a>

        <table border="1" class="table table-bordered" >
            <tr  style="background-color: blue; font-size:22px;">
                <th>ID</th>
                <th>image</th>
                <th>first name</th>
                <th>last name</th>
                <th>gender</th>
                <th>language</th>
                <th>email</th>
                <th>phone</th>
                <th>Gender</th>
                <th>operation</th>
            </tr>
        <?php
        while ($result = mysqli_fetch_assoc($data)) {
            echo " 
         <tr>
             <td>$result[id]</td>
             <td><img src='".$result['std_image']."'  width='60px'> </td>
             <td>$result[fname]</td>
             <td>$result[lname]</td>
             <td>$result[gender]</td>
             <td>$result[language]</td>
             <td>$result[email]</td>
             <td>$result[phone]</td>
             <td>$result[gender]</td>
             <td>
              <a href='delete.php?id=$result[id]'><input type='submit' value='delete' id='btn2' onclick = 'return checkdelete()' ></a>
             <a href='updates.php?id=$result[id]'> <input type='submit' value='update' id='btn1' ></a> 
             </td>
         </tr>";
        }
        
    } else {
        echo "Error";
    }
        ?>
        </table>
        <?php
        // pagination
        $sql1 = "SELECT * FROM form";
        $result= mysqli_query($conn, $sql1);
        if(mysqli_num_rows($result)){
            $total_record = mysqli_num_rows($result);
            $total_pages = ceil($total_record / $limit);
            // echo $total_pages;

            // pagination button
            // pre btn
            if($page > 1){
                echo "<a href='display.php?page=".($page - 1)."'><button class='btn btn-primary me-1'>Pre</button></a>";
            }
            for($i=1; $i<=$total_pages; $i++){
                if($i == $page){
                    $active = "btn-success";
                }
                else{
                    $active = "";
                }
               echo "<a href=display.php?page=$i><button  class='btn btn-primary me-1 $active '>$i</button> </a>";
            }
            // next btn
            if($page < $total_pages){
                echo "<a href='display.php?page=".($page + 1)."'><button class='btn btn-primary me-1'>next</button></a>";
            }
        }
        // end pagination
        ?>
        <br>
        <a href="logout.php">
           <input type="submit" value="Logout" style="background-color: blue;" >
        </a>

    </center>


    <script>
        // var id = $result['id'];
        function checkdelete() {
           return confirm('Are you sure you want to delete ');
        }
        
    </script>