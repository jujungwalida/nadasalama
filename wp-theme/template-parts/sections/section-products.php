<?php

$enable  = get_theme_mod( 'nsi_products_enable_disable' );
$page    = get_theme_mod( 'nsi_products_page' );

if ( $enable ) : ?>

    <div class="bg-gray-100">
        <div class="w-10/12 py-24 mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-0">
                <div class="lg:pr-10">

                    <?php
                    $query = new WP_Query( array(
                        'page_id'   => $page,
                    ) );

                    if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

                        <h2 class="text-3xl font-black uppercase"><?php the_title(); ?></h2>
                        <p class="text-xl mt-4 mb-8 lg:mb-16"><?php echo get_the_excerpt(); ?></p>

                    <?php endwhile; wp_reset_postdata(); endif; ?>

                </div>

                <div>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">

                        <?php
                        $query = new WP_Query( array(
                            'post_type' => 'product'
                        ) );

                        if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); $id = get_the_ID(); ?>

                            <div class="h-full">
                                <a class="group block relative h-full " href="<?php the_permalink(); ?>">
                                    <img class="object-cover w-full h-full" src="<?php echo get_the_post_thumbnail_url( $id ); ?>">

                                    <div class="absolute inset-0">
                                        <div class="bg-secondary-red flex justify-center items-center h-full opacity-0 group-hover:opacity-100 transform duration-300">
                                            <p class="text-sm text-white font-black tracking-wide uppercase"><?php the_title(); ?></p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        <?php endwhile; wp_reset_postdata(); endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>
