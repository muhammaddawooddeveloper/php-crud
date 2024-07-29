<?php

session_start();

session_unset();
header('location: http://localhost/php_project/login.php');

?>