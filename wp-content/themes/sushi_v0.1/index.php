<?php
/**
 * Главная страница (index.php)
 * @package WordPress
 * @subpackage sushi_v0.1
 */
get_header(); // подключаем header.php ?> 
<section>
	<div class="container-fluid">
        <div class="container nav-container">
            <div class="row">
                <div class="col-md-4 col-12 border">1</div>
                <div class="col-md-4 col-12 border">2</div>
                <div class="col-md-4 col-12 border">3</div>
            </div>
            <h2>Роллы (рубрика)</h2>
            <div class="row">
                <div class="col-md-3 col-12">
                    товар
                </div>
                <div class="col-md-3 col-12">
                    товар
                </div>
                <div class="col-md-3 col-12">
                    товар
                </div>
                <div class="col-md-3 col-12">
                    товар
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); // подключаем footer.php ?>