<?php $page = get_theme_mod( 'nsi_products_archive_page' ); ?>

<div class="grid grid-cols-1 gap-10">

    <?php if ( $page ) : ?>

        <?php
        $query = new WP_Query( array(
            'page_id'   => $page,
        ) );

        if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

            <div>
                <h1 class="text-3xl font-black uppercase"><?php the_title(); ?></h1>
                <p class="text-xl mt-4 mb-8"><?php echo get_the_excerpt(); ?></p>
            </div>

        <?php endwhile; wp_reset_postdata(); endif; ?>

    <?php endif; ?>

    <div>
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">

            <?php while ( have_posts() ) : the_post(); ?>

                <div class="h-full">
                    <a class="group block relative h-full " href="<?php the_permalink(); ?>">
                        <img class="object-cover w-full h-full" src="<?php echo get_the_post_thumbnail_url( $id ); ?>">

                        <div class="absolute inset-0">
                            <div class="bg-secondary-red flex justify-center items-center h-full opacity-0 group-hover:opacity-100 transform duration-300">
                                <div class="text-white p-10">
                                    <p class="text-sm font-black tracking-wide uppercase"><?php the_title(); ?></p>
                                    <p class="mt-4"><?php the_excerpt(); ?></p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            <?php endwhile; ?>

        </div>
    </div>

</div>
