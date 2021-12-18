function alertSuccess(message) {
    $('.alerts').html(
        '<div class="alert alert-success alert-dismissible fade show">' +
            '<strong>Success!</strong> <button type="button" class="close" data-dismiss="alert">&times;</button>' + message + '</div>');
            $(window).scrollTop(0);
}

function alertDanger(message) {
    $('.alerts').html(
        '<div class="alert alert-danger alert-dismissible fade show">' +
            '<strong>Success!</strong> <button type="button" class="close" data-dismiss="alert">&times;</button>' + message + '</div>');
            $(window).scrollTop(0);
}
