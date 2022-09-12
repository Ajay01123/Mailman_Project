
$(document).ready(function () {
    $("#checkall").change(function () {
        if ($(this).is(":checked")) {
            $('.checkItem').prop('checked', true);
            $('#btn').prop('disabled', false);

        } else {
            $('.checkItem').prop('checked', false);
            $('#btn').prop('disabled', true);
        }
    })
})

$(".checkItem").change(function () {
    if ($(this).is(":checked")) {
        $(this).prop('checked', true);
        $('#btn').prop('disabled', false);
    } else {
        $(this).prop('checked', false);
        $('#btn').prop('disabled', true);
    }
})
$(document).ready(function () {
    $("#checkall").change(function () {
        if ($(this).is(":checked")) {
            $('.checkItem').prop('checked', true);

        } else {
            $('.checkItem').prop('checked', false);

        }
    })
})

$(".checkItem").change(function () {
    if ($(this).is(":checked")) {
        $(this).prop('checked', true);
        $('#read').prop('disabled', false);
    } else {
        $(this).prop('checked', false);
        $('#unread').prop('disabled', false);
    }
})


$('document').ready(function () {
    $("#search1").keyup(function () {

        var input = $(this).val();

        if (input != "") {
            $.ajax({
                url: "../php/search.php",
                method: "post",
                data: {
                    input: input
                },
                success: function (data) {
                    $("#search_result1").html(data);
                }

            })
        } else {
            $("#search_result1").css("display", "none");
        }

    });
});

$(document).ready(function () {
    $("#flash-msg").delay(1000).fadeOut("slow");
});

$("#table td").click(function () {
    let id = $(this).attr('class')
    $.ajax({
        type: "post",
        url: "../php/inbox.php",
        data: {
            id: id
        },
        dataType: "json",
        success: function (res) {
            let response = res.data;
            let image = res.image;

            let images = '';
            $.each(image, function (indexInArray, valueOfElement) {
                if (valueOfElement != null) {
                    images += '<div><a href="../Upload1/' + valueOfElement +
                        '" download>' + valueOfElement + '</a> </div>'
                }
            });


            let html = '<div class="d-flex justify-content-between">' +
                '<div>' +
                '<h1 id ="reply-sub" subject="' + response.Subject + '">Subject : ' + response.Subject + '</h1>' +
                '</div>' +
                '<div>' +
                '<div class="d-grid gap-2 d-md-flex justify-content-md-end">DateTime : ' +
                response.DateTime + '</div>' +
                '</div>' +
                '</div>' +
                '<div class="dropdown">' +
                '<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">' +
                'Participants' +
                '</button>' +
                '<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">' +
                '<li id="reply-from" data="' + response.From + '">From : ' + response.From + ' </li>' +
                '<li>To : ' + response.To + '</a></li>' +
                '<li id="CC-reply" CC="' + response.Cc + '" >CC : ' + response.Cc + '</a></li>' +
                '<li id="Bcc-reply" Bcc="' + response.Bcc + '" >BCC : ' + response.Bcc + '</a></li>' +
                // (response.To !== vairable) && '< li > BCC : ' + response.Bcc + '</a ></li > ' +


                '</ul>' +
                '</div>' +
                '<br>' +


                '<div >' +
                response.Msg +

                '</div>' +
                '<br>' +
                images +
                '<div class="d-grid gap-2 d-md-flex justify-content-md-end">' +
                '<input type="submit" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal" value="Reply" id="reply-btn"> ' +
                '<button type="submit" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#static-Backdrop" id="reply-btn"> Reply all'
            '</button>' +

                '</div>';


            $('#inbox').html(html);

        }
    });
});



