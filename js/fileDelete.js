var images = imageArray;
//Onload initial setup
$(function () {


    loadImages();

});

function loadImages() {
    for (var i = 0; i < images.length; i++) {
        // Produces the img elements with sources pointing to the images
        var img = '<div id="i' + (i + 1) + '" class="col-lg-3 col-md-4 col-6"><a href="../images/' + images[i] + '" class="d-block mb-4 h-100"><img class="img-fluid img-thumbnail" src="../images/' + images[i] + '" alt="' + images[i] + '" style="object-fit:cover; height:200px;"></a></div>';
        $('.images').append(img);
    }
}