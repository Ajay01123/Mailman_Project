$(document).ready(function () {
    $('#Item').change(function () {
        if ($(this).is(":checked")) {
            $('.check').attr('checked', true);
            $('#btn').attr('disabled', false);
        } else {
            $('.check').attr('checked', false);
            $('#btn').attr('disabled', true);
        }
    })
    $(".check").change(function () {
        if ($(this).is(":checked")) {
            $(this).attr('checked', true);
            $('#btn').attr('disabled', false);
        } else {
            $(this).attr("checked", false);
            $('#btn').attr('disabled', true);
        }
    })
})
$(document).ready(function () {
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
                console.log(response)
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
                    '<br>' +
                    '<div style="border:1px solid black; min-height:200px;">' +
                    response.Msg +
                    '</div>' +
                    images;

                $('#inbox').html(html);
            }
        });
    });
});