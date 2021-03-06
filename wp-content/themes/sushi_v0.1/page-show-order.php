<?php
/**
 * Страница просмотра заказа (page-woocommerce-cart.php)
 * @package WordPress
 * @subpackage sushi_v0.1
 * Template Name: Страница просмотра заказа
 */

get_header(); // подключаем header.php ?>
<?php echo do_shortcode('[woocommerce_cart]') ?>
<?php
    $order_id = $_GET['order'];
    $order = wc_get_order( $order_id );
    if($order) {
        $order_data = $order->get_data(); // The Order data

        $order_id = $order_data['id'];
        $order_parent_id = $order_data['parent_id'];
        $order_status = $order_data['status'];
        $order_currency = $order_data['currency'];
        $order_version = $order_data['version'];
        $order_payment_method = $order_data['payment_method'];
        $order_payment_method_title = $order_data['payment_method_title'];
        $order_payment_method = $order_data['payment_method'];
        $order_payment_method = $order_data['payment_method'];

        ## Creation and modified WC_DateTime Object date string ##

        // Using a formated date ( with php date() function as method)
        $order_date_created = $order_data['date_created']->date('Y-m-d H:i:s');
        $order_date_modified = $order_data['date_modified']->date('Y-m-d H:i:s');

        // Using a timestamp ( with php getTimestamp() function as method)
        $order_timestamp_created = $order_data['date_created']->getTimestamp();
        $order_timestamp_modified = $order_data['date_modified']->getTimestamp();


        $order_discount_total = $order_data['discount_total'];
        $order_discount_tax = $order_data['discount_tax'];
        $order_shipping_total = $order_data['shipping_total'];
        $order_shipping_tax = $order_data['shipping_tax'];
        $order_total = $order_data['cart_tax'];
        $order_total_tax = $order_data['total_tax'];
        $order_customer_id = $order_data['customer_id']; // ... and so on

        ## BILLING INFORMATION:

        $order_billing_first_name = $order_data['billing']['first_name'];
        $order_billing_last_name = $order_data['billing']['last_name'];
        $order_billing_company = $order_data['billing']['company'];
        $order_billing_address_1 = $order_data['billing']['address_1'];
        $order_billing_address_2 = $order_data['billing']['address_2'];
        $order_billing_city = $order_data['billing']['city'];
        $order_billing_state = $order_data['billing']['state'];
        $order_billing_postcode = $order_data['billing']['postcode'];
        $order_billing_country = $order_data['billing']['country'];
        $order_billing_email = $order_data['billing']['email'];
        $order_billing_phone = $order_data['billing']['phone'];

        ## SHIPPING INFORMATION:

        $order_shipping_first_name = $order_data['shipping']['first_name'];
        $order_shipping_last_name = $order_data['shipping']['last_name'];
        $order_shipping_company = $order_data['shipping']['company'];
        $order_shipping_address_1 = $order_data['shipping']['address_1'];
        $order_shipping_address_2 = $order_data['shipping']['address_2'];
        $order_shipping_city = $order_data['shipping']['city'];
        $order_shipping_state = $order_data['shipping']['state'];
        $order_shipping_postcode = $order_data['shipping']['postcode'];
        $order_shipping_country = $order_data['shipping']['country'];

        // Iterating through each WC_Order_Item_Product objects
        foreach ($order->get_items() as $item_key => $item_values){
            ## Using WC_Order_Item methods ##

            // Item ID is directly accessible from the $item_key in the foreach loop or
            $item_id = $item_values->get_id();

            ## Using WC_Order_Item_Product methods ##

            $item_name = $item_values->get_name(); // Name of the product
            $item_type = $item_values->get_type(); // Type of the order item ("line_item")

            $product_id = $item_values->get_product_id(); // the Product id
            $product = $item_values->get_product(); // the WC_Product object

            ## Access Order Items data properties (in an array of values) ##
            $item_data = $item_values->get_data();

            $product_name = $item_data['name'];
            $product_id = $item_data['product_id'];
            $variation_id = $item_data['variation_id'];
            $quantity = $item_data['quantity'];
            $tax_class = $item_data['tax_class'];
            $line_subtotal = $item_data['subtotal'];
            $line_subtotal_tax = $item_data['subtotal_tax'];
            $line_total = $item_data['total'];
            $line_total_tax = $item_data['total_tax'];

            // Get data from The WC_product object using methods (examples)
            $product_type   = $product->get_type();
            $product_sku    = $product->get_sku();
            $product_price  = $product->get_price();
            $stock_quantity = $product->get_stock_quantity();
        };
    }
?>

<div class="container">
    <div class="row">
        <?php if($order): ?>
            <div class="col-12">
                <div class="form-group">
                    <label for="id">Номер заказа</label>
                    <span><?php echo $order_data['id'] ?></span>
                </div>
                <div class="form-group">
                    <label for="id">Статус заказа</label>
                    <span><?php echo $order_data['status'] ?></span>
                </div>
                <div class="form-group">
                    <label for="id">Способ оплаты</label>
                    <span><?php echo $order_data['payment_method_title'] ?></span>
                </div>
            </div>
        <?php endif ?>
    </div>
</div>
