var images = imageArray;
//console.log(images);
var current = 0;
var imageWidth, imageHeight, timeout, allImagesWidth, isRunning;

//Onload initial setup
$(function() {

  //Initial setup of images size
  setImagesSize();
  //Next we're loading all the images
  loadImages();
  //The slider will adjust its size to the window resizing event
  $(window).resize(function() {
    setImagesSize();
  });
});

function setImagesSize() {
  //Attempt to fastforward the current animation (if running) to it's next complete step and then continues
  if ($('.images').is(':animated')) {
    console.log('.images is animated');
    $('.images').stop(true, true);
  }

  //Normalized images width equal to the column element width
  imageWidth = $('.slider-container').width();
  $('.images').append("<img id='sampleImg' src='../images/" + images[0] + "'>");
  //The sample image sets the height standard for the other images
  $('#sampleImg').width(imageWidth);
  $('#sampleImg').on('load', function() {
    imageWidth = $('#sampleImg').width();
    imageHeight = $('#sampleImg').height();
    allImagesWidth = ((imageWidth * images.length));
    //Styling of the image slider elements
    $('.slider-container').css({
      'width': imageWidth,
      'height': imageHeight
    });
    $('.pagination-container').css({
      'width': imageWidth
    });
    $('.images').css({
      'width': allImagesWidth,
      'height': imageHeight
    });
    $('.image').css({
      'width': imageWidth,
      'height': imageHeight
    });
    //After setting the standards, the sample image is removed
    $('#sampleImg').remove();
  });
  //This beautiful line of code below will make the resizing of the currently displayed image (animated or not) keep up with the window resizing event, even if caught in the middle of the animation
  $('.images').css({
    'margin-left': -(current * imageWidth)
  });
}

function loadImages() {
  for (var i = 0; i < images.length; i++) {
    // Produces the img elements with sources pointing to the images
    var img = "<img class='image rounded' id='i" + (i + 1) + "' src='../images/" + images[i] + "'>";
    $('.images').append(img);
    // Produces the pagination buttons to the coresponding images
    var li = "<li id='" + (i + 1) + "' class='page-item col-sm-0.5 col-xs-0.25'><a class='page-link' onclick='goToPage(" + i + ")'>" + (i + 1) + "</a></li>";
    $('.pagerList').append(li);
  }

  //Initial configuration of button events
  $('#stop').prop('disabled', true);
  $('#play').prop('disabled', false);
  $('#play').on('click', play);
  $('#prev').on('click', prev);
  $('#next').on('click', next);
  $('#1').addClass('activated');
}

function prev(event) {
  //Detects the cause of function call, if it's due to the user's 'click' and the animation is running => the animation pauses for 3 secs
  if (event && isRunning === 1) {
    console.log('next() click event! & animation is running');
    $('#stop').trigger('click');
    setTimeout(function() {
      $('#play').trigger('click');
    }, 3000);
  }
  current = (current - 1 + images.length) % images.length;
  console.log('prev() current:' + current);
  $('.activated').removeClass('activated');
  $('#' + (current + 1)).addClass('activated');
  $('.images').animate({
    'margin-left': -(current * imageWidth)
  }, 800, 'swing');
}

function next(event) {
  //Detects the cause of function call, if it's due to the user's 'click' and the animation is running => the animation pauses for 3 secs
  if (event && isRunning === 1) {
    console.log('next() click event! & animation is running');
    $('#stop').trigger('click');
    setTimeout(function() {
      $('#play').trigger('click');
    }, 3000);
  }
  current = (current + 1 + images.length) % images.length;
  console.log('next() current:' + current);
  $('.activated').removeClass('activated');
  $('#' + (current + 1)).addClass('activated');
  $('.images').animate({
    'margin-left': -(current * imageWidth)
  }, 800, 'swing');
}

function play() {
  isRunning = 1;
  $('.images').stop(true, true);
  $('#play').prop('disabled', true);
  $('#stop').prop('disabled', false);
  $('#play').off();
  $('#stop').off();

  $('#stop').on('click', pause);
  timeout = setInterval('next()', 2000);
}

function pause() {
  isRunning = 0;
  $('.images').stop(true, true);
  $('#stop').off();
  $('#stop').prop('disabled', true);
  $('#play').prop('disabled', false);

  $('#play').off();
  $('#play').on('click', play);
  clearInterval(timeout);
}

function goToPage(number) {
  var wasRunning = 0;
  //If the animation was running when this function was called, the animation will be paused for 3 seconds before restarting
  if ($('.images').is(':animated') || isRunning === 1) {
    wasRunning = 1;
    console.log('element .images is animated');
    $('#stop').trigger('click');
  }
  current = number;
  $('.images').stop(true, true);
  $('.images').animate({
    'margin-left': -(current * imageWidth)
  }, 600, 'swing');
  $('.activated').removeClass('activated');
  $('#' + (current + 1)).addClass('activated');
  console.log('goToPage() current=' + current);
  if (wasRunning === 1) {
    //Restarting the animation after 3 seconds by triggering the 'click' event which calls the play() function
    setTimeout(function() {
      $('#play').trigger('click');
    }, 3000);
  }
};