<?php

require_once( '../../../../../wp-load.php' );

$product = wc_get_product( $_POST['id'] );
$product_description = $product->get_description();
$product_short_description = $product->get_short_description();
?>
<?php if($product_short_description):?>

    <?php

    $the_slug = 'options';
    $args = array(
        'name'        => $the_slug,
    );
    $optionsPost = get_posts($args);

    ?>

    <h5><?php the_field('short_description', $optionsPost->id)?></h5>
    <p><?php echo $product_short_description ?></p>
<?php endif; ?>
<?php if($product_description):?>
    <h5><?php the_field('full_description', $optionsPost->id)?></h5>
    <p><?php echo $product_description ?></p>
<?php endif; ?>
