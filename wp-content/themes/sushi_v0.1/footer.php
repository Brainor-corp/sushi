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
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-6 col-12 control-group form-group">
                                            <label class="control-label">Фамилия и имя</label>
                                            <div class="controls">
                                                <div class="input-group input-group-sm">
                                                    <input type="text" size="30" class="form-control form-control-sm" placeholder="Иван Иванов" name="phone" required>
                                                </div>
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-6 col-12 control-group form-group">
                                            <label class="control-label">Название отеля</label>
                                            <div class="controls">
                                                <div class="input-group input-group-sm">
                                                    <input type="text" size="30" class="form-control form-control-sm" placeholder="Название отеля" required>
                                                </div>
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-6 col-12 control-group form-group">
                                            <label class="control-label">Местоположение</label>
                                            <div class="controls">
                                                <div class="input-group input-group-sm">
                                                    <input type="text" size="30" class="form-control form-control-sm" placeholder="Местоположение">
                                                </div>
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-6 col-12 control-group form-group">
                                            <label class="control-label">E-mail</label>
                                            <div class="controls">
                                                <div class="input-group input-group-sm">
                                                    <input type="e-mail" size="30" class="form-control form-control-sm" placeholder="example@mail.com" required>
                                                </div>
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-6 col-12 control-group form-group">
                                            <label class="control-label">Телефон</label>
                                            <div class="controls">
                                                <div class="input-group input-group-sm">
                                                    <span class="input-group-addon">+7</span>
                                                    <input type="text" size="30" class="form-control form-control-sm" placeholder="9124785527" required>
                                                </div>
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-6 col-12 control-group form-group">
                                            <label class="control-label">Через что позвонить:</label>
                                            <div class="controls">
                                                <select name="address" placeholder="Адрес доставки" class="form-control form-control-sm" required="required">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-6 col-12 control-group form-group">
                                            <label class="control-label">Количество человек</label>
                                            <div class="controls">
                                                <div class="input-group input-group-sm">
                                                    <input type="text" size="30" class="form-control form-control-sm" placeholder="укажите количество человек" required>
                                                </div>
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-6 col-12 control-group form-group">
                                            <label class="control-label">Примечание к заказу:</label>
                                            <div class="controls">
                                                <div class="input-group input-group-sm">
                                                    <input type="text" size="30" class="form-control form-control-sm" placeholder="Примечание">
                                                </div>
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-6 col-12 control-group form-group">
                                            <label class="control-label">Доставка:</label>
                                            <div class="controls">
                                                <select name="address" placeholder="Адрес доставки" class="form-control form-control-sm" required="required">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <input type="submit" name="checkout" class="btn btn-sm footerBtn" onclick="return $.checkOut('/', '#makeCheckOutFull')" value="Оформить заказ">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="col-12">
        <div class="text-center">
            <?php echo do_shortcode('[DISPLAY_ULTIMATE_SOCIAL_ICONS]'); ?>
        </div>
    </div>
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
