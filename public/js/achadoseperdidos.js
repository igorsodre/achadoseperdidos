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
