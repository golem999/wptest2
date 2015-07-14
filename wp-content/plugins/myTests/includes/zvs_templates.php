<?php


function zvs_shop_template( $template ) {
    if($_SERVER['PATH_INFO'] == '/shop/')
    {
        return dirname(__FILE__) . '/templates/shop.php';
    }

    if($_SERVER['PATH_INFO'] == '/cart/')
    {
        return dirname(__FILE__) . '/templates/cart.php';
    }
    return $template;
}
add_filter( 'template_include', 'zvs_shop_template', 99 );