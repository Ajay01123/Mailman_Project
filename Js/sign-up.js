$(document).ready(function () {
    $("#flash-msg").delay(1000).fadeOut("slow");
});
//console.log("asjdajfda");
$('document').ready(function () {
    $('#user').keyup(function () {
        var user = $(this).val();

        $.ajax({
            url: '../php/username.php',
            method: "POST",
            data: {
                result: user
            },
            success: function (data) {
                if (data != '0') {
                    if (user.length > 0) {
                        $('#us').html(
                            '<span class="text-danger">Username not available</span>'
                        );
                        //$('#submit').attr("disabled", false);
                    }
                } else {
                    $('#us').html(
                        '<span class="text-success">Username available</span>'
                    );
                    //$('#submit').attr("disabled", true);

                }

            }

        })
    });
});
$('document').ready(function () {
    $('#email').change(function () {
        var email = $(this).val();

        $.ajax({
            url: '../php/email_uqniue.php',
            method: "POST",
            data: {
                email_id: email
            },
            success: function (data) {

                if (data != '0') {

                    $('#email_id').html(
                        '<span class="text-danger">Email already exists</span> '
                    );
                    $('#submit').attr("disabled", true);

                    //$('#email_id').remove('<span class="text-success"></span>');
                } else {
                    $('#email_id').html('<span class="text-success"></span>');
                    $('#submit').attr("disabled", false);
                }

            }

        })
    });
});