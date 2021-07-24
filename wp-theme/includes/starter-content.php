<?php

function nsi_get_starter_content() {
    $starter_content = array(

		// Featured Image for Products
		'attachments' => array(
			'featured-vanilla' => array(
				'post_title' => 'About Cover Image',
				'file'       => 'starter-contents/products/vanilla.jpg',
			),
			'featured-cinnamon' => array(
				'post_title' => 'About Cover Image',
				'file'       => 'starter-contents/products/cinnamon.jpg',
			),
			'featured-cocoa' => array(
				'post_title' => 'About Cover Image',
				'file'       => 'starter-contents/products/cocoa.jpg',
			),
			'featured-white-pepper' => array(
				'post_title' => 'About Cover Image',
				'file'       => 'starter-contents/products/white-pepper.jpg',
			),
			'featured-coffee' => array(
				'post_title' => 'About Cover Image',
				'file'       => 'starter-contents/products/coffee.jpg',
			),
			'featured-palm-sugar' => array(
				'post_title' => 'About Cover Image',
				'file'       => 'starter-contents/products/palm-sugar.jpg',
			),
		),

		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts'     => array(
			'front' => array(
				'post_type'    => 'page',
				'post_title'   => esc_html_x( 'Lorem Ipsum', 'Lorem Ipsum', 'nsi' ),
				'post_content' => '<!-- wp:paragraph --><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><!-- /wp:paragraph -->',
				'post_excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
			),
            'products' => array(
                'post_type'    => 'page',
                'post_title'   => esc_html_x( 'Products', 'Products', 'nsi' ),
				'post_excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            ),
			'vanilla' => array(
                'post_type'   => 'product',
                'post_title'  => esc_html_x( 'Vanilla', 'Vanilla', 'nsi' ),
				'thumbnail'   => '{{featured-vanilla}}'
            ),
            'cinnamon' => array(
                'post_type'  => 'product',
                'post_title' => esc_html_x( 'Cinnamon', 'Cinnamon', 'nsi' ),
				'thumbnail'  => '{{featured-cinnamon}}'
            ),
			'cocoa' => array(
                'post_type'  => 'product',
                'post_title' => esc_html_x( 'Cocoa', 'Cocoa', 'nsi' ),
				'thumbnail'  => '{{featured-cocoa}}'
            ),
			'white-pepper' => array(
                'post_type'  => 'product',
                'post_title' => esc_html_x( 'White Pepper', 'White Pepper', 'nsi' ),
				'thumbnail'  => '{{featured-white-pepper}}'
            ),
			'coffee' => array(
                'post_type'  => 'product',
                'post_title' => esc_html_x( 'Coffee', 'Coffee', 'nsi' ),
				'thumbnail'  => '{{featured-coffee}}'
            ),
			'palm-sugar' => array(
                'post_type'  => 'product',
                'post_title' => esc_html_x( 'Palm Sugar', 'Palm Sugar', 'nsi' ),
				'thumbnail'  => '{{featured-palm-sugar}}'
            ),
            'our-policies' => array(
                'post_type'    => 'page',
                'post_title'   => esc_html_x( 'Our Policies', 'Policies', 'nsi' ),
				'post_excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            ),
			'return-policies' => array(
                'post_type'  => 'page',
                'post_title' => esc_html_x( 'Return Policy', 'Return Policy', 'nsi' ),
            ),
			'shipping-policies' => array(
                'post_type'  => 'page',
                'post_title' => esc_html_x( 'Shipping Policy', 'Shipping Policy', 'nsi' ),
            ),
			'privacy-policies' => array(
                'post_type'  => 'page',
                'post_title' => esc_html_x( 'Privacy Policy', 'Privacy Policy', 'nsi' ),
            ),
			'terms-and-conditions' => array(
                'post_type'  => 'page',
                'post_title' => esc_html_x( 'Terms and Conditions', 'Terms and Conditions', 'nsi' ),
            ),
			'gallery' => array(
                'post_type'    => 'page',
                'post_title'   => esc_html_x( 'Gallery', 'Gallery', 'nsi' ),
				'post_excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            ),
			'about-us' => array(
				'post_type'    => 'page',
                'post_title'   => esc_html_x( 'About Us', 'About Us', 'nsi' ),
				'post_excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
			),
			'contact-us' => array(
				'post_type'    => 'page',
                'post_title'   => esc_html_x( 'Contact Us', 'Contact Us', 'nsi' ),
				'post_excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
			),
			'why-choose-us' => array(
				'post_type'    => 'page',
                'post_title'   => esc_html_x( 'Why Choose Us', 'Why Choose Us', 'nsi' ),
				'post_excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
			),
		),

		// Default to a static front page and assign the front and posts pages.
		'options'   => array(
			'show_on_front'  => 'page',
			'page_on_front'  => '{{front}}',
			'page_for_posts' => '{{blog}}',
		),

		// Navigation menu
		'nav_menus' => array(
			'main_menu' => array(
				'name'  => __( 'Main Menu', 'nsi' ),
				'items' => array(
					'link_home',
					'menu-products' => array(
						'type' => 'post_type',
						'object' => 'page',
						'object_id' => '{{products}}',
					),
					'menu-our-policies' => array(
						'type' => 'post_type',
						'object' => 'page',
						'object_id' => '{{our-policies}}',
					),
					'menu-gallery' => array(
						'type' => 'post_type',
						'object' => 'page',
						'object_id' => '{{gallery}}',
					),
					'menu-about-us' => array(
						'type' => 'post_type',
						'object' => 'page',
						'object_id' => '{{about-us}}',
					),
					'menu-contact-us' => array(
						'type' => 'post_type',
						'object' => 'page',
						'object_id' => '{{contact-us}}',
					),
				),
			),
		),

		// Widget
		'widgets' => array(
			'main_sidebar' => array(
				'nsi_about_company_widget',
				'nsi_products_widget',
				'nsi_support_widget',
				'nsi_map_widget',
			),
		),

	);

    return apply_filters( 'starter_content', $starter_content );
}
