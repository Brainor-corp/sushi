<?php
/**
 * Страница корзины (техническая) (page-woocommerce-cart.php)
 * @package WordPress
 * @subpackage sushi_v0.1
 * Template Name: Страница корзины (техническая)
 */

get_header(); // подключаем header.php ?>
<?php echo do_shortcode('[woocommerce_cart]') ?>
<?php
/**
 * Cart collaterals hook.
 *
 * @hooked woocommerce_cross_sell_display
 * @hooked woocommerce_cart_totals - 10
 */
do_action( 'woocommerce_cart_collaterals' );
?>