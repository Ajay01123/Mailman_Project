$(document).ready(function () {
    $('#check').change(function () {
        if ($(this).is(":checked")) {
            $(".Item").prop('checked', true);
            $('#btn').prop('disabled', false);
        } else {
            $(".Item").prop('checked', false);
            $("#btn").prop('disabled', true);
        }
    });
});
$('.Item').change(function () {
    if ($(this).is(":checked")) {
        $(this).prop('checked', true);
        $('#btn').prop('disabled', false);

    } else {
        $(this).prop('checked', false);
        $('btn').prop('disabled', true);
    }
})

$(document).ready(function () {
    function load(number) {
        $.ajax({
            url: "../php/pagination.php",
            type: post,
            data: {
                number: page
            },
            success: function (data) {
                $('#table').html(data);
            }
        })
    }
});
$(document).on('click', '.pagination_link', function () {
    var page = $(this).attr("id");
    load_data(page);
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
            // console.log(image)
            let images = '';
            $.each(image, function (indexInArray, valueOfElement) {
                if (valueOfElement != null) {
                    images += '<div><a href="../Upload1/' + valueOfElement +
                        '" download>' + valueOfElement + '</a></div>'
                }
            });
            //console.log(response)
            // $('#inbox').html(images);
            let html = '<div class="d-flex justify-content-between">' +
                '<div>' +
                '<h1>Subject : ' + response.Subject + '</h1>' +
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
                '<li>From : ' + response.From + ' </li>' +
                '<li>To : ' + response.To + '</a></li>' +
                '<li>CC : ' + response.Cc + '</a></li>' +
                '<li>BCC : ' + response.Bcc + '</a></li>' +

                '</ul>' +
                '</div>' +
                '<div style="border:1px solid black; min-height:200px;">' +
                response.Msg +
                '</div>' +
                images;

            $('#inbox').html(html);
        }
    });
});