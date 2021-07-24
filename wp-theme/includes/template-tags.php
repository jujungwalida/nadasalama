<?php

if ( ! function_exists( 'current_year' ) ) {

	function nsi_current_year( $atts ){
		return date('Y');
	}
	add_shortcode( 'year', 'nsi_current_year' );

}
