<?php
/**
 * WooCommerce wrapper template.
 *
 * Used for every WooCommerce page (shop, product category, single product,
 * cart, checkout, account) so they render inside the theme's header/footer
 * with a consistent container. WooCommerce outputs its own templates through
 * woocommerce_content().
 *
 * @package Vanduong
 */

if (! defined('ABSPATH')) {
    exit;
}

get_header();
?>

<div class="vanduong-woocommerce mx-auto w-full max-w-7xl px-6 py-10 md:py-14">
    <?php woocommerce_content(); ?>
</div>

<?php
get_footer();
