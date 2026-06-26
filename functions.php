<?php
/**
 * Vanduong theme functions and definitions.
 *
 * @package Vanduong
 */

if (! defined('ABSPATH')) {
    exit;
}

/**
 * Theme setup.
 */
function vanduong_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script',
    ));
    add_theme_support('responsive-embeds');
    add_theme_support('automatic-feed-links');

    // WooCommerce support.
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

    register_nav_menus(array(
        'primary' => __('Primary Menu', 'vanduong'),
        'footer'  => __('Footer Menu', 'vanduong'),
    ));
}
add_action('after_setup_theme', 'vanduong_setup');

/**
 * Enqueue scripts and styles.
 */
function vanduong_scripts()
{
    // Google Fonts — DM Sans + Space Grotesk.
    wp_enqueue_style(
        'vanduong-fonts',
        'https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap',
        array(),
        null
    );

    // Compiled Tailwind CSS.
    $css_file = get_template_directory() . '/build/index.css';
    if (file_exists($css_file)) {
        wp_enqueue_style(
            'vanduong-tailwind',
            get_template_directory_uri() . '/build/index.css',
            array(),
            filemtime($css_file)
        );
    }

    // Main JS — mobile menu.
    $js_file = get_template_directory() . '/assets/js/main.js';
    if (file_exists($js_file)) {
        wp_enqueue_script(
            'vanduong-main',
            get_template_directory_uri() . '/assets/js/main.js',
            array(),
            filemtime($js_file),
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'vanduong_scripts');

/**
 * WooCommerce cart item count — used by the header cart icon.
 *
 * @return int
 */
function vanduong_cart_count()
{
    if (! function_exists('WC') || ! WC()->cart) {
        return 0;
    }
    return WC()->cart->get_cart_contents_count();
}

/**
 * Live-update the header cart count fragment when items change via AJAX.
 */
function vanduong_cart_count_fragment($fragments)
{
    ob_start();
    ?>
    <span class="vanduong-cart-count" data-count="<?php echo esc_attr(vanduong_cart_count()); ?>"><?php echo esc_html(vanduong_cart_count()); ?></span>
    <?php
    $fragments['span.vanduong-cart-count'] = ob_get_clean();
    return $fragments;
}
add_filter('woocommerce_add_to_cart_fragments', 'vanduong_cart_count_fragment');
