<?php

get_header();

$sections = array(
    'banner',
    'products',
    'about-us',
    'why-choose-us',
    'gallery'
);

foreach ( $sections as $section ) :
    get_template_part( "template-parts/sections/section-{$section}" );
endforeach;

get_footer();