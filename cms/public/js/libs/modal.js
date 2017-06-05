function loading() {
    $('#modal-loading').remove();
    $('body').prepend('<div id="modal-loading" class="" ><div class="spinner"></div></div>');
    $('#modal-loading').fadeIn(500);
}

function closeLoading() {
    $('#modal-loading').fadeOut(500).remove();
}

function modalInfo( title, body, type ){

    var type = type  ? type : 'modal-info';
    var t = $('#modal-info');


    t.removeClass().addClass('modal '+type);

    t.find('h4.modal-title').html( title );
    t.find('div.modal-body').html( body );

    t.modal({
        backdrop: false
    });
}


$(document).ready(function(){
    $(document).on('click', '.btn-reload', function(){
        location.reload();
    });
});
