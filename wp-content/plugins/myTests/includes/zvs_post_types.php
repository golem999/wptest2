<?php
/**
 * Created by PhpStorm.
 * User: alias
 * Date: 10.07.2015
 * Time: 23:08
 */


// Hooking up our function to theme setup
add_action( 'init', 'create_tags' );
add_action( 'init', 'create_taxonomy' );
//
//add_action( 'add_meta_boxes', 'zvs_create_meta' );
//add_action( 'save_post', 'zvs_save', 10, 2 );

function create_tags(){

    if ( post_type_exists('Phone') ) {
        return;
    }

    register_post_type( 'Phone',
        array(
            'labels' => array(
                'name' => 'Phones',
                'singular_name' => 'Phone',
                'add_new' => 'Add Phone',
                'add_new_item' => 'Add New Phone',
                'edit' => 'Edit Phone',
                'edit_item' => 'Edit Phone',
                'new_item' => 'New Phone',
                'view' => 'View',
                'view_item' => 'View Phone',
                'search_items' => 'Search Phone',
                'not_found' => 'No Phone found',
                'not_found_in_trash' => 'No Phone found in Trash',
                'parent' => 'Parent Phone'
            ),
            'public' => true,
            'menu_position' => 15,
            'supports' => array( 'title', 'thumbnail', 'editor'  ),
            'taxonomies' => array( '' ),
            'menu_icon' => plugins_url( 'images/phone.png', __FILE__ ),
            'has_archive' => true
        )
    );
};

function create_taxonomy(){
    register_taxonomy( 'os', 'phone', array( 'hierarchical' => true, 'label' => 'OS', 'query_var' => true, 'rewrite' => true ) );
}

add_action( 'admin_init', 'zvs_create_meta' );

function zvs_create_meta() {
   // add_meta_box('zvs_meta_OS', 'OS', 'zvs_os_handler', 'phone');
    add_meta_box("zvs_meta_price", 'Price', 'display_meta_handler', 'phone');
    add_meta_box("zvs_meta_OS", 'OS', 'display_meta_handler2', 'phone');
}


function display_meta_handler( $phone ) {
    // Retrieve current name of the Director and Movie Rating based on review ID
    $price = esc_html( get_post_meta( $phone->ID, 'phone_price', true ) );
    ?>
    <div class="container">
            <label for="zvs_phone_price">Price:</label>
            <input type="text" size="80" name="zvs_phone_price" value="<?php echo $price; ?>" /></div>
<?php
}

function display_meta_handler2 ($phone) {

    $os = get_post_meta($phone -> ID, "phone_os", true);

    ?>
    <h1>
        <div id="post-formats-select">
            <input type="radio" name="zvs_phone_os" class="post-format"  value="Android" checked="checked" <?php  echo checked($os, "Android" ) ?> />
            <label for="post-format-0" class="post-format-icon post-format-standard">Android</label>
            <br />
            <input type="radio" name="zvs_phone_os" class="post-format" value="Windows"  <?php  echo checked($os, "Windows" ) ?>  />
            <label for="post-format-aside" class="post-format-icon post-format-standard">Windows Phone</label>
            <br />
            <input type="radio" name="zvs_phone_os" class="post-format" value="Apple"   <?php  echo checked($os, "Apple" ) ?>  />
            <label for="post-format-image" class="post-format-icon post-format-standard">Apple</label>
            <br />
        </div>
    </h1>

    <?php
}

add_action( 'save_post', 'add_phone_fields', 10, 2 );

function add_phone_fields( $phone_id, $phone ) {
    // Check post type for movie reviews
    if ( $phone->post_type == 'phone' ) {
        // Store data in post meta table if present in post data
        if ( isset( $_POST['zvs_phone_price'] ) && $_POST['zvs_phone_price'] != '' ) {
            update_post_meta( $phone_id, 'phone_price', $_POST['zvs_phone_price'] );
        }
        if ( isset( $_POST['zvs_phone_os'] ) && $_POST['zvs_phone_os'] != '' ) {
            update_post_meta( $phone_id, 'phone_os', $_POST['zvs_phone_os'] );
        }
    }
};

