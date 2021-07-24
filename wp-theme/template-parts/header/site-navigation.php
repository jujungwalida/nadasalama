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

<nav class="py-8">
    <!-- mobile navigation -->
    <div id="mobile-nav" class="lg:hidden">
        <button @click="open = !open" class="font-semibold whitespace-nowrap uppercase block px-1 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" /></svg>
        </button>

        <div x-show="open">
            <div class="bg-black bg-opacity-75 fixed inset-0 w-full h-screen"></div>
            <div @click.away="open = false" class="fixed inset-y-0 left-0 w-max max-w-xs">
                <div class="bg-white shadow-lg h-screen p-4">
                    <div class="flex flex-col h-full space-y-8">
                        <div class="flex justify-between items-center space-x-10">
                            <div class="flex items-center space-x-2">

                                <?php if ( has_custom_logo() ) : ?>
                                    <div><img class="h-auto w-6" src="<?php echo esc_url_raw( $logo_image_url ); ?>"></div>
                                <?php endif; ?>

                                <?php if ( $show_title ) : ?>
                                    <div><p class="font-medium">Nada Salama International</div>
                                <?php endif; ?>
                            </div>
                            <div>
                                <button @click="open = false" class="block">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                                </button>
                            </div>
                        </div>

                        <?php
                        wp_nav_menu( array(
                            'theme_location' => 'main_menu',
                            'menu_class'     => 'font-normal flex flex-col lg:flex-row lg:items-center lg:space-x-4',
                            'items_wrap'     => '<ul id="top-level-menu-mobile" class="%2$s">%3$s</ul>',
                            'fallback_cb'    => false,
                            'walker'         => new NSI_Walker_Nav_Menu(),
                        ) );
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- desktop navigation -->
    <div id="desktop-nav" class="hidden lg:block">

        <?php
        wp_nav_menu( array(
            'theme_location' => 'main_menu',
            'menu_class'     => 'font-normal flex flex-col lg:flex-row lg:items-center lg:space-x-4',
            'items_wrap'     => '<ul id="top-level-menu-desktop" class="%2$s">%3$s</ul>',
            'fallback_cb'    => false,
            'walker'         => new NSI_Walker_Nav_Menu(),
        ) );
        ?>

    </div>
</nav>
