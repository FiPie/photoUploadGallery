var images = imageArray;
//Onload initial setup
$(function () {


    loadImages();

});

function loadImages() {
    for (var i = 0; i < images.length; i++) {
        // Produces the img elements with sources pointing to the images
        

        var img2 = '<div class="col-lg-3 col-md-4 col-6 mb-5"><div class="card border-0 shadow" style="background-color: rgba(255, 255, 255, 0.9);"><a href="../images/' + images[i] + '" class="d-block mb-0 h-100"><img class="img-fluid img-thumbnail card-img-top" src="../images/' + images[i] + '" alt="' + images[i] + '" style="object-fit:cover; height:200px;"></a><div class="option text-center py-1" style="background-color: rgba(255, 255, 255, 0.01);display : none;"><a class="btn btn-danger rounded-pill shadow" href="../controllers/delete.php?del=' + images[i] + '" style="width: 40%"><i class="fas fa-trash-alt"></i> Delete</a></div></div></div>';

        $('.images').append(img2);
    }
}

function showOptions(){
    console.log('showOptions()');
    $('.option').show();
    $('#showOptions').attr('onclick','hideOptions()');
    
}
function hideOptions(){
    console.log('hideOptions()');    
    $('.option').hide();
    $('#showOptions').attr('onclick','showOptions()');
}
function cleanMsg(msgType) {
    var type = msgType;
    console.log('cleanMsg() : msg_type' + msgType);
    $('#message').removeClass('alert-' + type);
    $('#message').html('');

}