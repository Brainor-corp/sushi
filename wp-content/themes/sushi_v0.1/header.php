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
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/pages/general-media.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/plugins/mmenu/dist/jquery.mmenu.all.css">
    <link href="<?php echo get_template_directory_uri(); ?>/plugins/slide-menu/css/simple-sidebar.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/plugins/OwlCarousel/dist/assets/owl.carousel.min.css" rel="stylesheet">

	<?php /* Все скрипты и стили теперь подключаются в functions.php */ ?>

	<!--[if lt IE 9]>
	<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<?php wp_head(); // необходимо для работы плагинов и функционала ?>
</head>
<body <?php body_class(); // все классы для body ?>>





    <div class="d-lg-none d-block container-fluid head-fix">
        <div class="header iMenu visible-xs mm-fixed-top">
            <div class="container-fluid">
                <div class="rowMenu">
                    <a href="#menu" class="menu"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Сайт службы доставки суши"></a>
                    <a href="#cart" class="anchor cartLink" id="cartLinkSmall" onclick="goFooter(); return false;" title="Корзина"><i class="fa fa-shopping-cart"></i></a>
                </div>
            </div>
        </div>
        <nav id="menu">
            <ul id="mm-0">
                <li>
                    <a href="#rolls" class="anchor">Роллы</a>
                </li>
                <li>
                    <a href="#sushi" class="anchor">Суши</a>
                </li>
                <li>
                    <a href="#combinations" class="anchor">Наборы</a>
                </li>
                <li>
                    <a href="#drinks" class="anchor">Напитки</a>
                </li>
                <li id="menuInfo">
                    <p class="menuPhone p-5">
                        <strong>(495) 800-08-88</strong><br><i class="far fa-clock"></i> 11:00-24:00
                    </p>
                    <p class="aboutDelivery">
                    </p>
                </li>
            </ul>
        </nav>
    </div>
    <div>
        <header id="top" class="d-lg-block d-none">
            <div class="container-fluid bg-light-grey head-fix" id="header-fixed">
                <div class="container nav-container">
                    <div class="row">
                        <div class="col-12 bg-light-grey">
                            <div class="row shopMenu" id="shopMenu">
                                <div class="col-sm-9" id="list-products" >
                                    <ul class="list-inline mb-2">
                                        <li class="logo list-inline-item">
                                            <a href="#top" class="anchor" title="Сайт службы доставки суши">
                                                <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" height="50" alt="Сайт службы доставки суши">
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#rolls" class="anchor">Роллы</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#sushi" class="anchor">Суши</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#combinations" class="anchor">Наборы</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#drinks" class="anchor">Напитки</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-sm-2 text-right">
                                    <div class="topPhone">
                                        <strong>(495) 800-08-88</strong><br>
                                        <i class="far fa-clock"></i>11:00-24:00
                                    </div>
                                </div>
                                <div class="col-sm-1 text-right">
                                    <a href="#cart" class="cartLink anchor" id="cartLink" title="Корзина"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
