/**
 * Created by Igor on 6/27/2015.
 */
function confirmar(url) {
    swal({
        title: "Tem Certeza?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Sim!",
        closeOnConfirm: false
    }, function () {
        window.location.href = url;
    });
}
$(document).ready(function () {
    $('#updaterg').mask('SS-0009999999');
    $('#updatetelefone').mask('(00)0000-00000');
});

$(document).ready(function () {
    $('#cadastreTelefone').mask('(00)0000-00000');
    $('#cadastreRg').mask('SS-0009999999');
});



