$(document).ready(function () {
    $.validator.addMethod(
        "eng",
        function(value, element) {
            var regexp = /[a-zA-z0-9\\s\\\\-\\\\.\\\\,]+/;

            return this.optional(element) || regexp.test(value);
        },
        $.validator.messages.eng
    );

    $('#order-form').validate();

    $(document.body).on('updated_wc_div', function() {
        console.log('cart updated');
        if(!$('.cart-table').length) {
            console.log('empty');
            $("#cart-total-container .cart_totals").hide(100, function() {
                $(this).html('<span class="woocommerce-Price-amount amount">0<span class="woocommerce-Price-currencySymbol"><span class="rur">р<span>уб.</span></span></span></span>').show(100);
            });
        }
    });

    function updateCart() {
        console.log('here');
        $.ajax({
            type: 'POST',
            url: $('meta[name="ajax-url"]').attr('content'),
            data: {
                action: 'get_cart_update',
            },
            dataType: 'json',
            success: function(data){
                $("#cart-container").hide(100, function() {
                    $(this).html(data['cart']).show(100);
                });
                $("#cart-total-container .cart_totals").hide(100, function() {
                    $(this).html(data['total']).show(100);
                });
                $('.ajaxLoader').hide();
            },
            error: function (data) {
                console.log(data);
                $('.ajaxLoader').hide();
            }
        });
    }

    function addToCart(p_id) {
        $('#cartLink').addClass('cartLink-big');
        $('#cartLinkSmall').addClass('cartLink-big');
        setTimeout (function(){
            $('#cartLink').removeClass('cartLink-big');
            $('#cartLinkSmall').removeClass('cartLink-big');
        }, 350);

        $.ajax({
            type: 'GET',
            url: '/?add-to-cart='+p_id,
            beforeSend: function () {
                $('.ajaxLoader').show();
            },
            success: function(response, textStatus, jqXHR){
                updateCart();
            },
            error: function () {
                $('.ajaxLoader').hide();
            }
        });
    }

    $("#menu").mmenu({
        'navbar': {
            'title': 'МЕНЮ'
        },
        "extensions": [
            "theme-dark"
        ]
    });
    var api = $("#menu").data( "mmenu" );

    $('#list-products-spy').scrollspy();

    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('#header-fixed').addClass("head-fix-sticky");
        }
        else if ($(this).scrollTop() < 100) {
            $('#header-fixed').removeClass("head-fix-sticky");
        }
    });

    $(document).on('submit', '#order-form', function (event) {
       event.preventDefault();

        $.ajax({
            type: 'POST',
            url: $('meta[name="ajax-url"]').attr('content'),
            data: {
                action: 'make_order',
            },
            dataType: 'json',
            beforeSend: function() {
                $('#order-modal').modal('hide');
                $('.ajaxLoader').show();
            },
            success: function(data){
                updateCart();
                $('#result-modal .content').text(data['text']);
                $('#result-modal').modal('show');
                $('.ajaxLoader').hide();
            },
            error: function (data) {
                console.log(data);
                $('.ajaxLoader').hide();
            }
        });
    });

    $(document).on("click","a.anchor", function (event) {
        //отменяем стандартную обработку нажатия по ссылке
        event.preventDefault();

        //забираем идентификатор блока с атрибута href
        var id  = $(this).attr('href'),

            //узнаем высоту от начала страницы до блока на который ссылается якорь
            top = $(id).offset().top;

        //анимируем переход на расстояние - top за 1500 мс
        $('body,html').animate({scrollTop: top}, 1500);
    });

    $('.mm-menu').on("click","a.anchor", function (event) {

        //   Trigger a method
        api.close();

        console.log(api);

    });

    $('.owl-carousel').owlCarousel({
        loop:true,
        center:true,
        dots:true,
        navigation:true,
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
        margin:10,
        pagination : true,
        items : 1,
        itemsDesktop : false,
        itemsDesktopSmall : false,
        itemsTablet: false,
        itemsMobile : false,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:1,
            },
            767:{
                items:1,
            }
        }
    });

    $(document).on("click", ".add-to-cart-link", function (e){
        e.preventDefault();
        let addButton = $(this);
        addToCart(addButton.data('product-id'));
    });

    $(document).on("click", ".product-description", function (e){
        e.preventDefault();
        let id = $(this).data('postId');

        $.ajax({
            type: 'POST',
            url: '/wp-content/themes/sushi_v0.1/ajax/php/get_post.php',
            data: {
                id: id
            },
            cache: false,
            beforeSend: function() {
                $('.ajaxLoader').show();
            },
            success: function(html){
                $("#product-description-modal-content").html(html);
                $('#product-description-modal').modal('show');
                $('.ajaxLoader').hide();
            },
            error: function (data) {
                console.log(data);
                $('.ajaxLoader').hide();
            }
        });
    });
    
    $(document).on('click', '.show-order-confirm', function () {
        if($('#order-form').valid({
            lang : 'ru'
        })) {
            $('#order-modal').modal('show');
        }
    })
});