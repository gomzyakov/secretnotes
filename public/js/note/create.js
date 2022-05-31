$('#create_note_form').submit(function (e) {
    e.preventDefault();

    $('#create_note_form__error').remove();
    $('#create_note_form__submit_btn').addClass('disabled');

    const form_data = new FormData(this);
    const request_url = '/api/notes';

    $.ajax({
        type: 'POST',
        url: request_url,
        data: form_data,
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
    })
        .done(function (data) {
            console.log("\nDONE: " + JSON.stringify(data, undefined, 2));

            if (data.url_show_note_link) {
                console.log("\nOOOKKKK");
                location.href = data.url_show_note_link;
            }
        })
        .fail(function (data) {
            $('#create_note_form__submit_btn').removeClass('disabled');
            $('#create_note_form').append('<div id="create_note_form__error" class="alert alert-warning" role="alert"><strong>Error!</strong> Service is temporarily unavailable, please try again later.</div>');
            console.log("\nfail: " + JSON.stringify(data, undefined, 2));
        });
});
