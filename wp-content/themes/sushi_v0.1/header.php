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
	<header id="top">
		<div class="container-fluid bg-light-grey head-fix" id="header-fixed">
            <div class="container nav-container ">
                <div class="row">
                    <div class="col-12 bg-light-grey">
                        <div class="row" id="shopMenu">
                            <div class="col-sm-9">
                                <ul class="list-inline mb-2">
                                    <li class="logo active list-inline-item">
                                        <a href="#top" title="Сайт службы доставки суши">
                                            <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" height="50" alt="Сайт службы доставки суши">
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#rolls">Роллы</a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#sushi">Суши</a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#combinations">Наборы</a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#drinks">Напитки</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-2 text-right">
                                <div id="topPhone">
                                    <strong>(495) 800-08-88</strong><br>
                                    <i class="fa fa-clock-o"></i>11:00-24:00
                                </div>
                            </div>
                            <div class="col-sm-1 text-right">
                                <a href="#cart" class="cartLink" id="cartLink" title="Корзина"><i class="fa fa-shopping-cart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</header>