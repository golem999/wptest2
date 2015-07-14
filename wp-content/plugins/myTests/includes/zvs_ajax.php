<?php


add_action('wp_ajax_market_cart_add', 'zvs_func');

function zvs_func(){
    $post_id = (int) $_POST['id'];
    $user = wp_get_current_user();

    if(!item_was_added($post_id)) {
        if($post_id == 0) return;
        add_user_meta($user->ID, 'wanted', $post_id);
        echo 'true';
    }
    exit();
}

function item_was_added($post_id){

    $user = wp_get_current_user();

    $values = get_user_meta($user->ID, 'wanted');
    foreach($values as $value){
        if($value==$post_id) return true;
    }
    return false;
}






add_action('wp_ajax_market_cart_remove', 'zvs_func_rem');

function zvs_func_rem(){
    $post_id = (int) $_POST['id'];
    $user = wp_get_current_user();

    delete_user_meta($user -> ID, "wanted", $post_id);
    echo $post_id;

    exit();
}
add_action('wp_ajax_market_cart_checkout', 'zvs_func_check');

function zvs_func_check(){
    $user = wp_get_current_user();
    $values = get_user_meta($user->ID, 'wanted');
    $tmpArr = [];
    $count=0;
    foreach($values as $value){
        if(in_array($value, $tmpArr)) { continue; }
        array_push($tmpArr, $value);
        $count += get_post_meta($value, "phone_price")[0];
    }

    echo $count;


    exit();
}
