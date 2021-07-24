<?php

function nsi_sub_menu_toggle( $output, $item, $depth, $args ) {
	if ( 0 === $depth && in_array( 'menu-item-has-children', $item->classes, true ) ) {

        $output .= '<button @click="open = !open">';
        $output .= nsi_get_icon_svg( 'site', 'chevron_down' );
        $output .= '</button>';
	}
	return $output;
}
add_filter( 'walker_nav_menu_start_el', 'nsi_sub_menu_toggle', 10, 4 );
