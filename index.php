<?php
session_start();
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="Description" content="Author: F.Piechowiak, Category: Web Aplication">
        <title>Upload File</title>
        <!-- Jquery -->
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <!-- Bootstrap -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- Bootstrap bundle -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
        <!-- Fontawesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body class="d-flex flex-column">
        <div class="page-content">

            <?php require_once 'fragments/menu.php'; ?>

            <div class="container px-5 pt-4 pb-5 mt-2"> 
                <form enctype="multipart/form-data" action="controllers/save.php" method="POST">
                    <div class="row mt-1 px-5 text-center" style="max-height: 30px">
                        <div id="message" class="col-sm-10 py-3 mb-5 mx-auto alert alert-<?= $_SESSION['msg_type'] ?>">
                            <?php
                            

                            if (isset($_SESSION["promptMessage"])) {
                                echo $_SESSION["promptMessage"];
                                echo ("<button class='close' onclick='cleanMsg(`" . $_SESSION['msg_type'] . "`)'><span>&times;</span></button>");
                            }
                            unset($_SESSION["promptMessage"]);
                            unset($_SESSION["msg_type"]);
                            ?>
                        </div>
                    </div>


                    <div class="row mt-1 px-5 text-center text-white">
                        <div class="col-lg-5 md-6 mx-auto">
                            <h1 class="display-4">Photo Upload Gallery </h1>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6  mx-auto">
                            <div class="p-5 bg-white shadow rounded-lg">
                                <div class="spacemanContainer text-nowrap">
                                    <p class="my-1 text-center">
                                        <span id="spacemanIcon">
                                            <i class="fas fa-user-astronaut lg mr-2"></i>
                                        </span> 
                                        <span class="align-top p-3" id="talkbubble">
                                            Howdy there <strong>Space Cat.</strong> I sense You'd like to upload some photos, right?
                                        </span> 
                                    </p>
                                </div>
                                <div class="py-4 text-center">
                                    <i class="fas fa-cloud-upload-alt" style="font-size: 6em; color: lightskyblue;"></i>
                                </div>

<!--                            <input type="hidden" name="MAX_FILE_SIZE" value="5000000">-->

                                <p class="mt-3 text-center small">
                                    Simply browse through your files, choose the photos you want to see in the slider
                                    gallery...
                                </p>

                                <div>
                                    <div id="fileInputField" class="custom-file overflow-hidden rounded-pill mb-2">
                                        <input id="fileInput" type="file" name="file" class="custom-file-input rounded-pill">
                                        <label for="fileInput" class="custom-file-label rounded-pill">Choose file</label>
                                    </div>
                                </div>

                                <p class="mt-5 text-center small">
                                    ...and click the <b>Upload Photo</b> button. You may then display your photos by
                                    clicking on <br><b>See Images</b> button. 
                                </p>

                                <div class="btn-group d-flex pb-3">
                                    <button class="btn btn-success rounded-pill shadow" type="submit" style="width: 49%">
                                        <i class="fa fa-upload mr-2"></i>Upload Photo
                                    </button>&nbsp;

                                    <a class="btn btn-primary rounded-pill shadow" href="views/show.php" style="width: 49%">
                                        <i class="fas fa-eye"></i> See images
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <?php include "fragments/footer.php"; ?>
        <script src="js/fileUpload.js"></script>

    </body>
</html>