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
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>

        <h2>jQuery driven phenomenal image slider 2.0 </h2>

        <div class="fluid-container">
            <div class="images"></div>
        </div>

        <div class="pager">
            <ul class="pagerList"></ul>
        </div>

        <div class="buttons">
            <button id="play">Play</button>
            <button id="stop">Stop</button>
            <button id="prev">Prev</button>
            <button id="next">Next</button>
        </div>



        <script type="text/javascript">
        //Here I pass an array of file names in a variable obtained by PHP in JSON format to an external javascript file.
            var imageArray = <?php echo json_encode(scandir("./images/")); ?>;
            imageArray.splice(0, 2);
            console.log(imageArray);
        </script>
        <script src="js/slider.js"></script>
    </body>
</html>
