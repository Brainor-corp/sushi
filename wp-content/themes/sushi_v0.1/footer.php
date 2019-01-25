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
                <form action="/" method="post">
                    <div class="row">
                        <div class="col-lg-8 col-12">
                            <div class="padTable">
                                <table class="table table-responsive">
                                    <thead>
                                    <tr>
                                        <th class="col-6">Название</th>
                                        <th class="text-right">Цена</th>
                                        <th class="col-sm-1">Кол-во</th>
                                        <th class="text-right">Сумма</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    foreach($items as $item => $values):
                                    $product =  wc_get_product( $values['data']->get_id() );
                                    ?>

                                    <tr>
                                        <td class="col-6"><?php echo $product->get_name() ?></td>
                                        <td class="text-right"><?php echo $product->get_price_html() ?></td>
                                        <td class="col-sm-1">
                                            <div class="form-group">
                                                <input type="number" size="3" class="form-control form-control-sm valI" name="quantity_5776" id="quantity_5776" value="<?php echo $values['quantity']; ?>">
                                            </div>
                                        </td>
                                        <td class="text-right nobr">
                                            <?php
                                            $productTotal = $product->get_price() * $values['quantity'];
                                            ?>
                                            <strong><?php echo $productTotal; ?><?php echo get_woocommerce_currency_symbol(); ?></strong>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?php echo $woocommerce->cart->get_remove_url($item); ?>" class="del" title="Удалить товар из корзины">
                                                <i class="fas fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>


                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th></th>
                                        <th class="text-right">Итого:</th>
                                        <th></th>
                                        <th class="text-right nobr">
                                            <strong><?php echo $woocommerce->cart->get_cart_total(); ?></strong>
                                        </th>
                                        <th></th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-sm" name="coupon_text" placeholder="Промо-код" value="">
                                    </div>
                                </div>
                                <div class="col-md-3 col-12 mb-3 mb-md-0 text-right">
                                    <input type="button" name="recount" class="btn btn-sm footerBtn" onclick="return $.recountCart('/', '#makeCheckOutFull', '')" value="Пересчитать">
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-4 col-12">
                            <div class="checkOut stickyeah" data-stickyeah-offset="96" data-stickyeah-push="sub" data-stickyeah-class="open">
                                <div class="cnt">
                                    <div>Общая стоимость</div>
                                    <div class="total">
                                        <strong><?php echo $woocommerce->cart->get_cart_total(); ?></strong>
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
                </form>
            </div>
        </div>
        <div class="deliveryRules">
            <div class="row">
                <div class="col-sm-8">
                </div>
            </div>

        </div>
<!--        <div class="vcard">-->
<!--            <h1>-->
<!--                <div class="fn org">Сайт службы доставки суши</div>-->
<!--            </h1>-->
<!--            <div class="tel">-->
<!--                <span class="value" title="+7 (495) 800-08-88">(495) 800-08-88</span>-->
<!--            </div>-->
<!--            <div class="workhours">-->
<!--                <i class="far fa-clock"></i> 11:00-24:00-->
<!--            </div>-->
<!--        </div>-->
    </section>
    <div class="col-12">
        <div class="text-center">
            <?php echo do_shortcode('[DISPLAY_ULTIMATE_SOCIAL_ICONS]'); ?>asdasd
        </div>
    </div>
</footer>

<script src="<?php echo get_template_directory_uri(); ?>/plugins/slide-menu/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/plugins/slide-menu/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/plugins/mmenu/dist/jquery.mmenu.all.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/plugins/OwlCarousel/dist/owl.carousel.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
</div>
</body>
</html>
<?php wp_footer(); // необходимо для работы плагинов и функционала  ?>
