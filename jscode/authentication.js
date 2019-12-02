$('#signin').on('submit', function(event) {
    event.preventDefault();
    var loginData = {
        usrname: $('#usrname').val(),
        passwrd: $('#passwrd').val()
    };
    $.ajax({
        url: url + 'authenticate.php',
        type: 'POST',
        data: loginData,
        dataType: 'json',
        beforeSend: function() {
            $("#wait").css("display", "block");
        },
        success: function(response) {
            if (response.Data != null) {
                window.location.href = 'createSession.php?userId=' + response.Data.userId;
            } else {
                $('.message').show();
            }
        },
        complete: function(response) {
            $("#wait").css("display", "none");
        }
    });
});