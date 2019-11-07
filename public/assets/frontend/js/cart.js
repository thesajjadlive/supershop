$(function () {
    console.log('document ready');
    $('.add-cart').click(function () {
        var url = $(this).attr('url');

        $.ajax({
            url : url,
            method : 'GET',

            success : function (data) {
                console.log('Success - ' + data.cart.length);

                $('.headerCartDetails').html(data.headerCartDetailsView);
                $('.cart-count').html('<span class="totalCartItemHeader">'+ data.cart.length +'</span>');

            },

            error : function (data) {
                console.log('errors - ' + data);
            }
        });

    });
});
