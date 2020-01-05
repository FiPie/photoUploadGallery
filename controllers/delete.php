<?php

session_start();

if ((isset($_SESSION['logged']) == FALSE) && ($_SESSION['logged'] == FALSE)) {
    $message = "You need to <b>log in</b> in order to delete images from the collection.";
        $_SESSION["promptMessage"] = $message;
        $_SESSION["msg_type"] = "info";
    header('Location: ../views/thumbnailGallery.php');
    exit();
}

if (isset($_GET["del"]) && $_GET["del"] != '') {
    $file = filter_input(INPUT_GET, "del");
    if (file_exists("../images/$file")) {
        unlink("../images/$file");
        $message = "The image file: <b>$file</b> was successfully deleted!";
        $_SESSION["promptMessage"] = $message;
        $_SESSION["msg_type"] = "success";
    } else {
        $message = "The file you selected for deletion does not seem to exist";
        $_SESSION["promptMessage"] = $message;
        $_SESSION["msg_type"] = "danger";
    }
} else {
    $message = "You have to <b>select</b> a file in order to delete it.";
    $_SESSION["promptMessage"] = $message;
    $_SESSION["msg_type"] = "warning";
    die(header('Location: ../views/thumbnailGallery.php'));
}

header('Location: ../views/thumbnailGallery.php');
