<?php
include("connection.php");


if (isset($_POST["register"])) {


    $filename = $_FILES['uploadfile']['name'];
    $tempname = $_FILES["uploadfile"]['tmp_name'];
    $folder = "img/".$filename;
    // echo $folder;
    move_uploaded_file($tempname , $folder);
//    echo "<img src='$folder' alt=''  height='100px' >";


    // $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $password = $_POST['password'];
    $conpassword = $_POST['conpassword'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $digree = $_POST['digree'];
    $lang = $_POST['language'];
    // echo $lang;a\
    // array to string conversion;
    $lang1 = implode(' / ' , $lang);
    // echo $digree;
    // echo $lang1;
    if (
        $fname != '' && $lname != '' && $password != '' && $conpassword != '' && $gender != '' && $email != '' &&
        $phone != '' && $address != ''
    ) {
        if ($password === $conpassword) {
            $query = "INSERT INTO form (std_image , fname , lname , password , cpassword , gender, email ,phone , address , digree , language) VALUES ('$folder', '$fname', '$lname' , '$password' , '$conpassword' , '$gender' , '$email' , '$phone' , '$address' ,'$digree' , '$lang1')";
            $data = mysqli_query($conn, $query);
            if ($data) {
                header('location: http://localhost/php_project/display.php');
            } else {
                echo "Error";
            }
        } else {
            echo '<script>alert("password will not be same ")</script>';
        }
    } 
    else {
        echo "please enter empty field";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
    <style>
        .btns{
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="#" method="POST" enctype="multipart/form-data">
            <div class="title">
                registration form
            </div>
            <div class="form">
            <div class="input_field" style="width: 100%;border:'none';">
                    <label for="">image</label>
                    <input type="file" name="uploadfile" class="inut" required style="width: 100%; ">
                </div>
                <div class="input_field">
                    <label for="">first name</label>
                    <input type="text" name="fname" class="input" required>
                </div>
                <div class="input_field">
                    <label for="">last name</label>
                    <input type="text" name="lname" class="input" required>
                </div>
                <div class="input_field">
                    <label for="">password</label>
                    <input type="password" name="password" class="input" required>
                </div>
                <div class="input_field">
                    <label for="">confirm password</label>
                    <input type="password" class="input" name="conpassword" required autocomplete="off">
                </div>
                <div class="input_field">
                    <label for="">gender</label>
                    <select name="gender" id="" class="selectbox" required>
                        <option value="no select">select</option>
                        <option value="male">male</option>
                        <option value="female">Female</option>
                        <option value="others">other</option>
                    </select>
                </div>
                <div class="input_field">
                    <label for="">Email</label>
                    <input type="email" class="input" name="email" required autocomplete="off">
                </div>
                <div class=" input_field">
                    <label for="">Phone</label>
                    <input name="phone" type="text" class="input" required>
                </div>
                <div class=" input_field">
                    <label for="">digree</label>
                    <input type="radio" name="digree"  value="CSS" required><label >CSS</label>
                    <input type="radio" name="digree" value="IT"  required><label  >IT</label>
                    <input type="radio" name="digree" value="WEB" required><label  >WEB</label>
                    <input type="radio" name="digree" value="Othrs" required><label >Othres</label>
                </div>
                <div class=" input_field">
                    <label for="">language</label>
                    <input type="checkbox" name="language[]" value="urdu" ><label >urdu</label>
                    <input type="checkbox" name="language[]" value="english"  ><label  >english</label>
                    <input type="checkbox" name="language[]" value="hindi" ><label  >hindi</label>
                    <input type="checkbox" name="language[]" value="Othrs" ><label >Othres</label>
                </div>
                <div class="input_field">
                    <label for="">address</label>
                    <textarea name="address" class="textarea" required></textarea>
                </div>
                <div class="input_field terms">
                    <label for="" class="check">
                        <input type="checkbox" required>
                        <span class="checkmark"></span>
                    </label>
                    <p>agree with terms and condition</p>
                </div>
                <div class="input_field">
                    <!-- <label for="">addres</label> -->
                    <input name="register" type="submit" value="Register" class="btns">
                </div>
            </div>
        </form>
    </div>
</body>

</html>
