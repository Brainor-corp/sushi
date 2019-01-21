$(document).ready(function () {
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

    var b, j = $("#shopMenu"),
    menuItems = j.find("li > a"), scrollItems = menuItems.map(function() {
        var m = $($(this).attr("href"));
        if (m.length) {
            return m
        }
    });

    g = j.outerHeight();

    $(window).scroll(function() {
        var m = $(this).scrollTop() + g;
        var n = scrollItems.map(function() {
            if ($(this).offset().top < m) {
                return this
            }
        });
        n = n[n.length - 1];
        var o = n && n.length ? n[0].id : "";
        if (b !== o) {
            b = o;
            menuItems.parent().removeClass("active").end().filter("[href$='" + o + "']").parent().addClass("active")
        }
        if ($(this).scrollTop() < 10) {
            menuItems.removeClass("active")
        }
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

    $('.addToCart').on("click", function (){
        $('#cartLink').addClass('cartLink-big');
        $('#cartLinkSmall').addClass('cartLink-big');
        setTimeout (function(){
            $('#cartLink').removeClass('cartLink-big');
            $('#cartLinkSmall').removeClass('cartLink-big');
        }, 350);
    });

});