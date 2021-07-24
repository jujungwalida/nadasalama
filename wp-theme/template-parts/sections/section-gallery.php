<?php

$enable = get_theme_mod( 'nsi_gallery_enable_disable' );
$page   = get_theme_mod( 'nsi_gallery_page' );
$images = nsi_get_gallery_images( $page );

if ( $enable && (! empty( $images ) ) ) : ?>

    <div class="py-1">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-1">

            <?php foreach ( $images as $image): ?>

                <div><img class="object-cover w-full h-full" src="<?php echo esc_url_raw( $image ); ?>"></div>

            <?php endforeach; ?>

        </div>
    </div>

<?php endif; ?>
