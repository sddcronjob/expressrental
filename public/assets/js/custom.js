$(document).ready(function() {

    $(document).on('submit', '#resetPassForm', function (e) {
        e.preventDefault();
        var frmData = new FormData(this);
        var url = $('#resetPassForm').attr('action');
        if($('#alertmessage').length > 0) {
            $('#alertmessage').remove();
        }
        $.ajax({
            url: url,
            data: frmData,
            processData: false,
            contentType: false,
            type: 'post',
            beforeSend: function() {
               $('#loaderimg').removeClass('hidden');
            },
            success: function (result) {
                $('#loaderimg').addClass('hidden');
                if(result == 1) {
                    $('#modalResetHead').after('<div id="alertmessage" class="alert alert-success">New password has been sent to your mail.</div>');
                        hideAlert();
                } else if(result == 0) {
                    $('#modalResetHead').after('<div id="alertmessage" class="alert alert-danger">Please try after sometime.</div>');
                        hideAlert();
                }
            },
            error: function () {
                $('#loaderimg').addClass('hidden');
                $('#modalResetHead').after('<div id="alertmessage" class="alert alert-danger">Some error, Please try after sometime.</div>');
                    hideAlert();
            }
        });
    });

});

// Function to open modal pop ups
function showModel(modalID,userID,userEmail){
    $('#userId').val(userID);
    $('#userEmail').val(userEmail);
    $('#'+modalID).modal('show');
}

//function to hide alert of bootstrap
function hideAlert() {
$("#alertmessage").fadeTo(2000, 500).slideUp(500, function(){
    $("#alertmessage").alert('close');
 });
}
