<?php

// Enqueue styles and scripts
function add_theme_scripts()
{   
    wp_enqueue_style('boostrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
    wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/app.css');
    wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), 1, true);
    wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/app.js', array('jquery'), 1, true);

}
add_action('wp_enqueue_scripts', 'add_theme_scripts');



// Register menu location
register_nav_menus(array(
    'top-menu' => __('Top Menu', 'mrdigital_theme'),
    //'mobile-menu' => __( 'Mobile Menu', 'mrdigital_theme' ),
));



// Image sizes
//add_image_size('custom_image', 800, 800, false);

// Theme support
add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support('widgets');

// Remove WordPress version meta in header scripts
remove_action('wp_head', 'wp_generator');


// Remove WordPress Emojicons
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');


// Remove classes and widths from images in content editor
function remove_width_attribute($html)
{
    $html = preg_replace('/(width|height)="\d*"\s/', "", $html);
    return $html;
}
add_filter('get_image_tag_class', '__return_empty_string');
add_filter('post_thumbnail_html', 'remove_width_attribute', 10);
add_filter('image_send_to_editor', 'remove_width_attribute', 10);

