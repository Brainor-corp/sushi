<?php
/**
 * Главная страница (index.php)
 * @package WordPress
 * @subpackage sushi_v0.1
 */
get_header(); // подключаем header.php ?>
<div id="top" class="container-fluid d-lg-none d-block">
    <div class="container nav-container mt-owl saleRama">
        <div class="owl-carousel owl-theme" id="owl-main">
            <?php	query_posts('cat=25'); // указываем идентификатор вашей рубрики.
            while (have_posts()) : the_post();?>


                <div class="item">
                    <a href="#" class="saleItem" data-toggle="modal" data-target="#modalTopMain1">
                        <span class="cont">
                            <span class="header"><?php the_title(); ?></span>
                            <span class="description">
                                <p><?php the_content(); // вывод текста записи ?></p>
                            </span>
                        </span>
                            <span class="img">
                            <img src="<?php echo get_the_post_thumbnail(); ?>">
                        </span>
                    </a>
                </div>



                <div class="modal fade" id="modalTopMain1" tabindex="-1" role="dialog"
                     aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTopMain1">
                                    <p><?php the_content(); // вывод текста записи ?></p>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" class="text-danger">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p><?php get_field('') ?></p>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endwhile;
            wp_reset_query();
            ?>

<!--            <div class="item">-->
<!--                <a href="#" class="saleItem" data-toggle="modal" data-target="#modalTopMain1">-->
<!--                    <span class="cont">-->
<!--                        <span class="header">-->
<!--                            Бесплатная доставка при заказе на сумму свыше 1 000-->
<!--                            <span class=""><i class="fas fa-ruble-sign"></i></span>-->
<!--                        </span>-->
<!--                        <span class="description">-->
<!--                            <p>В любой район города</p>-->
<!--                        </span>-->
<!--                    </span>-->
<!--                    <span class="img">-->
<!--                        <img src="--><?php //echo get_template_directory_uri(); ?><!--/img/top-item1.jpg" class="img-responsive" alt="Бесплатная доставка при заказе на сумму свыше 1 000 <span class=&quot;ruble-ico&quot;>Р</span>">-->
<!--                    </span>-->
<!--                </a>-->
<!--            </div>-->
            <div class="item">
                <a href="#" class="saleItem" data-toggle="modal" data-target="#modalTopMain2">
                    <span class="cont">
                        <span class="header">Покупай больше — плати меньше</span>
                        <span class="description">
                            <p>Скидка 10% при покупке 4х и более товаров</p>
                        </span>
                    </span>
                    <span class="img">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/top-item2.jpg" class="img-responsive" alt="Бесплатная доставка при заказе на сумму свыше 1 000 <span class=&quot;ruble-ico&quot;>Р</span>">
                    </span>
                </a>
            </div>
            <div class="item">
                <a href="#" class="saleItem" data-toggle="modal" data-target="#modalTopMain3">
                    <span class="cont">
                        <span class="header">Счастливые часы: скидка — 10%</span>
                        <span class="description">
                            <p>Скидка при заказе в период с 12 до 16</p>
                        </span>
                    </span>
                    <span class="img">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/top-item3.jpg" class="img-responsive" alt="Бесплатная доставка при заказе на сумму свыше 1 000 <span class=&quot;ruble-ico&quot;>Р</span>">
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>

<section id="sale" class="saleRama">
    <div class="container-fluid d-lg-block d-none">
        <div class="container nav-container">
            <div class="row mb-5">
                <div class="col-md-4 col-12">
                    <?php	query_posts('cat=25'); // вместо "5" указываем идентификатор вашей рубрики.
                    while (have_posts()) : the_post();?>
                        <div class="item">
                            <a href="#" class="saleItem" data-toggle="modal" data-target="#modalTopMain1">
                                <span class="cont">
                                    <span class="header"><?php the_title(); ?></span>
                                    <span class="description">
                                        <p><?php the_content(); // вывод текста записи ?></p>
                                    </span>
                                </span>
                                <span class="img">
                                    <?php echo get_the_post_thumbnail(); ?>
                                </span>
                            </a>
                        </div>
                    <?php endwhile;
                    wp_reset_query();
                    ?>
                </div>
                <div class="col-md-4 col-12">
                    <a href="#" class="saleItem" data-toggle="modal" data-target="#modalTopMain2">
                        <span class="cont">
                            <span class="header">Покупай больше — плати меньше</span>
                            <span class="description">
                                <p>Скидка 10% при покупке 4х и более товаров</p>
                            </span>
                        </span>
                        <span class="img">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/top-item2.jpg" class="img-responsive" alt="Бесплатная доставка при заказе на сумму свыше 1 000 <span class=&quot;ruble-ico&quot;>Р</span>">
                        </span>
                    </a>
                </div>
                <div class="col-md-4 col-12">
                    <a href="#" class="saleItem" data-toggle="modal" data-target="#modalTopMain3">
                        <span class="cont">
                            <span class="header">Счастливые часы: скидка — 10%</span>
                            <span class="description">
                                <p>Скидка при заказе в период с 12 до 16</p>
                            </span>
                        </span>
                        <span class="img">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/top-item3.jpg" class="img-responsive" alt="Бесплатная доставка при заказе на сумму свыше 1 000 <span class=&quot;ruble-ico&quot;>Р</span>">
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


<section>

</section>
<div data-spy="scroll" data-target="#list-products" id="list-products-spy">




<!--    загрузчик при добавлении в корзину-->
    <div id="ajaxLoader d-none">
        <div class="loaderRing">
            <div class="loaderHolder">
                <div class="loaderBall"></div>
            </div>
        </div>
    </div>
<!--    загрузчик при добавлении в корзину-->




    <!--    роллы-->
    <div class="container-fluid">
        <div class="container nav-container" style="position: relative; overflow: hidden">
            <div style="position: absolute; top: -50px" id="rolls"></div>
            <h2 class="pt-5">Роллы (рубрика)</h2>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-6 shopItem">
                    <?php
                    echo do_shortcode('[product_category columns="1" per_page="0" orderby="date" order="desc" category="rolls"]');
                    ?>

<!--                        <div>-->
<!--                            <a class="fancybox image" href="--><?php //echo get_template_directory_uri(); ?><!--/img/1.jpg">-->
<!--                                <span class="openimg addToCart"><i class="fas fa-search-plus"></i></span>-->
<!--                            </a>-->
<!--                            <img class="img-fluid" src="--><?php //echo get_template_directory_uri(); ?><!--/img/1.jpg" alt="">-->
<!---->
<!--                            <span class="cart2 addToCart"><i class="fa fa-shopping-cart"></i></span>-->
<!---->
<!--                        </div>-->
<!--                        <div class="caption">-->
<!--                            <h4>Аляска</h4>-->
<!--                            <div class="summary"><p>Копченый лосось, крабовые палочки</p></div>-->
<!--                            <div class="price">239 <span><img class="ruble-ico" src="--><?php //echo get_template_directory_uri(); ?><!--/img/svg/icons/rubble-red.svg" alt=""></span></div>-->
<!--                        </div>-->
                </div>
            </div>
        </div>
    </div>
    <!--    роллы-->

    <!--    суши-->
    <div class="container-fluid">
        <div class="container nav-container" style="position: relative; overflow: hidden">
            <div style="position: absolute; top: -50px" id="sushi"></div>
            <h2 class="pt-5">Суши (рубрика)</h2>
            <div class="row">
                <?php for ($i = 0; $i < 4; $i++) { ?>
                    <div class="col-lg-3 col-md-4 col-6 shopItem">
                        <div>
                            <a class="fancybox image" href="<?php echo get_template_directory_uri(); ?>/img/1.jpg">
                                <span class="openimg addToCart"><i class="fas fa-search-plus"></i></span>
                            </a>
                            <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/img/1.jpg" alt="">
                            <span class="cart2 addToCart"><i class="fa fa-shopping-cart"></i></span>
                        </div>
                        <div class="caption">
                            <h4>Аляска</h4>
                            <div class="summary"><p>Копченый лосось, крабовые палочки</p></div>
                            <div class="price">239 <span><img class="ruble-ico" src="<?php echo get_template_directory_uri(); ?>/img/svg/icons/rubble-red.svg" alt=""></span></div>
                        </div>
                    </div>
                <?php } ?>
            </div>

        </div>
    </div>
    <!--    суши-->

    <!--    наборы-->
    <div class="container-fluid">
        <div class="container nav-container" style="position: relative; overflow: hidden">
            <div style="position: absolute; top: -50px" id="combinations"></div>
            <h2 class="pt-5">Наборы (рубрика)</h2>
            <div class="row">
                <?php for ($i = 0; $i < 4; $i++) { ?>
                    <div class="col-lg-3 col-md-4 col-6 shopItem">
                        <div>
                            <a class="fancybox image" href="<?php echo get_template_directory_uri(); ?>/img/1.jpg">
                                <span class="openimg addToCart"><i class="fas fa-search-plus"></i></span>
                            </a>
                            <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/img/1.jpg" alt="">
                            <span class="cart2 addToCart"><i class="fa fa-shopping-cart"></i></span>
                        </div>
                        <div class="caption">
                            <h4>Аляска</h4>
                            <div class="summary"><p>Копченый лосось, крабовые палочки</p></div>
                            <div class="price">239 <span><img class="ruble-ico" src="<?php echo get_template_directory_uri(); ?>/img/svg/icons/rubble-red.svg" alt=""></span></div>
                        </div>
                    </div>
                <?php } ?>
            </div>

        </div>
    </div>
    <!--    наборы-->

    <!--    напитки-->
    <div class="container-fluid">
        <div class="container nav-container" style="position: relative; overflow: hidden">
            <div style="position: absolute; top: -50px" id="drinks"></div>
            <h2 class="pt-5">Напитки (рубрика)</h2>
            <div class="row">
                <?php for ($i = 0; $i < 4; $i++) { ?>
                    <div class="col-lg-3 col-md-4 col-6 shopItem">
                        <div>
                            <a class="fancybox image" href="<?php echo get_template_directory_uri(); ?>/img/1.jpg">
                                <span class="openimg addToCart"><i class="fas fa-search-plus"></i></span>
                            </a>
                            <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/img/1.jpg" alt="">
                            <span class="cart2 addToCart"><i class="fa fa-shopping-cart"></i></span>
                        </div>
                        <div class="caption">
                            <h4>Аляска</h4>
                            <div class="summary"><p>Копченый лосось, крабовые палочки</p></div>
                            <div class="price">239 <span><img class="ruble-ico" src="<?php echo get_template_directory_uri(); ?>/img/svg/icons/rubble-red.svg" alt=""></span></div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!--    напитки-->
</div>


<!--modals-->


<div class="modal fade" id="modalTopMain1" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTopMain1">
                    <?php the_title(); ?>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-danger">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php the_field('text'); ?>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="modalTopMain2" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTopMain2">
                    Покупай больше — плати меньше
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-danger">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php the_field('text'); ?>
            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="modalTopMain3" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTopMain3">
                    Счастливые часы: скидка — 10%
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-danger">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php the_field('text'); ?>
            </div>
        </div>
    </div>
</div>

<!--modals-->











<?php get_footer(); // подключаем footer.php ?>
