$(document).ready(function () {
    $("form").submit(function (e) { 
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "api/edituser-api.php",
            data: $(this).serialize(),
            success: function (response) {
                if (response[0].message == "User Updated") {

                    $("#username").val(response[0].username).hide().fadeIn();
                    $("#first").val(response[0].firstname).hide().fadeIn();
                    $("#last").val(response[0].lastname).hide().fadeIn();

                }
                console.log(response);
            }
        });
    });
});