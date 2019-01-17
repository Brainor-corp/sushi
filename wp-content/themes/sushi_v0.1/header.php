<?php
/**
 * Шаблон шапки (header.php)
 * @package WordPress
 * @subpackage sushi_v0.1
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); // вывод атрибутов языка ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); // кодировка ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php /* RSS и всякое */ ?>
	<link rel="alternate" type="application/rdf+xml" title="RDF mapping" href="<?php bloginfo('rdf_url'); ?>">
	<link rel="alternate" type="application/rss+xml" title="RSS" href="<?php bloginfo('rss_url'); ?>">
	<link rel="alternate" type="application/rss+xml" title="Comments RSS" href="<?php bloginfo('comments_rss2_url'); ?>">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/pages/main-page.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/pages/main-page-media.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/pages/general.css">

	<?php /* Все скрипты и стили теперь подключаются в functions.php */ ?>

	<!--[if lt IE 9]>
	<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<?php wp_head(); // необходимо для работы плагинов и функционала ?>
</head>
<body <?php body_class(); // все классы для body ?>>
	<header>
		<div class="container-fluid bg-light-grey">
            <div class="container nav-container ">
                <div class="row">
                    <div class="col-12 bg-light-grey">
                        <div class="row">
                            <div class="col">
                                <a class="text-uppercase" href="#">Главная</a>
                                <a class="text-uppercase" href="#">Роллы</a>
                                <a class="text-uppercase" href="#">Суши</a>
                                <a class="text-uppercase" href="#">Наборы</a>
                                <a class="text-uppercase" href="#">Напитки</a>
                            </div>
                            <div class="col">
                                <p class="mb-0 text-right">(495) 800-08-88</p>
                                <p class="mb-0 text-right">11:00-24:00</p>
                            </div>
                            <div class="col">
                                знач.кор
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</header>