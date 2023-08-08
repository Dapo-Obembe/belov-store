<?php
/**
 * Declaring styles and scripts
 *
 * @return $parent
 */
function parent_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'parent_styles' );

/**
 * Target Woocommerce Order Editing Area in the Admin Panel
 *
 * @return $order-link
 */

function customer_order_link( $order ) {
    $customer_id = $order->get_customer_id();
    if ($customer_id) {
        $order_id = $order->get_id();

        $nonce = wp_create_nonce( 'switch_to_user_' . $customer_id );

        $switch_url = add_query_arg(
            array(
                'action' => 'switch_to_user',
                'user_id' => $customer_id,
                'nr' => 1,
                '_wpnonce' => $nonce,
                'redirect_to' => rawurlencode( home_url( '/my-account/view-order/' . $order_id . '/' ) ),
            ),
            wp_login_url()
        );

        echo '<p><a href="' . esc_url( $switch_url ) . '">Open User Order Details Page</a></p>';
    }
}
add_action( 'woocommerce_admin_order_data_after_payment_info', 'customer_order_link' );

