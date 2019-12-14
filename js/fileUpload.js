//Onload initial setup
$(function () {


    $('#fileInput').on('change', function () {
        console.log('fileInput change detected');
        //get the file name
        var fileName = $(this).val();
        //replace the "Choose a file" label
        if (fileName !== "") {
            $(this).next('.custom-file-label').html(fileName);
            $('#talkbubble').html('You may now try to upload this file: <strong>' + fileName + '</strong>');
        } else {
            $(this).next('.custom-file-label').text('Choose file');
            $('#talkbubble').html('Go ahead and choose a photo you want to upload');
        }
    })


});

function cleanMsg(msgType) {
    var type = msgType;
    console.log('cleanMsg() : msg_type' + msgType);
    $('#message').removeClass('alert-' + type);
    $('#message').html('');

}