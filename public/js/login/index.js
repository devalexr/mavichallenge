
$(document).ready(function (event) {

    var BTN_submit = $(":input[type=submit]");

    window.Parsley.on('form:submit', function (event) {

        $.ajax({
            url: '/ajax/login',
            type: 'POST',
            dataType: 'json',
            data: $('form').serialize(),
            beforeSend: function () {
                BTN_submit.prop('disabled', true);
            },
            success: function (JSON_response) {
                if (JSON_response.success) {
                    window.location.replace('/clients');
                } else {
                    alert(JSON_response.message);
                    BTN_submit.prop('disabled', false);
                }
            },
            error: function (xhr, status) {
                alert('Disculpe, existió un problema');
            },
            finally: function () {
                BTN_submit.prop('disabled', false);
            }
        });

        return false;
    });
});