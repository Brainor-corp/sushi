<?php
/**
 * Функции шаблона (function.php)
 * @package WordPress
 * @subpackage sushi_v0.1
 */

add_theme_support('title-tag'); // теперь тайтл управляется самим вп

register_nav_menus(array( // Регистрируем 2 меню
	'top' => 'Верхнее', // Верхнее
	'bottom' => 'Внизу' // Внизу
));

add_theme_support('post-thumbnails'); // включаем поддержку миниатюр
set_post_thumbnail_size(250, 150); // задаем размер миниатюрам 250x150
add_image_size('big-thumb', 400, 400, true); // добавляем еще один размер картинкам 400x400 с обрезкой

register_sidebar(array( // регистрируем левую колонку, этот кусок можно повторять для добавления новых областей для виджитов
	'name' => 'Сайдбар', // Название в админке
	'id' => "sidebar", // идентификатор для вызова в шаблонах
	'description' => 'Обычная колонка в сайдбаре', // Описалово в админке
	'before_widget' => '<div id="%1$s" class="widget %2$s">', // разметка до вывода каждого виджета
	'after_widget' => "</div>\n", // разметка после вывода каждого виджета
	'before_title' => '<span class="widgettitle">', //  разметка до вывода заголовка виджета
	'after_title' => "</span>\n", //  разметка после вывода заголовка виджета
));

if (!class_exists('clean_comments_constructor')) { // если класс уже есть в дочерней теме - нам не надо его определять
	class clean_comments_constructor extends Walker_Comment { // класс, который собирает всю структуру комментов
		public function start_lvl( &$output, $depth = 0, $args = array()) { // что выводим перед дочерними комментариями
			$output .= '<ul class="children">' . "\n";
		}
		public function end_lvl( &$output, $depth = 0, $args = array()) { // что выводим после дочерних комментариев
			$output .= "</ul><!-- .children -->\n";
		}
	    protected function comment( $comment, $depth, $args ) { // разметка каждого комментария, без закрывающего </li>!
	    	$classes = implode(' ', get_comment_class()).($comment->comment_author_email == get_the_author_meta('email') ? ' author-comment' : ''); // берем стандартные классы комментария и если коммент пренадлежит автору поста добавляем класс author-comment
	        echo '<li id="comment-'.get_comment_ID().'" class="'.$classes.' media">'."\n"; // родительский тэг комментария с классами выше и уникальным якорным id
	    	echo '<div class="media-left">'.get_avatar($comment, 64, '', get_comment_author(), array('class' => 'media-object'))."</div>\n"; // покажем аватар с размером 64х64
	    	echo '<div class="media-body">';
	    	echo '<span class="meta media-heading">Автор: '.get_comment_author()."\n"; // имя автора коммента
	    	//echo ' '.get_comment_author_email(); // email автора коммента, плохой тон выводить почту
	    	echo ' '.get_comment_author_url(); // url автора коммента
	    	echo ' Добавлено '.get_comment_date('F j, Y в H:i')."\n"; // дата и время комментирования
	    	if ( '0' == $comment->comment_approved ) echo '<br><em class="comment-awaiting-moderation">Ваш комментарий будет опубликован после проверки модератором.</em>'."\n"; // если комментарий должен пройти проверку
	    	echo "</span>";
	        comment_text()."\n"; // текст коммента
	        $reply_link_args = array( // опции ссылки "ответить"
	        	'depth' => $depth, // текущая вложенность
	        	'reply_text' => 'Ответить', // текст
				'login_text' => 'Вы должны быть залогинены' // текст если юзер должен залогинеться
	        );
	        echo get_comment_reply_link(array_merge($args, $reply_link_args)); // выводим ссылку ответить
	        echo '</div>'."\n"; // закрываем див
	    }
	    public function end_el( &$output, $comment, $depth = 0, $args = array() ) { // конец каждого коммента
			$output .= "</li><!-- #comment-## -->\n";
		}
	}
}

if (!function_exists('pagination')) { // если ф-я уже есть в дочерней теме - нам не надо её определять
	function pagination() { // функция вывода пагинации
		global $wp_query; // текущая выборка должна быть глобальной
		$big = 999999999; // число для замены
		$links = paginate_links(array( // вывод пагинации с опциями ниже
			'base' => str_replace($big,'%#%',esc_url(get_pagenum_link($big))), // что заменяем в формате ниже
			'format' => '?paged=%#%', // формат, %#% будет заменено
			'current' => max(1, get_query_var('paged')), // текущая страница, 1, если $_GET['page'] не определено
			'type' => 'array', // нам надо получить массив
			'prev_text'    => 'Назад', // текст назад
	    	'next_text'    => 'Вперед', // текст вперед
			'total' => $wp_query->max_num_pages, // общие кол-во страниц в пагинации
			'show_all'     => false, // не показывать ссылки на все страницы, иначе end_size и mid_size будут проигнорированны
			'end_size'     => 15, //  сколько страниц показать в начале и конце списка (12 ... 4 ... 89)
			'mid_size'     => 15, // сколько страниц показать вокруг текущей страницы (... 123 5 678 ...).
			'add_args'     => false, // массив GET параметров для добавления в ссылку страницы
			'add_fragment' => '',	// строка для добавления в конец ссылки на страницу
			'before_page_number' => '', // строка перед цифрой
			'after_page_number' => '' // строка после цифры
		));
	 	if( is_array( $links ) ) { // если пагинация есть
		    echo '<ul class="pagination">';
		    foreach ( $links as $link ) {
		    	if ( strpos( $link, 'current' ) !== false ) echo "<li class='active'>$link</li>"; // если это активная страница
		        else echo "<li>$link</li>"; 
		    }
		   	echo '</ul>';
		 }
	}
}

add_action('wp_enqueue_scripts', 'add_scripts'); // приклеем ф-ю на добавление скриптов в футер
if (!function_exists('add_scripts')) { // если ф-я уже есть в дочерней теме - нам не надо её определять
	function add_scripts()
    { // добавление скриптов
        if (is_admin()) return false; // если мы в админке - ничего не делаем
        wp_deregister_script('jquery'); // выключаем стандартный jquery
        wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', '', '', false); // добавляем свой
        wp_enqueue_script('jquery-validate', get_template_directory_uri() . '/plugins/validate/jquery.validate.min.js', '', '', false); // добавляем свой
        wp_enqueue_script('jquery-validate-additional', get_template_directory_uri() . '/plugins/validate/additional-methods.min.js', '', '', false); // добавляем свой
        // Локализация ошибок валидатора
        if(file_exists(get_stylesheet_directory() . '/plugins/validate/localization/messages_' . get_locale() . '.js')) {
            wp_enqueue_script('jquery-validate-localization', get_template_directory_uri() . '/plugins/validate/localization/messages_' . get_locale() . '.js', '', '', false); // добавляем свой
        }
		wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap/bootstrap.min.js', '', '', true); // бутстрап
        wp_enqueue_script('google_maps_api', 'https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAWS3GPEonG2-xYDOjCkKpsGiUSLQpFFQA', '', '', true); // и скрипты шаблона
        wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', '', '', true); // и скрипты шаблона
        wp_enqueue_script('google_maps_order', get_template_directory_uri() . '/js/google-maps-for-order.js', '', '', true); // и скрипты шаблона
//        wp_enqueue_script('canvas', get_template_directory_uri() . '/plugins/canvas/js/bootstrap.offcanvas.min.js', '', '', true); // canvas
        wp_enqueue_script('fas', get_template_directory_uri() . '/plugins/fontawesome/js/all.js');//fontawesome
    }
}

add_action('wp_print_styles', 'add_styles'); // приклеем ф-ю на добавление стилей в хедер
if (!function_exists('add_styles')) { // если ф-я уже есть в дочерней теме - нам не надо её определять
	function add_styles() { // добавление стилей
	    if(is_admin()) return false; // если мы в админке - ничего не делаем
	    wp_enqueue_style( 'bs', get_template_directory_uri().'/css/bootstrap/bootstrap.min.css' ); // бутстрап
		wp_enqueue_style( 'main', get_template_directory_uri().'/style.css' ); // основные стили шаблона
        wp_enqueue_style( 'fas', get_template_directory_uri().'/plugins/fontawesome/css/all.css' );//fontawesome
//        wp_enqueue_style( 'canvas', get_template_directory_uri().'/plugins/canvas/css/bootstrap.offcanvas.min.css' );//canvas
	}
}

if (!class_exists('bootstrap_menu')) {
	class bootstrap_menu extends Walker_Nav_Menu { // внутри вывод 
		private $open_submenu_on_hover; // параметр который будет определять раскрывать субменю при наведении или оставить по клику как в стандартном бутстрапе

		function __construct($open_submenu_on_hover = true) { // в конструкторе
	        $this->open_submenu_on_hover = $open_submenu_on_hover; // запишем параметр раскрывания субменю
	    }

		function start_lvl(&$output, $depth = 0, $args = array()) { // старт вывода подменюшек
			$output .= "\n<ul class=\"dropdown-menu\">\n"; // ул с классом
		}
		function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) { // старт вывода элементов
			$item_html = ''; // то что будет добавлять
			parent::start_el($item_html, $item, $depth, $args); // вызываем стандартный метод родителя
			if ( $item->is_dropdown && $depth === 0 ) { // если элемент содержит подменю и это элемент первого уровня
			   if (!$this->open_submenu_on_hover) $item_html = str_replace('<a', '<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"', $item_html); // если подменю не будет раскрывать при наведении надо добавить стандартные атрибуты бутстрапа для раскрытия по клику
			   $item_html = str_replace('</a>', ' <b class="caret"></b></a>', $item_html); // ну это стрелочка вниз
			}
			$output .= $item_html; // приклеиваем теперь
		}
		function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) { // вывод элемента
			if ( $element->current ) $element->classes[] = 'active'; // если элемент активный надо добавить бутстрап класс для подсветки
			$element->is_dropdown = !empty( $children_elements[$element->ID] ); // если у элемента подменю
			if ( $element->is_dropdown ) { // если да
			    if ( $depth === 0 ) { // если li содержит субменю 1 уровня
			        $element->classes[] = 'dropdown'; // то добавим этот класс
			        if ($this->open_submenu_on_hover) $element->classes[] = 'show-on-hover'; // если нужно показывать субменю по хуверу
			    } elseif ( $depth === 1 ) { // если li содержит субменю 2 уровня
			        $element->classes[] = 'dropdown-submenu'; // то добавим этот класс, стандартный бутстрап не поддерживает подменю больше 2 уровня по этому эту ситуацию надо будет разрешать отдельно
			    }
			}
			parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output); // вызываем стандартный метод родителя
		}
	}
}

if (!function_exists('content_class_by_sidebar')) { // если ф-я уже есть в дочерней теме - нам не надо её определять
	function content_class_by_sidebar() { // функция для вывода класса в зависимости от существования виджетов в сайдбаре
		if (is_active_sidebar( 'sidebar' )) { // если есть
			echo 'col-sm-9'; // пишем класс на 80% ширины
		} else { // если нет
			echo 'col-sm-12'; // контент на всю ширину
		}
	}
}

add_action('wp_ajax_get_shortcode_content', 'get_shortcode_content');

function get_shortcode_content() {
    $shortcode = $_POST['shortcode'];
	echo do_shortcode($shortcode);
    wp_die();
}

function conditionally_load_woc_js_css(){
    if( function_exists( 'is_woocommerce' ) ){
        ## Dequeue scripts.
        wp_enqueue_script('wc-cart');
//        wp_enqueue_script('woocommerce');
//        wp_enqueue_script('wc-add-to-cart');
//        wp_enqueue_script('wc-cart-fragments');

        ## Dequeue styles.
        wp_dequeue_style('woocommerce-general');
        wp_dequeue_style('woocommerce-layout');
        wp_dequeue_style('woocommerce-smallscreen');
    }
}

add_action( 'wp_enqueue_scripts', 'conditionally_load_woc_js_css' );


/**
 * Обновление блока корзины
 */
function get_cart_update(){
    global $woocommerce;

    $date['cart'] = do_shortcode('[woocommerce_cart]');
    $date['total'] = $woocommerce->cart->get_cart_total();

    echo json_encode($date);
    wp_die();
}
add_action( 'wp_ajax_get_cart_update', 'get_cart_update' );
add_action( 'wp_ajax_nopriv_get_cart_update', 'get_cart_update' );

/**
 * Выполнение заказа
 */
function make_order() {
    $items = WC()->cart->get_cart();

    $the_slug = 'options';
    $args = array(
        'name' => $the_slug,
    );

    if(!$optionsPost = get_posts($args)[0]) {
        $result = [
            'status' => 'error',
            'text' => 'site_error_1' // Не найдена страница с настройками
        ];
        echo json_encode($result);
        wp_die();
	}

    if(!count($items)) {
        $result = [
            'status' => 'empty_cart',
            'text' => get_field('empty_cart', $optionsPost->ID)
        ];
        echo json_encode($result);
        wp_die();
    }

    $address = array(
        'first_name'        => $_POST['name'],
        'email'             => $_POST['email'],
        'phone'             => $_POST['phone'],
        'address_1'         => $_POST['google_map_address'],
        'address_2'         => $_POST['google_map_coords'],
        'company'           => $_POST['hotel'], // Представим, что компания -- это отель
    );

    $order_data = array(
        'status'        => 'processing',
        'customer_note' => $_POST['order_comments']
    );
    $order = wc_create_order($order_data);

    foreach($items as $item => $values) {
        $product_id = $values['product_id'];
        $product = wc_get_product($product_id);
        $quantity = (int)$values['quantity'];
        $order->add_product($product, $quantity);
    }

    $order->set_address( $address, 'shipping' );

    $order->calculate_totals();

    $order->add_meta_data('delivery', sanitize_text_field($_POST['delivery']));
    $order->add_meta_data('people_count', sanitize_text_field($_POST['people_count']));
    $order->add_meta_data('call_type', sanitize_text_field($_POST['call_type']));
    $order->save();

    WC()->cart->empty_cart();

    $result = [
        'status' => 'ok',
        'text' => get_field('order_complete', $optionsPost->ID)
    ];
    echo json_encode($result);
    wp_die();
}
add_action( 'wp_ajax_make_order', 'make_order' );
add_action( 'wp_ajax_nopriv_make_order', 'make_order' );

/**
 * Display field value on the order edit page
 */
add_action( 'woocommerce_admin_order_data_after_shipping_address', 'custom_checkout_field_display_admin_order_meta', 10, 1 );

function custom_checkout_field_display_admin_order_meta($order){
    echo '<p><strong>'.__('Тип доставки').':</strong> <br/>' . get_post_meta( $order->get_id(), 'delivery', true ) . '</p>' .
    '<p><strong>'.__('Кол-во человек').':</strong> <br/>' . get_post_meta( $order->get_id(), 'people_count', true ) . '</p>' .
    '<p><strong>'.__('Через что позвонить').':</strong> <br/>' . get_post_meta( $order->get_id(), 'call_type', true ) . '</p>';
}

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page();
}
?>
