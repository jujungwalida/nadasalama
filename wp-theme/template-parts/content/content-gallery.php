<?php

$page = get_theme_mod( 'nsi_gallery_header_page' );
$gallery = get_post_gallery( get_the_ID(), false );
$image_ids = explode( ',', $gallery['ids'] );

?>

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

    <div class="py-1">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-1">

            <?php
            foreach ( $image_ids as $id ) :
                $thumbnail = wp_get_attachment_image_src( $id, 'thumbnail' )[0];
                $original  = wp_get_attachment_image_src( $id, 'full' )[0];
                ?>

                <div><a href="<?php echo esc_url_raw( $original ); ?>" target="_blank"><img class="object-cover w-full h-full" src="<?php echo esc_url_raw( $thumbnail ); ?>"></a></div>

            <?php endforeach; ?>

        </div>
    </div>

</div>
