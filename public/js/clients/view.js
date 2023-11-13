
var DIV_client_container = $('#DIV_client');
const ID_client_id = parseInt(DIV_client_container.data('client-id'));

__loadClient(ID_client_id);

function __loadClient(ID_client_id) {
    $.ajax({
        url: '/ajax/clients/view/' + ID_client_id,
        type: 'GET',
        dataType: 'html',
        success: function (HTML_response) {
            DIV_client_container.html(HTML_response);
        },
        error: function (xhr, status) {
            alert('Disculpe, existió un problema');
        },

    });
}