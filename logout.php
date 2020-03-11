<?php
require "classes.php";
$db = new Database;
$_SESSION["username"] = NULL;
$_SESSION["user_password"] = NULL;
$_SESSION["user_email"] = NULL;
$_SESSION["user_phone"] = NULL;
$_SESSION["user_type"] = NULL;
header("Location: index.php");
?>