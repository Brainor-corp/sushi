<?php

require_once( '../../../../../wp-load.php' );

$product = wc_get_product( $_POST['id'] );
$product_description = $product->get_description( $context );
$product_short_description = $product->get_short_description( $context );
?>
<?php if($product_short_description):?>
    <h4>Краткое описание:</h4>
    <p><?php echo $product_short_description ?></p>
<?php endif; ?>
<?php if($product_description):?>
    <h4>Описание:</h4>
    <p><?php echo $product_description ?></p>
<?php endif; ?>
