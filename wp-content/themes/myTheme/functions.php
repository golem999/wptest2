<?php 
	/*add_action("wp_head", 'add_css_refs');

	function add_css_refs(){
		wp_enqueue_style('main', get_stylesheet_directory_uri() . "/css/main.css", array(), null);
		wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . "/libs/bootstrap/css/bootstrap.min.css", array(), null);
		
	}*/

if ( function_exists( 'add_theme_support' ) ) add_theme_support( 'post-thumbnails' );



// категгории
$vars = array(
    array('name' => 'All', 'value' => 'All', 'all' => true),
    array('name' => 'Android', 'value' => 'Android'),
    array('name' => 'Windows Phone', 'value' => 'Windows'),
    array('name' => 'Apple', 'value' => 'Apple')
);


add_action("wp", 'configure_scripts');

function configure_scripts(){
    wp_deregister_script( 'admin-bar' );
    remove_action('wp_footer','wp_admin_bar_render',1000);
    wp_register_script('jquery-js',get_stylesheet_directory_uri() . "/libs/jquery.js");
    wp_register_script('bs3',get_stylesheet_directory_uri() . '/libs/bootstrap/js/bootstrap.js');
    wp_enqueue_script('jquery-js');
    wp_enqueue_script('bs3');


    wp_enqueue_script('market', get_stylesheet_directory_uri() . '/libs/market.js');
}