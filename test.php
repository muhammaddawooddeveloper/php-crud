<?php
session_start();

// Check if the session variable is set before accessing it
// if (isset($_SESSION['username'])) {
    echo "Session variable 'username' is: " . $_SESSION['username'];
// } else {
    // echo "Session variable 'username' is not set.";
// }

session_unset();
?>
