<?php

function nsi_get_icon_svg( $group, $icon, $size = 24 ) {
	return NSI_SVG::get_svg( $group, $icon );
}

function nsi_get_gallery_images( $post_id ) {
	$image_ids = array();

	$galleries = get_post_galleries( $post_id, false);

	if ( empty($galleries ) ) return false;

	foreach ( $galleries as $gallery) {
		if ( ! empty ( $gallery[ 'ids' ] ) ) {
            $image_ids = array_merge( $image_ids, explode( ',', $gallery[ 'ids' ] ) );
        }
	}

	$image_ids = array_unique( $image_ids );

	return array_map( "wp_get_attachment_url", $image_ids );
}

function nsi_get_siblings( $id ) {
    $post = get_post( $id );
    $parent = $post->post_parent;
    $siblings = array();

    if ( $parent ) {
        $args = get_pages( array(
            'post_type'   => 'page',
            'post_status' => array( 'publish', ),
            'exclude'     => $id,
        ) );

        $siblings = get_page_children( $parent, $args );
    }

    return $siblings;
}

function nsi_get_children( $id ) {
    $args = get_pages( array(
        'post_type' => 'page',
        'post_status' => array( 'publish' ),
    ) );

    return get_page_children( $id, $args );
}
