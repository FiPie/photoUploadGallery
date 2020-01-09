<?php

session_start();

// Here we check if the user is logged in and if so she/he will be redirected back to index
if ((isset($_SESSION['logged']) == TRUE) && ($_SESSION['logged'] == TRUE)) {
    $message = "You are already logged as : <b>$userName</b>! Logout before account switch.";
    $_SESSION["promptMessage"] = $message;
    $_SESSION["msg_type"] = "info";
    header('Location: ../index.php');
    exit();
}

// We check if the userID and password admited by the user are correct IT IS HARDCODED here for the sake of simplicity of this project but normaly we would store it in dataBase
if (isset($_POST['userName'], $_POST['userPswd'])) {
    $userName = test_input(filter_input(INPUT_POST, "userName", FILTER_SANITIZE_SPECIAL_CHARS));
    $userPswd = test_input(filter_input(INPUT_POST, "userPswd", FILTER_SANITIZE_SPECIAL_CHARS));
    if ($userName == 'admin' && $userPswd == 'password') {

        $_SESSION["logged"] = TRUE;
        $_SESSION["userName"] = $userName;
        $_SESSION["isAdmin"] = $isAdmin;

        $message = "You have successfully logged in as : <b>$userName</b>";
        $_SESSION["promptMessage"] = $message;
        $_SESSION["msg_type"] = "success";
        header('Location: ../index.php');
        exit();
    } else {
        $message = "Wrong User ID or associated password incorrect, for : <b>$userName</b>";
        $_SESSION["promptMessage"] = $message;
        $_SESSION["msg_type"] = "danger";
        header('Location: ../views/loginForm.php');
        exit();
    }
} else {
    $message = "You have to fill userID and password fields in order to log in. <b>Don't mess around with this code:)</b>";
    $_SESSION["promptMessage"] = $message;
    $_SESSION["msg_type"] = "danger";
    header('Location: ../views/loginForm.php');
    exit();
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
