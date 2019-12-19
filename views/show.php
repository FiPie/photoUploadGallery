<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Slide Show JS/PHP</title>
        <!-- Jquery -->
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <!-- Bootstrap -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- Bootstrap bundle -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
        <!-- Fontawesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body class="d-flex flex-column">

        <div class="page-content">
            <?php include "../fragments/menu.php"; ?>
            <div class="container">

                <div class="row mt-3 pt-3 text-justify text-white">
                    <div class="col-md-10 col-sm-11 col-xs-12 mx-auto px-0">
                        <h2 class="display-5">jQuery driven phenomenal image slider 2.0 </h2>
                        <p class="text-center"> This slider uses a combination of PHP, jQuery and bootstrap class functionalities. A rather nice combination, might I say.</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-10 col-sm-11 col-xs-12 mx-auto px-0 slider-container">
                        <div class="images">
                        </div>
                        <div class="btn-toolbar toolbar-fixed-bottom toolbar-container mx-auto">
                            <div class="btn-group">
                                <button id="play" class="btn btn-lg"> <i class="toolicons fas fa-play"></i> </button>
                                <button id="stop" class="btn btn-lg"> <i class="toolicons fas fa-pause"></i> </button>
                                <button id="prev" class="btn btn-lg"> <i class="toolicons fas fa-chevron-left"></i> </button>
                                <button id="next" class="btn btn-lg"> <i class="toolicons fas fa-chevron-right"></i> </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-10 col-sm-11 col-xs-12 mx-auto px-0 pagination-container">
                        <nav class="" aria-label="Page navigation">
                            <ul class="row pagination pagination-sm justify-content-center mx-0 pagerList">
                            </ul>
                        </nav>
                    </div>
                </div>

            </div>
        </div>
        
        <?php include "../fragments/footer.php"; ?>
        
        <script type="text/javascript">
            //Here I pass an array of file names in a variable obtained by PHP in JSON format to an external javascript file.
            var imageArray = <?php echo json_encode(scandir("../images/")); ?>;
            imageArray.splice(0, 2);
            console.log("imageArray : " + imageArray);
        </script>
        
        <script src="../js/slider.js"></script>

    </body>
</html>
