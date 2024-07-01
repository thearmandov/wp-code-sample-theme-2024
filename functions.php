<?php


// Define our scripts / Styles
function theme_enqueue_styles() {
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/assets/css/style.min.css');
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

function enqueue_custom_scripts() {
    wp_enqueue_script('custom-scripts', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

function theme_woocommerce_support() {
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', "theme_woocommerce_support");

// Custom Field for product data
add_action('woocommerce_product_options_general_product_data', 'add_custom_product_field');
function add_custom_product_field() {
    woocommerce_wp_text_input( array(
        'id' => '_custom_product_field',
        'label' => __('Custom Field - BM', 'woocommerce'),
        'desc_tip' => 'true',
        'description' => __('Enter a custom value for this product.', 'woocommerce'),
        'type' => 'text'
    ));
}

// Save Custom Fields
add_action('woocommerce_process_product_meta', 'save_custom_product_field');
function save_custom_product_field($post_id) {
    $field_value = isset($_POST['_custom_product_field']) 
        ? sanitize_text_field($_POST['_custom_product_field']) : '';
    
    update_post_meta($post_id, '_custom_product_field', $field_value);
}

// Custom User Roles (For plugin example)
function add_wholesale_user_role() {
    add_role(
        'wholesale_customer',    
        'Wholesale Customer',  
        array(
            'read' => true,  
        )
    );
}
add_action('init', 'add_wholesale_user_role');

add_theme_support('menus');
add_theme_support('widgets');