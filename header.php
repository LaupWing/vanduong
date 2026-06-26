<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class('antialiased'); ?>>
<?php wp_body_open(); ?>

<!-- Top Bar -->
<div class="w-full bg-primary text-primary-foreground border-b-2 border-foreground">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-2 text-xs font-semibold">
        <span>Gratis verzending vanaf €50</span>
        <span class="hidden sm:block">Met liefde gemaakt ✿</span>
    </div>
</div>

<!-- Navbar -->
<nav class="w-full border-b-2 border-foreground bg-background">
    <div class="flex items-stretch md:grid md:grid-cols-[1fr_auto_1fr]">
        <!-- Logo -->
        <div class="flex items-stretch justify-self-start">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center border-r-2 border-foreground px-5 py-4" aria-label="<?php echo esc_attr(get_bloginfo('name')); ?>">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <span class="font-display text-2xl font-bold tracking-tight"><?php bloginfo('name'); ?></span>
                <?php endif; ?>
            </a>
        </div>

        <!-- Desktop Nav Links -->
        <div class="hidden items-center md:flex">
            <?php
            if (has_nav_menu('primary')) {
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'vanduong-menu flex items-center gap-9',
                    'link_before'    => '',
                    'fallback_cb'    => false,
                    'depth'          => 1,
                    'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                ));
            } else {
                echo '<span class="text-sm text-muted-foreground">Stel een menu in via Weergave &rsaquo; Menu\'s</span>';
            }
            ?>
        </div>

        <!-- Desktop Actions -->
        <div class="hidden items-center justify-self-end md:flex self-stretch">
            <?php if (class_exists('WooCommerce')) : ?>
                <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="relative flex w-16 items-center justify-center border-l-2 border-foreground text-foreground hover:bg-muted transition-colors self-stretch" aria-label="<?php esc_attr_e('Winkelwagen', 'vanduong'); ?>">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/></svg>
                    <span class="vanduong-cart-count absolute -right-0 -top-0 mr-2 mt-2 flex h-5 min-w-[1.25rem] items-center justify-center rounded-full border-2 border-foreground bg-accent px-1 text-[10px] font-bold text-accent-foreground" data-count="<?php echo esc_attr(vanduong_cart_count()); ?>"><?php echo esc_html(vanduong_cart_count()); ?></span>
                </a>
            <?php endif; ?>
        </div>

        <!-- Mobile spacer + actions -->
        <div class="flex flex-1 items-stretch justify-end md:hidden">
            <?php if (class_exists('WooCommerce')) : ?>
                <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="relative flex w-14 items-center justify-center border-l-2 border-foreground text-foreground self-stretch" aria-label="<?php esc_attr_e('Winkelwagen', 'vanduong'); ?>">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/></svg>
                    <span class="vanduong-cart-count absolute right-1 top-1 flex h-5 min-w-[1.25rem] items-center justify-center rounded-full border-2 border-foreground bg-accent px-1 text-[10px] font-bold text-accent-foreground" data-count="<?php echo esc_attr(vanduong_cart_count()); ?>"><?php echo esc_html(vanduong_cart_count()); ?></span>
                </a>
            <?php endif; ?>
            <button id="mobile-menu-btn" class="flex w-14 items-center justify-center border-l-2 border-foreground text-foreground self-stretch" aria-label="<?php esc_attr_e('Open menu', 'vanduong'); ?>">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/></svg>
            </button>
        </div>
    </div>
</nav>

<!-- Mobile Nav -->
<div id="mobile-menu" class="fixed inset-0 z-50 md:hidden invisible pointer-events-none">
    <div class="absolute inset-0 bg-foreground/60 backdrop-blur-sm opacity-0 transition-opacity duration-300" id="mobile-menu-overlay"></div>
    <div class="fixed top-0 left-0 right-0 w-full border-b-4 border-foreground bg-background -translate-y-full transition-transform duration-300 ease-in-out" id="mobile-menu-panel">
        <div class="flex items-center justify-between border-b-2 border-foreground px-6 py-4">
            <span class="font-display text-xl font-bold"><?php bloginfo('name'); ?></span>
            <button id="mobile-menu-close" class="flex h-10 w-10 items-center justify-center border-2 border-foreground text-foreground hover:bg-muted transition-colors" aria-label="<?php esc_attr_e('Sluit menu', 'vanduong'); ?>">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <div class="px-6 py-6">
            <?php
            if (has_nav_menu('primary')) {
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'vanduong-menu-mobile flex flex-col gap-1',
                    'fallback_cb'    => false,
                    'depth'          => 1,
                    'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                ));
            }
            ?>
        </div>
    </div>
</div>

<div id="page" class="site">
    <main id="content" class="site-content">
