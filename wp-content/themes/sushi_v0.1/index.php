<?php
/**
 * Главная страница (index.php)
 * @package WordPress
 * @subpackage sushi_v0.1
 */
get_header(); // подключаем header.php ?>
<div id="top" class="container-fluid d-lg-none d-block">
    <div class="container nav-container mt-owl saleRama">
        <div class="owl-carousel owl-theme" id="owl-main">
            <?php	query_posts('cat=25'); // указываем идентификатор вашей рубрики.
            while (have_posts()) : the_post();?>
                <div class="item">
                    <a href="#" class="saleItem" data-toggle="modal" data-target="#modalTopMainMobile<?php the_ID()?>">
                        <span class="cont">
                            <span class="header"><?php the_title(); ?></span>
                            <span class="description">
                                <p><?php the_content(); // вывод текста записи ?></p>
                            </span>
                        </span>
                            <span class="img">
                            <img src="<?php echo get_the_post_thumbnail(); ?>">
                        </span>
                    </a>
                </div>
            <?php endwhile;
            wp_reset_query();
            ?>
        </div>
    </div>
</div>

<section id="sale" class="saleRama">
    <div class="container-fluid d-lg-block d-none">
        <div class="container nav-container">

            <div class="row mb-5">
                <?php	query_posts('cat=25'); // вместо "5" указываем идентификатор вашей рубрики.
                while (have_posts()) : the_post();?>
                <div class="col-md-4 col-12">
                    <div class="item">
                        <a href="#" class="saleItem" data-toggle="modal" data-target="#modalTopMain<?php the_ID()?>">
                            <span class="cont">
                                <span class="header"><?php the_title(); ?></span>
                                <span class="description">
                                    <p><?php the_content(); // вывод текста записи ?></p>
                                </span>
                            </span>
                            <span class="img">
                                <?php echo get_the_post_thumbnail(); ?>
                            </span>
                        </a>
                    </div>
                </div>
                <?php endwhile;
                wp_reset_query();
                ?>
            </div>
        </div>
    </div>
</section>


<section>

</section>
<div data-spy="scroll" data-target="#list-products" id="list-products-spy">




<!--    загрузчик при добавлении в корзину-->
    <div class="ajaxLoader">
        <div class="loaderRing">
            <div class="loaderHolder">
                <div class="loaderBall"></div>
            </div>
        </div>
    </div>
<!--    загрузчик при добавлении в корзину-->


    <?php

    $categories =
        get_categories( array(
        'taxonomy'     => 'product_cat',
        'orderby'      => 'name',
        'order'        => 'ASC',
        'hide_empty'   => 1,
    ) );

    ?>

    <?php foreach ($categories as $category) :?>

        <div class="container-fluid">
            <div class="container nav-container" style="position: relative; overflow: hidden">
                <div style="position: absolute; top: -50px" id="<?php echo $category->slug ?>"></div>
                <?php
                $terms = get_terms( array('slug' => $category->slug));

                $args = array(
                    'post_type'             => 'product',
                    'numberposts'           => -1,
                    'tax_query'             => array(
                        array(
                            'taxonomy'      => $category->taxonomy,
                            'field'         => 'id',
                            'terms'         => array($category->term_id),
                            'operator'      => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
                        ),
                    )
                );
                $products = get_posts($args);
                ?>
                <h2 class="pt-5"><?php echo $category->name; ?></h2>
                <div class="row">
                    <?php foreach ($products as $post):;
                        $wcProduct = wc_get_product($post->ID);
                        ?>
                        <div class="col-lg-3 col-md-4 col-6 shopItem">

                            <div>
                                <?php $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'full'); ?>
                                <a class="fancybox image" href="<?php echo $featured_image[0]; ?>">
                                    <span class="openimg addToCart"><i class="fas fa-search-plus"></i></span>
                                </a>
                                <img class="img-fluid" src="<?php echo $featured_image[0]; ?>" alt="">
                                <a href="<?php echo $wcProduct->add_to_cart_url(); ?>" data-product-id="<?php echo $wcProduct->get_id(); ?>" class="add-to-cart-link">
                                    <span class="cart2 addToCart"><i class="fa fa-shopping-cart"></i></span>
                                </a>
                            </div>
                            <div class="caption product-description" data-post-id="<?php echo $post->ID; ?>">
                                <h4><?php echo $wcProduct->get_name(); ?></h4>
                                <div class="summary"><?php echo $wcProduct->get_short_description(); ?></div>
                                <div class="price"><?php echo $wcProduct->get_price_html() ?></div>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
        <?php unset($products); ?>
    <?php endforeach; ?>
</div>


<!--modals-->

<!--mobile-->
<?php	query_posts('cat=25'); // указываем идентификатор вашей рубрики.
while (have_posts()) : the_post();?>
    <div class="modal fade" id="modalTopMainMobile<?php the_ID()?>" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTopMainMobile<?php the_ID()?>">
                        <?php the_title(); ?>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-danger">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php the_field('text'); ?>
                </div>
            </div>
        </div>
    </div>
<!--mobile-->
<!--desktop-->
    <div class="modal fade" id="modalTopMain<?php the_ID()?>" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTopMain<?php the_ID()?>">
                        <?php the_title(); ?>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-danger">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php the_field('text'); ?>
                </div>
            </div>
        </div>
    </div>
<!--desktop-->
<?php endwhile;
wp_reset_query();
?>

<!--product-description-modal-->
<div class="modal fade" id="product-description-modal" tabindex="-1" role="dialog"
     aria-labelledby="productDescriptionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >
                    Описание товара
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-danger">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="product-description-modal-content">
            </div>
        </div>
    </div>
</div>
<!--product-description-modal-->
<!--modals-->



<?php get_footer(); // подключаем footer.php ?>
