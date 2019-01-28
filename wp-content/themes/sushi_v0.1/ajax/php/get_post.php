<?php

require_once( '../../../../../wp-load.php' );

$product = wc_get_product( $_POST['id'] );

var_dump($product);