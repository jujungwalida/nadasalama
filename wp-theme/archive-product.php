<?php get_header(); ?>

<div class="bg-gray-100 relative z-0">
    <div class="w-10/12 py-24 mx-auto">

        <?php
        if ( have_posts() ) :
            get_template_part( 'template-parts/product/archive' );
        else :
            get_template_part( 'template-parts/product/content/content-none' );
        endif;
        ?>

    </div>
</div>

<?php get_footer();
