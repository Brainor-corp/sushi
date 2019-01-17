<?php
/**
 * Шаблон сайдбара (sidebar.php)
 * @package WordPress
 * @subpackage sushi_v0.1
 */
?>
<?php if (is_active_sidebar( 'sidebar' )) { // если в сайдбаре есть что выводить ?>
<aside class="col-sm-3">
	<?php dynamic_sidebar('sidebar'); // выводим сайдбар, имя определено в functions.php ?>
</aside>
<?php } ?>