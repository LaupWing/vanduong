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

if (is_product()) :
    // Custom on-brand single product layout (wrapped in .woocommerce for styling).
    ?>
    <div class="woocommerce">
        <?php get_template_part('template-parts/woo-single'); ?>
    </div>
    <?php
else :
    // Shop, product category, cart, checkout, account, etc.
    ?>
    <div class="woocommerce vanduong-woocommerce mx-auto w-full max-w-7xl px-6 py-10 md:py-14">
        <?php woocommerce_content(); ?>
    </div>
    <?php
endif;

get_footer();
