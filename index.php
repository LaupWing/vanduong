<?php
/**
 * Main template fallback.
 *
 * @package Vanduong
 */

get_header();
?>

<div class="mx-auto max-w-7xl px-6 py-12">
    <?php if (have_posts()) : ?>
        <div class="flex flex-col gap-10">
            <?php while (have_posts()) : the_post(); ?>
                <article <?php post_class('flex flex-col gap-3'); ?>>
                    <h2 class="font-display text-2xl font-bold">
                        <a href="<?php the_permalink(); ?>" class="hover:text-primary transition-colors"><?php the_title(); ?></a>
                    </h2>
                    <div class="text-muted-foreground"><?php the_excerpt(); ?></div>
                </article>
            <?php endwhile; ?>
        </div>

        <div class="mt-10"><?php the_posts_pagination(); ?></div>
    <?php else : ?>
        <p class="text-muted-foreground"><?php esc_html_e('Không tìm thấy bài viết nào.', 'vanduong'); ?></p>
    <?php endif; ?>
</div>

<?php
get_footer();
