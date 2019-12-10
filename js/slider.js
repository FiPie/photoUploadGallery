var images = imageArray;
//console.log(images);
var current = 0;
var imageWidth, imageHeight, timeout, imageRatio, nextImg, allImagesWidth;


//Onload initial setup
$(function() {
  //Initial normalized image width of approximately 49.5% of the user view port width
  imageWidth = 49.5;
  $('body').append("<img class='rounded' id='sampleImg' src='images/" + images[0] + "'>");
  //The first image sets the height standard for the other images
  $('#sampleImg').width(imageWidth + 'vw');
  $('#sampleImg').on('load', function() {
    imageWidth = $('#sampleImg').width();
    imageHeight = $('#sampleImg').height();
    console.log('sample imageWidth:'+imageWidth);
    allImagesWidth = ((imageWidth * images.length)+(1));
    console.log('allImagesWidth: '+allImagesWidth);
    //After setting the standards, the sample image is removed
    $('#sampleImg').remove();
    //Next we're loading all the images
    loadImages();
  });
});

function loadImages() {
  for (var i = 0; i < images.length; i++) {
    var img = "<img class='image rounded' id='i" + (i + 1) + "' src='images/" + images[i] + "'>";
    $('.images').append(img);
    var li = "<li class='pagerButtons'><button onclick='goToPage(" + i + ")'>" + (i + 1) + "</button></li>";
    $('.pagerList').append(li);
  }
  //Styling of the image slider elements
  $('.fluid-container').css({
    'width': imageWidth,
    'height': imageHeight
  });
  $('.images').css({
    'width': allImagesWidth,
    'height': imageHeight
  });
  $('.image').css({
    'width': imageWidth,
    'height': imageHeight
  });

  //Initial configuration of button events
  $('#stop').prop('disabled', true);
  $('#play').prop('disabled', false);
  $('#play').on('click', play);
  $('#prev').on('click', prev);
  $('#next').on('click', next);
  //play();
}

function prev() {
  current = (current - 1 + images.length) % images.length;
  console.log('prev() current:' + current);
  $('.images').animate({
    'margin-left': -(current * imageWidth)
  }, 800, 'swing');
}

function next() {
  current = (current + 1 + images.length) % images.length;
  console.log('next() current:' + current);
  console.log('next() -(current * imageWidth):' + (current * imageWidth));
  console.log('next() current image width):' + $('#i'+(current+1)).width());
  $('.images').animate({
    'margin-left': -(current * imageWidth)
  }, 800, 'swing');
}

function play() {
  $('.images').stop(true, true);
  $('#play').prop('disabled', true);
  $('#stop').prop('disabled', false);
  $('#play').off();
  $('#stop').off();

  $('#stop').on('click', stop);
  timeout = setInterval('next()', 2000);
}

function stop() {
  $('.images').stop(true, true);
  $('#stop').off();
  $('#stop').prop('disabled', true);
  $('#play').prop('disabled', false);

  $('#play').off();
  $('#play').on('click', play);
  clearInterval(timeout);
}

function goToPage(number) {
  current = number;
  $('.images').stop(true, true);
  $('.images').animate({
    'margin-left': -(current * imageWidth)
  }, 800, 'swing');
  console.log('goToPage() current=' + current);
};