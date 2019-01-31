<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 31.01.2019
 * Time: 13:47
 */

require_once( '../../../../../wp-load.php' );

global $woocommerce;

$date['cart'] = do_shortcode('[woocommerce_cart]');
$date['total'] = $woocommerce->cart->get_cart_total();

return json_encode($date);

?>