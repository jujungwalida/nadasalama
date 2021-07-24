<?php get_header(); ?>

<div class="bg-gray-100 relative z-0">
    <div class="w-10/12 py-24 mx-auto">

        <?php
        if ( have_posts() ) :
            while ( have_posts() ) :
                the_post();

                get_template_part( 'template-parts/content/content-page' );

            endwhile;
        else :
            get_template_part( 'template-parts/content/content-none' );
        endif;
        ?>

    </div>
</div>

<?php get_footer();