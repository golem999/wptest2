

var ID;
var _parent;

$('.btn-dialog').click(dialog);

function dialog (e) {
    block(e);

    parent = $(e.target).parent();

    ID = $(parent).attr('tag');
    var title = parent.children('h3').html();
    var img_src = parent.children('img').attr('src');
    var desc = parent.children('p').html();
    var price = parent.children('div').html();

    _parent = parent.children('button.buy');
    var btnContent = _parent.html();
    var btnClasses = _parent[0].className.replace('buy', '');


    $('.modal-title').html(title);
    $('.modal-body .body img').attr('src', img_src );
    $('.modal-body .body p').html(desc);
    $('.modal-body .body .item_footer .price').html(price);

    $('#btn_add').html(btnContent);
    $('#btn_add')[0].className = btnClasses;

    unblock(e, dialog);
}


$('#btn_add').click(buySingle);
$('.buy').click(pageBuy);

function buySingle(e) {
    if(  e.target.className.search('disabled') >= 0)  return;
    if( !$('#user').text() ) {
        loginShow();

        toastr["info"]("Please, log in")
        toastr.options = {
          "closeButton": false,
          "debug": false,
          "newestOnTop": false,
          "progressBar": false,
          "positionClass": "toast-top-right",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "10000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }
        return;
    }
    block(e);
    e.target.innerHTML = '<i class="fa fa-cog fa-spin"></i>';

    $.post(document.location.protocol + '//' + document.location.host + '/wp-admin/admin-ajax.php', {
        action: 'market_cart_add',
        id: ID
    }, function(response){
        if(response==true+""){
            unblock(e, buySingle);
            disable(e);
            disable(_parent[0]);
        }
    });
}
function pageBuy (e){
    if(  e.target.className.search('disabled') >= 0)  return; 
    if( !$('#user').text() ) {
        loginShow();

        toastr["info"]("Please, log in")
        toastr.options = {
          "closeButton": false,
          "debug": false,
          "newestOnTop": false,
          "progressBar": false,
          "positionClass": "toast-top-right",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "10000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }
        return;
    };

    block(e);
    e.target.innerHTML = '<i class="fa fa-cog fa-spin"></i>';

    var parent = $(e.target).parent();
    ID = $(parent).attr('tag');

    $.post(document.location.protocol + '//' + document.location.host + '/wp-admin/admin-ajax.php', {
        action: 'market_cart_add',
        id: ID
    }, function(response){
        if(response==true+""){
            disable(e);
            unblock(e, pageBuy)
        }
    });
}

function disable(e){
    if(e.hasOwnProperty('target')){
        e.target.className += ' disabled';
        e.target.innerHTML = 'already in a cart';
    }
    else {
        $(e).addClass(' disabled');
        $(e).html('already in a cart');
    }
}

function block(e){
    $(e).click(function () {});
}
function unblock(e, cb){
    $(e).click(cb);
}





// Cart js functions

$('.item_close i').click(function(e){
    var parent = $(e.target).parent();
    parent.html('<i class="fa fa-cog fa-spin"></i>');

    ID = $(e.target).attr('tag');



    $.post(document.location.protocol + '//' + document.location.host + '/wp-admin/admin-ajax.php', {
            action: 'market_cart_remove',
            id: ID
        },
        function(response_id){

            parent.html('<i class="fa fa-check"></i>');
            $('#row'+response_id).addClass('animated fadeOutDown');
            setTimeout(function () {
                $('#row'+response_id).remove();
                if($("div[id^='row']").length==0) {
                    $('.btn-payment').remove();
                }
            }, 1000);


    });
});

$('.btn-payment').click(payment);
function payment(e) {
    block(e);

    $.post(document.location.protocol + '//' + document.location.host + '/wp-admin/admin-ajax.php', {
            action: 'market_cart_checkout'
        },
        function(response_value){
            $('#pay_value').attr('value', response_value);
        });


    unblock(e);
}