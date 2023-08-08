<?php
/**
 * Declaring styles and scripts
 * @return 
 */
function Parent_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'parent_styles');

/**
 * Target Woocommerce Order Editing Area in the Admin Panel
 * @return $order
 */

 function add_a_link($order) {
        echo '<p>HELLO WORLD!!!</p>';
}
add_action('woocommerce_admin_order_data_after_order_details', 'add_a_link', 10, 1);


