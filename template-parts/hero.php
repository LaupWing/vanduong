<?php
/**
 * Hero section.
 *
 * @package Vanduong
 */
// Pick a sample product to feature in the hero visual: a featured one if set,
// otherwise the most recent published product.
$hero_product = null;
if (class_exists('WooCommerce')) {
    $featured = wc_get_products(array('status' => 'publish', 'limit' => 1, 'featured' => true, 'visibility' => 'visible'));
    if (! empty($featured)) {
        $hero_product = $featured[0];
    } else {
        $recent = wc_get_products(array('status' => 'publish', 'limit' => 1, 'orderby' => 'date', 'order' => 'DESC', 'visibility' => 'visible'));
        $hero_product = ! empty($recent) ? $recent[0] : null;
    }
}
?>
<section class="relative overflow-hidden bg-secondary border-b-2 border-foreground">
    <div class="mx-auto grid max-w-7xl items-center gap-10 px-6 py-16 md:grid-cols-2 md:py-24">
        <!-- Copy -->
        <div class="flex flex-col gap-6 animate-fade-in-up">
            <span class="inline-flex w-fit items-center gap-2 rounded-full border-2 border-foreground bg-card px-4 py-1.5 text-xs font-bold uppercase tracking-widest">
                ✿ Bộ sưu tập mới
            </span>
            <h1 class="font-display text-4xl font-bold leading-[1.05] tracking-tight md:text-6xl">
                Những điều đẹp đẽ,<br>
                <span class="text-primary">làm bằng cả tấm lòng.</span>
            </h1>
            <p class="max-w-md text-base leading-relaxed text-muted-foreground md:text-lg">
                Khám phá bộ sưu tập thủ công của chúng tôi. Được tuyển chọn kỹ lưỡng, tạo ra để bạn yêu thương.
            </p>
            <div class="flex flex-wrap items-center gap-4 pt-2">
                <a href="<?php echo esc_url(function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/')); ?>"
                   class="inline-flex items-center gap-2 rounded-full border-2 border-foreground bg-primary px-7 py-3 text-sm font-bold text-primary-foreground shadow-[4px_4px_0_0_var(--color-foreground)] transition-all hover:-translate-y-0.5 hover:shadow-[6px_6px_0_0_var(--color-foreground)]">Mua ngay
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
                <a href="#" class="inline-flex items-center gap-2 rounded-full border-2 border-foreground bg-card px-7 py-3 text-sm font-bold text-foreground transition-colors hover:bg-muted">
                    Câu chuyện của chúng tôi
                </a>
            </div>
        </div>

        <!-- Visual -->
        <div class="relative">
            <?php if ($hero_product) :
                $hp_id    = $hero_product->get_id();
                $hp_href  = get_permalink($hp_id);
                $hp_title = $hero_product->get_name();
                $hp_img   = get_the_post_thumbnail_url($hp_id, 'large');
            ?>
                <a href="<?php echo esc_url($hp_href); ?>" class="group block overflow-hidden rounded-3xl border-2 border-foreground bg-card shadow-[8px_8px_0_0_var(--color-foreground)] transition-all hover:-translate-y-1 hover:shadow-[10px_10px_0_0_var(--color-foreground)]">
                    <div class="relative aspect-square w-full overflow-hidden border-b-2 border-foreground bg-primary">
                        <?php if ($hp_img) : ?>
                            <img src="<?php echo esc_url($hp_img); ?>" alt="<?php echo esc_attr($hp_title); ?>"
                                 class="absolute inset-0 h-full w-full object-cover transition-transform duration-500 group-hover:scale-105" />
                        <?php else : ?>
                            <span class="flex h-full w-full items-center justify-center text-7xl text-primary-foreground opacity-40">✿</span>
                        <?php endif; ?>
                    </div>
                    <div class="flex items-center justify-between gap-3 px-5 py-4">
                        <span class="font-display text-base font-bold leading-snug line-clamp-1"><?php echo esc_html($hp_title); ?></span>
                        <span class="shrink-0 text-lg font-bold text-primary"><?php echo wp_kses_post($hero_product->get_price_html()); ?></span>
                    </div>
                </a>
            <?php else : ?>
                <div class="aspect-square w-full rounded-3xl border-2 border-foreground bg-primary shadow-[8px_8px_0_0_var(--color-foreground)]"></div>
            <?php endif; ?>
            <div class="absolute -bottom-5 -left-5 flex h-24 w-24 items-center justify-center rounded-full border-2 border-foreground bg-accent text-center text-xs font-bold text-accent-foreground shadow-[4px_4px_0_0_var(--color-foreground)]">
                100%<br>thủ công
            </div>
        </div>
    </div>
</section>
