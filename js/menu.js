$(function () {


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


});