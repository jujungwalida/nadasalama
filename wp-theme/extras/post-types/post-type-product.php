<?php

function create_cpt_product() {

    $labels = array(
        'name'          => __( 'Products' , 'nsi' ),
        'singular_name' => __( 'Product', 'nsi' ),
    );

    $supports = array(
        'title',
        'editor',
        'trackbacks',
        'author',
        'excerpt',
        'page-attributes',
        'thumbnail',
        'custom-fields',
        'post-formats',
    );

    $args = array(
        'labels'       => $labels,
        'public'       => true,
        'supports'     => $supports,
        'show_in_rest' => true,
    );

    register_post_type('product', $args );

}
add_action( 'init', 'create_cpt_product' );
