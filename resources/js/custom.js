$(document).ready( function () {
    $(".alert-success").delay(2000).slideUp(200, function() {
        $(this).alert('close');
    });
    $(".alert-warning").delay(2000).slideUp(200, function() {
        $(this).alert('close');
    });

    $('.btn-confirm').click(function() {
        if (confirm('Do you continue?')) {
            return true;
        }
        return false;
    });
} );