<?php

$enable = get_theme_mod( 'nsi_banner_enable_disable' );
$images = array();
$small_texts = array();
$big_texts = array();

foreach (range(1, 3) as $index) {
    $images[$index]      = get_theme_mod( "nsi_banner_{$index}_image" );
    $small_texts[$index] = get_theme_mod( "nsi_banner_{$index}_small_text" );
    $big_texts[$index]   = get_theme_mod( "nsi_banner_{$index}_big_text" );

    if ( empty( $images[$index] )  ) unset( $images[$index] );
}

?>

<?php if ( $enable ) : ?>

    <?php if ( count($images) === 1 ) : $index = array_keys( $images )[0]; ?>

        <div class="bg-center bg-no-repeat bg-cover" style="background-image: url('<?php echo esc_url_raw( $images[$index] ); ?>');">
            <div class="bg-black bg-opacity-60">
                <div class="w-10/12 h-screen pt-24 pb-12 mx-auto">
                    <div class="flex h-full items-center">
                        <div>
                            <p class="text-white sm:text-lg font-black tracking-wider uppercase"><?php echo  esc_html( $small_texts[$index] ); ?></p>
                            <p class="leading-loose text-white text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-black uppercase mt-4"><?php echo  esc_html( $big_texts[$index] ); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php else : ?>

        <div class="swiper-container">
            <div class="swiper-wrapper">

                <?php foreach( $images as $index => $image ) : ?>

                    <div class="swiper-slide">
                        <div class="bg-center bg-no-repeat bg-cover" style="background-image: url('<?php echo esc_url_raw( $image ); ?>');">
                            <div class="bg-black bg-opacity-60">
                                <div class="w-10/12 h-screen pt-24 pb-12 mx-auto">
                                    <div class="flex h-full items-center">
                                        <div>
                                            <p class="text-white sm:text-lg font-black tracking-wider uppercase"><?php echo  esc_html( $small_texts[$index] ); ?></p>
                                            <p class="leading-loose text-white text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-black uppercase mt-4"><?php echo  esc_html( $big_texts[$index] ); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>

            </div>

            <div class="swiper-pagination py-4"></div>
        </div>

    <?php endif; ?>

<?php endif; ?>
