<?php

$show_title  = ( true === get_theme_mod( 'display_title_and_tagline', true ) );
$blog_info   = get_bloginfo( 'name' );
$description = get_bloginfo( 'description', 'display' );
$logo        = get_theme_mod( 'custom_logo' );

if ( has_custom_logo() ) {
    $logo_image     = wp_get_attachment_image_src( $logo , 'thumbnail' );
    $logo_image_url = $logo_image[0];
}

?>

<?php if ( $show_title ) : ?>

    <div class="flex items-center space-x-3">

        <?php if ( has_custom_logo() ) : ?>
            <div>
                <img class="w-11 h-auto" src="<?php echo esc_url_raw( $logo_image_url ); ?>">
            </div>
        <?php endif; ?>

        <?php if ( $blog_info ) : ?>

            <div>
                <?php if ( is_front_page() && ! is_paged() ) : ?>
                    <h1 class="text-lg font-medium leading-snug"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( $blog_info ); ?></a></h1>
                <?php elseif ( is_front_page() && ! is_home() ) : ?>
                    <h1 class="text-lg font-medium leading-snug">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <?php echo esc_html( $blog_info ); ?>
                        </a>
                    </h1>
                <?php else : ?>
                    <p class="text-lg font-medium leading-snug">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <?php echo esc_html( $blog_info ); ?>
                        </a>
                    </p>
                <?php endif; ?>

                <?php if ( $description ) : ?>
                    <p class="text-sm"><?php echo esc_html( $description ); ?></p>
                <?php endif; ?>

            </div>

        <?php endif; ?>

    </div>

<?php endif; ?>
