$(document).ready(function () {

    //======================== SCROLL =====================
    if (window.location.hash) {
        var S_ancla = window.location.hash;
        var TAB_tab = $('.nav-tabs a[href$=' + S_ancla.replace('#', '') + ']');
        if (TAB_tab.length) {
            TAB_tab.tab('show');
            var DIV_ancla = $(S_ancla);
            if (DIV_ancla.length) {
                $('html,body').animate({ scrollTop: DIV_ancla.offset().top - 120 }, 500);
            }
        }
    }

    //========================================= FORM ==========================================

    $('form').submit(function (event) {

        var BTN_submit = $(this).find('button[type=submit]');
        //se pone en loading el boton de submit
        BTN_submit.find('i').remove();
        const HTML_btn = BTN_submit.html();
        BTN_submit.html('<span class="spinner-border spinner-border-sm"></span> ' + HTML_btn);
        BTN_submit.prop('disabled', true);

        /*
        en ocaciones puede aver botones submit de tipo
        "input" estos hay que desaparecerlos
        */
        $(this).find('input[type=submit]').each(function (i, INP_submit) {
            $(this).addClass('d-none');
        });

    });

    //================== DATE ===================

    flatpickr(".datepicker-timepicker", { enableTime: !0, noCalendar: !0, dateFormat: "H:i", });

    document.querySelectorAll('.datepicker-datetime').forEach(function (input) {

        const min_date = input.dataset.mindate;
        const max_date = input.dataset.maxdate;
        var config = { locale: 'es', enableTime: !0, dateFormat: "Y-m-d H:i" };

        if (min_date) {
            config.minDate = min_date;
        }

        if (max_date) {
            config.maxDate = max_date;
        }

        flatpickr(input, config);
    });

    document.querySelectorAll('.datepicker-basic').forEach(function (input) {

        const min_date = input.dataset.mindate;
        const max_date = input.dataset.maxdate;
        var config = { locale: 'es' };

        if (min_date) {
            config.minDate = min_date;
        }

        if (max_date) {
            config.maxDate = max_date;
        }

        flatpickr(input, config);
    });


    //========================= SELECT ===================================

    $(".select2").select2(); //select search

    __initSWeetAlertLinks();

    //============================================ IMG CROPPER ===========================================
    var INPS_imgCrop = document.querySelectorAll('.input-file-img-crop');

    var BTNS_imgCroppedDelete = $('.img-cropped-btn-delete');
    var MODAL_imgCrop = null;
    if ($('#MODALImgCrop').length) {
        MODAL_imgCrop = new bootstrap.Modal(document.getElementById('MODALImgCrop'));
    }
    var DIV_cropIMG = $('#DIVCropIMG');
    var BTN_imgCropAceptar = $('#BTNImgCropAceptar');
    var CROPPER_cropper = null;

    //redimencionar
    var ID_imgRedimencionada = null; //contenedor donde se colocara la imagen redimencionada
    var INP_imgB64 = null; //input donde se pondra la img en B64
    var I_redimencionarWidth = null;

    INPS_imgCrop.forEach(function (input) {

        input.addEventListener('change', e => {
            if (e.target.files.length) {

                const INP_file = $(e.target);

                // start file reader
                const reader = new FileReader();
                reader.onload = e => {
                    if (e.target.result) {

                        // create new image
                        let img = document.createElement('img');
                        img.id = 'IMGCropper';
                        img.src = e.target.result;

                        DIV_cropIMG.html(img);

                        // init cropper
                        CROPPER_cropper = new Cropper(img, {
                            aspectRatio: parseFloat(INP_file.data('ratio')),
                            background: false,
                            minContainerWidth: 400,
                            minContainerHeight: 400,
                        });

                        MODAL_imgCrop.show();
                        ID_imgRedimencionada = INP_file.data('img-cropped-id');
                        I_redimencionarWidth = INP_file.data('crooper-width');
                        INP_imgB64 = $('#' + INP_file.data('input-b64-id'));
                    }
                };
                reader.readAsDataURL(e.target.files[0]);
            }
        });

    });

    BTNS_imgCroppedDelete.on('click', function () {
        var DIV_input_container = $(this).closest('.input-img-cropper-container');
        var INP_img_b64 = DIV_input_container.find('input[type=hidden]');
        var IMG_b64 = DIV_input_container.find('.img-cropped-selected');
        DIV_input_container.find('.img-cropped-container').addClass('hidden');
        DIV_input_container.find('input[type=file]').val('');

        INP_img_b64.val('');
        IMG_b64.attr('src', '');
    });

    BTN_imgCropAceptar.on('click', function (event) {
        event.preventDefault();
        var IMG_cropped = $('#' + ID_imgRedimencionada);
        var DIV_input_container = IMG_cropped.closest('.input-img-cropper-container');
        const SRC_image = CROPPER_cropper.getCroppedCanvas({
            width: I_redimencionarWidth, // input value
        }).toDataURL();

        IMG_cropped.attr('src', SRC_image);
        INP_imgB64.val(SRC_image);
        DIV_input_container.find('.img-cropped-container').removeClass('hidden');

        MODAL_imgCrop.hide();

    });

    new ClipboardJS('.btn-clipboard', {
        text: function (BTN_boton) {

            var S_url = $(BTN_boton).data('clipboard-text');

            toast('info', 'Copiado al portapapeles', 'Hace un momento', S_url);

            return S_url;
        }
    });

});

//================================= FUNCIONES GLOBALES =========================
function toast(S_type, S_title, S_subtitle, HTML_message) {
    var DIV_toast = $("#TOASTDefault");
    var DIV_toast_header = DIV_toast.find('.toast-header');
    var SPAN_toast_title = DIV_toast.find('.toast-title');
    var SMALL_toast_subtitle = DIV_toast.find('.toast-subtitle');
    var DIV_toast_body = DIV_toast.find('.toast-body');
    var CLASS_type = 'bg-' + S_type;

    DIV_toast.addClass(CLASS_type);
    DIV_toast_header.addClass(CLASS_type);
    SPAN_toast_title.html(S_title);
    SMALL_toast_subtitle.html(S_subtitle);
    DIV_toast_body.html(HTML_message);

    TOAST_toast = new bootstrap.Toast(DIV_toast);
    TOAST_toast.show();
    document.getElementById('TOASTDefault').addEventListener('hidden.bs.toast', () => {
        DIV_toast.removeClass(CLASS_type);
        DIV_toast_header.removeClass(CLASS_type);
    });

}

function __initSWeetAlertLinks() {
    //================================= SWEET ALERT ================================
    $(".delete-link-confirm").click(function (event) {

        event.preventDefault();
        const URL_redirect = this.dataset.url;

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
                    window.location.replace(URL_redirect);
                }
            });

    });

    $('.info-link-confirm').on('click', function (event) {

        event.preventDefault();
        const URL_redirect = this.dataset.url;

        Swal.fire(
            {
                title: this.dataset.title,
                text: this.dataset.text,
                icon: "info",
                showCancelButton: true,
                confirmButtonColor: "#50a5f1",
                cancelButtonColor: "#d3d3d3",
                cancelButtonText: 'Cancelar',
                confirmButtonText: "Aceptar"
            }).then(function (t) {
                if (t.value) {
                    window.location.replace(URL_redirect);
                }
            });

    });
}

//===================================== UPLOAD FILES ======================================
Dropzone.options.dropzone =
{
    maxFiles: 20,
    parallelUploads: 1,
    maxFilesize: 5,
    uploadMultiple: false,
    timeout: 50000,
    success: function (file, response) {
        toast('primary', 'Archivo almacenado', 'Hace un momento', file.name);
    },
    error: function (file, JSON_response) {

        var S_message = JSON_response.message;
        toast('danger', '¡Ha ocurrido un error!', 'Hace un momento', file.name + ': ' + S_message);

        file.previewElement.classList.add("dz-error");
        _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
        _results = [];
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i];
            _results.push(node.textContent = S_message);
        }
        return _results;
    }

}