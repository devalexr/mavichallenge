var HREF_page_link = $('.page-link');
const TBODY_table = $('tbody');
const URL_pagination_request = TBODY_table.data('url-pagination-request');

__loadTablePage(1);

HREF_page_link.on('click', function (event) {

    event.preventDefault();

    var HREF_page = $(this);
    HREF_page_link.closest('li').removeClass('active');
    HREF_page.closest('li').addClass('active');

    const I_page = parseInt(HREF_page.html());

    __loadTablePage(I_page);

});

function __loadTablePage(I_page) {
    $.ajax({
        url: '/ajax/clients/index',
        data: { page: I_page },
        type: 'GET',
        dataType: 'html',
        success: function (HTML_response) {
            TBODY_table.html(HTML_response);
            __initDeleteBTNS();
        },
        error: function (xhr, status) {
            alert('Disculpe, existió un problema');
        },
    });
}

function __initDeleteBTNS() {
    $(".delete-link-confirm").click(function (event) {

        event.preventDefault();
        var TR_table = $(this).closest('tr');
        const ID_client_id = this.dataset.id;

        Swal.fire(
            {
                title: "Eliminar Registro",
                text: "¿Estás seguro que deseas eliminar este registro?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#f46a6a",
                cancelButtonColor: "#d3d3d3",
                cancelButtonText: 'Cancelar',
                confirmButtonText: "Eliminar"
            }).then(function (t) {
                if (t.value) {

                    $.ajax({
                        url: '/ajax/clients/delete/' + ID_client_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function (JSON_response) {
                            if (JSON_response.success) {
                                TR_table.remove();
                            } else {
                                alert(JSON_response.message);
                            }
                        },
                        error: function (xhr, status) {
                            alert('Disculpe, existió un problema');
                        },
                    });
                }
            });
    });
}