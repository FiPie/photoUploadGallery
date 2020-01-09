<?php

session_start();

$userName = $_SESSION['userName'];
$message = "You have successfully logged out of the <b>$userName</b> account. Thank you for your valuable contribution!";
$_SESSION["promptMessage"] = $message;
$_SESSION["msg_type"] = "info";
// we clean the session from user related data
unset($_SESSION['logged']);
unset($_SESSION['userName']);
unset($_SESSION['isAdmin']);

header('Location: ../index.php');
