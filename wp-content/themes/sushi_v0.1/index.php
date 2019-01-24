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
                    <a href="#" class="saleItem" data-toggle="modal" data-target="#modalTopMainMobile<?php the_ID()?>">
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

            <?php endwhile;
            wp_reset_query();
            ?>
        </div>
    </div>
</div>

<section id="sale" class="saleRama">
    <div class="container-fluid d-lg-block d-none">
        <div class="container nav-container">

            <div class="row mb-5">
                <?php	query_posts('cat=25'); // вместо "5" указываем идентификатор вашей рубрики.
                while (have_posts()) : the_post();?>
                <div class="col-md-4 col-12">

                        <div class="item">
                            <a href="#" class="saleItem" data-toggle="modal" data-target="#modalTopMain<?php the_ID()?>">
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

                </div>
                <?php endwhile;
                wp_reset_query();
                ?>
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
            <?php	query_posts('cat=2'); // указываем идентификатор вашей рубрики.
            while (have_posts()) : the_post();?>
            <h2 class="pt-5"><?php single_cat_title() ?></h2>
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
    <?php endwhile;
    wp_reset_query();
    ?>
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

<!--mobile-->
<?php	query_posts('cat=25'); // указываем идентификатор вашей рубрики.
while (have_posts()) : the_post();?>
    <div class="modal fade" id="modalTopMainMobile<?php the_ID()?>" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTopMainMobile<?php the_ID()?>">
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
<!--mobile-->
<!--desktop-->
    <div class="modal fade" id="modalTopMain<?php the_ID()?>" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTopMain<?php the_ID()?>">
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
<!--desktop-->
<?php endwhile;
wp_reset_query();
?>


<!--modals-->



<?php get_footer(); // подключаем footer.php ?>
