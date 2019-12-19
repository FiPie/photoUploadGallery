var root = webRoot;

$(function () {

    console.log('menu.js loaded successfully');
//    console.log('menu.js -> root = ' + root);
    $("nav a").mouseover(function () {
        $("nav a").finish();
        $(this).animate({left: '+=10px', right: '+=10px', opacity: 1}, 50);
        $(this).animate({fontSize: '1.5em'}, 50);
    });
    $("nav a").mouseleave(function () {
        $("nav a").finish();
        $(this).animate({left: '-=10px', right: '-=10px', opacity: 0.6}, 250);
        $(this).animate({fontSize: '1.25em'}, 250);
    });

//    var link1 = "http://" + root + "index.php";
//    $('#link1').attr('href', link1);
//    var link2 = "http://" + root + "index.php";
//    $('#link2').attr('href', link2);
//    var link3 = "http://" + root + "views/thumbnailGallery.php";
//    $('#link3').attr('href', link3);
//    var link4 = "http://" + root + "views/show.php";
//    $('#link4').attr('href', link4);
//    var link5 = "http://" + root + "views/legalNote.php";
//    $('#link5').attr('href', link5);
//    console.log(link3);

});