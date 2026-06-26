    </main><!-- #content -->
</div><!-- #page -->

<footer class="w-full bg-foreground text-background border-t-2 border-foreground">
    <div class="mx-auto max-w-7xl px-6 py-12 md:py-16">
        <div class="grid gap-10 md:grid-cols-3">
            <!-- Brand -->
            <div class="flex flex-col gap-4">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="font-display text-2xl font-bold tracking-tight text-primary">
                    <?php bloginfo('name'); ?>
                </a>
                <p class="text-sm leading-relaxed text-background/60">
                    <?php echo esc_html(get_bloginfo('description')); ?>
                </p>
            </div>

            <!-- Footer Menu -->
            <div class="flex flex-col gap-3">
                <h4 class="text-sm font-extrabold uppercase tracking-widest">Danh mục</h4>
                <?php
                if (has_nav_menu('footer')) {
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'container'      => false,
                        'menu_class'     => 'vanduong-menu-footer flex flex-col gap-2',
                        'fallback_cb'    => false,
                        'depth'          => 1,
                    ));
                } else {
                    echo '<span class="text-sm text-background/40">Thiết lập menu chân trang.</span>';
                }
                ?>
            </div>

            <!-- Contact / socials -->
            <div class="flex flex-col gap-3">
                <h4 class="text-sm font-extrabold uppercase tracking-widest">Theo dõi chúng tôi</h4>
                <a href="#" class="text-sm text-background/60 hover:text-background transition-colors">Instagram</a>
                <a href="#" class="text-sm text-background/60 hover:text-background transition-colors">Facebook</a>
            </div>
        </div>

        <div class="mt-12 border-t border-background/20 pt-6 flex flex-col items-center justify-between gap-4 md:flex-row">
            <p class="text-xs text-background/40">
                &copy; <?php echo esc_html(date('Y')); ?> <?php bloginfo('name'); ?>. Bảo lưu mọi quyền.
            </p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
