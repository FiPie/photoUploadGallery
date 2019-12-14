var images = imageArray;
//Onload initial setup
$(function () {




});

function loadImages() {
    for (var i = 0; i < images.length; i++) {
        // Produces the img elements with sources pointing to the images
        //var img = "<img class='image rounded' id='i" + (i + 1) + "' src='images/" + images[i] + "'>";
        

        var img = '<div id="i'+ (i + 1) +'" class="col-lg-3 col-md-4 col-6"><a href="#" class="d-block mb-4 h-100"><img class="img-fluid img-thumbnail" src="images/' + images[i] +'" alt=""></a></div>';

$('.images').append(img);

        // Produces the pagination buttons to the coresponding images
        var li = "<li id='" + (i + 1) + "' class='page-item col-sm-0.5 col-xs-0.25'><a class='page-link' onclick='goToPage(" + i + ")'>" + (i + 1) + "</a></li>";
        $('.pagerList').append(li);
    }
}