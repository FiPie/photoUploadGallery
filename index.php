<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
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
    <body>

        <form enctype="multipart/form-data" action="save.php" method="POST">
            <div class="container p-5 mt-5 mb-5"> 

                <div class="row mt-5 px-5 text-center text-white">
                    <div class="col-lg-5 md-6 mx-auto">
                        <h1 class="display-4">Photo Upload Gallery</h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-5  mx-auto">
                        <div class="p-5 bg-white shadow rounded-lg">
                            
                            <p class="my-1 text-center lead">
                                <span style="font-size: 2em; color: #582529;">
                                    <i class="fas fa-user-astronaut lg mr-2"></i>
                                </span> 
                                Howdy there Space Cat. 
                            </p>
                            
                            <div class="py-4 text-center">
                                <i class="fas fa-cloud-upload-alt" style="font-size: 6em; color: lightskyblue;"></i>
                            </div>

                            <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                            
                            <p class="mt-3 text-center small">
                                Simply browse through your files, choose the photos you want to see in the slider
                                gallery...
                            </p>
                            
                            <div class="">
                                <label for="fileUpload" class="file-upload btn btn-lg btn-primary btn-block rounded-pill shadow">
                                    <i class="fa fa-upload mr-2"></i>Browse for file ...
                                    <input id="fileUpload" type="file" name="file" >
                                </label>
                            </div>
                            
                            <p class="mt-5 text-center small">
                                ...and click the <b>Upload Photo</b> button. You may then display your photos by
                                clicking on <br><b>See Images</b> button. 
                            </p>
                            
                            <div class="btn-group d-flex pb-3">
                                <input class="btn btn-success rounded-pill shadow" type="submit" value="Upload Photo">
                                <a class="btn btn-primary rounded-pill shadow" href="show.php">
                                    <i class="fas fa-eye"></i> See images
                                </a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>