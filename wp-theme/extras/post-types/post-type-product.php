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
        'archive',
    );

    $args = array(
        'labels'       => $labels,
        'public'       => true,
        'supports'     => $supports,
        'show_in_rest' => true,
        'has_archive'  => true,
    );

    register_post_type('product', $args );

}
add_action( 'init', 'create_cpt_product' );

function get_cpt_product_template($template) {
    global $post;

    if ($post->post_type == 'product') {
        $template = get_template_directory() . '/archive-product.php';
    }
    return $template;
}
add_filter( "archive_template", "get_cpt_product_template" );
