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
            __initSWeetAlertLinks();
        },
        error: function (xhr, status) {
            alert('Disculpe, existió un problema');
        },

    });
}