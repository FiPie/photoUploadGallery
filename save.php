<?php

$types = ['image/png', 'image/jpeg', 'image/bmp', 'image/gif'];

$temp_name = $_FILES['file']['tmp_name'];
$mimeType = mime_content_type($temp_name);


if ($temp_name != '' && in_array($mimeType, $types)) {
    $dest = "./images/" . $_FILES['file']['name'];
    move_uploaded_file($temp_name, $dest);
} else {
    die('Invalid path or image format<br><button><a href="index.php" style="text-decoration: none">Upload Form</a></button>');
}


header('Location: index.php');
<?php

session_start();

$maxSize = 5000000;
if($_FILES['file']['size'] > $maxSize) {
    $message = "file size is too large. The maximum file size is <b>".($maxSize/1000000)."MB</b>!";
    $_SESSION["promptMessage"] = $message;
    $_SESSION["msg_type"] = "warning";
    die(header('Location: index.php'));
}

$types = ['image/png', 'image/jpeg', 'image/bmp', 'image/gif'];
$temp_name = $_FILES['file']['tmp_name'];
if($temp_name == ''){
    $message = "No file has been selected!";
    $_SESSION["promptMessage"] = $message;
    $_SESSION["msg_type"] = "danger";
    die(header('Location: index.php'));
}
$mimeType = mime_content_type($temp_name);


if ($temp_name != '' && in_array($mimeType, $types)) {
    $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    $name = md5($_FILES['file']['name']) . ".$ext";
    $dest = "./images/" . $name;
    move_uploaded_file($temp_name, $dest);
    $message = "The image file was successfully uploaded!";
    $_SESSION["promptMessage"] = $message;
    $_SESSION["msg_type"] = "success";
} else {
    $message = "Selected file type is not allowed! Make sure you choose image";
    $_SESSION["promptMessage"] = $message;
    $_SESSION["msg_type"] = "danger";
    die(header('Location: index.php'));
}


header('Location: index.php');
