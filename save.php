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
