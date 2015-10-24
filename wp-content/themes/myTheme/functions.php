<?php 
	/*add_action("wp_head", 'add_css_refs');

	function add_css_refs(){
		wp_enqueue_style('main', get_stylesheet_directory_uri() . "/css/main.css", array(), null);
		wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . "/libs/bootstrap/css/bootstrap.min.css", array(), null);
		
	}*/

if ( function_exists( 'add_theme_support' ) ) add_theme_support( 'post-thumbnails' );



function get_OS_list(){
    $vars = array(
        array('name' => 'All', 'value' => 'all', 'all' => true)
    );

    $terms = get_terms('os');
    for ($x=0; $x<=sizeof($terms); $x++) {

        $term = $terms[$x];
        if(!$term -> name) continue;
        $term -> name;
        $term -> slug;
        array_push($vars, array('name'=> $term->name, 'value'=> $term->slug));
    }
    return $vars;

}

function get_post_count($os_id) {

    $args = array(
        'post_type'     => 'phone',
        'post_status'   => 'publish',
        'posts_per_page' => -1,  //show all
        'tax_query' => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'os',
                'field' => 'id',
                'terms' => array( $os_id )
            )
        )
    );

    $query = new WP_Query( $args);

    return (int)$query->post_count;
}

function get_username(){
    $user =  wp_get_current_user()->data;
    return $user -> user_nicename;
}

add_action("wp", 'configure_scripts');

function configure_scripts(){
    wp_deregister_script( 'admin-bar' );
    remove_action('wp_footer','wp_admin_bar_render',1000);
    wp_register_script('jquery-js',get_stylesheet_directory_uri() . "/libs/jquery.js");
    wp_register_script('bs3',get_stylesheet_directory_uri() . '/libs/bootstrap/js/bootstrap.js');
    wp_enqueue_script('jquery-js');
    wp_enqueue_script('bs3');


    wp_enqueue_script('toastr',get_stylesheet_directory_uri() . '/libs/toastr/toastr.min.js');
    wp_enqueue_script('market', get_stylesheet_directory_uri() . '/libs/market.js');
    wp_enqueue_script('login',get_stylesheet_directory_uri() . '/libs/login.js');
}