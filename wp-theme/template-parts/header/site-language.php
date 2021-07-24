<?php

wp_nav_menu( array(
    'theme_location' => 'extra_menu',
    'menu_class'     => 'text-xs font-normal flex space-x-4',
    'items_wrap'     => '<ul id="top-level-menu-mobile" class="%2$s">%3$s</ul>',
    'fallback_cb'    => false,
) );