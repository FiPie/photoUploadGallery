<?php

session_start();
// Here we check if the user is logged in
if ((isset($_SESSION['logged']) == FALSE) && ($_SESSION['logged'] == FALSE)) {
    $message = "You need to <b>log in</b> in order to add new images to the collection.";
        $_SESSION["promptMessage"] = $message;
        $_SESSION["msg_type"] = "info";
    header('Location: ../index.php');
    exit();
}
// Here we check if the selected file the user wants to upload is within the size limit
$maxSize = 5000000;     // we set the max upload file size in bytes
if($_FILES['file']['size'] > $maxSize) {
    $message = "file size is too large. The maximum file size is <b>".($maxSize/1000000)."MB</b>!";
    $_SESSION["promptMessage"] = $message;
    $_SESSION["msg_type"] = "warning";
    die(header('Location: ../index.php'));
}
//Here we check if the selected file the user wants to upload is of proper type, we only want the user to upload the images
$types = ['image/png', 'image/jpeg', 'image/bmp', 'image/gif'];
$temp_name = $_FILES['file']['tmp_name'];
if($temp_name == ''){
    $message = "No file has been selected!";
    $_SESSION["promptMessage"] = $message;
    $_SESSION["msg_type"] = "danger";
    die(header('Location: ../index.php'));
}
$mimeType = mime_content_type($temp_name);  // detects MIME content-type for a file


if ($temp_name != '' && in_array($mimeType, $types)) {
    $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION); // returns file extention
    $original = $_FILES['file']['name'];
    // NOTE: the obfuscated file name would still be visible to a malicious user in the Gallery view for example
    $salt = str_shuffle("saltSALTsalt".rand(-27, 29)."moreSALTsAlT".rand(-27, 29));     // a little pinch(es) of salt 
    $name = md5($original.$salt) . ".$ext";     // Message-Digest(5) algorythm returns a hash of string using RSA Data Security Inc.
    $dest = "../images/" . $name;
    move_uploaded_file($temp_name, $dest);      // moves an uploaded file to a selected location
    $message = "The <b>$original </b> image file was successfully uploaded to Gallery!";
    $_SESSION["promptMessage"] = $message;
    $_SESSION["msg_type"] = "success";
} else {
    $message = "Selected file type is not allowed! Make sure you choose image file";
    $_SESSION["promptMessage"] = $message;
    $_SESSION["msg_type"] = "danger";
    die(header('Location: ../index.php'));
}


header('Location: ../index.php');
