<?php
/**
 * Hero section.
 *
 * @package Vanduong
 */
?>
<section class="relative overflow-hidden bg-secondary border-b-2 border-foreground">
    <div class="mx-auto grid max-w-7xl items-center gap-10 px-6 py-16 md:grid-cols-2 md:py-24">
        <!-- Copy -->
        <div class="flex flex-col gap-6 animate-fade-in-up">
            <span class="inline-flex w-fit items-center gap-2 rounded-full border-2 border-foreground bg-card px-4 py-1.5 text-xs font-bold uppercase tracking-widest">
                ✿ Nieuwe collectie
            </span>
            <h1 class="font-display text-4xl font-bold leading-[1.05] tracking-tight md:text-6xl">
                Mooie dingen,<br>
                <span class="text-primary">met liefde gemaakt.</span>
            </h1>
            <p class="max-w-md text-base leading-relaxed text-muted-foreground md:text-lg">
                Ontdek onze handgemaakte collectie. Zorgvuldig samengesteld, gemaakt om van te houden.
            </p>
            <div class="flex flex-wrap items-center gap-4 pt-2">
                <a href="<?php echo esc_url(function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/')); ?>"
                   class="inline-flex items-center gap-2 rounded-full border-2 border-foreground bg-primary px-7 py-3 text-sm font-bold text-primary-foreground shadow-[4px_4px_0_0_var(--color-foreground)] transition-all hover:-translate-y-0.5 hover:shadow-[6px_6px_0_0_var(--color-foreground)]">
                    Shop nu
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
                <a href="#" class="inline-flex items-center gap-2 rounded-full border-2 border-foreground bg-card px-7 py-3 text-sm font-bold text-foreground transition-colors hover:bg-muted">
                    Ons verhaal
                </a>
            </div>
        </div>

        <!-- Visual -->
        <div class="relative">
            <div class="aspect-square w-full rounded-3xl border-2 border-foreground bg-primary shadow-[8px_8px_0_0_var(--color-foreground)]"></div>
            <div class="absolute -bottom-5 -left-5 flex h-24 w-24 items-center justify-center rounded-full border-2 border-foreground bg-accent text-center text-xs font-bold text-accent-foreground shadow-[4px_4px_0_0_var(--color-foreground)]">
                100%<br>handgemaakt
            </div>
        </div>
    </div>
</section>
