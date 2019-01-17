<?php
/**
 * Главная страница (index.php)
 * @package WordPress
 * @subpackage sushi_v0.1
 */
get_header(); // подключаем header.php ?>

<section id="sale" class="saleRama">
    <div class="container-fluid">
        <div class="container nav-container">
            <div class="row mb-5">
                <div class="col-md-4 col-12">
                    <a href="#" class="saleItem" data-toggle="modal" data-target="#modalTopMain1">
                        <span class="cont">
                            <span class="header">Бесплатная&nbsp;доставка при&nbsp;заказе на&nbsp;сумму свыше&nbsp;1&nbsp;000
                                <span class="rub">Р</span>
                            </span>
                            <span class="description">
                                <p>В любой район города</p>
                            </span>
                        </span>
                        <span class="img">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/top-item1.jpg" class="img-responsive" alt="Бесплатная&nbsp;доставка при&nbsp;заказе на&nbsp;сумму свыше&nbsp;1&nbsp;000 <span class=&quot;rub&quot;>Р</span>">
                        </span>
                    </a>

                    <div class="modal fade" id="modalTopMain1" tabindex="-1" role="dialog"
                         aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true" class="text-danger">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <a href="#" class="saleItem" data-toggle="modal" data-target="#modalTopMain1">
                        <span class="cont">
                            <span class="header">Бесплатная&nbsp;доставка при&nbsp;заказе на&nbsp;сумму свыше&nbsp;1&nbsp;000
                                <span class="rub">Р</span>
                            </span>
                            <span class="description">
                                <p>В любой район города</p>
                            </span>
                        </span>
                        <span class="img">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/top-item1.jpg" class="img-responsive" alt="Бесплатная&nbsp;доставка при&nbsp;заказе на&nbsp;сумму свыше&nbsp;1&nbsp;000 <span class=&quot;rub&quot;>Р</span>">
                        </span>
                    </a>

                    <div class="modal fade" id="modalTopMain1" tabindex="-1" role="dialog"
                         aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true" class="text-danger">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <a href="#" class="saleItem" data-toggle="modal" data-target="#modalTopMain1">
                        <span class="cont">
                            <span class="header">Бесплатная&nbsp;доставка при&nbsp;заказе на&nbsp;сумму свыше&nbsp;1&nbsp;000
                                <span class="rub">Р</span>
                            </span>
                            <span class="description">
                                <p>В любой район города</p>
                            </span>
                        </span>
                        <span class="img">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/top-item1.jpg" class="img-responsive" alt="Бесплатная&nbsp;доставка при&nbsp;заказе на&nbsp;сумму свыше&nbsp;1&nbsp;000 <span class=&quot;rub&quot;>Р</span>">
                        </span>
                    </a>

                    <div class="modal fade" id="modalTopMain1" tabindex="-1" role="dialog"
                         aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true" class="text-danger">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section>
    <div class="container-fluid">
        <div class="container nav-container">
            <h2 class="pt-5">Роллы (рубрика)</h2>
            <div class="row">
                <?php for ($i = 0; $i < 10; $i++) { ?>
                    <div class="col-md-3 col-12 shopItem">
                        <div>
                            <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/img/1.jpg"
                                 alt="">
                        </div>
                        <div class="caption">
                            <h4>Аляска</h4>
                            <div class="summary"><p>Копченый лосось, крабовые палочки</p></div>
                            <div class="price">239 <span class="rub">Р</span></div>
                        </div>
                    </div>
                <?php } ?>
            </div>

        </div>
    </div>
</section>
<?php get_footer(); // подключаем footer.php ?>