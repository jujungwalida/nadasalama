
<?php if ( has_nav_menu( 'extra_menu' ) ) : ?>

    <div class="bg-gray-100 relative z-50">
        <div class="w-10/12 relative z-50 py-2 mx-auto">
            <div class="font-xs uppercase">
                <?php get_template_part( 'template-parts/header/site-language' ); ?>
            </div>
        </div>
    </div>

<?php endif; ?>

<header class="bg-white relative z-50 shadow-sm">
    <div class="w-10/12 relative z-50 py-0 mx-auto">
        <div class="flex justify-between items-center">

            <?php get_template_part( 'template-parts/header/site-branding' ); ?>

            <?php get_template_part( 'template-parts/header/site-navigation' ); ?>

        </div>
    </div>
</header>
