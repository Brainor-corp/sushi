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
                                    <h5 class="modal-title" id="modalTopMain1">
                                        Бесплатная доставка при заказе на сумму свыше 1 000 Р
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true" class="text-danger">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Закажите товаров на сумму свыше 1000 рублей и мы доставим ваш заказ в любую точку города абсолютно бесплатно.</p>

                                    <p>Если же вы находитесь за городом, мы сделаем скидку на доставку вашего заказа.</p>

                                    <p>В акции принимают участие все товары из каталога, исключая алкогольные напитки.</p>

                                    <p>Акция действует с 1 января 2015 года до 1 января 2016 года.</p>

                                    <p>Уточняйте всю актуальную информацию об акциях и скидках у наших операторов.</p>
                                </div>
                            </div>
                        </div>
                    </div>
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
                            <img src="<?php echo get_template_directory_uri(); ?>/img/top-item2.jpg" class="img-responsive" alt="Бесплатная&nbsp;доставка при&nbsp;заказе на&nbsp;сумму свыше&nbsp;1&nbsp;000 <span class=&quot;rub&quot;>Р</span>">
                        </span>
                    </a>

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
                                    <p>Сайт доставки объявляет о начале акции «Покупай больше — плати меньше».</p>

                                    <p>Приобретая одновременно 4 и более товаров из нашего магазина вы экономите 10%.</p>

                                    <p>Скидку на весь заказ получает участник, оформивший покупку на сайте доставки или у оператора в период с 1 января 2015 года до 1 июня 2015 года.</p>

                                    <p>Акция распространяется на все товары из каталога, включая алкогольные напитки.</p>

                                    <p>Скидка по акции «Покупай больше — плати меньше» суммируется со скидками по другим акциям сайта доставки.</p>

                                    <p>Уточняйте всю актуальную информацию об акциях и скидках у наших операторов.</p>
                                </div>
                            </div>
                        </div>
                    </div>
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
                            <img src="<?php echo get_template_directory_uri(); ?>/img/top-item3.jpg" class="img-responsive" alt="Бесплатная&nbsp;доставка при&nbsp;заказе на&nbsp;сумму свыше&nbsp;1&nbsp;000 <span class=&quot;rub&quot;>Р</span>">
                        </span>
                    </a>

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
                                    <p>Наш сайт объявляет о начале акции «Счастливые часы»!</p>

                                    <p>Оформив покупку на сайте доставки или у оператора в период с 12:00 до 16:00 вы получаете скидку 10% на весь заказ.</p>

                                    <p>Акция действует с 1 января 2015 года до 1 января 2016 года и распространяется на все товары из каталога, включая алкогольные напитки.</p>

                                    <p>Скидка по акции «Счастливые часы» суммируется со скидками по другим акциям сайта доставки.</p>

                                    <p>Уточняйте всю актуальную информацию об акциях и скидках у наших операторов.</p>
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