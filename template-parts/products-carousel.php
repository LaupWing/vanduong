<?php
/**
 * Products carousel — horizontal scroll-snap carousel of recent products.
 *
 * Mirrors the reference blog carousel: scroll-snap track, per-card reveal,
 * progress thumb and prev/next buttons. Styled to the Vanduong theme.
 *
 * @package Vanduong
 */

if (! defined('ABSPATH')) {
    exit;
}

if (! class_exists('WooCommerce')) {
    return;
}

$heading = isset($args['heading']) ? $args['heading'] : __('Sản phẩm nổi bật', 'vanduong');
$intro   = isset($args['intro']) ? $args['intro'] : __('Bộ sưu tập thủ công mới nhất của chúng tôi.', 'vanduong');
$count   = isset($args['count']) ? (int) $args['count'] : 10;

$products = wc_get_products(array(
    'status'     => 'publish',
    'limit'      => $count,
    'orderby'    => 'date',
    'order'      => 'DESC',
    'visibility' => 'visible',
));

if (empty($products)) {
    return;
}
?>
<section class="vanduong-products relative border-b-2 border-foreground bg-background py-14 md:py-20">

    <?php if ($heading || $intro) : ?>
        <div class="mx-auto mb-8 w-full max-w-7xl px-6 lg:mb-12">
            <?php if ($heading) : ?>
                <h2 class="font-display text-3xl font-bold tracking-tight md:text-4xl"><?php echo esc_html($heading); ?></h2>
            <?php endif; ?>
            <?php if ($intro) : ?>
                <p class="mt-3 max-w-md text-muted-foreground"><?php echo esc_html($intro); ?></p>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div class="vanduong-products-carousel relative z-10">

        <div class="vanduong-products-track flex w-screen gap-5 overflow-x-auto overflow-y-hidden scroll-smooth snap-x snap-mandatory overscroll-x-contain pb-2"
             style="
                 margin-left: calc(50% - 50vw);
                 margin-right: calc(50% - 50vw);
                 --rail: min(80rem, 100vw);
                 --gutter: calc((100vw - var(--rail)) / 2);
                 --safe: 1.5rem;
                 padding-top: 1rem;
                 padding-bottom: 1.5rem;
                 padding-left: max(var(--gutter), var(--safe));
                 padding-right: max(var(--gutter), var(--safe));
                 scroll-padding-left: max(var(--gutter), var(--safe));
                 scroll-padding-right: max(var(--gutter), var(--safe));
             ">

            <?php foreach ($products as $product) :
                $id      = $product->get_id();
                $href    = get_permalink($id);
                $title   = $product->get_name();
                $img     = get_the_post_thumbnail_url($id, 'woocommerce_thumbnail');
                $on_sale = $product->is_on_sale();
            ?>
            <div class="vanduong-product-reveal snap-start flex shrink-0 w-[78%] sm:w-[48%] md:w-[32%] lg:w-[300px]">
                <div class="group flex w-full flex-col overflow-hidden rounded-2xl border-2 border-foreground bg-card shadow-[4px_4px_0_0_var(--color-foreground)] transition-all duration-300 hover:-translate-y-1 hover:shadow-[7px_7px_0_0_var(--color-foreground)]">

                    <a href="<?php echo esc_url($href); ?>" class="relative block aspect-square w-full overflow-hidden border-b-2 border-foreground bg-secondary" aria-label="<?php echo esc_attr($title); ?>">
                        <?php if ($img) : ?>
                            <img loading="lazy" src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($title); ?>"
                                 class="absolute inset-0 h-full w-full object-cover transition-transform duration-500 group-hover:scale-105" />
                        <?php else : ?>
                            <span class="flex h-full w-full items-center justify-center text-5xl opacity-30">✿</span>
                        <?php endif; ?>
                        <?php if ($on_sale) : ?>
                            <span class="absolute left-3 top-3 inline-flex items-center rounded-full border-2 border-foreground bg-accent px-3 py-1 text-[10px] font-bold uppercase tracking-widest text-accent-foreground">
                                <?php esc_html_e('Giảm giá', 'vanduong'); ?>
                            </span>
                        <?php endif; ?>
                    </a>

                    <div class="flex grow flex-col gap-3 p-5">
                        <a href="<?php echo esc_url($href); ?>" class="font-display text-base font-bold leading-snug transition-colors line-clamp-2 group-hover:text-primary">
                            <?php echo esc_html($title); ?>
                        </a>

                        <div class="mt-auto flex items-center justify-between gap-3 pt-2">
                            <span class="vanduong-price text-lg font-bold"><?php echo wp_kses_post($product->get_price_html()); ?></span>

                            <?php if ($product->is_type('simple') && $product->is_purchasable() && $product->is_in_stock()) : ?>
                                <a href="<?php echo esc_url($product->add_to_cart_url()); ?>"
                                   data-quantity="1"
                                   data-product_id="<?php echo esc_attr($id); ?>"
                                   class="add_to_cart_button ajax_add_to_cart inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-full border-2 border-foreground bg-primary text-primary-foreground transition-all hover:bg-accent hover:text-accent-foreground"
                                   aria-label="<?php esc_attr_e('Thêm vào giỏ', 'vanduong'); ?>">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
                                </a>
                            <?php else : ?>
                                <a href="<?php echo esc_url($href); ?>"
                                   class="inline-flex h-10 items-center rounded-full border-2 border-foreground bg-card px-4 text-xs font-bold transition-colors hover:bg-muted">
                                    <?php esc_html_e('Xem', 'vanduong'); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
            </div>
            <?php endforeach; ?>

        </div>

        <!-- Nav: prev/next + progress thumb -->
        <div class="vanduong-products-nav mx-auto mt-8 w-full max-w-7xl px-6">
            <div class="flex items-center gap-6">
                <button type="button" class="vanduong-products-prev flex h-10 w-10 shrink-0 items-center justify-center rounded-full border-2 border-foreground bg-card text-foreground transition-all hover:bg-primary hover:text-primary-foreground disabled:opacity-30 disabled:cursor-not-allowed disabled:hover:bg-card disabled:hover:text-foreground" aria-label="<?php esc_attr_e('Trước', 'vanduong'); ?>" disabled>
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6 6-6"/></svg>
                </button>

                <div class="vanduong-products-indicator h-1 grow overflow-hidden rounded-full border border-foreground bg-muted">
                    <div class="vanduong-products-thumb h-full rounded-full bg-primary will-change-transform" style="width:0;transform:translateX(0)"></div>
                </div>

                <button type="button" class="vanduong-products-next flex h-10 w-10 shrink-0 items-center justify-center rounded-full border-2 border-foreground bg-card text-foreground transition-all hover:bg-primary hover:text-primary-foreground disabled:opacity-30 disabled:cursor-not-allowed disabled:hover:bg-card disabled:hover:text-foreground" aria-label="<?php esc_attr_e('Tiếp', 'vanduong'); ?>">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M9 6l6 6-6 6"/></svg>
                </button>
            </div>
        </div>

    </div>

</section>
