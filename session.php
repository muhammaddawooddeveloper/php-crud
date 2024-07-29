<?php

session_start();

$_SESSION['username']='muhammad dawood';

echo $_SESSION['username'];

session_unset();

?>