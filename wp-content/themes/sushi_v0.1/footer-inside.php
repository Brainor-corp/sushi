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
            <h4 class="h2"><?php the_field('order_confirm', $optionsPost->id)?></h4>
            <div id="makeCheckOut">
                <div class="row">
                    <div class="col-lg-8 col-12" id="cart-container">
                        <?php echo do_shortcode('[woocommerce_cart]') ?>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="checkOut stickyeah" data-stickyeah-offset="96" data-stickyeah-push="sub" data-stickyeah-class="open">
                            <div class="cnt">
                                <div><?php the_field('total_cost', $optionsPost->id)?></div>
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
                                    <form action="/wp-content/themes/sushi_v0.1/create_order.php" method="post" id="order-form">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-6 col-12 control-group form-group">
                                                <label class="control-label"><?php the_field('last_and_first_name', $optionsPost->id)?></label>
                                                <div class="controls">
                                                    <div class="input-group input-group-sm">
                                                        <input type="text" size="30" class="form-control form-control-sm" id="formOrderName" name="name" data-rule-eng="true" required>
                                                    </div>
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-6 col-12 control-group form-group">
                                                <label class="control-label"><?php the_field('hotel_name', $optionsPost->id)?></label>
                                                <div class="controls">
                                                    <div class="input-group input-group-sm">
                                                        <input type="text" size="30" class="form-control form-control-sm" name="hotel" data-rule-eng="true" required>
                                                    </div>
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-6 col-12 control-group form-group">
                                                <label class="control-label"><?php the_field('location', $optionsPost->id)?></label></label>
                                                <div class="controls">
                                                    <input type="hidden" value="" name="google_map_coords" id="google_map_coords">
                                                    <input id="pac-input" name="google_map_address" class="form-control form-control-sm map-search-box" type="text" required>
                                                    <div id="map" class="mt-3"></div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-6 col-12 control-group form-group">
                                                <label class="control-label"><?php the_field('e-mail', $optionsPost->id)?></label></label>
                                                <div class="controls">
                                                    <div class="input-group input-group-sm">
                                                        <input type="email" size="30" class="form-control form-control-sm" placeholder="example@mail.com" required>
                                                    </div>
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-6 col-12 control-group form-group">
                                                <label class="control-label"><?php the_field('phone_order', $optionsPost->id)?></label></label>
                                                <div class="controls">
                                                    <div class="input-group input-group-sm">
                                                        <span class="input-group-addon">+7</span>
                                                        <input type="text" size="30" class="form-control form-control-sm" name="phone" placeholder="9124785527" required>
                                                    </div>
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-6 col-12 control-group form-group">
                                                <label class="control-label"><?php the_field('call_method', $optionsPost->id)?></label></label>
                                                <div class="controls">
                                                    <select name="call_type" placeholder="Адрес доставки" class="form-control form-control-sm" required="required">
                                                        <?php foreach (explode(';', get_field('call_type', $optionsPost->id)) as $option): ?>
                                                            <option value="<?php echo $option ?>"><?php echo $option ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-6 col-12 control-group form-group">
                                                <label class="control-label"><?php the_field('number_of_persons', $optionsPost->id)?></label></label>
                                                <div class="controls">
                                                    <div class="input-group input-group-sm">
                                                        <input type="text" size="30" class="form-control form-control-sm" name="people_count" required>
                                                    </div>
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-6 col-12 control-group form-group">
                                                <label class="control-label"><?php the_field('order_note', $optionsPost->id)?></label>
                                                <div class="controls">
                                                    <div class="input-group input-group-sm">
                                                        <input type="text" size="30" class="form-control form-control-sm" name="order_comments" data-rule-eng="true">
                                                    </div>
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-6 col-12 control-group form-group">
                                                <label class="control-label"><?php the_field('delivery_order', $optionsPost->id)?></label>
                                                <div class="controls">
                                                    <select name="delivery" class="form-control form-control-sm" required="required">
                                                        <?php foreach (explode(';', get_field('delivery', $optionsPost->id)) as $option): ?>
                                                            <option value="<?php echo $option ?>"><?php echo $option ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-sm footerBtn show-order-confirm">
                                            <?php the_field('checkout_btn', $optionsPost->id)?>
                                        </button>

                                        <!-- Order-Modal -->
                                        <div class="modal fade" id="order-modal" tabindex="-1" role="dialog" aria-labelledby="order-modalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-dark" id="order-modalLabel"><?php the_field('confirm_order', $optionsPost->id)?></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-dark">
                                                        <?php the_field('you_sure', $optionsPost->id)?>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php the_field('continue_btn', $optionsPost->id)?></button>
                                                        <button type="submit" class="btn btn-primary"><?php the_field('confirm_btn', $optionsPost->id)?></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Result-Modal -->
                                        <div class="modal fade" id="result-modal" tabindex="-1" role="dialog" aria-labelledby="result-modalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-dark" id="result-modalLabel"><?php the_field('order_status', $optionsPost->id)?></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-dark content">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php the_field('close_btn', $optionsPost->id)?></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
