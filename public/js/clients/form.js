
document.addEventListener("DOMContentLoaded", function (event) {
    window.Parsley.on('form:submit', function (event) {

        $.ajax({
            url: '/ajax/clients/add',
            type: 'POST',
            dataType: 'json',
            data: $('form').serialize(),
            success: function (JSON_response) {
                if (JSON_response.success) {
                    window.location.replace("/clients/view/" + JSON_response.id);
                } else {
                    alert(JSON_response.message);
                }
                console.log(JSON_response);
            },
            error: function (xhr, status) {
                alert('Disculpe, existió un problema');
            },

        });

        return false;
    });
});