<?php

add_filter('show_admin_bar', '__return_false');

add_action('wp_enqueue_scripts', 'register_styles_scripts');
add_action('after_setup_theme', 'after_setup');
add_action('widgets_init', 'register_widgets');
add_action('init', 'register_post_types');
add_action('acf/init', 'my_acf_init');
add_action('acf/init', 'be_register_blocks' );

add_filter('comment_form_fields', 'kama_reorder_comment_fields' );

function register_styles_scripts() {
    wp_enqueue_style('readitblog-open-iconic', get_template_directory_uri() . '/assets/css/open-iconic-bootstrap.min.css');
    wp_enqueue_style('readitblog-animate', get_template_directory_uri() . '/assets/css/animate.css');
    wp_enqueue_style('readitblog-owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css');
    wp_enqueue_style('readitblog-owl-theme', get_template_directory_uri() . '/assets/css/owl.theme.default.min.css');
    wp_enqueue_style('readitblog-magnific', get_template_directory_uri() . '/assets/css/magnific-popup.css');
    wp_enqueue_style('readitblog-aos', get_template_directory_uri() . '/assets/css/aos.css');
    wp_enqueue_style('readitblog-ionicons', get_template_directory_uri() . '/assets/css/ionicons.min.css');
    wp_enqueue_style('readitblog-flaticon', get_template_directory_uri() . '/assets/css/flaticon.css');
    wp_enqueue_style('readitblog-icomoon', get_template_directory_uri() . '/assets/css/icomoon.css');
    wp_enqueue_style('readitblog-style', get_template_directory_uri() . '/assets/css/style.css');

    wp_enqueue_script('readitblog-jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', [], null, true);
    wp_enqueue_script('readitblog-jquery-migrate', get_template_directory_uri() . '/assets/js/jquery-migrate-3.0.1.min.js', [], null, true);
    wp_enqueue_script('readitblog-popper', get_template_directory_uri() . '/assets/js/popper.min.js', [], null, true);
    wp_enqueue_script('readitblog-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', [], null, true);
    wp_enqueue_script('readitblog-jquery-easing', get_template_directory_uri() . '/assets/js/jquery.easing.1.3.js', [], null, true);
    wp_enqueue_script('readitblog-jquery-waypoints', get_template_directory_uri() . '/assets/js/jquery.waypoints.min.js', [], null, true);
    wp_enqueue_script('readitblog-jquery-stellar', get_template_directory_uri() . '/assets/js/jquery.stellar.min.js', [], null, true);
    wp_enqueue_script('readitblog-owl', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', [], null, true);
    wp_enqueue_script('readitblog-jquery-magnific', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', [], null, true);
    wp_enqueue_script('readitblog-aos', get_template_directory_uri() . '/assets/js/aos.js', [], null, true);
    wp_enqueue_script('readitblog-jquery-animateNumber', get_template_directory_uri() . '/assets/js/jquery.animateNumber.min.js', [], null, true);
    wp_enqueue_script('readitblog-scrollax', get_template_directory_uri() . '/assets/js/scrollax.min.js', [], null, true);
    wp_enqueue_script('readitblog-googleapis', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCDCApeoMpSTQxvz14Yhh09zlsw8FhB2ck', [], null,true);
    wp_enqueue_script('readitblog-google-map', get_template_directory_uri() . '/assets/js/google-map.js', [], null, true);
    wp_enqueue_script('readitblog-main', get_template_directory_uri() . '/assets/js/main.js', [], null, true);
};

function after_setup() {
    register_nav_menus([
        'header_menu' => 'Меню в шапці',
        'footer_menu' => 'Меню в підвалі'
    ]);
    add_theme_support('post-thumbnails');
};

function register_widgets() {
    register_sidebar(['name' => 'Social links', 'id' => 'social_links']);
    register_sidebar(['name' => 'latest News', 'id' => 'latest_news']);
    register_sidebar(['name' => 'Information', 'id' => 'information']);
    register_sidebar(['name' => 'Have a Questions?', 'id' => 'questions']);
    register_sidebar(['name' => 'Blog Single', 'id' => 'blog_single']);
};

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'menu_title'	=> 'Theme Settings',
        'menu_slug' 	=> 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Theme Header Settings',
        'menu_title'	=> 'Header',
        'parent_slug'	=> 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Theme Blog Single Settings',
        'menu_title'	=> 'Blog Single',
        'parent_slug'	=> 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Theme Footer Settings',
        'menu_title'	=> 'Footer',
        'parent_slug'	=> 'theme-general-settings',
    ));

};

function time_to_read() {
    $post = get_post();
    echo round(strlen($post->post_content) /120);
};

function register_post_types(){
	register_post_type('event', array(
		'labels' => array(
			'name'               => 'Event',
			'singular_name'      => 'Event',
			'add_new'            => 'Додати подію',
			'add_new_item'       => 'Додавання події',
			'edit_item'          => 'Редагування події',
			'new_item'           => 'Нова подія',
			'view_item'          => 'Дивитись подію',
			'search_items'       => 'Шукати подію',
			'not_found'          => 'Не знайдено',
			'not_found_in_trash' => 'Не знайдено в корзині',
			'parent_item_colon'  => '',
			'menu_name'          => 'Події',
		),
		'public'              => true,
		'menu_position'       => 7,
		'menu_icon'           => 'dashicons-format-aside',
		'hierarchical'        => true,
		'supports'            => [ 'title', 'editor','thumbnail'],//'excerpt', 'author','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => ['category'],
		'has_archive'         => true,
		'rewrite'             => true,
		'query_var'           => true,
	) );

	register_taxonomy( 'taxonomy', [ 'event' ], [
		'labels'                => [
			'name'              => 'Міста',
			'singular_name'     => 'city',
			'search_items'      => 'Search cities',
			'all_items'         => 'All cities',
			'view_item '        => 'View city',
			'parent_item'       => 'Parent city',
			'parent_item_colon' => 'Parent city:',
			'edit_item'         => 'Edit city',
			'update_item'       => 'Update city',
			'add_new_item'      => 'Add New city',
			'new_item_name'     => 'New city Name',
			'menu_name'         => 'City',
		],
		'description'           => '',
		'public'                => true,
		'hierarchical'          => false,
	] );

	register_post_type('reviews', array(
		'labels' => array(
			'name'               => 'Відгуки клієнтів',
			'singular_name'      => 'Відгуки клієнтів',
			'add_new'            => 'Додати відгук',
			'add_new_item'       => 'Додавання відгука',
			'edit_item'          => 'Редагування відгука',
			'new_item'           => 'Новий відгук',
			'view_item'          => 'Дивитись відгук',
			'search_items'       => 'Шукати відгук',
			'not_found'          => 'Не знайдено',
			'not_found_in_trash' => 'Не знайдено в корзині',
			'parent_item_colon'  => '',
			'menu_name'          => 'Відгуки клієнтів',
		),
		'public'              => true,
		'menu_position'       => 8,
		'menu_icon'           => 'dashicons-format-aside',
		'supports'            => ['title','editor'],//'excerpt', 'author','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
	) );
};

function kama_reorder_comment_fields( $fields ){

	$new_fields = [];

	$myorder = ['author','email','website','comment'];

	foreach( $myorder as $key ){
		$new_fields[ $key ] = $fields[ $key ];
		unset( $fields[ $key ] );
	}
	if( $fields )
		foreach( $fields as $key => $val )
			$new_fields[ $key ] = $val;

	return $new_fields;
};

function format_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li class="comment">
		<div class="vcard bio">
			<?php echo get_avatar( $comment, 50); ?>
		</div>
		<div class="comment-body">
			<h3><?php comment_author(); ?></h3>
			<div class="meta mb-3"><?php comment_date('F j, Y g:i a');?></div>
			<p><?php comment_text(); ?></p>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</div>
	</li>
<?php };

function my_acf_init() {
	acf_update_setting('google_api_key', 'AIzaSyCDCApeoMpSTQxvz14Yhh09zlsw8FhB2ck');
};

function be_register_blocks() {
	if( ! function_exists('acf_register_block') )
		return;
	acf_register_block([
		'name'			=> 'team-member',
		'title'			=> __( 'About', 'clientname' ),
		'render_template'	=> 'partials/block-about.php',
		'category'		=> 'formatting',
		'icon'			=> 'format-aside',
		'keywords'		=> array( 'profile', 'user', 'author' ),
		'enqueue_style'  => get_template_directory_uri() . '/partials/style.css',
	]);
};

