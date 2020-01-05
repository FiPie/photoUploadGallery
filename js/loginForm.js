function cleanMsg(msgType) {
    var type = msgType;
    console.log('cleanMsg() : msg_type' + msgType);
    $('#message').removeClass('alert-' + type);
    $('#message').html('');

}