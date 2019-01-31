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
//    'delivery'          => $_POST['delivery'], // Нужно кастомное поле
//    'people_count'      => $_POST['people_count'], // Нужно кастомное поле
//    'call_type'         => $_POST['call_type'], // Нужно кастомное поле
);

$order_data = array(
    'status'        => 'processing',
    'customer_note' => $_POST['order_comments']
);
$order = wc_create_order($order_data);

$items = WC()->cart->get_cart();
foreach($items as $item => $values) {
    $product_id = $values['product_id'];
    $product = wc_get_product($product_id);
    $quantity = (int)$values['quantity'];
    $order->add_product($product, $quantity);
}

$order->set_address( $address, 'shipping' );

$order->calculate_totals();

$order->add_meta_data('delivery', sanitize_text_field($_POST['delivery']));
$order->add_meta_data('people_count', sanitize_text_field($_POST['people_count']));
$order->add_meta_data('call_type', sanitize_text_field($_POST['call_type']));
$order->save();

WC()->cart->empty_cart();

echo 'todo Ajax'; // todo Ajax