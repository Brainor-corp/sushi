<?php
/**
 * Шаблон подвала (footer.php)
 * @package WordPress
 * @subpackage sushi_v0.1
 */
?>

<footer id="cart">
    <?php
    global $woocommerce;
    $items = $woocommerce->cart->get_cart();
    ?>

    <section class="container-fluid">
        <div id="makeCheckOutFull" class="container nav-container px-0">
            <h4 class="h2">Оформление заказа</h4>
            <div id="makeCheckOut">
                <div class="row">
                    <div class="col-lg-8 col-12" id="cart-container">
                        <?php echo do_shortcode('[woocommerce_cart]') ?>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="checkOut stickyeah" data-stickyeah-offset="96" data-stickyeah-push="sub" data-stickyeah-class="open">
                            <div class="cnt">
                                <div>Общая стоимость</div>
                                <div class="total">
<!--                                    <strong>--><?php //echo $woocommerce->cart->get_cart_total(); ?><!--</strong>-->
                                    <div class="cart-collaterals" id="cart-total-container">
                                        <?php
                                        /**
                                         * Cart collaterals hook.
                                         *
                                         * @hooked woocommerce_cross_sell_display
                                         * @hooked woocommerce_cart_totals - 10
                                         */
                                        do_action( 'woocommerce_cart_collaterals' );
                                        ?>
                                    </div>
                                </div>
                                <div class="checkOutBtn">
                                    <form action="/wp-content/themes/sushi_v0.1/create_order.php" method="post">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-6 col-12 control-group form-group">
                                                <label class="control-label">Фамилия и имя</label>
                                                <div class="controls">
                                                    <div class="input-group input-group-sm">
                                                        <input type="text" size="30" class="form-control form-control-sm" placeholder="Иван Иванов" name="name" required>
                                                    </div>
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-6 col-12 control-group form-group">
                                                <label class="control-label">Название отеля</label>
                                                <div class="controls">
                                                    <div class="input-group input-group-sm">
                                                        <input type="text" size="30" class="form-control form-control-sm" placeholder="Название отеля" name="hotel" required>
                                                    </div>
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-6 col-12 control-group form-group">
                                                <label class="control-label">Местоположение</label>
                                                <div class="controls">
                                                    <input type="hidden" value="" name="google_map_coords" id="google_map_coords">
                                                    <input id="pac-input" name="google_map_address" class="form-control form-control-sm map-search-box" type="text" placeholder="Поиск.." required>
                                                    <div id="map" class="mt-3"></div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-6 col-12 control-group form-group">
                                                <label class="control-label">E-mail</label>
                                                <div class="controls">
                                                    <div class="input-group input-group-sm">
                                                        <input type="email" size="30" class="form-control form-control-sm" placeholder="example@mail.com" required>
                                                    </div>
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-6 col-12 control-group form-group">
                                                <label class="control-label">Телефон</label>
                                                <div class="controls">
                                                    <div class="input-group input-group-sm">
                                                        <span class="input-group-addon">+7</span>
                                                        <input type="text" size="30" class="form-control form-control-sm" name="phone" placeholder="9124785527" required>
                                                    </div>
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-6 col-12 control-group form-group">
                                                <label class="control-label">Через что позвонить:</label>
                                                <div class="controls">
                                                    <select name="call_type" placeholder="Адрес доставки" class="form-control form-control-sm" required="required">
                                                        <?php foreach (explode(';', get_field('call_type', $optionsPost->id)) as $option): ?>
                                                            <option value="<?php echo $option ?>"><?php echo $option ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-6 col-12 control-group form-group">
                                                <label class="control-label">Количество человек</label>
                                                <div class="controls">
                                                    <div class="input-group input-group-sm">
                                                        <input type="text" size="30" class="form-control form-control-sm" placeholder="укажите количество человек" name="people_count" required>
                                                    </div>
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-6 col-12 control-group form-group">
                                                <label class="control-label">Примечание к заказу:</label>
                                                <div class="controls">
                                                    <div class="input-group input-group-sm">
                                                        <input type="text" size="30" class="form-control form-control-sm" name="order_comments" placeholder="Примечание">
                                                    </div>
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-6 col-12 control-group form-group">
                                                <label class="control-label">Доставка:</label>
                                                <div class="controls">
                                                    <select name="delivery" placeholder="Адрес доставки" class="form-control form-control-sm" required="required">
                                                        <?php foreach (explode(';', get_field('delivery', $optionsPost->id)) as $option): ?>
                                                            <option value="<?php echo $option ?>"><?php echo $option ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-sm footerBtn">Оформить заказ</button>
                                    </div>
                                </div>
<!--                                --><?php //echo do_shortcode('[woocommerce_checkout]') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</footer>

<!--<script src="--><?php //echo get_template_directory_uri(); ?><!--/plugins/slide-menu/vendor/jquery/jquery.min.js"></script>-->
<script src="<?php echo get_template_directory_uri(); ?>/plugins/mmenu/dist/jquery.mmenu.all.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/plugins/OwlCarousel/dist/owl.carousel.min.js"></script>
<!--<script src="--><?php //echo get_template_directory_uri(); ?><!--/plugins/slide-menu/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>-->
<!--<script src="--><?php //echo get_template_directory_uri(); ?><!--/js/main.js"></script>-->
</div>
</body>
</html>
<?php wp_footer(); // необходимо для работы плагинов и функционала  ?>
