<?php
/**
 * Custom single product layout (inner content only — no header/footer).
 *
 * Loaded from woocommerce.php for single product pages. Reuses WooCommerce's
 * functional pieces (gallery, add-to-cart form, tabs, related products) inside
 * on-brand Tailwind markup.
 *
 * @package Vanduong
 */

if (! defined('ABSPATH')) {
    exit;
}

while (have_posts()) :
    the_post();
    global $product;
    if (! is_a($product, 'WC_Product')) {
        $product = wc_get_product(get_the_ID());
    }
    if (! $product) {
        continue;
    }

    $shop_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/');
    ?>

    <div class="mx-auto w-full max-w-7xl px-6 py-10 md:py-14">

        <!-- Breadcrumb -->
        <nav class="mb-8 flex flex-wrap items-center gap-2 text-xs font-semibold text-muted-foreground">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-primary transition-colors"><?php esc_html_e('Trang chủ', 'vanduong'); ?></a>
            <span>/</span>
            <a href="<?php echo esc_url($shop_url); ?>" class="hover:text-primary transition-colors"><?php esc_html_e('Cửa hàng', 'vanduong'); ?></a>
            <span>/</span>
            <span class="text-foreground"><?php the_title(); ?></span>
        </nav>

        <div id="product-<?php the_ID(); ?>" <?php wc_product_class('grid gap-10 md:grid-cols-2 md:gap-14', $product); ?>>

            <!-- Gallery -->
            <div class="vanduong-gallery relative overflow-hidden rounded-3xl border-2 border-foreground bg-card shadow-[6px_6px_0_0_var(--color-foreground)]">
                <?php
                // Featured image + thumbnails with zoom/lightbox/slider support.
                woocommerce_show_product_images();
                ?>
            </div>

            <!-- Summary -->
            <div class="summary entry-summary flex flex-col gap-5">

                <?php if ($product->is_on_sale()) : ?>
                    <span class="inline-flex w-fit items-center rounded-full border-2 border-foreground bg-accent px-3 py-1 text-[11px] font-bold uppercase tracking-widest text-accent-foreground">
                        <?php esc_html_e('Đang giảm giá', 'vanduong'); ?>
                    </span>
                <?php endif; ?>

                <h1 class="font-display text-3xl font-bold leading-tight tracking-tight md:text-4xl"><?php the_title(); ?></h1>

                <div class="text-3xl font-bold text-primary">
                    <?php echo wp_kses_post($product->get_price_html()); ?>
                </div>

                <?php $short = apply_filters('woocommerce_short_description', $product->get_short_description()); ?>
                <?php if ($short) : ?>
                    <div class="max-w-md leading-relaxed text-muted-foreground">
                        <?php echo wp_kses_post(wpautop($short)); ?>
                    </div>
                <?php endif; ?>

                <div class="text-sm font-semibold">
                    <?php echo wp_kses_post(wc_get_stock_html($product)); ?>
                </div>

                <div class="vanduong-add-to-cart pt-1">
                    <?php woocommerce_template_single_add_to_cart(); ?>
                </div>

                <!-- Meta -->
                <div class="mt-2 flex flex-col gap-1 border-t-2 border-foreground/10 pt-4 text-sm text-muted-foreground">
                    <?php if ($sku = $product->get_sku()) : ?>
                        <span><strong class="text-foreground"><?php esc_html_e('Mã sản phẩm:', 'vanduong'); ?></strong> <?php echo esc_html($sku); ?></span>
                    <?php endif; ?>
                    <?php
                    $cats = wc_get_product_category_list($product->get_id(), ', ');
                    if ($cats) :
                        ?>
                        <span><strong class="text-foreground"><?php esc_html_e('Danh mục:', 'vanduong'); ?></strong> <?php echo wp_kses_post($cats); ?></span>
                    <?php endif; ?>
                </div>

            </div>
        </div>

        <!-- Tabs (description / additional info / reviews) -->
        <div class="vanduong-product-tabs mt-14 border-t-2 border-foreground pt-10">
            <?php woocommerce_output_product_data_tabs(); ?>
        </div>

        <!-- Related products -->
        <div class="vanduong-related mt-16">
            <?php woocommerce_output_related_products(); ?>
        </div>

    </div>

    <?php
endwhile;
