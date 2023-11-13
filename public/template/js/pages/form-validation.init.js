!function () { "use strict"; window.addEventListener("load", function () { var t = document.getElementsByClassName("needs-validation"); Array.prototype.filter.call(t, function (e) { e.addEventListener("submit", function (t) { !1 === e.checkValidity() && (t.preventDefault(), t.stopPropagation()), e.classList.add("was-validated") }, !1) }) }, !1) }(), $(document).ready(function () { $(".custom-validation").parsley() });
window.Parsley.setLocale('es');

window.Parsley.addValidator('fileImg', {
    requirementType: 'string',
    validateString: function (value, requirement) {
        const S_file_extension = value.split('.').pop();
        const A_valid_extensions = requirement.split('|');
        return A_valid_extensions.includes(S_file_extension);
    },
    messages: {
        es: 'La extensión del archivo no es valida (%s)',
    }
});