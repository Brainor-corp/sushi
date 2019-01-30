<?php

require_once( '../../../wp-load.php' );

global $woocommerce;

$address = array(
    'first_name'        => $_POST['name'],
    'email'             => $_POST['email'],
    'phone'             => $_POST['phone'],
    'address_1'         => $_POST['google_map_address'],
    'address_2'         => $_POST['google_map_coords'],
    'company'           => $_POST['hotel'], // Представим, что компания -- это отель
    'delivery'          => $_POST['delivery'], // Нужно кастомное поле
    'people_count'      => $_POST['people_count'], // Нужно кастомное поле
    'call_type'         => $_POST['call_type'], // Нужно кастомное поле
);

$order = wc_create_order();

$items = WC()->cart->get_cart();
foreach($items as $item => $values) {
    $product_id = $values['product_id'];
    $product = wc_get_product($product_id);
    $var_id = $values['variation_id'];
    $var_slug = $values['variation']['attribute_pa_weight'];
    $quantity = (int)$values['quantity'];
    $variationsArray = array();
    $variationsArray['variation'] = array(
        'pa_weight' => $var_slug
    );
    $var_product = new WC_Product_Variation($var_id);
    $order->add_product($var_product, $quantity, $variationsArray);
}

$order->add_order_note( $_POST['order_comments'] );
$order->set_address( $address, 'billing' );
$order->set_address( $address, 'shipping' );

$order->calculate_totals();
$order->update_status( 'processing' );

WC()->cart->empty_cart();

echo 'todo Ajax'; // todo Ajax