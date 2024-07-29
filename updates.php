<?php
include("connection.php");

session_start();

$id = $_GET['id'];

$userprofile = $_SESSION['user_name'];

if ($userprofile){

}
else{
    header('location: http://localhost/php_project/login.php');
}


// Handle the form submission
if (isset($_POST["update"])) {
    $id = $_GET['id']; // Ensure you have the ID from the query string
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
    // array to string
    $language = implode(' / ', $lang);

    if ($password === $conpassword) {
        $query = "UPDATE `form` SET `fname`='$fname',`lname`='$lname',`password`='$password',`cpassword`='$conpassword',`gender`='$gender',`email`='$email', `phone`='$phone', `language`='$language', `digree`='$digree', `address`='$address' WHERE id = $id";
        $data = mysqli_query($conn, $query);
        if ($data) {
            header('Location: http://localhost/php_project/display.php');
            exit();
            ?>
            
            <?php
            echo "hy saw";
        } else {
            echo "Error updating record";
        }
    } else {
        echo "Passwords do not match";
    }
}

// Fetch the existing data


$record = "SELECT * FROM form WHERE id = '$id'";
$all = mysqli_query($conn, $record);
$student = mysqli_fetch_assoc($all);

$fname = $student['fname'];
$lname = $student['lname'];
$password = $student['password'];
$cpassword = $student['cpassword'];
$gender = $student['gender'];
$email = $student['email'];
$phone = $student['phone'];
$address = $student['address'];
$lang = $student['language'];
// string into array format
$languge = explode(' / ', $lang);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Update Form</title>
</head>

<body>
    <div class="container">
        <form action="#" method="POST">
            <div class="title">Registration Form</div>
            <div class="form">
                <div class="input_field">
                    <label for="">First Name</label>
                    <input type="text" name="fname" class="input" value="<?php echo $fname; ?>" required>
                </div>
                <div class="input_field">
                    <label for="">Last Name</label>
                    <input type="text" name="lname" class="input" value="<?php echo $lname; ?>" required>
                </div>
                <div class="input_field">
                    <label for="">Password</label>
                    <input type="password" name="password" class="input" value="<?php echo $password; ?>" required>
                </div>
                <div class="input_field">
                    <label for="">Confirm Password</label>
                    <input type="text" class="input" name="conpassword" value="<?php echo $cpassword; ?>" required>
                </div>
                <div class="input_field">
                    <label for="">Gender</label>
                    <select name="gender" class="selectbox" required>
                        <option value="no select">Select</option>
                        <option value="male" <?php if ($gender == 'male') echo "selected"; ?>>Male</option>
                        <option value="female" <?php if ($gender == 'female') echo "selected"; ?>>Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="input_field">
                    <label for="">Email</label>
                    <input type="text" class="input" name="email" value="<?php echo $email; ?>" required>
                </div>
                <div class="input_field">
                    <label for="">Phone</label>
                    <input type="text" class="input" name="phone" value="<?php echo $phone; ?>" required>
                </div>
                <div class="input_field">
                    <label for="">Degree</label>
                    <input type="radio" name="digree" value="CSS" <?php if ($student['digree'] == 'CSS') echo 'checked'; ?> required><label>CSS</label>
                    <input type="radio" name="digree" value="IT" <?php if ($student['digree'] == 'IT') echo 'checked'; ?> required><label>IT</label>
                    <input type="radio" name="digree" value="WEB" <?php if ($student['digree'] == 'WEB') echo 'checked'; ?> required><label>WEB</label>
                    <input type="radio" name="digree" value="Others" <?php if ($student['digree'] == 'others') echo 'checked'; ?> required><label>Others</label>
                </div>
                <div class="input_field">
                    <label for="">Language</label>
                    <input type="checkbox" name="language[]" value="urdu" <?php if (in_array('urdu', $languge)) echo 'checked'; ?>><label>Urdu</label>
                    <input type="checkbox" name="language[]" value="english" <?php if (in_array('english', $languge)) echo 'checked'; ?>><label>English</label>
                    <input type="checkbox" name="language[]" value="hindi" <?php if (in_array('hindi', $languge)) echo 'checked'; ?>><label>Hindi</label>
                    <input type="checkbox" name="language[]" value="others" <?php if (in_array('others', $languge)) echo 'checked'; ?>><label>Others</label>
                </div>
                <div class="input_field">
                    <label for="address">Address</label>
                    <textarea name="address" class="textarea"><?php echo $address; ?></textarea>
                </div>
                <div class="input_field terms">
                    <label class="check">
                        <input type="checkbox" required>
                        <span class="checkmark"></span>
                    </label>
                    <p>Agree</p>
                </div>
                <div class="input_field">
                    <input name="update" type="submit" value="Register" class="btns">
                </div>
            </div>
        </form>
    </div>
</body>

</html>
