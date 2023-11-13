
$(document).ready(function (event) {

    const ID_client_id = parseInt($('#DIV_client').data('client-id'));
    var BTN_submit = $(":input[type=submit]");

    __getClientDATA();

    function __getClientDATA() {
        $.ajax({
            url: '/ajax/clients/data/' + ID_client_id,
            type: 'GET',
            dataType: 'json',
            success: function (JSON_response) {
                populate($('form'), JSON_response)
            },
            error: function (xhr, status) {
                alert('Ocurrio un error');
                window.location.replace('/clients/');
            },
        });
    }

    window.Parsley.on('form:submit', function (event) {

        $.ajax({
            url: '/ajax/clients/edit/' + ID_client_id,
            type: 'POST',
            dataType: 'json',
            data: $('form').serialize(),
            beforeSend: function () {
                BTN_submit.prop('disabled', true);
            },
            success: function (JSON_response) {
                if (JSON_response.success) {
                    window.location.replace("/clients/view/" + JSON_response.id);
                } else {
                    alert(JSON_response.message);
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