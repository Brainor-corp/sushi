<?php
/**
 * Шаблон подвала (footer.php)
 * @package WordPress
 * @subpackage sushi_v0.1
 */
?>
	<footer id="cart">
		<div class="container-fluid bg-footer">
			<div class="container nav-container">
                <div class="row">
                    <div class="col-12 text-white">
                        <h1>Тут будет выводиться цена заказа</h1>
                    </div>
                </div>
            </div>
		</div>
	</footer>

<?php wp_footer(); // необходимо для работы плагинов и функционала  ?>
<script src="<?php echo get_template_directory_uri(); ?>/plugins/slide-menu/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/plugins/slide-menu/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/plugins/mmenu/dist/jquery.mmenu.all.js"></script>
</div>
</body>
</html>