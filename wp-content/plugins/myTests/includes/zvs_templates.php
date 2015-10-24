<?php


function zvs_shop_template( $template ) {
    if(is_page( 'home'))
    {
        return dirname(__FILE__) . '/templates/home.php';
    }

    if(is_page( 'shop'))
    {
        return dirname(__FILE__) . '/templates/shop.php';
    }

    if(is_page( 'cart'))
    {
        return dirname(__FILE__) . '/templates/cart.php';
    }
    return $template;
}
add_filter( 'template_include', 'zvs_shop_template', 99 );