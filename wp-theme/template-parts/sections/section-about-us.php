<?php

$enable  = get_theme_mod( 'nsi_about_us_enable_disable' );
$page    = get_theme_mod( 'nsi_about_us_page' );
$image   = get_theme_mod( 'nsi_about_us_image' );

if ( $enable ) : ?>

    <div class="flex">
        <div class="bg-primary-blue w-1/12"></div>
        <div class="text-white bg-primary-blue w-10/12 lg:w-5/12 900 lg:pr-10 py-24">

            <?php
            $query = new WP_Query( array(
                'page_id'   => $page,
            ) );

            if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

                <h2 class="text-3xl font-black uppercase"><?php the_title(); ?></h2>
                <p class="text-xl mt-4 mb-16"><?php echo get_the_excerpt(); ?></p>
                <a class="text-sm font-black uppercase text-gray-100 bg-primary-red rounded shadow inline-block px-6 py-4 hover:text-white hover:bg-secondary-red focus:outline-none" href="<?php the_permalink(); ?>">Find out more</a>

            <?php endwhile; wp_reset_postdata(); endif; ?>

        </div>
        <div class="w-6/12 h-auto hidden lg:bg-primary-blue bg-center bg-no-repeat bg-cover lg:block" style="background-image: url('<?php echo esc_url_raw( $image ); ?>');"></div>
        <div class="bg-primary-blue w-1/12 lg:hidden"></div>
    </div>

<?php endif; ?>
